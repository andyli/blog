Title: Pixel Bender port of Scale2x and Scale3x
Date: 2009-09-28 03:35
Tags: Flash, Pixel Bender
Slug: pixel-bender-port-of-scale2x-and-scale3x

![scale2x][]

When I first saw the [Scale2x, scale3x AS3][] I am impressed. The
algorithm is from [scale2x sourceforge project][] and the as3 port is
coded as a class that is very easy to reuse. Surely the AS3 port author
nicoptere can make a PB port too as you may find out many PB cool stuff
over [his blog][], but my pixel bending desire force me to do it myself
:P

Here below the video shows my demo. I get a camera capture stream and
used [Posterizer which is downloaded from Pixel Bender Exchange][] to
convert the image to 4-color-only, and than use the scale2x filter to
enlarge the low resolution capture. The top-left corner thumbnail-like
image is actually the original 1:1 input(160\*120).

<iframe width="640" height="390" src="//www.youtube.com/embed/3PHPc2it4ww" frameborder="0" allowfullscreen></iframe>

It is quite interesting to see for scale2x, PB's version nearly doubles
the performance of AS3's. But for scale3x, there is not much different
between PB and AS3. I think it is because scale3x has too many if-else
which PB is not strong at.

BTW, I discovered a bug in PB while coding this. The bug make my code
much longer as I work-a-round it... I reported it to the [PB forum][].

[Demo app][]

[Demo app's Flex project with Pixel Bender source][] (The shorter but
buggy versions are included too.)

  [scale2x]: /files/2009/scale2x.png
    "scale2x"
  [Scale2x, scale3x AS3]: http://en.nicoptere.net/?p=6
  [scale2x sourceforge project]: http://scale2x.sourceforge.net/algorithm.html
  [his blog]: http://en.nicoptere.net/
  [Posterizer which is downloaded from Pixel Bender Exchange]: http://www.adobe.com/cfusion/exchange/index.cfm?event=extensionDetail&extid=1760025
  [PB forum]: http://forums.adobe.com/thread/497374
  [Demo app]: /files/2009/pbScaleX.html
  [Demo app's Flex project with Pixel Bender source]: /files/2009/pbScaleX.zip
