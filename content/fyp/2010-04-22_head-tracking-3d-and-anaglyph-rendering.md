Title: Head-tracking 3D and Anaglyph rendering
Date: 2010-04-22 05:27
Category: FYP
Slug: head-tracking-3d-and-anaglyph-rendering

The reconstructed 3D mesh is now mapped correctly with the real world.

The perspective distortion which need to be done before placing the
rendered content to the mirror, is implemented several times... I tried
using existing distortion classes on the web but they are made for
distorting a plane into 3D perspective but not for my case that I need
to undistort the 3D plane to a flat rectangle, the classes produce wrong
result. I also tried using texture mapping in Sandy3D, but again it is
slow and buggy when I need to move the camera a lot (for anaglyph).

In the end I implement my own unwrapping code. The main different is my
code is designed to work on rectangle while the previous mentioned ones
are based on triangles. The first version of my unwrapping code is
written in pure haXe but it is very slow(framerate drops to \~0.5fps).
And then I port the code to PixelBender, which use multi-threading, it
is much smoother(several times better, but I've not checked).

Anaglyph(red-cyan glasses) is also done now. Since it need rendering for
two times per frame, and then combine the two rendering, performance is
again an issue. I tried to coded for the procedure: render for one eye
-\> unwrap and store it -\> render for another eye -\> unwrap and store
it -\> color transform and combine the two. But the framerate is dropped
to \~1fps. So I put all the unwrap/color transform and combine to a
single PixelBender kernel. So previously the kernel unwrap a single
image for a time, now is takes two image and do unwrapping for both of
them and color transform and add the results together. It reduced the
data transmission between Flash and PixelBender and it also utilized
multi-core for the "color transform and combine" process. It is now able
to run in \~4-5fps. Although it is still slow but I have to move on to
the next step.

Below is a video of the current result:

<p>
<object type="application/x-shockwave-flash" width="640" height="480" data="http://www.flickr.com/apps/video/stewart.swf?v=71377" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
<param name="flashvars" value="intl_lang=en-us&amp;photo_secret=7c90665016&amp;photo_id=4540497119"></param><param name="movie" value="http://www.flickr.com/apps/video/stewart.swf?v=71377"></param><param name="bgcolor" value="#000000"></param><param name="allowFullScreen" value="true"></param>

<embed type="application/x-shockwave-flash" src="http://www.flickr.com/apps/video/stewart.swf?v=71377" bgcolor="#000000" allowfullscreen="true" flashvars="intl_lang=en-us&amp;photo_secret=7c90665016&amp;photo_id=4540497119" height="480" width="640">
</embed>
</object>
</p>
BTW, I go back to target Flash again since currently the C++ target do
not support drawing Spite on BitmapData. This feature will be available
in the next release of [nme][]. So the performance problem can again be
solved later if I switch it to C++ again.

  [nme]: http://code.google.com/p/nekonme
