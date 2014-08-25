Title: Creating generative art in haXe and OpenFrameworks
Date: 2011-01-15 21:17
Tags: Art &amp; Design, experiment, Haxe, OpenFrameworks
Slug: creating-generative-art-in-haxe-and-openframeworks

It has been some time since the start of building [hxOpenFrameworks][],
the haXe binding to [OpenFrameworks][]. Actually it is already around
80% complete several weeks ago. I was facing some GC problem on the use
of ofSoundStream, but finally I've solved it with the help of [Hugh][].
As a by-product, I've made a [binding][] to [RtAudio][], a
cross-platform real-time sound input/output API. However, I think I will
wait till OF 007 and haXe 2.07 is released before really releasing
hxOpenFrameworks.

In order to test it, I've been using it for some little projects. I
decided to create (at least) one piece of generative art everyday...
right, everyday starting from the 1st day of 2011. Quite similar to what
[Keith Peters][] did some time ago ([art from code][]). The process is
pretty fun once I had got used to start my day by coding some art.

Accidentally I found [setCircleResolution][] a very interesting function
to play with. It controls how a circle is approximated by drawing
regular polygons. Below is circles with radius increasing and
resolution(number of sides of regular polygon) decreasing.  
[!["20110103_082211 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5288/5317588347_60bfc2a2b2_z.jpg)](http://www.flickr.com/photos/andy-li/5317588347/)

Sometimes the generating process is even more amazing than the final
image.  
<iframe width="640" height="390" src="//www.youtube.com/embed/EnfWcKPo8xc" frameborder="0" allowfullscreen></iframe>

sin/cos/tan are also interesting functions that often give you
unexpected results. Below is a combination of sin and tan.  
[!["20110109_094501 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5002/5337817974_e87266d476_z.jpg)](http://www.flickr.com/photos/andy-li/5337817974/)

Writing recursive/iterative code is the easiest way to produce complex
graphics with few lines of code. Spiral forms are particularly
attractive, as there is a point of focus.  
[!["20110106_202323 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5123/5329507945_b913c0c927_z.jpg)](http://www.flickr.com/photos/andy-li/5329507945/)

With some modifications, it looks like some kind of rose.  
[!["20110107_080604 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5283/5331141541_6c43b73f2d_z.jpg)](http://www.flickr.com/photos/andy-li/5331141541/)

Below is my favorite piece at the moment. I used [physaxe][] for physics
simulation. Thousands of particles(in fact, tiny circles) are shot from
outside of the canvas, producing trails of blue. When they collides,
some red will be drawn, which look like sparks. The generating process
is recorded, you can find it on [youtube][].  
[!["20110113_2000 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5170/5351310168_eda6b6235f_z.jpg)](http://www.flickr.com/photos/andy-li/5351310168/)

Finally, all the codes of the above pieces are open source, can be found
in the description of individual flickr/youtube page. I'll post some
more interesting ones next month.

PS. Nicolas Barradeau is producing [a series of basics in generative
art][] in his [blog][], which contains a lot of useful codes in AS3. Be
sure to check it out if you're interested in generating some art!

  [hxOpenFrameworks]: https://github.com/andyli/hxOpenFrameworks
  [OpenFrameworks]: http://www.openframeworks.cc/
  [Hugh]: http://gamehaxe.com/
  [binding]: https://github.com/andyli/hxRtAudio
  [RtAudio]: http://www.music.mcgill.ca/~gary/rtaudio/
  [Keith Peters]: http://www.bit-101.com/
  [art from code]: http://www.artfromcode.com/
  [setCircleResolution]: http://www.openframeworks.cc/documentation?adv=yes&detail=ofGraphics#ofSetCircleResolution
  [physaxe]: http://code.google.com/p/physaxe/
  [youtube]: http://www.youtube.com/watch?v=Wxr8BUSAPR8
  [a series of basics in generative art]: http://en.nicoptere.net/?tag=generative-art
  [blog]: http://en.nicoptere.net/