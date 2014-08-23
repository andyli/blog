Title: Bicubic resampling by Pixel Bender
Date: 2009-08-25 07:51
Tags: Flash, Flex, Pixel Bender
Slug: bicubic-resampling-by-pixel-bender

There is [bilinear resampling by Pixel Bender][] already, why not
bicubic too?

With the very helpful [Java implementation][], I can get bicubic
resampling running in Pixel Bender in hours.

Here is my result, along with the resampling results in PhotoShop as a
comparison:

Source image (4x4), scaled by your browser):
<img class="size-full wp-image-506 " title="16color image" src="http://blog.onthewings.net/wp-content/uploads/2009/08/16color.png" alt="Source image (4x4), scaled by your browser)" width="200" height="200" scale="0">

Source image enlarged in PS (nearest neighbor):
<img class="size-full wp-image-507 " title="16color_psNearest" src="http://blog.onthewings.net/wp-content/uploads/2009/08/16color_psNearest.png" alt="Source image enlarged in PS (nearest neighbor)" width="200" height="200" scale="0">

Bicubic resampling by Pixel Bender:
<img class="size-full wp-image-508 " title="16color_pbBicubic" src="http://blog.onthewings.net/wp-content/uploads/2009/08/16color_pbBicubic.png" alt="Bicubic resampling by Pixel Bender" width="200" height="200" scale="0">

There is some difference with PhotoShop's versions (below), hope it's
not my mistake...

Bicubic resampling by PhotoShop:
<img class="size-full wp-image-509 " title="16color_psBicubic" src="http://blog.onthewings.net/wp-content/uploads/2009/08/16color_psBicubic.png" alt="Bicubic resampling by PhotoShop." width="200" height="200" scale="0">

Bicubic smoother by PhotoShop:
<img class="size-full wp-image-510 " title="16color_psBicubicSmoother" src="http://blog.onthewings.net/wp-content/uploads/2009/08/16color_psBicubicSmoother.png" alt="Bicubic smoother in PhotoShop" width="200" height="200" scale="0">

Bicubic sharper by PhotoShop:
<img class="size-full wp-image-511 " title="16color_psBicubicShaper" src="http://blog.onthewings.net/wp-content/uploads/2009/08/16color_psBicubicShaper.png" alt="Bicubic sharper in PhotoShop" width="200" height="200" scale="0">

My codes can be downloaded below:  
[Bicubic resampling sample program source (with PB source)][]

* * * * *

Update:  
Notified by author of the Java version, the Java code was wrong and has
been updated. Here below is my updated code:  
[Bicubic resampling sample program source (with PB source)][1]

updated output of PB:
![updated output of PB](http://blog.onthewings.net/wp-content/uploads/2009/08/pbBicubic.png)

* * * * *

Update (2010-11-17):  
Once again notified by Paul, the author of the Java version, there is
something need to be updated. Here below is my updated code:  
[Bicubic resampling sample program source (with PB source)][2]

updated output of PB:
![updated output of PB](http://blog.onthewings.net/wp-content/uploads/2009/08/pbBicubic1.png)

  [bilinear resampling by Pixel Bender]: http://www.brooksandrus.com/blog/2009/03/11/bilinear-resampling-with-flash-player-and-pixel-bender/
  [Java implementation]: http://www.paulinternet.nl/?page=bicubic
  [Bicubic resampling sample program source (with PB source)]: http://blog.onthewings.net/wp-content/uploads/2009/08/bicubicResampling.zip
  [1]: http://blog.onthewings.net/wp-content/uploads/2010/03/bicubicResampling.zip
  [2]: http://blog.onthewings.net/wp-content/uploads/2009/08/bicubicResampling1.zip