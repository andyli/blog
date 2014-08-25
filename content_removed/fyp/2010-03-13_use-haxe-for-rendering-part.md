Title: Use haxe for rendering part
Date: 2010-03-13 08:11
Category: FYP
Slug: use-haxe-for-rendering-part

I've successfully let OpenFrameworks and swf communicate using TCP
socket. So I can use Flash's 3D engines. I will not use ActionScript,
instead, I will use [haxe][].

I've been using haxe for some time, it is a language that originally
designed to compile swf file but has been developed to compile many more
format, for example C++(and than use it to compile native codes). So I
will write the rendering part in haxe, targeting swf and optionally
compile it to C++ native binaries if possible.

The 3D engine of choice is [Sandy3D][]. It has been completely ported to
haxe and feature complete in haxe's swf target. In the past week, I've
been working to modify it to let it run on haxe C++ target. With the
helps of [Hugh][] and Niel, project owner of [neash][] and developer of
Sandy3D, quite a few demos is complied to C++ and running.

For more info on this progress, see my [blog post][].

Next step will be try using [jiglibhaxe][] with Sandy3D on haxe C++
target. It is already usable on Flash target. So I can still use haxe
Flash target if anything failed.

  [haxe]: http://haxe.org/
  [Sandy3D]: http://www.flashsandy.org/
  [Hugh]: http://gamehaxe.com/
  [neash]: http://code.google.com/p/neash/
  [blog post]: |filename|2010-03-18_sandy3d-c-haxe.md
  [jiglibhaxe]: http://bitbucket.org/ceesam/jiglibhaxe/
