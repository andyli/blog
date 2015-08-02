Title: TypeScript vs Haxe
Tags: Haxe, JS
Status: draft

[TypeScript](https://github.com/Microsoft/TypeScript) is definitely one of the most well-known compile-to-JS languages nowadays. Positioned as a super-set of JavaScript, TypeScript brings in static-typing for writing large-scale application. [Haxe](http://haxe.org/) is similar to TypeScript in many aspects, particularly its JS-like syntax, static-typing, and module system. Among [the 9 Haxe compilation targets](http://haxe.org/documentation/introduction/compiler-targets.html), the JS target was one of the eldest ones. It was introduced [in March 2006](https://github.com/HaxeFoundation/haxe/blob/3.2.0/extra/CHANGES.txt#L1496-L1497), which was way before Microsoft released TypeScript [in 2012](https://en.wikipedia.org/wiki/TypeScript#History). In fact, Haxe is a language that compiles to JS, ahead of everyone else including TypeScript (2012), [CoffeeScript](http://coffeescript.org/) (2009), [Dart](https://www.dartlang.org/) (2011), and Java via [GWT](http://www.gwtproject.org/) (May 2006). So I wonder, which is the better compile-to-JS language, the (relatively) new shiny TypeScript, or the good-old mature Haxe?

I have been using Haxe for years and I'm now a member of the Haxe Foundation, contributing to Haxe daily. So I can be considered as a Haxe expert. But I didn't have much knowledge of TypeScript other than watched some presentations about it and read some docs on its website. To gain enough knowledge and experience of it to make the comparison as fair as possible, I took a MOOC course from edX, [Introduction to TypeScript](https://www.edx.org/course/introduction-typescript-microsoft-dev201x-0), and completed it. But nevertheless, I'm merely acknowledgeable. If there is any TypeScript experts reading this, feel free to point out my errors via commenting. Note that the differences mentioned below are the major ones - the comparison is not exhaustive.

## Fight!

### Syntax

TypeScript is designed as a super-set of JS. That means, any valid JS code is also valid TypeScript code. This makes porting code between TypeScript and JS very easily, since they share exactly the same basic syntax constructs.

Haxe syntax is also very JS-like. But it is more technically correct to say that it is ECMAScript-like, or similar to ActionScript 3, since Haxe was historically built as an alternative to ActionScript 3 for authoring Flash swf contents. Anyway, the basic syntax constructs are mostly equals to JS's. One exception is the missing of classic C-style for-loop, i.e. `for (int i = 0 ; i < 10; i++) {}`, which is replaced by [`Iterator`](http://haxe.org/manual/lf-iterators.html) based for-loop, i.e. `for (i in 0...10) {}`.

On top of the JS syntax, TypeScript adds the ability to annotate types to variable, in the form of `var str:string;`. Haxe shares the same syntax, except all the types are first-letter upper-cased, i.e. `var str:String;`.

TypeScript has two way to write an Array type. Haxe only has one.
```ts
// TypeScript
var list:string[] = ["a", "b", "c"];
var list:Array<string> = ["a", "b", "c"];
```
```haxe
// Haxe
var list:Array<String> = ["a", "b", "c"];
```

Although TypeScript and Haxe basic syntaxes look pretty much the same, but Haxe embodied a powerful functional programming concept that TypeScript/JS doesn't - the Haxe syntax is [expression-oriented](https://en.wikipedia.org/wiki/Expression-oriented_programming_language), which means [most of the constructs are expressions](this>2012/10/14/haxe-tips-everything-is-an-expression/) that can be evaluated to values. For things that we have to use a block (`{}`) in TypeScript/JS, we can use any expression in Haxe:
```haxe
// Haxe

// function definition is an expression that
// the function body can be any expression, not necessarily {}
function add(a:Float, b:Float) return a + b;

// loops, including for-loops, are expressions that
// the loop body can be any expression, not necessarily {}
for (i in 0...10)
	trace("i is " + i);

// if-else is also an expression that takes expressions
if (isCool)
	trace("yay!");
else
	trace("nay...");

// you should have noticed all the above are expressions that takes expressions
// that means we can treat everything like puzzle pieces
function checkEvenOdd(ints:Array<Int>)
	for (i in ints)
		trace(
			if (i % 2 == 0)
				i + " is even!"
			else
				i + " is odd!"
		);

// Blocks are useless now?
// Nop, a block is a powerful expression too!
// It is evaluated as the last expression inside it.
// Here is an example that use try-catch expression together with block expressions.
var result =
	try {
		var a = computationThatMayThrow();
		finalComputation(a);
	} catch (exception:Dynamic) {
		rollBack();
		defaultValue();
	}
```

<span class="center">
![Yo dawg! I heard u like expressions! So we let you put expressions inside expressions!](this>files/2015/nested-expression-meme.jpg)
</span>

TypeScript and Haxe have similar syntaxes for functions, but there are some minor differences. e.g. optional parameter, notice the placement of `?`:
```ts
// TypeScript
function greet(name?:string):string {
	if (name) {
		return "Hello, " + name;
	} else {
		return "Hello";
	}
}
```
```haxe
// Haxe
function greet(?name:String):String {
	if (name != null) { // no implicit conversion to Bool
		return "Hello, " + name;
	} else {
		return "Hello";
	}
}
```
Rest parameter:
```ts
// TypeScript
function buildName(firstName: string, ...restOfName: string[]):string {
	return firstName + " " + restOfName.join(" ");
}
```
```haxe
// Haxe does not allow writing function of variable-lengthed parameters.
// But it let us declare such functions when 
// writing extern using the special `haxe.extern.Rest` type.
extern class Namebuilder {
	public function build(first:String, rest:haxe.extern.Rest<String>):String;
}
```

TypeScript supports the [ES6 fat-arrow function](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions/Arrow_functions). Haxe does not has any equivalent short-handed syntax for functions, [despite of being popularly requested](https://medium.com/@ncannasse/haxe-and-short-lambdas-c1f360f7c7c). But turn out the Haxe function declaration syntax is already pretty compact due to its expression-oriented nature. Moreover, with the help of [macros](http://haxe.org/manual/macro.html), Haxe libraries (e.g. [tink_lang](https://github.com/haxetink/tink_lang#short-lambdas) and [Slambda](https://github.com/ciscoheat/slambda)) can implement syntaxes similar to, or even shorter than the TypeScript/ES6 one.
```ts
// TypeScript
var evens = [1, 2, 3].filter(n => n % 2 == 0);
```
```haxe
// Haxe

// built-in anonymous function declaration syntax
var evens = [1, 2, 3].filter(function(n) return n % 2 == 0);

// tink_lang
var evens = [1, 2, 3].filter(n => n % 2 == 0);

// Slambda
var evens = [1, 2, 3].filter.fn(_ % 2 == 0);
```

TypeScript and Haxe also differ in writing the types of function. The one in TypeScript is easy to understand, because it looks very similar to the arrow function notation:
```ts
// TypeScript
var add:(a:number, b:number)=>number;
```

The Haxe one is unfortunately kind of a "wrong" choice, since it suggests there is [auto currying or auto partial application](https://en.wikipedia.org/wiki/Currying), which is not supported by Haxe.
```haxe
// Haxe
var add:Float->Float->Float; // A function that takes 2 `Float`s and returns a `Float`.
                             // Unlike those functional languages that use such syntax,
                             // it is NOT the same as `Float->(Float->Float)`,
                             // nor equals to `(Float->Float)->Float` in Haxe.
```

The syntaxes for class/interface definition of TypeScript and Haxe are slightly different:
```ts
// TypeScript
interface IGreeter {
	greeting:string;
	greet():string;
}
class Greeter implements IGreeter {
	// fields are public by default
	private hello = "Hello, ";
	greeting:string;
	constructor(message:string) {
		this.greeting = message;
	}
	greet() {
		// use of `this.` is mandatory when accessing fields
		return this.hello + this.greeting;
	}
}
```
```haxe
// Haxe
interface IGreeter {
	// fields are public by default in interface def.
	var greeting:String;
	function greet():String;
}
class Greeter implements IGreeter {
	// fields are private by default in class def.
	public var greeting:String;
	var hello = "Hello, ";
	public function new(message:String) {
		greeting = message;
	}
	public function greet() {
		// use of `this.` is optional when accessing fields
		return this.hello + greeting;
	}
}
```

TypeScript also provides some syntactic sugar, named "parameter properties", for writing classes. The following two class definitions are semantically the same, but the former is written using "parameter properties".
```ts
// TypeScript

// class definition with "parameter properties"
class Person {
	constructor(public name:string, private secret:string) {
		
	}
}
// normal class definition
class Person {
	name:string;
	private secret:string;
	constructor(name:string, secret:string) {
		this.name = name;
		this.secret = secret;
	}
}
```

Haxe does not provides built-in short class syntax. But it can also be emulated quite easily with [build macros](http://haxe.org/manual/macro-type-building.html). The Haxe libraries, [dataclass](https://github.com/ciscoheat/dataclass) and [tink_lang](https://github.com/haxetink/tink_lang#direct-initialization), provide similar functionality with different syntaxes.

The ways TypeScript and Haxe define property get/setters are very different. The TypeScript one is straight forward. The Haxe one is pretty unique.
```ts
// TypeScript
class Person {
	private _name:string
	// if it is allowed to be read by the public, define the following
	get name() {
		return this._name;
	}
	// if it is allowed to be set by the public, define the following
	set name(v:string) {
		this._name = v;
	}
}
```
```haxe
// Haxe
class Person {
	// property with getter and setter
	// @:isVar auto generates the private `name`
	@:isVar public var name(get, set):String;
	public function get_name() {
		return name;
	}
	public function set_name(v:String):String {
		return name = v;
	}

	// read-only from other classes, but can be set by itself
	public var gender(default, null):String;

	// constant read-only property
	public var type(default, never):String = "Person";

	// set-only property
	public var birthday(null, set):Date;
	function set_birthday(v:Date):Date {
		return birthday = v;
	}

	// property that derived from something
	public var age(get, never):Float;
	function get_age():Float {
		return computeAge(birthday);
	}
}
```

Overall, on the surface, TypeScript and Haxe are quite similar, with minor differences where one is slightly more verbose than the other, or the opposite. Haxe has better expression syntax, but TypeScript has better function syntax. However, the underlying semantics of their syntactically similar codes can be quite different. Haxe is also extensible by the use of macros, which may transform the semantics of a given piece of code to implement new features. We will discuss more about the semantic differences of the two languages in the following section.

### Semantics

TypeScript and Haxe have different decisions on variable scoping. TypeScript, like JS, offers only function-level scope for `var` declarations. Haxe however provides block-level scope, which is also offered by most block-structured language, like C/C++, Java, and C#. The difference is illustrated as follows:
```ts
// TypeScript
{
	var a = 1;
}
console.log(a); // ok, because `a` exist outside of a block
```
```haxe
// Haxe
{
	var a = 1;
}
trace(a); // error: Unknown identifier : a
```

Generally, block scope is a better choice for a block-structured language. In fact, the creator of the JavaScript, [Brendan Eich](https://en.wikipedia.org/wiki/Brendan_Eich), admitted that the design decision was made [due to a lack of time](https://twitter.com/brendaneich/status/349768501583548416).

<span class="center">
![Implement block scope? Aint nobody got time for that!](this>files/2015/js-block-scope-meme.jpg)
</span>

Of course, the ES6 block scoped `let` declaration is also supported by TypeScript. But it is kind of a pity that TypeScript has to maintain the old scoping strategy of `var` and goes to support `let` instead of "fixing" `var` declaration directly like Haxe...

It is in a similar situation for the resolution of `this`. TypeScript [follows strictly the JS behavior](https://github.com/Microsoft/TypeScript/wiki/'this'-in-TypeScript). When `this` is inside a function/method, it is resolved dynamically. `this` may not always point to an instance of the enclosing "class", depended on how the function/method is called. Haxe "fixes" it to use the more natural lexical scoping, and making it always pointing to an instance of the enclosing "class". The difference is illustrated as follows:
```ts
// TypeScript
class Counter {
	private i = 0;
	buggy(array:Array<any>) {
		array.forEach(function() {
			this.i++; // `this` is not the Counter instance...
		});
		return this.i;
	}
	// one way to fix is to alias `this` to a local variable
	fixed1(array:Array<any>) {
		var that = this;
		array.forEach(function() {
			that.i++;
		});
		return this.i;
	}
	// another way is to use arrow function, which resolves
	// `this` in the natural way
	fixed2(array:Array<any>) {
		array.forEach(() => {
			this.i++;
		});
		return this.i;
	}
}

var ints = [1, 2, 3];
console.log(new Counter().buggy(ints));  // 0
console.log(new Counter().fixed1(ints)); // 3
console.log(new Counter().fixed2(ints)); // 3
```
```haxe
// Haxe
class Counter {
	var i = 0;
	public function new(){}
	public function correct(array:Array<Dynamic>) {
		Lambda.iter(array, function(e) this.i++);
		return this.i;
	}
}
class Test {
	static function main(){
		var ints = [1, 2, 3];
		trace(new Counter().correct(ints)); // 3
	}
}
```
We can see another reason why Haxe does not need ES6 arrow functions like TypeScript/JS - `this` inside a function is resolved naturally by default.

Both TypeScript and Haxe have enum types, but they are different things. A enum type in TypeScript is just a finite set of **values**. [Enum in Haxe](http://haxe.org/manual/types-enum-instance.html) is a powerful functional programming construct called [generalized algebraic data type (GADT)](https://en.wikipedia.org/wiki/Generalized_algebraic_data_type), which is more like a finite set of **types**. We may think of the TypeScript enum supports only a specific case of the Haxe enum. Both TypeScript and Haxe enums are meant to be used with switch, which is also semantically different as described next.

The TypeScript switch statement is the plain-old C-style switch, which is kind of like a fancy group of if-else statements. [The Haxe switch expression](http://haxe.org/manual/expression-switch.html) is in fact yet another functional programming construct called [pattern matching](https://en.wikipedia.org/wiki/Pattern_matching), which is often used with GADTs as well as other objects. Examples to illustrate the use enum and switch in TypeScript and Haxe:
```ts
// TypeScript
enum Color {
	Red,
	Green,
	Blue
};

// an Array<Color>
var colors = [Color.Red, Color.Green, Color.Blue];

switch (colors[0]) {
	// every case here is a *value*
	case Color.Red:
		console.log("Red");
		break;
	case Color.Red: // can never be reached, but is fine
		break;
	// missing `case Color.Green`, `case Color.Blue`, and `default`, but fine too
}
```
```haxe
// Haxe
enum Color {
	Red;
	Green;
	Blue;
	Rgb(r:Int, g:Int, b:Int); // an enum "constructor" may have arguments
}

class Test {
	static function main() {
		// an Array<Color>
		var colors = [Red, Rgb(0, 0, 0)];

		// switch in Haxe is also an expression
		// note that there is NO fall-through, i.e. no `break` is needed
		var redValue = switch (colors[0]) {
			// every case here is a *pattern*, not *value*
			// there will be compilation errors if there is missing or redundant cases
			case Red: 255;
			case Rgb(r, _, _): r;
			default: 0;
		}
		trace(redValue); // 255
	}
}
```
We can see that the Haxe switch is more powerful that it can match against and "extract" the arguments (or even fields or array items) of the given object. It also performs exhaustiveness and useless pattern check to ensure there is no missing or redundant cases.

### Typing system

TypeScript uses a structural duck-typing system, in which all types can be expressed as interfaces. Types are compatible to each other as long as they has the same fields. We can assign anonymous object to a variable typed as a class instance:
```ts
// TypeScript
class Point {
	x:number;
	y:number;
}
var pt:Point = { x:0, y:0 } // ok
```

The type system of Haxe is much more complex that it consists of [a number of different types](http://haxe.org/manual/types.html). Duck-typing is only allowed when assigning to variables of structure types:
```haxe
// Haxe

class Point {
	public var x:Float;
	public var y:Float;
	public function new():Void {}
}

typedef PointStruct = {
	x:Float,
	y:Float
}

class Test {
	static function main():Void {
		// A Point instance has the same structure as PointStruct.
		var p:PointStruct = new Point(); // ok

		// An anonymous object is typed as a structure.
		// It is not a Point instance even if they have the same structure.
		var p:Point = { x: 0, y: 0}; // error: { y : Int, x : Int } should be Point
	}
}
```


Both TypeScript and Haxe offer compile-time type inference, but the Haxe one is slightly more sophisticated in the sense that it is able to infer type from the first use of the variable instead of just the initial value. It is illustrated as follows:
```ts
// TypeScript
var str;     // var without init value nor type annotation is typed as `any`
str = "abc"; // we can assign string to it
str = 123;   // we can also assign number to it later, since `str` is `any`
```
```haxe
// Haxe
var str;     // var without init value nor type annotation is typed as `Unknown`
str = "abc"; // once we assign a String to it, `str` is typed as `String`
str = 123;   // error: Int should be String
```
Haxe heavily relies on static typing, so it encourages strict typing as much as possible. It does not simply type a variable as `Dynamic` (the Haxe equivalent of `any` in TypeScript) when there is no init value nor type annotation. Instead, it will type the variable as `Unknown` (a [monomorph](http://haxe.org/manual/types-monomorph.html)), and will try to figure out the type in later usage of the variable. To declare a `Dynamic` variable, users have to explicitly state it (`var thing:Dynamic;`). Similarly, Haxe by default does not allow `Array` of mixed types, which is allowed by TypeScript:
```ts
// TypeScript
var array = ["abc", 123]; // the type of array is (string | number)[]
```
```haxe
// Haxe
var array = ["abc", 123]; // error: Arrays of mixed types are 
                          // only allowed if the type is forced to Array<Dynamic>

var array:Array<Dynamic> = ["abc", 123]; // ok

// to get a union type like TypeScript's, use haxe.extern.EitherType
var array:Array<haxe.extern.EitherType<String, Int>> = ["abc", 123]; // ok
```

Static typing of TypeScript is made optional, such that all valid JS code is valid TypeScript code. TypeScript even allows compilation when there is a type error when using a properly typed variable:
```ts
var s:string = "abc";
s.nonexisting = 123; //error: Property 'nonexisting' does not exist on type 'string'.
```
which outputs JS as follows:
```js
var s = "abc";
s.nonexisting = 123;
```
The same code above in Haxe will cause an compilation error and no output is produced.

Unlike Haxe, TypeScript has a few unsound cases. http://www.typescriptlang.org/Handbook#type-inference

We can see that, Haxe is even more "typed" (has stricter typing) than TypeScript. On the one hand, TypeScript being forgiving on typing error may be handy when we know what we're doing. On the other hand, I'm not sure if it is good because it will somehow encourage people to ignore typing errors instead of properly type it. One historical example of being error-forgiving caused issues in the long term is Internet Explorer. IE was so forgiving that people didn't care about syntax errors nor web standards... Well, it is [good for end users](http://blog.codinghorror.com/javascript-and-html-forgiveness-by-default/), but surely bad for developers. Maybe it has become a Microsoft tradition - to encourage bad coding practice via forgiveness :(

### Code organization and generation

package/module and file structure

Mixins

### Compiler

performance

optimization

### IDEs and tools

### Community

## Conclusion