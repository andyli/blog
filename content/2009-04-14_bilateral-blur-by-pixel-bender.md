Title: Bilateral Blur by Pixel Bender
Date: 2009-04-14 22:24
Tags: Flash, Pixel Bender
Slug: bilateral-blur-by-pixel-bender

I've been working on implementing a bilateral blur for Flash. Currently
the functionality is ok but the performance is quite poor (on my Intel
MacBook, processing a 320x240 image takes \~2s). I've even tried to
replace the Gaussian weighting functions with linear functions but it
does not help a lot but leads to worse quality. The problem should be
the sampling size of each pixel which I hard coded to be 9x9 square.
Reducing the sampling area would help but again reducing quality.

It is frustrating that Pixel Bender in Flash do not have loops. Even
accessing vector/matrix elements with variable index is not possible.

Anyway, here below is a demo.

[caption id="attachment\_365" align="alignnone" width="450"
caption="Before applying filter."][![Before applying
filter.][]][][/caption]

[caption id="attachment\_366" align="alignnone" width="450"
caption="After applying filter."][![After applying
filter.][]][][/caption]

Hope I can further optimize it later. (or better Adobe gives us GPU mode
:lol: )

UPDATED: [See this blog post][]

  [Before applying filter.]: http://blog.onthewings.net/wp-content/uploads/2009/04/before-450x337.png
    "before"
  [![Before applying filter.][]]: http://blog.onthewings.net/wp-content/uploads/2009/04/before.png
  [After applying filter.]: http://blog.onthewings.net/wp-content/uploads/2009/04/after-450x337.png
    "after"
  [![After applying filter.][]]: http://blog.onthewings.net/wp-content/uploads/2009/04/after.png
  [See this blog post]: http://blog.onthewings.net/2009/04/24/the-bilateral-blur-filter-for-flash-is-now-on-pixel-bender-exchange-in-staff-picks/
