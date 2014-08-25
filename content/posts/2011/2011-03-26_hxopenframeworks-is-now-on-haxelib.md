Title: hxOpenFrameworks is now on haxelib!
Date: 2011-03-26 04:45
Tags: Haxe, OpenFrameworks
Slug: hxopenframeworks-is-now-on-haxelib

Yup, it's there. You can now grab hxOpenFrameworks via
`haxelib install hxOpenFrameworks`. It is using a version of
openFrameworks that is slightly more recent than 0.062(current latest
release). All Windows/Mac/Linux is supported (only 32bit though).

For those haven't tried haxe/cpp:

1.  Go [install haxe][].
2.  Install c++ development tools.
    -   Windows: Visual Studio ([Express][] version is free)
    -   Mac: XCode (in order to get GCC)
    -   Linux: GCC (should be already there)

3.  Open up Terminal (Windows users please choose "Visual Studio Command
    Prompt" from start menu)
    1.  `haxelib setup`  
        It is need for 1st time use of haxelib. Simply press enter to
        set to the default path.
    2.  `haxelib install hxOpenFrameworks`  
        It will install hxOpenFrameworks as well as the dependencies
        ([HSL][] and [hxRtAudio][]). Mac user should also install [Jack
        OSX][] manually.

4.  Browse to hxOpenFramework and try compiling the examples.
    1.  Windows: `cd C:\Motion-Twin\haxe\lib\hxOpenFrameworks\0,062,0`  
        Mac/Linux: `cd /usr/lib/haxe/lib/hxOpenFrameworks/0,062,0`
    2.  Open *of/examples/Main.hx* (previously is in the root dir, see
        [issue 1][]) and uncomment one of the examples.
    3.  `haxe compile-{your_platform}.hxml`

Please refer to openFrameworks website for [API documentation][].

  [install haxe]: http://haxe.org/download
  [Express]: http://www.microsoft.com/visualstudio/en-us/products/2010-editions/visual-cpp-express
  [HSL]: http://code.google.com/p/hxhsl/
  [hxRtAudio]: https://github.com/andyli/hxRtAudio
  [Jack OSX]: http://www.jackosx.com/
  [issue 1]: https://github.com/andyli/hxOpenFrameworks/issues/1
  [API documentation]: http://www.openframeworks.cc/documentation?adv=yes
