Title: Head-tracking motion-parallax 3D in haXe/Flash
Date: 2012-03-04 22:19
Tags: 3D, experiment, Flash, Haxe
Slug: head-tracking-motion-parallax-3d-in-haxe-flash

<iframe class="video" width="640" height="390" src="//www.youtube.com/embed/U6PePKJHOSw" frameborder="0" allowfullscreen></iframe>

Here above is my haXe implementation of head-tracking 3D, creating
motion-parallax effect using Away3D 4. You can play with the [live
demo][] or [grab the source][].

This type of head tracking VR has been around for quite a long time. The
first popular one should be [Johnny Lee's Wiimote hack][], back in 2007,
 built in C# running as a desktop app. Two years later it appeared in
the browser, [a Flash version made by Mr. doob][]. But it was merely a
hack and far from accurate comparing to Johnny Lee's. Boffswana also
created [one][] in the same year (2009), and then [an improved one][]
with better head tracking algorithm. Sadly Boffswana hasn't release the
source.

Head tracking and camera movement is relatively simple, since there are
so many libs for these. The tricky part is the perspective
projection matrix. The projection point (the head), unlike most of the
implementation assumption, isn't always perpendicular to the projection
surface (screen).

Simplest implementation would ignore the problem. It places a camera at
the position of viewer's head and render it to the screen, like what Mr.
doob did. The problem is illustrated below.

When viewer's head is perpendicular to the screen, everything is
perfectly aligned:

![when head is perpendicular to screen](/files/2012/animated.79104.gif)

However, when the viewer moves, for example to the left, there is
misalignment of the rendering on screen and the "actual" position of the
virtual object:

![when viewer moved to left](/files/2012/animated.61275.gif)

Knowing little about C#, it is hard for me to dig out Johnny Lee's
matrix code. I found the suitable code form the paper "Generalized
Perspective Projection" from [Robert Kooima][]. It is written in C++,
but translating it to haXe isn't hard, just remember matrix in OpenGL is
[column-major order][] but Flash's is [row-major order][].

Head-detection is done using [my fork][] of [hxmarilena][]. My fork is
simply some API changes and switching the XML parsing from
[flash.xml.XML][] to [Xml][] so it may be used in C++ target in the
future. In order to reduce jittering, I've included a simple optical
flow tracking on the head. It is a block-matching process applied to
four points on previous head detection result. The optical flow tracking
result is merged to head-detection result by a ratio. It improved a bit,
but I guess to address the problem it is better to port some better
algorithms, like [FaceTracker][], in the future.

Finally, remember you can play with the [live demo][] and [it is open
source][grab the source].

  [live demo]: http://andyli.github.com/MotionParallaxDemo/
  [grab the source]: https://github.com/andyli/MotionParallaxDemo
  [Johnny Lee's Wiimote hack]: http://www.youtube.com/watch?v=Jd3-eiid-Uw
  [a Flash version made by Mr. doob]: http://ricardocabello.com/blog/post/643
  [one]: http://www.boffswana.com/news/?p=498
  [an improved one]: http://www.boffswana.com/news/?p=950
  [Robert Kooima]: http://csc.lsu.edu/~kooima/misc.html
  [column-major order]: http://en.wikipedia.org/wiki/Row-major_order#Column-major_order
  [row-major order]: http://en.wikipedia.org/wiki/Row-major_order#Row-major_order
  [my fork]: http://code.google.com/r/andy-hxmarilena/
  [hxmarilena]: http://code.google.com/p/hxmarilena/
  [flash.xml.XML]: http://haxe.org/api/flash9/xml/xml
  [Xml]: http://haxe.org/api/xml
  [FaceTracker]: http://web.mac.com/jsaragih/FaceTracker/FaceTracker.html
