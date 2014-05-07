Title: How to know objects are really GC'ed in Flash(AS3)
Date: 2010-10-18 01:48
Tags: Flash, trick
Slug: how-to-know-objects-are-really-gced-in-flash-as3

[Memory leak][] is a bug that pretty hard to deal with. Usually people
use some profilers to observer the memory usage while stressing the
program, if there is no increase of memory usage after repeating calls
of a function, we can conclude there is no memory leak in that function.
It is of course fine to detect memory leak in this way, but it is always
good to have a way that asserts your objects are really [GC][]'ed at
some point.

The trick is to use a Dictionary with weak-reference keys and check its
element count. It is already quite popular in the Java world but look
like there aren't many Flash devs talking about it.

A simple demo on how to write such test, source is available in
wonderfl:

<p>
[RAW]  

<script type="text/javascript" src="http://wonderfl.net/blogparts/ohTv/js"></script>
[Memory leak unit test - wonderfl build flash online][]

[/RAW]

  [Memory leak]: http://en.wikipedia.org/wiki/Memory_leak
  [GC]: http://en.wikipedia.org/wiki/Garbage_collection_(computer_science)
    "garbage collection"
  [Memory leak unit test - wonderfl build flash online]: http://wonderfl.net/c/ohTv
    "Memory leak unit test"
