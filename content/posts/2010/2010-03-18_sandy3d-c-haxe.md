Title: Sandy3D, C++, Haxe
Date: 2010-03-18 07:39
Tags: 3D, Haxe, Sandy3D
Slug: sandy3d-c-haxe

I've been learning [Haxe][] since the last few months. Beside the reason
of many Flash guys moved/moving to Haxe because of better performance of
compiled swf, I was tempted to try using its C++ target, which runs even
faster(at least in theory, in most parts). Its language feature is also
very nice, which is quite similar to AS3 but more powerful in
many aspects. Check out its [feature page][] if you want to know more.

And because of I need to write some 3D stuff in a project, I tried
finding a Haxe 3D engine  that can compiled to C++, but who knows, there
wasn't one. Actually the 3D engines in Haxe are all quite young. There
are 3 I found, all targeting only Flash: [Sandy3D][], originally written
in AS, has switched its trunk to Haxe; [Away3D][], again originally
written in AS, now has a Haxe branch inside its SVN in active
development; [Haxe3D][], developed by Nicolas(the creator of Haxe),
written in Haxe from the very beginning, seems to be very light-weight but
I can't found much info about it.

So I decide to work on one of them to enable a Haxe C++ 3D
engine. Because Sandy3D should be the most complete and stable one(which
actually stopped active development...), I chose it.

In the development of it, some issues are related to [nme][]/[neash][],
which are the re-invented cross-platform Haxe version of the Flash API.
With the help from [Hugh][] and Niel, project owner of [neash][] and
developer of Sandy3D, most of the problems are solved. However as I can
see, re-inventing the Flash API is a hard job as consideration of other
target is also needed, e.g.. JS/Canvas. [I really hope Adobe can help
this][].

Currently some very basic demos of Sandy can be compiled to C++ and it
shows that, in OpenGL rendering mode, the performance can goes over 300%
of the Flash(Haxe, not AS3) version. However in normal rendering mode,
the frame rate may actually be reduced if the window size is large.
Anyway, I think the performance is quite depend on hardware/OS, also the
3D scene you're showing.

Thanks for the Sandy3D team, they added me as a committer in their
official Google project. And I have just committed the changes to the
trunk :) There should be a new release soon if everything is fine.

A note to the ones can't wait for a release:

 1. Install hxcpp, nme, neash from haxelib.

 2. Replace contents in neash's neash/display/IBitmapDrawable.hx to a simple `typedef IBitmapDrawable = nme.display.IBitmapDrawable;`.

 3. To make mouse event work, in neash's neash/Lib.hx, the code:
    <pre>
// Process pending timers ...  
neash.Timer.CheckTimers();  
// Send frame-enter event  
var event = new Event( Event.ENTER_FRAME );  
mStage.Broadcast(event);
    </pre>
    should be moved to the end of the do-while loop, just before `mStage.RenderAll();`

 4. For mouse event in OpenGL mode to work, additional fix which required a recompile of nme is needed. I haven't tried yet. Now just ignore this...

 5. You should be able to use Sandy3D in C++ without the above patches for the next release of nme/neash. But for now, please do it.

BTW, I am also <del>porting</del> ported [casalib][], which I often use in AS3
development, to Haxe, see [casahx][].

  [Haxe]: http://haxe.org/
  [feature page]: http://haxe.org/doc/features
  [Sandy3D]: http://www.flashsandy.org/
  [Away3D]: http://www.away3d.com/
  [Haxe3D]: http://code.google.com/p/haxe3d/
  [nme]: http://code.google.com/p/nekonme/
  [neash]: http://code.google.com/p/neash/
  [Hugh]: http://gamehaxe.com/
  [I really hope Adobe can help this]: http://ideas.adobe.com/ct/ct_a_view_idea.bix?c=975F47A1-B925-4456-89DB-3BEFB1DA7780&idea_id=D62AC800-1BD6-4C79-85A7-6CCCE1C403AC
  [casalib]: http://casalib.org/
  [casahx]: http://github.com/andyli/casahx
