Title: CanvasBlock: a GM script to block canvas tag (should we...or can we?)
Date: 2010-04-13 02:41
Tags: Flash, Haxe, HTML5, JavaScript
Slug: canvasblock-a-gm-script-to-block-canvas-tag-should-we-or-can-we

HTML5 is believed to be the Flash killer and will replace Flash in the
future. Eventually those Flash-haters will become canvas-haters, so a
canvas-blocking GreaseMonkey script will be useful (at least they think
it will be).

I myself was making it for fun. I don't think we should block any HTML5
tags anytime since it is a part of the web, just like I do not agree
people blocking Flash. What is interesting is, seems like we
cannot effectively block the canvas tag, which will be discussed later
in this post.

### Features

I made the script blocks not only canvas tag but also video tag and
audio tag. It is because Flash is going to be replaced by all the three
tags but not only canvas. Video and audio can be as annoying as canvas.

Like those Flash-blockers, the blocked contents are replaced by a line
of text, "Click to show xxxx". You may click on it to get back the
blocked content.

CanvasBlock is tested on FireFox 3.6 on Mac, FireFox 3.5 on Ubuntu and
Chrome on Ubuntu. Other platforms should works too.

### Implementing the script

I used haXe instead of writing pure JS. No big reason here, just to see
if it is possible. Turn out there is no big difference from using JS,
you just need to copy all the meta data to the compiled JS file. And the
events listener need to be assigned by "addEventListener" instead of
something like "onclick = function ...".

Detecting HTML5 tags is easier than detecting Flash objects. Firstly,
the tags are standardized meaning you can simply use
"getElementsByTagName". For Flash objects you need to check the params
of the "object" and the "embed" tags, which is a bit troublesome.
Secondly, currently no one (at least not much ppl) is creating canvas
tags on the fly, unlike for Flash the standard way is to use swfobject.
So I can detect the tags once the DOM is ready, no need to wait for the
execution of the page's JS.

Replacing the tags and saving them for later retrieval is easy too.
Using normal JS method will work.

### The tags are blocked but...

The script is functional and I went to do some more testing. Blocking
video and audio seems ok, but there is some problem of blocking canvas.

#### Possibility of Freezing/Crashing

I went to [ChromeExperiments][] and randomly picked [one][]. You know
what? The browser freezed.

So, look like after I blocked the canvas, the JS on the page which is
used to draw thing on the canvas originally, is still there trying to
work on the canvas. And this become a big problem since I don't
know exactly which JS function is going to work on
canvas, because different web page have different functions, so no way I
can work on that. You can completely disable JS, but this is not a
CanvasBlock should do.

[caption id="attachment\_773" align="alignleft" width="270"
caption="Browser freezed and an timeout message was shown after blocking
canvas."][![][]][][/caption]

However, I have tested some more web page and they are ok with the
blocking script. So maybe only some complex JS will have this problem.
But anyway the possibility of freezing a browser is not a good thing.

#### No significant reduction on CPU usage

The remaining JS script  problem reminded me to test on the CPU usage.
And the result is, blocking canvas does not bring significant reduction
on CPU usage. See the following screenshots, which is using [another
Chrome experiment][]:

[caption id="attachment\_775" align="alignnone" width="717"
caption="Page opened, canvas blocked. However CPU usage still rise to a
very high level."][![][1]][][/caption]

[caption id="attachment\_777" align="alignnone" width="717"
caption="Clicked to show back the canvas. CPU usage rose even higher,
but not much difference."][![][2]][][/caption]

So what's that mean? Again if I want to block the real CPU hog, I should
block the JS with the canvas. But again, stated above, it is not
possible to block the right function without blocking all JS.

### Conclusion

Blocking canvas can only introduce little benefit on CPU usage but give
you possibility of freezing/crashing!

Let's look at Flash again. Flash can be blocked easily because
ActionScript is included in the swf. Removing the swf from the
page automatically removes the associated scripts. Also, usually JS does
not control a Flash object so it is pretty safe to kick Flash out
without dealing with the remained JS. From this point of view, seems
that Flash is more user friendly than canvas, and HTML5 ads will be more
annoying than Flash ads...

If you want to try, you may install the script from [CanvasBlock's page
on userscripts.org][].

You're also welcome to get the haXe source from [CanvasBlock's github
repo][].

  [ChromeExperiments]: http://www.chromeexperiments.com/
  [one]: http://www.chromeexperiments.com/detail/asteroids-game/
  []: http://blog.onthewings.net/wp-content/uploads/2010/04/errorAfterBlockingCanvas-450x281.png
    "Error was shown after blocking canvas"
  [![][]]: http://blog.onthewings.net/wp-content/uploads/2010/04/errorAfterBlockingCanvas.png
  [another Chrome experiment]: http://www.chromeexperiments.com/detail/aquarium/
  [1]: http://blog.onthewings.net/wp-content/uploads/2010/04/cpuUsage-1-1024x640.png
    "CPU Usage Screenshot 1"
  [![][1]]: http://blog.onthewings.net/wp-content/uploads/2010/04/cpuUsage-1.png
  [2]: http://blog.onthewings.net/wp-content/uploads/2010/04/cpuUsage-2-1024x640.png
    "CPU Usage Screenshot 2"
  [![][2]]: http://blog.onthewings.net/wp-content/uploads/2010/04/cpuUsage-2.png
  [CanvasBlock's page on userscripts.org]: http://userscripts.org/scripts/show/74216
  [CanvasBlock's github repo]: http://github.com/andyli/CanvasBlock
