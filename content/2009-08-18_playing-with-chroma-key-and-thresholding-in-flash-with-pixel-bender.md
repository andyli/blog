Title: Playing with chroma key and thresholding in Flash (with Pixel Bender)
Date: 2009-08-18 06:22
Tags: experiment, Flash, Flex, Pixel Bender
Slug: playing-with-chroma-key-and-thresholding-in-flash-with-pixel-bender

While [traveling with my gf in Europe][], I'm planning to develop a
better technique to use color marker in FLARtoolkit (which I've [tried
before][]).

<iframe width="640" height="390" src="//www.youtube.com/embed/coDZ7VUogh4" frameborder="0" allowfullscreen></iframe>

For the first step of doing so is to find a algorithm of matching
colors. Using blend mode "difference" on the image is not flexible and
may not fit all situations. I decided to calculate the difference by
comparing hue, saturation and brightness of the colors and then
threshold the image.

This is very similar to (if not exactly) doing [chroma key][]. Maybe
there is some awesome beautiful chroma key algorithm but I can't find a
fast and flexible enough to do so. If you know one, please tell me. :)

One problem I faced is choosing between color space models. RGB surely
wouldn't be the choice since it do not give hue value directly. There
are HSV and HSL I found to be quite suitable. The two models share the
same algorithm to calculate hue but have different ones for saturation
and brightness. After reading the [algorithms][], my decision is... try
both. :P

Another problem is how to preform thresholding. First method is after
calculating the pixel difference, add the difference in hue, saturation
and brightness altogether with weightings and do a one-time threshold to
the gray-scale image. Second method is calculate the difference and give
threshold limits to the three channels (H,S,V or H,S,L), only the pixels
pass all the three thresholds will be white. First method should be more
easily to incorporate with other filters developed for AR (like the very
hot [adaptive thresholding][]), but the second method can be more
precise.  Finally I tried both too...

<span style="font-size: large;">**[Here is the result][]**</span>. While
I have set some default values to the filters, be sure to play around
with the values when you change the target color. There wouldn't be a
set of values that fits all methods and situations. :)

I'll try integrate it with FLARtoolkit and release the source when it is
ready, be sure to check back soon. :)

Update:  
[Source and new demo is here!][]

  [traveling with my gf in Europe]: http://www.flickr.com/photos/andy-li/sets/72157621818199411/
  [tried before]: http://blog.onthewings.net/2009/05/23/flartoolkit-trick-use-a-colored-marker/
  [chroma key]: http://en.wikipedia.org/wiki/Chroma_key
  [algorithms]: http://en.wikipedia.org/wiki/HSL_and_HSV
  [adaptive thresholding]: http://blog.inspirit.ru/?p=322
  [Here is the result]: http://blog.onthewings.net/wp-content/uploads/2009/08/colorDifference.html
  [Source and new demo is here!]: http://blog.onthewings.net/2009/12/10/chroma-key-and-thresholding-in-flash-pixel-bender-revised/
