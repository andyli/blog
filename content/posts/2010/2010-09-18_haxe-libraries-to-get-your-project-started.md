Title: haXe libraries to get your project started
Date: 2010-09-18 05:49
Tags: Haxe
Slug: haxe-libraries-to-get-your-project-started

Sometimes I find it a bit difficult to find a haXe library quickly.
Before [lib.haxe.org][] is improved, I think it would be good to have a
list of haXe libraries organized in some way to let the new-comers to
find a suitable library.

So here below is my very own list. My criteria is open-source, free to
use (but of course you should check their web page for details) and
"good-to-know-before-starting-any-haXe-project". Surely it is more or
less biased and incomplete, feel free to comment.

### GUI

-   [NME][] (former nme + neash. Usage please refer to [C++ docs on
    haxe.org][])  
    Re-implementing the Flash API for use in C++/Neko target. Also
    usable on iOS/Android/Palm(WebOS).
-   [Jeash][] (former canvas-nme + neash)  
    Re-implementing the Flash API for use in JS target, rendering in
    HTML5 canvas.
-   [Arctic][]  
    GUI for Flash(7,8,9+) target.
-   [haxegui][]  
    GUI for the Flash(9+) target.
-   [openpyrohx][]  
    HaXe port of [OpenPyro][](Flash GUI framework).
-   [waxe][]  
    HaXe binding of [wxWidgets][]. Can be used in C++/Neko target.
-   [haXe-titanium-desktop][]  
    JS extern classes for use of [Appcelerator][]'s [Titanium
    Desktop][].

### Web development

#### Server side

-   [haXigniter][]  
    Inspired by PHP web framework [CodeIgniter][]. Targeting PHP/Neko.
-   [Poko][]  
    A web framework and data-centric CMS. Targeting PHP.
-   [Hails][]  
    A MVC web framework inspired by Ruby on Rails. Targeting PHP.
-   [Toolkat][]  
    Object-oriented web application toolkit. Targeting PHP/Neko.
-   [haxetacy][]  
    Lets you works on non-browser JS, like ASP, HTA and WSH. Also lots
    of useful features for client-side JS.
-   [bdog-node][] (former hxNode)  
    Using JS target to work on [node.js][].
-   [hxasc][]  
    Flash Media Server's ASC target making use of JS target.
-   [htemplate][]  
    A template engine with [hscript][](haXe-like scripting language)
    interpreter integrated. Note that it can be used in client-side too
    (multi-target)!
-   [templo][]  
    A template engine with a compiler written in NekoML. Targeting
    PHP/Neko.

#### Client side

-   [jQueryExtern][] ([blog post][])  
    JS extern files for [jQuery][]. There are also wrappers for some
    jQuery plug-ins.
-   [bdog-dojo][]  
    JS extern files for [Dojo Toolkit][].
-   [Tsunami][]  
    Tiny framework to create refresh-free web site.
-   [haXe-modernizr][]  
    JS extern classes for use of  [Modernizr][], which detects browser
    features in runtime.

### Art/Creative coding

-   [hxOpenFrameworks][]  
    HaXe/C++ binding of the C++ creative coding toolkit
    [OpenFrameworks][].
-   [udraw][]  
    Cross-platform drawing API for Flash/JS(Canvas)/C++/Neko target.
-   [hxColorToolkit][]  
    Toolkit for color conversion and color scheme generation. Based on
    AS3 library [colortoolkit][]. Multi-target.

### Game development

#### Generic

-   [gm2d][]  
    Library for cross platform 2D game making. Targeting
    Flash/C++/Neko.
-   [polygonal][] ([blog][])  
    Data structures, 2D physic simulation and many useful stuffs in a
    single lib.

#### Physics simulation

-   [Physaxe][]  
    2D physic engine. Multi-target.
-   [Nape][]  
    2D physic engine. Highly-optimised. Targeting Flash 9+.
-   [Box2Dhx][]  
    HaXe port of 2D physic engine [Box2DFlash][], which in turn is
    ported from [Box2D][]. Multi-target.
-   [JiglibHaxe][]  
    HaXe port of 3D physic engine [JiglibFlash][], which in turn is
    ported from [Jiglib][]. Multi-target.

#### 3D rendering

-   [Sandy3D][] ([git repo for haXe branch][])  
    Cross-platform 3D engine targeting Flash/JS(Canvas)/C++.
-   [Away3D][] ([svn repo of haXe branch][])  
    Away3D lite is ported to haXe and it is available from [SVN][svn
    repo of haXe branch]. Multi-target.

### Mobile App development

