Title: jQueryExtern 2.0.0-alpha.1
Date: 2013-05-14 11:54
Tags: Haxe, jQuery
Slug: jqueryextern-2-0-0-alpha-1

It took longer than expected, but [jQueryExtern for Haxe][]
2.0.0-alpha.1 was released to haxelib!

The cool parts:

-   Supports jQuery version 1.9.1/2.0.0! Note that 2.0.0 has the same
    API of 1.9.1, but removed support of IE 6,7,8.
-   jQueryExtern is now generated
    from the official jQuery documentation in XML format. It means it
    will be updated faster, more accurate in the future!
-   Fine grained configuration of the extern via... macros! e.g. Select
    specific jQuery support version, switching between the use of `$`
    or `jQuery` in generated code etc.
-   Macro based Plugin extern system! Writing jQuery plugin extern is
    much easier.

You can find out the details at the [Github wiki page][].

  [jQueryExtern for Haxe]: https://github.com/andyli/jQueryExternForHaxe
  [github wiki page]: https://github.com/andyli/jQueryExternForHaxe/wiki/Haxe-3
