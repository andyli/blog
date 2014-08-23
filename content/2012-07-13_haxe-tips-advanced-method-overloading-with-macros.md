Title: Haxe tips: advanced method overloading with macros
Date: 2012-07-13 20:05
Tags: Haxe, trick
Slug: haxe-tips-advanced-method-overloading-with-macros

### The @:overload metadata

Introduced in Haxe 2.08(released in 2011), `@:overload` metadata
can be used to annotate a method to have several type signatures. For
example, in `JQuery` of
[jQueryExtern][], the method "`html`" has the
following declaration:

```haxe
@:overload(function(valueOrFunction:Dynamic):JQuery{})
public function html():String;
```

It declares the html setter (`@:overload`) on top
of the getter, so they share the same method name with different
argument/return types.

### Limitation of @:overload

The `@:overload`
metadata is mainly designed for writing externs, ie. to describe the
native overloaded methods but not creating one. The Haxe compiler
wouldn't check with the function body if it is really performing in the
way which `@:overload` metadatas
suggested. And definitely no runtime support if you do not implement it
yourself.

It is also unable to describe some slightly complex, or unusual
overloading. Such us [jQuery.get][], which has the following signature:

```javascript
jQuery.get( url [, data] [, success(data, textStatus, jqXHR)] [, dataType] )
```

If `dataType` is
the string `"xml"`, the `data` going to be
passed to `success` will be an
XML root element. If dataType is `"json"`, a JavaScript
object will be passed instead. There are also cases for `"script"` and `"html"`. Normally in
a Haxe extern we can only declare it as:

```haxe
static public function get(url:String, ?data:Dynamic, ?callBack:Dynamic->String->JqXHR->Void, ?dataType:String):JqXHR;
```

But instead it should be something like:

```haxe
//Note: invalid!!!
@:overload(function get(url:String, ?data:Dynamic, ?callBack:Dom->String->JqXHR->Void, ?dataType:"xml"):JqXHR {})
@:overload(function get(url:String, ?data:Dynamic, ?callBack:Dynamic->String->JqXHR->Void, ?dataType:"json"):JqXHR {})
@:overload(function get(url:String, ?data:Dynamic, ?callBack:String->String->JqXHR->Void, ?dataType:"script"):JqXHR {})
@:overload(function get(url:String, ?data:Dynamic, ?callBack:String->String->JqXHR->Void, ?dataType:"html"):JqXHR {})
static public function get(url:String, ?data:Dynamic, ?callBack:Dynamic->String->JqXHR->Void, ?dataType:String):JqXHR;
```

I know, I know, this kind of API is designed for JS which has a dynamic
type system that does not fit perfectly to a static type system like
Haxe's. And the above case does not hurt much if we simply declare `callback` as `Dynamic->String`.
But, when writing extern, still we prefer declaring as close to as the
original JS signature and use as much compiler checking as we can.

### Macros to the rescue!

Yes, macros can improve that!

Here is a demo extern class `R` that I make up:

```haxe
//R.hx
import haxe.macro.Expr;

#if !macro extern #end class R {
    /**
     * Get a resource by its url.
     * Returns a Xml if url ends with ".xml", a String otherwise.
     */
    @:macro static public function get(url: ExprOf):Expr {
        //the original calling expression, R is untyped to avoid endless loop in this macro
        var expr = macro (untyped R).get($url);
        
        switch(url.expr) {
            case EConst(c): switch (c) {
                case CString(str): //url is a constant String
                    var dotPos = str.lastIndexOf(".");
                    if (dotPos != -1) switch (str.substr(dotPos).toLowerCase()) {
                        case ".xml": return { //mark return type as Xml
                            expr: ECheckType(expr, TPath({pack:[], name:"Xml", params: []})),
                            pos: expr.pos
                        }
                        default:
                    }
                    
                    return { //mark return type as String
                        expr: ECheckType(expr, TPath({pack:[], name:"String", params: []})),
                        pos: expr.pos
                    }
                default:
            }
            default:
        }
        
        //return type is not known at compile-time
        return expr;
    }
}
```

Here is a simple test, that will output the type info when compile:

```haxe
//Test.hx
class Test {
    static function main():Void {
        var a = "123";
        $type(R.get("123.xml"));  //src/R.hx:10: characters 19-40 : Warning : Xml
        $type(R.get("123"));      //src/R.hx:10: characters 19-40 : Warning : String
        $type(R.get(a));          //src/R.hx:10: characters 19-40 : Warning : Unknown<0>
    }
}
```

Note that the above implementation used some macro features from Haxe
2.10, which <del>will be released very soon</del> is released!  
The macro part is a bit too long to write for every method but there is
nothing to stop you refactoring this trick into an lib ;)

Still, the above `R` is merely an
extern, the actual function has to be already implemented in the native
lib. I will let you know one more trick to actually provide an
implementation of the overloaded method, which can be called at
run-time, with reflection support.

  [jQueryExtern]: https://github.com/andyli/jQueryExternForHaxe/
  [jQuery.get]: http://api.jquery.com/jQuery.get/
