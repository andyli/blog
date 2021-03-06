Title: Creating generative art in haXe and OpenFrameworks (April 2011)
Date: 2011-05-05 01:08
Tags: Art &amp; Design, experiment, Haxe, OpenFrameworks
Slug: creating-generative-art-in-haxe-and-openframeworks-april-2011

Here comes the forth month of doing a piece of generative art everyday.
Every time I ran out of ideas, forcing myself to code brought me some
unexpected results.

It's a starry night on a overcrowded planet. A simple but beautiful
piece. Nothing complex there, just some random circles/rectangles placed
together with a very thin layer of [perlin noise][] as cloud. Be sure to
click on it to view it in full size.  
[!["20110407_220310 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5107/5597503891_c655e38350_z.jpg)](http://www.flickr.com/photos/andy-li/5597503891/sizes/o/)

Discovered an interesting wave pattern while trying to implement
[midpoint displacement algorithm][].  
[!["20110409_202423 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5188/5602483525_5c4db7d757_z.jpg)](http://www.flickr.com/photos/andy-li/5602483525/)

Below is a typical mountain created by [midpoint displacement
algorithm][]. Notice the sky and the mountain shares the same
algorithm.  
[!["20110416_230603 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5186/5624729260_45cda05fa1_z.jpg)](http://www.flickr.com/photos/andy-li/5624729260/)

Let it displaces in color space instead of xy-plane.  
[!["20110419_213919 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5062/5634230185_eb9bc9d8ba_z.jpg)](http://www.flickr.com/photos/andy-li/5634230185/)

Same as above but with slightly different painting method.  
[!["20110420_222149 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5107/5637921034_764ee59fbb_z.jpg)](http://www.flickr.com/photos/andy-li/5637921034/)

Changing the input lines to circular form created a perspective. It's
like the grand canyon is undergoing sandstorm.  
[!["20110422_203705 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5102/5643315534_e830764a57_z.jpg)](http://www.flickr.com/photos/andy-li/5643315534/)

I've also tried making procedural cloud from old-school [perlin
noise][].  
[!["20110412_133431 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5304/5611909345_6b79a37776_z.jpg)](http://www.flickr.com/photos/andy-li/5611909345/)

Applying [perlin noise][] in some mixed strange color spaces(YUV, XYZ,
HSL) instead of regular RGB.  
[!["20110427_173428 by on_the_wings, on Flickr"](http://farm6.static.flickr.com/5267/5660318891_c0afb8abb1_z.jpg)](http://www.flickr.com/photos/andy-li/5660318891/)

  [perlin noise]: http://en.wikipedia.org/wiki/Perlin_noise
  [midpoint displacement algorithm]: http://en.wikipedia.org/wiki/Diamond-square_algorithm#Midpoint_displacement_algorithm