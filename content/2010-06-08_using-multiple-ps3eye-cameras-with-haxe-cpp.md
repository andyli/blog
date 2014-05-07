Title: Using multiple PS3Eye cameras with haXe/C++
Date: 2010-06-08 14:57
Tags: Haxe
Slug: using-multiple-ps3eye-cameras-with-haxe-cpp

[Sony PS3Eye][] is probably the best web cam for CV stuff:
not expensive, cross platform, high frame rate(up to 120fps), no image
compression etc. I've been using it in the past year and my experience
is great.

In my final year project, I have been exploring stereo camera, ie. using
multiple cameras at the same time. It is not too difficult, just place
the cameras side-by-side in the same plane, with [OpenCV][] you can
calibrate them and compute a disparity map to get the depth info of the
capture subject. What it means is you can do 3D tracking and probably
3D gesturing like [Project Natal][]. And yes, I use PS3Eyes.

<div style="width:700px;height: 320px;">

[caption id="" align="alignleft" width="315" caption="4 PS3Eyes combined
with their original parts (Front view)."][![][]][][/caption]

[caption id="" align="alignleft" width="315" caption="4 PS3Eyes combined
with their original parts (Rear view)."][![][1]][][/caption]

</div>

I was using Ubuntu and [OpenFrameworks][] for the project and everything
is fine. You do not need to install a driver for using PS3Eye, however,
to get extra controls, I used [a patched driver][]. But the driver is
less stable and sometimes it outputs corrupted frames.

I have a bit more time these few days, so I try move back to Windows and
port the code to use [haXe][]/C++ with [Code Laboratories][]'s CLEye
SDK. I created a simple binding to the SDK and the result is pretty
good. I have again put the code to github ([hxCLEye][]), and there is a
sample program([Main.hx][]), which use the not-yet-released [nme2][]. It
still needs to be optimized for the Bytes=\>BitmapData conversion, but
it is quite stable I think.

  [Sony PS3Eye]: http://peauproductions.com/ps3.html
  [OpenCV]: http://opencv.willowgarage.com/
  [Project Natal]: http://www.xbox.com/en-us/live/projectnatal/
  []: http://farm5.static.flickr.com/4061/4681572508_07db8a3c62.jpg
    "PS3Eyes"
  [![][]]: http://www.flickr.com/photos/andy-li/4681572508/
  [1]: http://farm5.static.flickr.com/4049/4681573632_d1cfdf5010.jpg
    "PS3Eyes"
  [![][1]]: http://www.flickr.com/photos/andy-li/4681573632/
  [OpenFrameworks]: http://www.openframeworks.cc/
  [a patched driver]: http://bear24rw.blogspot.com/2009/11/ps3-eye-driver-patch.html
  [haXe]: http://haxe.org/
  [Code Laboratories]: http://codelaboratories.com/
  [hxCLEye]: http://github.com/andyli/hxCLEye
  [Main.hx]: http://github.com/andyli/hxCLEye/blob/master/Main.hx
  [nme2]: http://code.google.com/p/nekonme/
