Title: TypeScript vs Haxe
Tags: Haxe, JS
Status: draft

[TypeScript](https://github.com/Microsoft/TypeScript) is definitely one of the most well-known compile-to-JS languages nowadays. Positioned as a super-set of JavaScript, TypeScript brings in static-typing for writing large-scale application. [Haxe](http://haxe.org/) is similar to TypeScript in many aspects, particularly its JS-like syntax, static-typing, and module system. Among [the 9 Haxe compilation targets](http://haxe.org/documentation/introduction/compiler-targets.html), the JS target was one of the eldest ones. It was introduced [in March 2006](https://github.com/HaxeFoundation/haxe/blob/3.2.0/extra/CHANGES.txt#L1496-L1497), which was way before Microsoft released TypeScript [in 2012](https://en.wikipedia.org/wiki/TypeScript#History). In fact, Haxe is a language that compiles to JS, ahead of everyone else including TypeScript (2012), [CoffeeScript](http://coffeescript.org/) (2009), [Dart](https://www.dartlang.org/) (2011), and Java via [GWT](http://www.gwtproject.org/) (May 2006). So I wonder, which is the better compile-to-JS language, the (relatively) new shiny TypeScript, or the good-old mature Haxe?

I have been using Haxe for years and I'm now a member of the Haxe Foundation, contributing to Haxe daily. So I can be considered as a Haxe expert. But I didn't have much knowledge of TypeScript other than watched some presentations about it and read some docs on its website. To gain enough knowledge and experience of it to make the comparison as fair as possible, I took a MOOC course from edX, [Introduction to TypeScript](https://www.edx.org/course/introduction-typescript-microsoft-dev201x-0), and completed it. But nevertheless, I'm merely acknowledgeable. If there is any TypeScript experts reading this, feel free to point out my errors via commenting.

## Fight!

### Syntax

TypeScript is designed as a super-set of JS. That means, any valid JS code is also valid TypeScript code. This makes the basic syntax constructs between TypeScript and JS very similar. Haxe syntax is also very JS-like. But it is more technically ECMAScript-like, or similar to ActionScript 3, since Haxe was historically built as an alternative to ActionScript 3 for authoring Flash swf contents.

On top of the JS syntax, TypeScript adds the ability to annotate types to variable, in the form of `var str:string;`. Haxe shares the same syntax, except all the types are first-letter upper-cased, i.e. `var str:String;`. 

block scope

### Typing system

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

In this sense, Haxe is even more "typed" (has stricter typing) than TypeScript. On one hand, TypeScript being forgiving on typing error may be handy when we know what we're doing. On the other hand, I'm not sure if it is good because it will somehow encourage people to ignore typing errors instead of properly type it. One historical example of being error-forgiving caused issues in the long term is Internet Explorer. IE was so forgiving that people didn't care about syntax errors nor web standards... Well, it is [good for end users](http://blog.codinghorror.com/javascript-and-html-forgiveness-by-default/), but surely bad for developers. Maybe it has become a Microsoft tradition - to encourage bad coding practice via forgiveness :(

### Code organization and generation

### Functional programming

### Compiler

performance

optimization

### IDEs and tools

### Community

## Conclusion