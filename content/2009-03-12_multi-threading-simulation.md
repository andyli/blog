Title: Multi-threading simulation
Date: 2009-03-12 02:59
Tags: web 2.0
Slug: multi-threading-simulation

JavaScript performance is becoming more and more critical since we are
all obsessed with developing CPU-hungry stuff like [pixastic][]
(manipulate image in JavaScript), [Box2D.js][] (2D physic simulation).
Sometime these  computational expensive calculations will block the user
from interacting with the UI and freeze the screen. So, some developer
start asking for multi-threading in JavaScript.

Multi-threading is a technology that let a program split into several
threads and let them run in parallel. For example the visual part
including the UI is running in one thread and some other work like
zipping a file is run in another thread. In that case the UI will not
need to wait for the zipping process and able to respond to user input.

Sadly, this is not implemented in JavaScript (or we should say not
implemented in the browsers?). But there are still some developers
finding ways to simulate multi-threading. Although the tricks may not
really solve the problem completely, but still are very useful to be
learned. Here are two of them:

-   <http://www.sitepoint.com/article/multi-threading-javascript/>
-   <http://www.dojotoolkit.org/book/dojo-book-0-9/part-5-dojox/dojox-timing>

And recently, there is a [threading library for Flex][], which use
similar techniques as above to simulate threading.

  [pixastic]: http://www.pixastic.com/lib/
  [Box2D.js]: http://box2d-js.sourceforge.net/
  [threading library for Flex]: http://cssecodemonkeys.wordpress.com/2009/03/06/threading-in-flex/
