Title: Method chaining and fluent interface in haXe
Date: 2010-12-19 21:18
Tags: Haxe
Slug: method-chaining-and-fluent-interface-in-haxe

[Method chaining][] is calling a method of an object that return the
same type of the object multiple times.

One example is [TweenLite][]'s TweenLiteVars (in AS3):

```actionscript3
var vars:TweenLiteVars = 
    new TweenLiteVars()
        .prop("x", 300)
        .autoAlpha(0)
        .onComplete(myFunction, [mc]);
```

One more popular example is [jQuery][] (in JS):

```javascript
$("p.neat").addClass("ohmy").show("slow");
```

A class that let us do method chaining is having a [fluent interface][].

Fluent interface isn't very good to be used in a strongly typed OOP
language without careful consideration. Why? For example, if we want to
extend TweenLiteVars to have one more property called "awesome", and use
it:

```actionscript3
var vars:MyTweenLiteVars = 
    new MyTweenLiteVars()
        .prop("x", 300) //prop() returns TweenLiteVars, not MyTweenLiteVars
        .awesome(true)  //compiler error, TweenLiteVars does not have awesome :(
        .autoAlpha(0)
        .onComplete(myFunction, [mc]);
```

Method chaining is broken, not so awesome.

There is no elegant way to do it properly in AS3 (tell me if there is).
It is a pretty big issue, as method chaining is used more often as you
may think... like the clone method which return a copy of the instance.
But in haXe, we can :)

All we have to do is to create a base class, for example:

```haxe
/**
 * Horse is... some kind of four-legged animal.
 */
class Horse>
{
    /*
     * Horse is a base abstract class, so private constructor here.
     */
    private function new() 
    {
        
    }
    
    public function clone():This {
        return throw "needs to be overrided";
    }
    
}
```

And create a class that actually used by others:

```haxe
class NormalHorse extends Horse {
    public function new() {
        super();
    }
    
    override public function clone():NormalHorse {
        return new NormalHorse();
    }
}
```

People now can extend Horse and have clone() properly typed as the
subclass:

```haxe
/*
 * When a SpecialHorse is cloned, there is some chance it gives birth to a unicorn(!).
 */
class SpecialHorse extends Horse {
    public var hasHorn(default, null):Bool;
    
    public function new() {
        super();
        hasHorn = false;
    }
    
    override public function clone():SpecialHorse {
        var newHorse = new SpecialHorse();
        newHorse.hasHorn = Math.random() > 0.8;
        return newHorse;
    }
}
```

Here is an example of using the above horse classes:

```haxe
class Main { 
    static function main() {
        var normalHorse = new NormalHorse();
        trace("A clone of NormalHorse is..." + Type.getClassName(Type.getClass(normalHorse.clone())));
        
        
        trace("What about a SpecialHorse? Let see...");
        
        var specialHorse = new SpecialHorse();
        while (true) {
            if (specialHorse.hasHorn) {
                trace("This SpecialHorse has a horn! It's a unicorn!");
                break;
            } else {
                trace("This SpecialHorse looks like a normal one. Let's clone it...");
                specialHorse = specialHorse.clone();
            }
        }
    } 
}
```

Sample output of above:

    Main.hx:4: A clone of NormalHorse is...NormalHorse
    Main.hx:7: What about a SpecialHorse? Let see...
    Main.hx:15: This SpecialHorse looks like a normal one. Let's clone it...
    Main.hx:15: This SpecialHorse looks like a normal one. Let's clone it...
    Main.hx:12: This SpecialHorse has a horn! It's a unicorn!

But of course, if you want to extend SpecialHorse, it suffers the same
problem, unless you turn SpecialHorse into a base abstract class too.

```haxe
class SpecialHorse> extends Horse{
    public var hasHorn(default, null):Bool;
    
    private function new() {
        super();
        hasHorn = false;
    }
    
    override public function clone():This {
        return throw "needs to be overrided";
    }
}
```

One last thing to watch out, try always put the classes and interfaces
into separated files. It is because the haXe compiler may not be able to
handle too complex typing on class/interface declaration in a single
file. See [Issue 259][].

Happy chaining :)

  [Method chaining]: http://en.wikipedia.org/wiki/Method_chaining
  [TweenLite]: http://www.greensock.com/tweenlite/
  [jQuery]: http://jquery.com/
  [fluent interface]: http://en.wikipedia.org/wiki/Fluent_interface
  [Issue 259]: http://code.google.com/p/haxe/issues/detail?id=259
