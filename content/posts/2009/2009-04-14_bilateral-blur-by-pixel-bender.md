Title: Bilateral Blur by Pixel Bender
Date: 2009-04-14 22:24
Tags: Flash, Pixel Bender
Slug: bilateral-blur-by-pixel-bender

I've been working on implementing a bilateral blur for Flash. Currently
the functionality is ok but the performance is quite poor (on my Intel
MacBook, processing a 320x240 image takes ~2s). I've even tried to
replace the Gaussian weighting functions with linear functions but it
does not help a lot but leads to worse quality. The problem should be
the sampling size of each pixel which I hard coded to be 9x9 square.
Reducing the sampling area would help but again reducing quality.

It is frustrating that Pixel Bender in Flash do not have loops. Even
accessing vector/matrix elements with variable index is not possible.

Anyway, here below is a demo.

Before applying filter:
![Before applying filter.][]

After applying filter:
![After applying filter.][]

Hope I can further optimize it later. (or better Adobe gives us GPU mode
:lol: )

UPDATED: [See this blog post][]

  [Before applying filter.]: /files/2009/before.png
    "before"
  [After applying filter.]: /files/2009/after.png
    "after"
  [See this blog post]: |filename|2009-04-24_the-bilateral-blur-filter-for-flash-is-now-on-pixel-bender-exchange-in-staff-picks.md
