Title: Haxe tips: Macro-Proxied Class = with macros for compile-time and implementation for run-time
Date: 2012-07-17 19:42
Tags: Haxe, trick
Slug: haxe-tips-macro-proxied-class-with-macros-for-compile-time-and-implementation-for-run-time

As mentioned in the [previous post on overloading][], I found a way to
provide a reflection friendly, run-time implementation of a `@:macro` method or an
extern class. The trick is simple: build the implementation with a `@:native` metadata.

Here is an implementation of using such I called macro-proxied class in
the method overloading example:

```haxe
//R.hx
#if macro 
import haxe.macro.Expr;
#end

#if !macro @:include("R") extern #end class R {
    /**
     * Helper to get the real run-time implementation of this class.
     * Only use at compile-time.
     */
    inline static public var _impl = R_impl;
    
    /**
     * Helper to mark an instance as the run-time implementation of this class.
     * Only use at compile-time.
     */
    @:macro function _to_impl(r:ExprOf):ExprOf {
        return {
            expr: ECheckType(macro untyped $r, TPath({
                pack:[], 
                name:"R", 
                params: [], 
                sub: "R_impl"
            })),
            pos: r.pos
        }
    }
    
    /**
     * Get a resource by its url.
     * Returns a Xml if url ends with ".xml", a String otherwise.
     */
    @:macro static public function get(url:ExprOf):Expr {
        switch(url.expr) {
            case EConst(c): switch (c) {
                //url is a constant String, we can use optimized versions
                case CString(str):
                    var dotPos = str.lastIndexOf(".");
                    if (dotPos != -1) switch (str.substr(dotPos).toLowerCase()) {
                        case ".xml": return macro R._impl.getXml($url);
                        default:
                    }
                    
                    return return macro R._impl.getText($url);
                default:
            }
            default:
        }
        
        //url is not known at compile-time, let the method check it at run-time.
        return macro R._impl.get($url);
    }
    
    /**
     * Construct a resource loader.
     */
    public function new():Void {}
    
    /**
     * Function same as R.get(url). Just to demo the macro proxy on instance method.
     */
    @:macro public function load(ethis:ExprOf, url:ExprOf):Expr {
        ethis = macro $ethis._to_impl();
        switch(url.expr) {
            case EConst(c): switch (c) {
                //url is a constant String, we can use optimized versions
                case CString(str):
                    var dotPos = str.lastIndexOf(".");
                    if (dotPos != -1) switch (str.substr(dotPos).toLowerCase()) {
                        case ".xml": return macro $ethis.loadXml($url);
                        default:
                    }
                    
                    return return macro $ethis.loadText($url);
                default:
            }
            default:
        }
        
        //url is not known at compile-time, let the method check it at run-time.
        return macro $ethis.load($url);
    }
}

/**
 * Real implementation of R.
 */
@:native("R") // <-- here is the trick ;)
class R_impl {
    
    static public function get(url:String):Dynamic {        
        var dotPos = url.lastIndexOf(".");
        if (dotPos != -1) switch(url.substr(dotPos).toLowerCase()) {
            case ".xml": return getXml(url);
            default:
        }
        
        return getText(url);
    }
    
    public function new():Void { }
    
    public function load(url:String):Dynamic {
        return get(url);
    }
    
    //Below are the optimized overload cases. Skipped file extension check.
    
    static public function getText(url:String):String {
        return haxe.Http.requestUrl(url);
    }
    
    static public function getXml(url:String):Xml {
        return Xml.parse(getText(url));
    }
    
    public function loadText(url:String):String {
        return getText(url);
    }
    
    public function loadXml(url:String):Xml {
        return getXml(url);
    }
}
```

A simple test:

