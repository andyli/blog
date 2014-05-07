Title: Haxe advanced conditional compilation
Date: 2012-09-02 20:28
Tags: Haxe
Slug: haxe-advanced-conditional-compilation

[Conditional Compilation][] (AKA preprocessor macros) in Haxe is pretty
useful but limited to boolean values. We can make use of macros to use
compiler flag of non-boolean type.

### The traditional way

Usually we can define a flag **mydebug** in hxml:

```text
-D mydebug
```

And use it in Haxe code in this way:

```haxe
#if mydebug
trace("some debug trace")
#end
```

If we want to conditionally include browser support, we need to use a
scheme of flags.

```text
-D supportIE8 #define we support IE8 and above
```

```haxe
#if (supportIE6 || supportIE7) //assume 6 is the min version
trace("some code for IE7");
#end
```

As shown above we need to specify every version before 7 for a piece of
code that is for IE7.  
It is problematic because for now we at most put **\#if (supportIE6 ||
supportIE7 || supportIE8 || supportIE9 || supportIE10 || supportIE11)**
for a piece of IE11-specific code. But we don't know if IE will have
version 99 and definitely we ~~do not care IE users~~ do not want to
write **\#if (supportIE6 || supportIE7 || ... || supportIE99)** for a
piece of IE99-specific code.

### The macros way

With the help of macros, we will be allowed to code something like:

```text
-js bin/Test.js
-main Test
-cp src
--macro CompilationOption.set('supportIE', 8)
```

```haxe
class Test 
{
    public static function main() 
    {
        if (CompilationOption.exists("supportIE") && 
            CompilationOption.get("supportIE") <= 7) {
            trace("some code for IE7");
        }
    }
}
```

The JavaScript output of the main function:

```javascript
Test.main = function() {
    console.log("some code for IE7");
}
```

And here is my CompilationOption class:

```haxe
#if macro
import haxe.macro.Context;
import haxe.macro.Expr;
#end

/**
* CompilationOption allows us to use compile-time variables for advanced conditional compilation.
*/
class CompilationOption {
    #if macro
    /**
    * Internal storage of the options.
    */
    static var storage = new Hash();
    #end
    
    /**
    * Set `key` to `value`.
    * 
    * For simplicity `value` can only be constant Bool/Int/Float/String or null.
    * Array and structures are also possible, check:
    * http://haxe.org/manual/macros#constant-arguments
    * 
    * Set `force` to true in order to override an option. 
    * But be careful overriding will influenced by compilation order which may be hard to predict.
    */
    @:overload(function (key:String, value:Bool, ?force:Bool = false):Void{})
    @:overload(function (key:String, value:Int, ?force:Bool = false):Void{})
    @:overload(function (key:String, value:Float, ?force:Bool = false):Void{})
    @:overload(function (key:String, value:String, ?force:Bool = false):Void{})
    @:macro static public function set(key:String, value:Void, ?force:Bool = false) {
        if (!force && storage.exists(key))
            throw key + " has already been set to " + storage.get(key);
        
        storage.set(key, value);
        
        return macro {}; //an empty block, which means nothing
    }
    
    /**
    * Return the option as a constant.
    */
    @:macro static public function get(key:String):Expr {
        return Context.makeExpr(storage.get(key), Context.currentPos());
    }
    
    /**
    * Tell if `key` was set.
    */
    @:macro static public function exists(key:String):ExprOf {
        return Context.makeExpr(storage.exists(key), Context.currentPos());
    }
    
    /**
    * Removes an option. Returns true if there was such option.
    */
    @:macro static public function remove(key:String):ExprOf {
        return Context.makeExpr(storage.remove(key), Context.currentPos());
    }
    
    /**
    * Dump the options as an object with keys as fields.
    * eg. trace(CompilationOption.dump());
    */
    @:macro static public function dump():ExprOf {
        var obj = {};
        for (key in storage.keys()) {
            Reflect.setField(obj, key, storage.get(key));
        }
        return Context.makeExpr(obj, Context.currentPos());
    }
}
```

### Alternative

One alternative to the above is to have a macro that define all the
**supportIE7**...**supportIE11** when **supportIE7** is passed.  
The source code can now be:

```haxe
#if supportIE7
trace("some code for IE7");
#end
```

It is very similar to how the Haxe compiler handles Haxe version
currently (**haxe\_208**, **haxe\_209**, **haxe\_210** are defined when
using Haxe 2.10).

### Improvement

Generally it is better to integrate the macro into specific class when
needed, instead of using the **CompilationOption** class above. Because:

Firstly, the value type is unspecified. Although it is still typed after
one specified a value, but user may have to guess or look it up before
using it.

Secondly, the key(name) of an option is a String, and we don't like
"stringly typed code" because again people have to look up or remember.

The below API will be much better:

```text
-js bin/Test.js
-main Test
-cp src
--macro SupportIE.equalsOrAbove(7)
```

```haxe
class Test 
{
    public static function main() 
    {       
        if (SupportIE.minVersion() <= 7) {
            trace("some code for IE7");
        }
    }
}
```

  [Conditional Compilation]: http://haxe.org/ref/conditionals
