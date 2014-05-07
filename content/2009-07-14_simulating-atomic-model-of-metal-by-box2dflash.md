Title: Simulating atomic model of metal by Box2DFlash
Date: 2009-07-14 01:49
Tags: experiment, Flash, Flex
Slug: simulating-atomic-model-of-metal-by-box2dflash

[flickr-gallery mode="photoset" photoset="72157621394341446"]Click
images above to enlarge.

Impressed by the video [here][], I tried to simulate the atomic model of
metal in Flash using Box2DFlash.

What is done in the program is just put a lot of spheres in the area
randomly, and then let the physics engine to solve all the collisions.
When all the atoms stop moving, a single still of the metal structure
will be formed.

The atoms are only drawn on the screen when it is sleeping (ie. no
movement). It can save some time from not rendering them in each frame.

<span style="color: #ff0000;">caution:</span> The browser will freeze
for a few seconds after "start" is pressed. And it takes several minutes
to an hour to finish (when sleep count == atom count).  

[SWF]http://blog.onthewings.net/wp-content/uploads/2009/07/atomicModelSim.swf,
640, 480[/SWF]  
[source][]

  [here]: http://createdigitalmotion.com/2009/07/06/a-different-view-of-particles-real-world-pinscreens/
  [source]: http://blog.onthewings.net/wp-content/uploads/2009/07/atomicModelSim.zip