```haxe
//Test.hx
class Test {
    static function main():Void {
        
        trace(Type.getClass(new R().load("http://blog.onthewings.net/sitemap.xml"))); //Test.hx:4: Xml
        trace(Type.getClass(R.get("http://blog.onthewings.net/sitemap.xml"))); //Test.hx:5: Xml
        
        trace(Type.getClass(new R().load("http://www.google.com/"))); //Test.hx:7: String
        trace(Type.getClass(R.get("http://www.google.com/"))); //Test.hx:8: String
        
        //call using variable, so that the compiler does not know it is a xml
        //just to show the overloading logic is working even at run-time
        var a = "http://blog.onthewings.net/sitemap.xml";
        trace(Type.getClass(new R().load(a))); //Test.hx:13: Xml
        trace(Type.getClass(R.get(a))); //Test.hx:14: Xml
        
    }
}
```

### Abilities of Macro-Proxied Class

Macro-proxied class provides a compile-time pre-processing stage for the
methods. We can remap method call to another optimized method base on
compile-time checking on the method arguments. eg. method overloading as
shown above.

There is an implementation at run-time, with class and method names
remained the same. Thus reflection friendly.

Some ideas that may use macro-proxied class includes:

-   [A FastMath class][] that optimize math operation when arguments are
    known at compile-time.
-   [cpp wrapper(ndll)][] that can use method overloading like the
    native API.
-   jQuery plug-in that is used by "using", for better variable argument
    length support.
-   [SPOD][], to merge [the macro version][] to the original verion.
-   [hxLINQ][], like SPOD, to perform compile-time optimization on
    queries when possible.

### Limitations of Macro-Proxied Class

Firstly, you cannot proxy the constructor, since the constructor(`new`) cannot be a
`@:macro` method.

Secondly, care should be taken on handling inheritance. For the `R` example, if we
want to extend `R`, the subclass
should also be a macro-proxied class. Something like:

```haxe
//SubR.hx
import R;

#if macro 
import haxe.macro.Expr;
#end

#if !macro @:include("SubR") extern #end class SubR extends R {
    inline static public var _impl = SubR_impl;
    
    @:macro override function _to_impl(r:ExprOf):ExprOf {
        return {
            expr: ECheckType(macro untyped $r, TPath({
                pack:[], 
                name:"SubR", 
                params: [], 
                sub: "SubR_impl"
            })),
            pos: r.pos
        }
    }
    
    @:macro override public function load(ethis:ExprOf, url:ExprOf):Expr {
        var ethis = macro $ethis._to_impl();
        return macro $ethis.load($url);
    }
}

@:native("SubR")
class SubR_impl extends R_impl {
    override public function load(url:String):Dynamic {
        return "overrided!";
    }
    
    //Remember to override the optimized overload cases too!!
    
    override public function loadText(url:String):String {
        return load(url);
    }
    
    override public function loadXml(url:String):Xml {
        return load(url);
    }
}
```

Both the sub classes of a macro-proxied class have to be a macro-proxied
class too since the signature of some methods at compile-time are
changed to `Array<Expr>->Expr`.
Inherited methods that are not macro-proxied cannot be macro-proxie.
Also we have to think about the case when a `SubR` instance is
stored in a `R`
variable, would the macros or the run-time version of the methods work
correctly?

Moreover, the structure of a macro-proxied class is not preserved. ie.
`R` is not a
structure type of `{
function load(url:String):Dynamic; }`, which `R_impl` is, since
`load` is not an
instance method, but a macro method at compile-time. You can workaround
this by casting (actually is an untyped expression) to `R_impl` by using
`_to_impl()`.

Lastly, again this trick should be refactored into some lib as it is a
bit too complicated to write every time. I guess at least we should use
a [@:build macro][] to copy all the properties and methods(for the ones
we do not want to override).

  [previous post on overloading]: http://blog.onthewings.net/2012/07/13/haxe-tips-advanced-method-overloading-with-macros/
  [A FastMath class]: https://groups.google.com/forum/?fromgroups#!topic/haxelang/wZ02PJigjEw
  [cpp wrapper(ndll)]: http://haxe.org/doc/cpp/ffi
  [SPOD]: http://haxe.org/doc/neko/spod
  [the macro version]: http://haxe.org/manual/spod
  [hxLINQ]: https://github.com/andyli/hxLINQ
  [@:build macro]: http://haxe.org/manual/macros/build
