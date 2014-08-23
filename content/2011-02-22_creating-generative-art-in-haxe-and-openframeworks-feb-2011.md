Title: Creating generative art in haXe and OpenFrameworks (Feb 2011)
Date: 2011-02-22 13:47
Tags: Art &amp; Design, experiment, Haxe, OpenFrameworks
Slug: creating-generative-art-in-haxe-and-openframeworks-feb-2011

I continue the journey of creating a piece of generative art everyday.
And I am still using hxOpenFrameworks. BTW, since I don't have a Mac
running at this moment, I can't have a Mac build. And actually I'm still
messing with the Linux build... So hxOpenFrameworks is currently Windows
only. I will release it to haxelib once it is cross-platform.

Anyway, here below are the selected pieces from [my set of creations][].

After [last time][] I discovered the beauty of physics, I went with some
typical simulations...shooting bullets.  
It is not in real-time, but a frame-by-frame rendering. It would be
nice if there is a haXe binding to PhysX or something.  
<iframe width="640" height="390" src="//www.youtube.com/embed/Qui_8Sh2fIg" frameborder="0" allowfullscreen></iframe>

Following is simply putting some circles from inside of a grid of sands.
Look pretty like corruption.  
<iframe width="640" height="390" src="//www.youtube.com/embed/s4v4cJ2D8MM" frameborder="0" allowfullscreen></iframe>

And then there is a series of connecting points on a circle. It
generates soooo many patterns with a single algorithm, I have to align
the variations in a grid. Don't draw them on a paper, it may summon a
fire ball or something, don't say I haven't warned you ;)  
[!["20110128_010311 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5095/5392876583_2fddd31f31_z.jpg)](http://www.flickr.com/photos/andy-li/5392876583/)  
[!["20110129_003509 by on_the_wings, on Flickr"](http://farm5.static.flickr.com/4143/5395438075_2ef5151ed9_z.jpg)](http://www.flickr.com/photos/andy-li/5395438075/)

Since I was leaking idea, so better do some old school recursive
stuffs... Turn out applying color on them can give you nice harmonic
color scheme, and the proportion is perfect!  
[!["20110201_000052 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5058/5404347295_cb043c94c2_z.jpg)](http://www.flickr.com/photos/andy-li/5404347295/)

I like the following one very much. It first generates an array of
points according to some regular polygon math, then sorts them according
to the angle from origin and finally links them up.  
[!["20110207_022130 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5094/5422430502_62d0a7c25a_z.jpg)](http://www.flickr.com/photos/andy-li/5422430502/)

Same as above, but reversed part of the math so the lines point
outward.  
[!["20110208_002628 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5293/5424929079_df75c29499_z.jpg)](http://www.flickr.com/photos/andy-li/5424929079/)

Still playing with the above idea, but applied lots of tweaks to bring
the interesting parts out.  
[!["20110210_064234 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5293/5432228732_31bd15b9f2_z.jpg)](http://www.flickr.com/photos/andy-li/5432228732/)

In the latest weeks, I have been trying to create more concrete
graphics. It takes more time then messing around with math equations,
but I have more artistic control. First one plays with circuit board
like structures.  
[!["20110216_103158 by on_the_wings, on Flickr"](http://farm5.static.flickr.com/4143/5449289011_68e4a48630_z.jpg)](http://www.flickr.com/photos/andy-li/5449289011/)

Applying Tron-style color.  
[!["20110217_080342 by on_the_wings, on Flickr"](http://farm5.static.flickr.com/4079/5451692325_6085017ace_z.jpg)](http://www.flickr.com/photos/andy-li/5451692325/)

Second concrete thing I created is a feather, as I really like birds. I
used the easing equations(which are usually used for tweening) by Robert
Penner to create the curves.  
[!["20110220_135143 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5138/5460742746_31c8679acd_z.jpg)](http://www.flickr.com/photos/andy-li/5460742746/)

Creating a pair of wings is easy when you have feathers.  
[!["20110221_213250 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5216/5464404367_5b8fee80fe_z.jpg)](http://www.flickr.com/photos/andy-li/5464404367/)

And finally, why not have 3 pairs when you simply can? Here comes a
seraph.  
[!["20110222_020632 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5016/5465128457_e12944b761_z.jpg)](http://www.flickr.com/photos/andy-li/5465128457/)

  [my set of creations]: http://www.flickr.com/photos/andy-li/sets/72157625719497466/
  [last time]: http://blog.onthewings.net/2011/01/15/creating-generative-art-in-haxe-and-openframeworks/