Title: Using jQuery in haXe
Date: 2010-08-03 23:41
Tags: Haxe, JavaScript, jQuery
Slug: using-jquery-in-haxe

It is a kind of pain to code in JS without a proper library like
[jQuery][]. Using plain haXe in JS target is just as pain since haXe
does not abstract most of the browser quirks, what it gives is
only stricter typing and a little bit better core API (nothing DOM
related...). When there is no solid haXe/JS targeted haxe library come
out yet, we have to find some ways to use external JS libraries.

There is a [jQuery wrapper][] appeared on haxelib last year, but I don't
really like its API, which is too different from the original one, and
I've never used to having method names first letter capitalized... OK,
it's just personal taste :P Anyway I've written a [jQuery extern][] to
replace it, which provides API closer to jQuery and smaller compiled JS
file (smaller because the haXe compiler does not generate codes for
extern class).

Here I will illustrate a bit on how to use it, requiring you to have
some experience on both haXe and jQuery.

### Installing the jQuery extern

Since its put on haxelib, you can install it using the command:

    haxelib install jQueryExtern

and then add "-lib jQueryExtern" in the hxml.

OR, you can download the cutting edge version from github:
<http://github.com/andyli/jQueryExternForHaxe>, extract and place
"JQuery.hx" (optionally with the "jQueryPlugins" folder) into your
project source directory.

### Using the jQuery classes

It should be better to illustrate with example. For a typical JS
starting point with jQuery, you write:

```JavaScript
$(function(){
    //do your magic
});
```

If you don't know, it's a short-hand that bind your magic codes to the
document ready event, same as you write:

```JavaScript
$(document).ready(function(){
    //do your magic
});
```

HaXe does not allow using "\$" as a class name or a function name, but
"\$" is just a short-hand to "jQuery". However, haXe requires all class
names start with capital letter, so it is "JQuery" not "jQuery". You
start your haXe/JS codes using the jQuery extern as following:

```haXe
import JQuery;

class Main {
    static public function main():Void {
        new JQuery(function():Void {
            //your magic codes
        });
    }
}
```

It seems to be a few lines more than JS, but you should already know,
the extra lines are the same for all other haXe targets, its how haXe
program starts. The main point is "new JQuery(...)" which is the same as
"\$(...)" in JS.

So, when you code in JS like:

```JavaScript
 $("#myMightyDiv").hide();
```

now you do the same in haXe:

```haXe
   new JQuery("#myMightyDiv").hide();
```

Simple.

### Static functions

One thing to aware, that is the static methods of jQuery are placed to
"JQueryS" in the extern. The reason is haXe does not allow using same
name for both static and instance methods. For example in the original
jQuery, there is "\$.data()" and "\$(...).data()", they are now in the
extern as "JQueryS.data()" and "new JQuery(...).data()".

### Extra methods in the jQuery extern

And there are some extra methods appears in the extern comparing to the
original jQuery. For example, there is "cssSet()", and it is just the
same as "css()" but limiting you to really setting a css property and it
is properly typed as returning a JQuery object, so you can happily
chaining the methods with code completion and type checking. All the
extra methods are like that and they are all set as "inline", so that
the haXe compiler will generate correct codes, that is "css()" not
"cssSet()" in the compiled JS, because "cssSet()" is not really existing
in jQuery. And because they are not really existing, don't try to call
the extra methods with Reflect.

### Using plug-ins

I've included some jQuery plug-in externs. Currently there are [jQuery
Tools][], [jQuery media plug-in][] and [jQuery UI][] (work-in-progress).

The plug-in architecture is a bit hard to deal with... To understand how
it works, first of all you have to know there is a mighty "[using][]"
keyword in haXe, which inject methods into object instance. And the
jQuery plug-in in my haXe extern is utilizing both "using" and "inline".

Anyway, here is how you use the plug-ins. For example, when using
[jQuery Tools][] in JS, you just include its JS file in HTML and you can
call the plug-in's method on the jQuery object, that is:

```JavaScript
$(".my_overlay_trigger").overlay({...}); //overlay is from jQuery Tools
```

In haXe, with my extern, you have to write:

```haXe
import JQuery;
//there are several classes in Overlay.hx, we "using" only the "Overlay" class.
using jQueryPlugins.jQueryTools.Overlay.Overlay;
...
new JQuery(".my_overlay_trigger").overlay({...});
...
```

Because this implementation doesn't deal with optional parameter very
well, in most of the cases I made the optional parameters mandatory. If
the method has a optional config parameter, but you just want to use the
defaults, simply pass in "{}".

And there are many cases some functions does not fit that well, I've
wrap them into classes/methods with "inline". You may have to look at
the source file to fully understand how to use.

There will be more plug-ins to come when I need them. Feel free to
integrate other plug-ins and let me put them into the extern.

  [jQuery]: http://jquery.com/
  [jQuery wrapper]: http://lib.haxe.org/p/jquery
  [jQuery extern]: http://lib.haxe.org/p/jQueryExtern
  [jQuery Tools]: http://flowplayer.org/tools/
  [jQuery media plug-in]: http://jquery.malsup.com/media/
  [jQuery UI]: http://jqueryui.com/
  [using]: http://scwn.net/2009/05/23/injecting-methods-into-haxe-classes-with-using/
