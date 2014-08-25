Title: PV3D + Async-threading = Async Render Engine
Date: 2009-06-07 03:28
Tags: experiment, Flash, Flex
Slug: pv3d-async-threading-asyncrenderengine

Recently I need to write a 3D tool to help making a installation
artwork. I know I should use Maya, Processing or anything like that, but
in order to get the least risk, I used my most experienced language,
AS3.

Since I need to render A LOT of stuff (\~400,000 objects), instantly I
faced the performance issue. As you can imagine, even if I could
generate all the objects in 15 seconds, the rendering process must
excess the Flash Player's  execution time limit.

So I try to make my own async render engine with the help of
[async-threading][]. I extended BasicRenderEngine to
AsyncBasicRenderEngine. The class even has a showBusyCursor property
that let you optionally show the busy cursor on rendering.

But note that this is only a proof-of-concept and actually has little
help of preventing freeze-screen. It is because I only distribute the
individual 3D object's rendering to frames but leaving the sorting,
filtering, post-process code unchanged. Also, the RenderStatistics
returned by renderScene/renderLayers will contain only wrong data until
the RENDER\_DONE event is dispatched.

One last thing, Flash's drawing algorithm seems affecting the async
rendering performance too. So I do not add the viewport to stage.
Instead, once RENDER\_DONE, I draw the viewport on a Bitmap on stage.

<object type="application/x-shockwave-flash" data="/files/2009/asyncrendererdemo.swf" width="820" height="620" id="swf4c3e1" style="visibility: visible;"><param name="wmode" value="opaque"><param name="menu" value="true"><param name="quality" value="high"><param name="bgcolor" value="#FFFFFF"><param name="allowScriptAccess" value="always"><param name="allowFullScreen" value="true"></object>

[source][]

  [async-threading]: http://code.google.com/p/async-threading/
  [source]: /files/2009/asyncrendererdemo.zip
