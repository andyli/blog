Title: hxml tricks every haxe user should know
Date: 2013-03-04 17:00
Tags: Haxe, trick
Slug: hxml-tricks-every-haxe-user-should-know

Haxe projects usually are compiled with a [hxml file][], which basically
contains compiler arguments. So most of the tricks I am going to show is
actually compiler arguments tricks, which may also applicable to [nmml
file][] or IDE that does not use hxml (though they should).

### 1. Run project right after compilation

Being able to do so is critical to rapid development. The simple trick
to use `-cmd`,
which run the a command after successful compilation. For different
target, you have to use different command:

**Neko**

```text
-neko Test.n  
-main Test  
-cmd neko Test.n
```  
Or there is actually a shortcut that performs exactly the same as
above:  
```text
-x Test
```

**C++**

```text
-cpp bin  
-main Test  
-cmd ./bin/Test
```  
Notice the resulting file will be Test-debug if you compile with
-debug.

**JavaScript**

```text
-js Test.js  
-main Test  
-cmd phantomjs Test.js
```  
Here we use [phantomjs][] to run the JS file, the trace will output
to the terminal. In case it is something graphical, you have to
launch a browser with a HTML file that loads the script.

**PHP**

```text
-php bin  
-main Test  
-cmd php bin/index.php
```  
I guess you already knew you can execute a php script this way?

**Flash**

```text
-swf Test.swf  
-main Test  
-cmd path/to/FlashDebugger Test.swf
```  
Or if you're on Mac, you can actually use <span
style="font-family: 'courier new', courier;">-cmd open
Test.swf</span>, it will do the same as you double clicked on a swf
file (or any other file!).

**Java**

```text
-java bin  
-main Test  
-cmd java -jar bin/Test.jar
```  
Notice the resulting file will be Test-Debug.jar if you compile
with -debug.

**C#**

```text
-cs bin  
-main Test  
-cmd mono bin/bin/Test.exe
```
Mac/Linux has to use [Mono][] to execute it. Windows should able to
run it with <span
style="font-family: 'courier new', courier;">-cmd bin\\bin\\Test.exe</span>.  
Notice the resulting file will be Test-Debug.exe if you compile
with -debug.

### 2. Commenting a hxml file

Use a hash (i.e. <span
style="font-family: 'courier new', courier;">\#</span>) to comment out
the rest of the line. Despite of being useful to put documentation, it
can let us switch between different compilation configurations:

```text
-js Main.js  
-main Main  
### comment out one of the following logging levels  
#-D my-log-error  
#-D my-log-warning  
-D my-log-info
```

And in the source file:

```haxe
function attack(target:Monster, power:Int):Void {
    if (target == null) {
        #if (my_log_error || my_log_warning || my_log_info)
        trace("target is null");
        #end
        return;
    }
    if (power <= 0) {
        #if (my_log_warning || my_log_info)
        trace("attack power should be positive");
        #end
        return;
    }
    mp -= power;
    target.hp -= power;
    #if my_log_info
    trace("attacked " + target + " by " + power);
    #end
}
```

### 3. Append extra compiler argument when using the command line

Another useful trick to switch between compilation configurations, is to
simple supply more arguments after the hxml file. For
example temporarily switch to debug mode:

```text
haxe project.hxml
-debug
```

### 4. Multiple compilations at once

The majority knows the existence of  <span
style="font-family: 'courier new', courier;">--next</span>, used
for separating different builds:

all.hxml
```text
-js script/MainPage.js  
-main MainPage  
-lib jQueryExtern  
--next  
-js script/ContactPage.js  
-main ContactPage  
-lib jQueryExtern  
--next  
-js script/AlbumPage.js  
-main AlbumPage  
-lib jQueryExtern
```

There is an [--each][] option,
which reduce the repeating params. It is used in [the haxe compiler unit
test hxml][]. Rewriting the above, we will get:

all.hxml  
```text
-lib jQueryExtern  
--each  
-js script/MainPage.js  
-main MainPage  
--next  
-js script/ContactPage.js  
-main ContactPage  
--next  
-js script/AlbumPage.js  
-main AlbumPage
```

But really, separating each of them in different hxml is easier to
maintain and has better compatibility with code completion (because many
editors don't read hxml with <span
style="font-family: 'courier new', courier;">--next</span> very well).
So we may use the following instead:

MainPage.hxml  
```text
-js
script/MainPage.js  
-main MainPage  
-lib jQueryExtern
```

ContactPage.hxml  
```text
-js
script/ContactPage.js  
-main ContactPage  
-lib jQueryExtern
```

AlbumPage.hxml  
```text
-js
script/AlbumPage.js  
-main AlbumPage  
-lib jQueryExtern
```

all.hxml  
```text
MainPage.hxml  
--next  
ContactPage.hxml  
--next  
AlbumPage.hxml
```

Switch the hxml for code completion when working in different pages, and
use the "all.hxml" to compile at once.

  [hxml file]: http://haxe.org/doc/compiler
  [nmml file]: https://gist.github.com/jgranick/1763850
  [phantomjs]: http://phantomjs.org/
  [Mono]: http://www.mono-project.com/
  [--each]: https://code.google.com/p/haxe/issues/detail?id=1080#c8
  [the haxe compiler unit test hxml]: https://code.google.com/p/haxe/source/browse/trunk/tests/unit/compile.hxml
