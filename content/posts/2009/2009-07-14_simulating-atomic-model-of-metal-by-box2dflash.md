Title: Simulating atomic model of metal by Box2DFlash
Date: 2009-07-14 01:49
Tags: experiment, Flash, Flex
Slug: simulating-atomic-model-of-metal-by-box2dflash

<iframe src="https://www.flickr.com/photos/andy-li/3716779279/in/set-72157621394341446/player/" width="640" height="480" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>

Impressed by the video [here][], I tried to simulate the atomic model of
metal in Flash using Box2DFlash.

What is done in the program is just put a lot of spheres in the area
randomly, and then let the physics engine to solve all the collisions.
When all the atoms stop moving, a single still of the metal structure
will be formed.

The atoms are only drawn on the screen when it is sleeping (i.e.. no
movement). It can save some time from not rendering them in each frame.

<span style="color: #ff0000;">caution:</span> The browser will freeze
for a few seconds after "start" is pressed. And it takes several minutes
to an hour to finish (when sleep count == atom count).  

<object type="application/x-shockwave-flash" data="/files/2009/atomicModelSim.swf" width="640" height="480" id="swf35721" style="visibility: visible;"><param name="wmode" value="opaque"><param name="menu" value="true"><param name="quality" value="high"><param name="bgcolor" value="#FFFFFF"><param name="allowScriptAccess" value="always"><param name="allowFullScreen" value="true"></object>

[source][]

  [here]: http://createdigitalmotion.com/2009/07/06/a-different-view-of-particles-real-world-pinscreens/
  [source]: /files/2009/atomicModelSim.zip
