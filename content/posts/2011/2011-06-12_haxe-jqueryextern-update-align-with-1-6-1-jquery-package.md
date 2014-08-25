Title: haXe jQueryExtern update: align with 1.6.1, 'jQuery' package...
Date: 2011-06-12 00:00
Tags: Haxe, jQuery
Slug: haxe-jqueryextern-update-align-with-1-6-1-jquery-package

I've recently updated [jQueryExtern][] to align with [jQuery 1.6.1][].
To get it, use the usual `haxelib upgrade` (or `haxelib install
jQueryExtern` if you have not installed it previously).

I introduced some changes that would like to expain here:

### package `jQuery`

Finally jQueryExtern has its own package, `jQuery`. The previous
`jQueryPlugins` package is also moved to `jQuery.plugins`.

It is done because jQuery has more and more types, eg. [jqXHR][],
[Deferred][] and [Promise][] are introduced in jQuery 1.5. In the
previous versions of jQueryExtern, most of them are prefixed by `JQuery`
(`JQueryPromise`, `JQueryDeferred`, `JQueryEvent`) which is lengthy
and redundant, with `jQuery` package, it is now safe to remove the
prefix. In case of name collision, simply use the fully qualified names,
eg `jQuery.Event`.

To conclude, you should now `include jQuery.JQuery;` instead of `include
JQuery;`.

### `JQueryStatic` and `_static`

To solve the problem of haXe disallowing the use of same name for static
and non-static members, previously I grouped the static methods into
a separate class `JQueryS`. It is now renamed as `JQueryStatic`, which
is more meaningful.

I've also added a `_static` static property to `JQuery`. It is for the
people who don't read documentation, when they type `JQuery.`, there is
still a code completion `_static` for them to retrieve the
`JQueryStatic` class.

Whether to use `JQuery._static` or `JQueryStatic` is up to you.

### Backward compatibility and `JQUERY_NO_DEPRECATED`

Don't worry on having to change all your production codes to match the
changes mentioned above. I've included a top-level "JQuery.hx" for
maintaining backward compatibility. A number of typedef are placed there
to solve the old naming.

However, the old naming are deprecated and the top-level
"JQuery.hx" will be removed a few versions later. You should try to
update your code and test with `-D JQUERY_NO_DEPRECATED`.

The typedef trick have not been made for the plug-ins, so if you're
using any of the plug-ins, you have to make the changes when updating to
jQueryExtern 1.6.1.

  [jQueryExtern]: http://lib.haxe.org/p/jQueryExtern
  [jQuery 1.6.1]: http://api.jquery.com/category/version/1.6/
  [jqXHR]: http://api.jquery.com/Types/#jqXHR
  [Deferred]: http://api.jquery.com/category/deferred-object/
  [Promise]: http://api.jquery.com/Types/#Promise
