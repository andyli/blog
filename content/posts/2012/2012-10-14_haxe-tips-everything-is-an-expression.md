Title: Haxe tips: everything is an expression
Date: 2012-10-14 05:02
Tags: Haxe, trick
Slug: haxe-tips-everything-is-an-expression

In Haxe, nearly everything is an expression. (Things that aren't: import
statement, class declaration etc, which are at module level). And every
expression can be evaluated to a value.

A block is an expression that is evaluated to the last expression inside
the block:

```haxe
var v = {
    //some code
    123;
}
trace(v);//123
```

It can be used for list comprehension:

```haxe
var oneToTen = {
    var a = [];
    for (i in 0...10) a.push(i+1);
    a;
}   
trace(oneToTen); //[1,2,3,4,5,6,7,8,9,10]
```

In reverse, we can notice many things actually use any expression
instead of only a block.

Function declaration:

```haxe
function hello() return "world";
```

For loop:

```haxe
for (i in 0...5) trace(i); //0 1 2 3 4
```

And of course if-else:

```haxe
if (a > 100)
    trace("a is more than 100");
else if (a > 50)
    trace("a is between 50 and 100");
else
    trace("a less than 50");
```

If-else itself is an expression too. So we can simplify the above to:

```haxe
trace(if (a > 100) "a is more than 100" else if (a > 50) "a is between 50 and 100" else "a less than 50");
```

Of course we can use the equivalent ternary operator, but in my opinion
it is a bit less readable:

```haxe
trace(a > 100 ? "a is more than 100" : a > 50 ? "a is between 50 and 100" : "a less than 50");
```

Switch is useful to be used as an expression when working with enum:

```haxe
enum Color {
    Gray(v:Int);
    Rgb(r:Int, g:Int, b:Int);
}

class Main {
    static function main():Void {
        var redColor = Rgb(255,0,0);
        var red = switch(redColor) {
            case Rgb(r,g,b): r;
            default: throw "not rgb color";
        };
        trace(red);//255
    }
}
```

And actually try-catch also returns a value:

```haxe
var noException = try {
    //some code
    true;
} catch (exception:Dynamic) {
    false;
}
```

Do you find any other good use of anything as an expression?
