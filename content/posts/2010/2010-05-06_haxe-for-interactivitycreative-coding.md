Title: haXe for interactivity/creative coding
Date: 2010-05-06 00:08
Tags: Art &amp; Design, Haxe
Slug: haxe-for-interactivitycreative-coding

### haXe fits the gap in interactivity/creative coding

[![Processing, one of the most well-known language/framework for
creative coding.](/files/2010/processing-webpage.png)](http://processing.org/exhibition/)

For interactivity/creative coding, except the graphical
programming platforms like [Pure Data][], [Max][] and [Isadora][], there
are four major languages people are using:

1.  C++([OpenFrameworks][]),
2.  Java([Processing][]),
3.  ActionScript, and
4.  Python.

The first two are developed mainly for the high performance nature of
the languages, as real-time interaction and fancy visual effect is a
main focus in creative coding, but they are somewhat difficult to
designer/artist. ActionScript is mostly chosen for the friendliness of
its API, tools and easy to distribute on the Internet, but it's slow.
Python is somewhere in the middle of the C++/Java and ActionScript: For
once I heard that, if you want something faster than ActionScript but
easier than C++, try Python. However I think programs created in Python
are not easy to be distributed on the Internet, I mean, it cannot run in
the browser. Also, Python's syntax is less similar to the others
(although it is still very nice :)).

I believe haXe has a very good potential to fit the gap. As we can use
the friendly API of Flash to target C++ native code by using
[nme][]/[neash][]. When we want to put the work on the Internet, simply
compile it to swf or to HTML5 canvas with [canvas-nme][]. We get best of
both worlds.

### What haXe is still missing

After intensively using haXe for a few months, I discovered a few things
are missing in haXe. But they are all being improved in progress.

#### IDE

First of all, a real solid IDE. Yes, there are [several IDEs with haXe
plug-in][] you can choose: On Windows you have [FlashDevelop][], on Mac
you have TextMate(I haven't tried) and Linux there is Gedit.

FlashDevelop has build in support for haXe as well as
ActionScript:
[![FlashDevelop has build in support for haXe as well as
ActionScript.](/files/2010/haXe-FD.png)](http://www.flashdevelop.org/)

But if you want a cross-platform one, no, not yet. Cross-platform is
important for creative coding as designers/artistes really love Mac. The
amount of them using Mac is the same as those using Windows, if not more
than. I myself spends a lot of time in all Windows/Mac/Linux, and I am
sticking on Gedit on both Mac and Linux(Ubuntu) and avoiding to code in
Windows... Gedit is usable on Mac but missing a few features like open
terminal in the files panel or custom command with hotkey binding. And
the UI is a little bit buggy, for example the code completion list can
go off-screen...

There is [eclihx][], the haXe plug-in for eclipse. But it is really
really buggy that I cannot get it fully functioning on any OS. Code
completion is my minimal requirement for an IDE, but I cannot get that
from eclihx, although it says it has this feature...

The situation is improving. [FDT][], which many people prefer it to
Flash Builder, will have haXe support in its version 4. Since it is
based on eclipse, it will be available on the three main OSes. And it is
more feature-complete than all the IDEs I've tried at the moment.
Although it is not open source, but [open source developers can get a
free license from them][] (hope the program will continue for version
4).

Moreover, [discussed on the haXe mailing list][], people are
investigating the possibility of building a web based IDE, like [Bespin
from Mozilla][]. There is a [Google group created over there][] but no
actual development has started yet. Join it if you're interested.

#### Libraries

Number of libraries that designed exclusively for haXe is still small.
There are quite a few pretty good ones though, like the data structure
lib and 2D physic engine from [polygonal lab][] ([available from
haxelib][]). But for interactivity/creative coding, libraries for vector
graphics, image processing, hardware integration etc. are still missing.

I'm working on this area, trying to port some of the libraries from
different languages or at least to create a haXe binding. I first
[ported Casa Lib][], as [CasaHx][], which is a big collection of small
classes. I'm also [working on C++ target of Sandy3D][], but still
waiting for the next release of [hxcpp][] and the release of
[nme2][]. [hxSerial][] is my latest creation, based on ofSerial in
OpenFrameworks, enabling serial port communication from haXe/C++
program, so that you can talk to [Arduino](http://arduino.cc/), for example.

[![Arduino. Photo by Nicholas Zambetti](http://arduino.cc/en/uploads/Main/arduino316.jpg)](http://arduino.cc/)

Some ideas I will try later in the future (if I have time) will be:

-   Binding [OpenCV][] to haXe/C++.
-   Binding OpenFrameworks to again haXe/C++.
-   Creating a haXe OSC/TUIO lib.
-   Porting my [stk-in-as3][] to haXe.
-   Porting AS3 branch of [Degrafa][] to haXe.
-   Porting [FLARtoolkit][] to haXe ([saqoosha][], the author of
    FLARtoolkit may have done this before me, since he started to use
    haXe too).

Well, if you're interested, feel free to work on those ideas and let me
know your result/progress :)

#### Community

The last one is a community of interactivity/creative coding in haXe. It
is always a good thing if there are more people you can share your
creations with and ask question from. Hope the community will grow after
the above is improved :)

  [Pure Data]: http://puredata.info/
  [Max]: http://cycling74.com/products/maxmspjitter/
  [Isadora]: http://www.troikatronix.com/isadora.html
  [OpenFrameworks]: http://www.openframeworks.cc/
  [Processing]: http://processing.org/
  [nme]: http://code.google.com/p/nekonme/
  [neash]: http://code.google.com/p/neash/
  [canvas-nme]: http://bitbucket.org/grumpytoad/canvas-nme
  [several IDEs with haXe plug-in]: http://haxe.org/com/ide
  [FlashDevelop]: http://www.flashdevelop.org/
  [eclihx]: http://code.google.com/p/eclihx/
  [FDT]: http://fdt.powerflasher.com/
  [open source developers can get a free license from them]: http://www.fdt.powerflasher.com/developer-tools/fdt-3/meta-content/os-request/
  [discussed on the haXe mailing list]: http://lists.motion-twin.com/pipermail/haxe/2010-March/034541.html
  [Bespin from Mozilla]: https://bespin.mozillalabs.com/
  [Google group created over there]: http://groups.google.at/group/hide_haxe
  [polygonal lab]: http://lab.polygonal.de/
  [available from haxelib]: http://lib.haxe.org/p/polygonal
  [ported Casa Lib]: |filename|2010-04-06_casahx-casa-lib-for-haxe.md
  [CasaHx]: http://github.com/andyli/casahx
  [working on C++ target of Sandy3D]: |filename|2010-03-18_sandy3d-c-haxe.md
  [hxcpp]: http://code.google.com/p/hxcpp/
  [nme2]: http://code.google.com/p/nekonme/source/browse/#svn/trunk/version2
  [hxSerial]: http://github.com/andyli/hxSerial
  [OpenCV]: http://opencv.willowgarage.com/
  [stk-in-as3]: http://code.google.com/p/stk-in-as3/
  [Degrafa]: http://www.degrafa.org/
  [FLARtoolkit]: http://www.libspark.org/wiki/saqoosha/FLARToolKit/en
  [saqoosha]: http://saqoosha.net/
