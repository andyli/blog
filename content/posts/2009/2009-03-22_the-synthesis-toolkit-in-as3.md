Title: The Synthesis ToolKit in AS3
Date: 2009-03-22 21:34
Tags: Flash, STK in AS3
Slug: the-synthesis-toolkit-in-as3

I am currently porting [The Synthesis ToolKit in C++][] to ActionScript
(not using Alchemy...). At this moment, 5 instruments are ported and
\>10 more is coming.

The performance is not yet optimized so real-time sound generation is
not ready, and I don't know if AS3 is fast enough to do that... Anyway
here below a early demo generates the ByteArray first and feeds it to
the sound during playback.

Updated 2009-09-19: More instruments are ported and added to the demo.

**Note that every element's loudness is different, adjust your speaker
so that your ears wouldn't hurt :)**

<object type="application/x-shockwave-flash" data="/files/2009/stkDemo_20090919.swf" width="400" height="300" id="swf33401" style="visibility: visible;"><param name="wmode" value="opaque"><param name="menu" value="true"><param name="quality" value="high"><param name="bgcolor" value="#FFFFFF"><param name="allowScriptAccess" value="always"><param name="allowFullScreen" value="true"></object>

Download link can be found in [STK in AS3 in Google Code][].

  [The Synthesis ToolKit in C++]: http://ccrma.stanford.edu/software/stk/
  [STK in AS3 in Google Code]: http://code.google.com/p/stk-in-as3/
