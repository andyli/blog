Title: Haxe tips: better untyped expression
Date: 2012-07-08 04:20
Tags: Haxe, jQuery, trick
Slug: haxe-tips-better-untyped-expression

### tl;dr

Remember to put the brackets
```haxe
    (untyped new JQuery("#images").imageLoader)({});
//  ^                            ^
//  |________these_______________|
```

### Abstract

Static type system of Haxe helps you a lot by performing type-checking
in the compilation phase. You will be notified errors before the
application is run.

Since some Haxe targets (eg. JS and PHP) are dynamic in nature, many of
the `native` libraries/frameworks are also very dynamic. You have to use
the `untyped` keyword in Haxe very often to workaround the compiler
type-checking.

As a best-practice, to avoid unnecessary suppression of type-checking,
brackets should always be placed in order to constrain affecting slope
when using the `untyped` keyword in an expression.

### Example: using jQuery plug-in

For illustration, I will explain a frequently faced problem that is how
to use jQuery plug-in in Haxe (following will use [jQueryExtern][]). In
case there is a plug-in that will add a method "`.imageLoader(config)`"
to jQuery. But since there is no such method declared in the JQuery
extern class, if you simply compile `new JQuery("#images").imageLoader({});`, 
it will certainly fail with error "**jQuery.JQuery has no field imageLoader**".

You have two options:

1.  Create a plugin class and then "using" it.
2.  Use a quick and dirty `untyped` keyword.

For 1, you can refer to some [experimental plug-in externs from
jQueryExtern][]. Read my [blog post][] on how to use it with "using".
This method takes some more amount of coding and does not work well with
optional arguments.

For 2, adding a `untyped` keyword will shut the complier's mouth up:
`untyped new JQuery("#images").imageLoader({});`.

The above of course works, but you will lose many type-checking in the
expression where are unnecessarily suppressed. Eg. if you forgot to
define `config` in

```haXe
untyped new JQuery("#images").imageLoader(config);
```

...it will compile and fails at runtime with "**Uncaught ReferenceError:
config is not defined**".

Instead, constrain the `untyped` scope by placing a pair of brackets:

```haXe
(untyped new JQuery("#images").imageLoader)(config);
```

...it now (correctly) fails to be compiled with error "**Unknown
identifier : config**".

It is useful because sometimes you may code like this:

```haXe
(untyped new JQuery("#images").imageLoader)({
    images: images,
    async: 10,
    complete: function(e, ui) {
        progressbar.progressbar("value" , (++loaded).map(0, numOfFrames, 0, 100));
    },
    allcomplete: function(e, ui:Array) {
        new JQuery(function(){
            var playback = new JQuery("#playback").html("");
            for (item in ui) {
                new JQuery(item.img)
                .attr("id", "playback-" + Std.string(item.i))
                .appendTo(playback)
                .hide();
            }

            if (displayMode.enumEq(PlaybackMode))
                imageLoop(12);

            new JQuery("#toggle-play-btn").removeAttr("disabled");
            new JQuery("#toggle-slow-btn").removeAttr("disabled");

            new JQuery("#main").removeClass("loading");
        });
    }
});
```

If you do not place brackets around `untyped` (at line 1 as shown
above), you will unnecessarily lose type-checking for over 90% of codes
(begin with line 2 of above), which is pretty bad.

  [jQueryExtern]: https://github.com/andyli/jQueryExternForHaxe
  [experimental plug-in externs from jQueryExtern]: https://github.com/andyli/jQueryExternForHaxe/tree/master/jQuery/plugins
  [blog post]: http://blog.onthewings.net/2010/08/03/using-jquery-in-haxe/