-   [NME][] (former nme + neash. Usage please refer to [C++ docs on
    haxe.org][])  
    Re-implementing the Flash API for use in C++/Neko target. Also
    usable on iOS/Android/Palm(WebOS).
-   [hxSL4A][]  
    JS extern classes of [SL4A][]. For targeting Android.

### Misc.

-   [HSL][]  
    Signal-based event library. Something like [as3-signals][] being
    re-designed in a haXe way. Multi-target.
-   [Stax][]  
    Adding lots of functional goodness into the haXe std lib.
    Multi-target.
-   [More][]  
    Again lots of useful stuff are added into the haxe std lib.
    Multi-target.
-   [CasaHx][] ([blog post][1])  
    HaXe port of [CASALib][]. A collection of utilities. Multi-target.

  [lib.haxe.org]: http://lib.haxe.org/
  [NME]: http://code.google.com/p/nekonme/
  [C++ docs on haxe.org]: http://haxe.org/doc/start/cpp
  [Jeash]: http://haxe.org/com/libs/jeash
  [Arctic]: http://code.google.com/p/arctic/
  [haxegui]: http://code.google.com/p/haxegui/
  [openpyrohx]: http://github.com/geekrelief/openpyrohx
  [OpenPyro]: http://www.openpyro.org/
  [waxe]: http://code.google.com/p/waxe/
  [wxWidgets]: http://www.wxwidgets.org/
  [haXe-titanium-desktop]: http://github.com/skial/haXe-titanium-desktop
  [Appcelerator]: http://www.appcelerator.com/
  [Titanium Desktop]: http://www.appcelerator.com/products/titanium-desktop-application-development/
  [haXigniter]: http://haxigniter.com/
  [CodeIgniter]: http://codeigniter.com/
  [Poko]: http://code.google.com/p/poko/
  [Hails]: http://code.google.com/p/hails/
  [Toolkat]: http://code.google.com/p/toolkat/
  [haxetacy]: http://code.google.com/p/haxetacy/
  [bdog-node]: http://github.com/blackdog66/bdog-node
  [node.js]: http://nodejs.org/
  [hxasc]: http://code.google.com/p/hxasc/
  [htemplate]: http://github.com/ciscoheat/htemplate
  [hscript]: http://code.google.com/p/hscript/
  [templo]: http://haxe.org/com/libs/templo
  [jQueryExtern]: http://github.com/andyli/jQueryExternForHaxe
  [blog post]: |filename|2010-08-03_using-jquery-in-haxe.md
  [jQuery]: http://jquery.com/
  [bdog-dojo]: http://github.com/blackdog66/bdog-dojo
  [Dojo Toolkit]: http://www.dojotoolkit.org/
  [Tsunami]: http://github.com/tong/tsunami
  [haXe-modernizr]: http://github.com/skial/haXe-modernizr
  [Modernizr]: http://www.modernizr.com/
  [hxOpenFrameworks]: http://github.com/andyli/hxOpenFrameworks/
  [OpenFrameworks]: http://www.openframeworks.cc/
  [udraw]: http://code.google.com/p/udraw/
  [hxColorToolkit]: http://github.com/andyli/hxColorToolkit
  [colortoolkit]: http://code.google.com/p/colortoolkit/
  [gm2d]: http://code.google.com/p/gm2d/
  [polygonal]: http://code.google.com/p/polygonal/
  [blog]: http://lab.polygonal.de/
  [Physaxe]: http://code.google.com/p/physaxe/
  [Nape]: http://code.google.com/p/nape/
  [Box2Dhx]: http://code.google.com/p/box2dhx/
  [Box2DFlash]: http://www.box2dflash.org/
  [Box2D]: http://www.box2d.org/
  [JiglibHaxe]: http://bitbucket.org/ceesam/jiglibhaxe
  [JiglibFlash]: http://www.jiglibflash.com/
  [Jiglib]: http://www.rowlhouse.co.uk/jiglib/
  [Sandy3D]: http://www.flashsandy.org/
  [git repo for haXe branch]: http://github.com/sandy3d/sandy-hx
  [Away3D]: http://away3d.com/
  [svn repo of haXe branch]: http://code.google.com/p/away3d/source/browse/#svn/trunk/haxe
  [hxSL4A]: http://github.com/tong/hxSL4A
  [SL4A]: http://code.google.com/p/android-scripting/
  [HSL]: http://code.google.com/p/hxhsl/
  [as3-signals]: http://github.com/robertpenner/as3-signals
  [Stax]: http://github.com/jdegoes/stax
  [More]: http://gitorious.com/more/more
  [CasaHx]: http://github.com/andyli/casahx
  [1]: |filename|2010-04-06_casahx-casa-lib-for-haxe.md
  [CASALib]: http://casalib.org/
