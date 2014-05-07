Title: CSS-only experiements
Date: 2009-11-24 16:35
Tags: css, experiment
Slug: css-only-experiements

In the last week I have tried to make some CSS-only experiments.
Originally it's just an idea to play some effects with [CSS animation
which now available in webkit][]. But at the end I am obsessed and
making games with CSS... Yup, that's embedding game logic in the place
which designed to be presentation layer only... :P

Video first, description follows:

[youtube]http://www.youtube.com/watch?v=ec2pz\_GqWEw[/youtube]

### Mouse shadow

  --------------------------------------- ----------------------------------------
  [![CSS experiment: Mouse shadow][]][]   [![CSS experiment: Mouse shadow][1]][]
  --------------------------------------- ----------------------------------------

[Open experiment][]

It works on webkit browsers only (Chrome, Safari).

What I want to create is just some old-school shadow, fading etc. Turn
out using a deeply-nested div for the effect is quite stylish. The divs
are assigned to different classes based on their nested level to improve
performance because *div \> div \>div \> ...*is just too slow...

### Gear

  -------------------------------- --------------------------------
  [![CSS experiment: Gear][]][]    [![CSS experiment: Gear][2]][]
  [![CSS experiment: Gear][3]][]   [![CSS experiment: Gear][4]][]
  -------------------------------- --------------------------------

[Open experiment][5]

Again, works on webkit browsers only (Chrome, Safari).

I find the deeply-nested div has quite a potential to make some more
things, so here is another product of it. Swapping the CSS transition
with CSS transform achieved something very similar to [fractal][].

One little defect is I used percentage for the size of divs and the
rounding number cause some gaps between divs... It is
more noticeable when using resolution 3.

### Pixel art

  ------------------------------------ -------------------------------------
  [![CSS experiment: Pixel art][]][]   [![CSS experiment: Pixel art][6]][]
  ------------------------------------ -------------------------------------

[Open experiment][7]

This one works on all major browsers (IE 6/7/8, Firefox, Safari, Chrome)
:)

This is a drawing board that you can click to draw pixel.

I remembered there are hackers tried to get users' browsing history by
using color-change of visited link. It impressed me to store valued in
the browsing history. Originally I used links with hash values (ie. *\<a
href="\#123"\>\</a\>*) and it works in all the browsers... except IE. IE
will turn the color when you click on it but it does not store it in the
history. So I switched to use *iframe*, that is setting the links to
open in the iframe and serve a dummy webpage with random URL...

### Click Challege

  ----------------------------------------- ------------------------------------------
  [![CSS experiment: Click Challege][]][]   [![CSS experiment: Click Challege][8]][]
  ----------------------------------------- ------------------------------------------

[Open experiment][9]

This one is webkit browsers only (Chrome, Safari).

This is the latest experiment I made, which is really a playable game.
[CSS keyframe animation][] is used to simulate a timer. Lots of
identical checkboxes to act as an area to let user clicks on. They are
removed when clicked on it, using *:checked* in CSS. Finally a CSS
counter is used to label the checkboxes (actually a ordered list will be
fine).

* * * * *

Update

</p>
2009-11-26: [Gear is now on Chrome Experiments!][] Being the first
CSS-only experiment over there :)

  [CSS animation which now available in webkit]: http://webkit.org/blog/138/css-animation/
  [CSS experiment: Mouse shadow]: http://farm3.staticflickr.com/2777/4129811385_f698cbc966_m.jpg
  [![CSS experiment: Mouse shadow][]]: http://www.flickr.com/photos/andy-li/4129811385/
    "CSS experiment: Mouse shadow by on_the_wings, on Flickr"
  [1]: http://farm3.staticflickr.com/2762/4130576658_4419cd860c_m.jpg
  [![CSS experiment: Mouse shadow][1]]: http://www.flickr.com/photos/andy-li/4130576658/
    "CSS experiment: Mouse shadow by on_the_wings, on Flickr"
  [Open experiment]: http://blog.onthewings.net/wp-content/uploads/2009/11/css-experiment_mouse-shadow.php
  [CSS experiment: Gear]: http://farm3.staticflickr.com/2513/4130576756_d12b7ee3e5_m.jpg
  [![CSS experiment: Gear][]]: http://www.flickr.com/photos/andy-li/4130576756/
    "CSS experiment: Gear by on_the_wings, on Flickr"
  [2]: http://farm3.staticflickr.com/2694/4129811585_a120478478_m.jpg
  [![CSS experiment: Gear][2]]: http://www.flickr.com/photos/andy-li/4129811585/
    "CSS experiment: Gear by on_the_wings, on Flickr"
  [3]: http://farm3.staticflickr.com/2693/4130576954_19c1d75638_m.jpg
  [![CSS experiment: Gear][3]]: http://www.flickr.com/photos/andy-li/4130576954/
    "CSS experiment: Gear by on_the_wings, on Flickr"
  [4]: http://farm3.staticflickr.com/2771/4130576994_dc6d7c029f_m.jpg
  [![CSS experiment: Gear][4]]: http://www.flickr.com/photos/andy-li/4130576994/
    "CSS experiment: Gear by on_the_wings, on Flickr"
  [5]: http://blog.onthewings.net/wp-content/uploads/2009/11/css-experiment_gear.php
  [fractal]: http://en.wikipedia.org/wiki/Fractal
  [CSS experiment: Pixel art]: http://farm3.staticflickr.com/2732/4129811095_f867790c2c_m.jpg
  [![CSS experiment: Pixel art][]]: http://www.flickr.com/photos/andy-li/4129811095/
    "CSS experiment: Pixel art by on_the_wings, on Flickr"
  [6]: http://farm3.staticflickr.com/2501/4129811141_a80400e2fd_m.jpg
  [![CSS experiment: Pixel art][6]]: http://www.flickr.com/photos/andy-li/4129811141/
    "CSS experiment: Pixel art by on_the_wings, on Flickr"
  [7]: http://blog.onthewings.net/wp-content/uploads/2009/11/css-experiment_pixel-art.php
  [CSS experiment: Click Challege]: http://farm3.staticflickr.com/2505/4130576444_f87eb8b7e4_m.jpg
  [![CSS experiment: Click Challege][]]: http://www.flickr.com/photos/andy-li/4130576444/
    "CSS experiment: Click Challege by on_the_wings, on Flickr"
  [8]: http://farm3.staticflickr.com/2721/4130576522_c6ae207426_m.jpg
  [![CSS experiment: Click Challege][8]]: http://www.flickr.com/photos/andy-li/4130576522/
    "CSS experiment: Click Challege by on_the_wings, on Flickr"
  [9]: http://blog.onthewings.net/wp-content/uploads/2009/11/css-experiment_click-challenge.php
  [CSS keyframe animation]: http://webkit.org/blog/324/css-animation-2/
  [Gear is now on Chrome Experiments!]: http://www.chromeexperiments.com/detail/gear/
