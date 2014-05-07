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

+--------------------------------------------------------------------------+
| [caption id="attachment\_506" align="alignleft" width="200"              |
| caption="Source image (size 4x4, scaled by your browser)"][![Source      |
| image (4x4), scaled by your browser)][]][][/caption]                     |
|                                                                          |
| [caption id="attachment\_507" align="alignleft" width="200"              |
| caption="Source image enlarged by PS (nearest neighbor)"][![Source image |
| enlarged in PS (nearest neighbor)][]][][/caption]                        |
|                                                                          |
| <p>                                                                      |
| [caption id="attachment\_508" align="alignleft" width="200"              |
| caption="Bicubic resampling by Pixel Bender"][![Bicubic resampling by    |
| Pixel Bender][]][][/caption]                                             |
+--------------------------------------------------------------------------+

There is some difference with PhotoShop's versions (below), hope it's
not my mistake...

+--------------------------------------------------------------------------+
| [caption id="attachment\_509" align="alignleft" width="200"              |
| caption="Bicubic resampling by PhotoShop."][![Bicubic resampling by      |
| PhotoShop.][]][][/caption]                                               |
|                                                                          |
| [caption id="attachment\_510" align="alignleft" width="200"              |
| caption="Bicubic smoother by PhotoShop"][![Bicubic smoother in           |
| PhotoShop][]][][/caption]                                                |
|                                                                          |
| <p>                                                                      |
| [caption id="attachment\_511" align="alignleft" width="200"              |
| caption="Bicubic sharper by PhotoShop"][![Bicubic sharper in             |
| PhotoShop][]][][/caption]                                                |
+--------------------------------------------------------------------------+

My codes can be downloaded below:  
[Bicubic resampling sample program source (with PB source)][]

* * * * *

Update:  
Notified by author of the Java version, the Java code was wrong and has
been updated. Here below is my updated code:  
[Bicubic resampling sample program source (with PB source)][1]

</p>
[caption id="attachment\_724" align="alignnone" width="200"
caption="updated output of PB"][![][]][][/caption]

* * * * *

Update (2010-11-17):  
Once again notified by Paul, the author of the Java version, there is
something need to be updated. Here below is my updated code:  
[Bicubic resampling sample program source (with PB source)][2]

</p>
[caption id="attachment\_724" align="alignleft" width="200"
caption="updated output of PB"][![][3]][][/caption]

  [bilinear resampling by Pixel Bender]: http://www.brooksandrus.com/blog/2009/03/11/bilinear-resampling-with-flash-player-and-pixel-bender/
  [Java implementation]: http://www.paulinternet.nl/?page=bicubic
  [Source image (4x4), scaled by your browser)]: http://blog.onthewings.net/wp-content/uploads/2009/08/16color.png
    "16color image"
  [![Source image (4x4), scaled by your browser)][]]: http://blog.onthewings.net/wp-content/uploads/2009/08/16color.png
  [Source image enlarged in PS (nearest neighbor)]: http://blog.onthewings.net/wp-content/uploads/2009/08/16color_psNearest.png
    "16color_psNearest"
  [![Source image enlarged in PS (nearest neighbor)][]]: http://blog.onthewings.net/wp-content/uploads/2009/08/16color_psNearest.png
  [Bicubic resampling by Pixel Bender]: http://blog.onthewings.net/wp-content/uploads/2009/08/16color_pbBicubic.png
    "16color_pbBicubic"
  [![Bicubic resampling by Pixel Bender][]]: http://blog.onthewings.net/wp-content/uploads/2009/08/16color_pbBicubic.png
  [Bicubic resampling by PhotoShop.]: http://blog.onthewings.net/wp-content/uploads/2009/08/16color_psBicubic.png
    "16color_psBicubic"
  [![Bicubic resampling by PhotoShop.][]]: http://blog.onthewings.net/wp-content/uploads/2009/08/16color_psBicubic.png
  [Bicubic smoother in PhotoShop]: http://blog.onthewings.net/wp-content/uploads/2009/08/16color_psBicubicSmoother.png
    "16color_psBicubicSmoother"
  [![Bicubic smoother in PhotoShop][]]: http://blog.onthewings.net/wp-content/uploads/2009/08/16color_psBicubicSmoother.png
  [Bicubic sharper in PhotoShop]: http://blog.onthewings.net/wp-content/uploads/2009/08/16color_psBicubicShaper.png
    "16color_psBicubicShaper"
  [![Bicubic sharper in PhotoShop][]]: http://blog.onthewings.net/wp-content/uploads/2009/08/16color_psBicubicShaper.png
  [Bicubic resampling sample program source (with PB source)]: http://blog.onthewings.net/wp-content/uploads/2009/08/bicubicResampling.zip
  [1]: http://blog.onthewings.net/wp-content/uploads/2010/03/bicubicResampling.zip
  []: http://blog.onthewings.net/wp-content/uploads/2009/08/pbBicubic.png
    "updated output of PB"
  [![][]]: http://blog.onthewings.net/wp-content/uploads/2009/08/pbBicubic.png
  [2]: http://blog.onthewings.net/wp-content/uploads/2009/08/bicubicResampling1.zip
  [3]: http://blog.onthewings.net/wp-content/uploads/2009/08/pbBicubic1.png
    "updated output of PB"
  [![][3]]: http://blog.onthewings.net/wp-content/uploads/2009/08/pbBicubic1.png
