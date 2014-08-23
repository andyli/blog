Title: Rendering point cloud and physic simulation
Date: 2010-03-26 07:11
Category: FYP
Slug: rendering-point-cloud-and-physic-simulation

The point cloud calculated from OpenFramework/OpenCV is now able to
stream into the haXe rendering program through TCP socket. However,
currently the TCP socket used in haXe is in synchronized mode, which is
blocking and limit the framerate. That part will be rewritten to use
threading later on.

There is some problem with the point cloud too. Seems that the points'
z-value is scaled by a factor. I need to manually scale them to fit the
real world and it is causing low accuracy. I'm not sure if that is the
problem of OpenCV or not. But I'll just stay in the current
implementation unless I got more info.

The physic simulation is working with jiglibhaxe, so far so good. I'll
post some screen capture later.
