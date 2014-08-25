Title: BrainFlash, the AS3 BrainFuck interpreter
Date: 2009-10-08 03:11
Tags: experiment, Flash
Slug: brainflash-the-as3-brainfuck-interpreter

If you haven't heard about [Brainfuck][] yet, it is a famous esoteric
programming language. If you want to know why it has such a name take a
look at its hello-world program source code (from [wikipedia][]):

```brainfuck
+++ +++ +++ +           initialize counter (cell #0) to 10
[                       use loop to set the next four cells to 70/100/30/10
    > +++ +++ +             add  7 to cell #1
    > +++ +++ +++ +         add 10 to cell #2
    > +++                   add  3 to cell #3
    > +                     add  1 to cell #4
    <<< < -                 decrement counter (cell #0)
]
>++ .                   print 'H'
>+.                     print 'e'
+++ +++ +.              print 'l'
.                       print 'l'
+++ .                   print 'o'
>++ .                   print ' '
<<+ +++ +++ +++ +++ ++. print 'W'
>.                      print 'o'
+++ .                   print 'r'
--- --- .               print 'l'
--- --- --.             print 'd'
>+.                     print '!'
>.                      print '\n'
```

the above program can be written as:

```brainfuck
++++++++++[>+++++++>++++++++++>+++>+<<<<-]>++.>+.+++++++..+++.>++.<<+++++++++++++++.>.+++.------.--------.>+.>.
```

So now you should know how lovely the language is and why I need to
write a interpreter in Flash: now you can manipulate a ByteArray with
BrainFuck code!!! And ya, the name of my interpreter is even more
friendly than the language's name! :)

[Here is the result demo][] ([source code here][]), type in a program
and its input then click run. The default program is to add up two
single-digit integers. And the output is correct only if the sum is
single-digit too. And again the code is from wikipedia. You may find
other BrainFuck source code to test from [Panu Kalliokoski's Brainfuck
Archive][].

The interpreter is written by only looking at its command description.
There are some bugs as I know. For example when inputting multiple
lines, the output may have wrong formating. And it can not have dynamic
input like having inputs in a infinite loop. Actually any infinite loop
will freeze your browser.

I don't think I will go to improve it anytime soon. So please, don't use
it in production (will anyone??).

  [Brainfuck]: http://www.muppetlabs.com/~breadbox/bf/
  [wikipedia]: http://en.wikipedia.org/wiki/Brainfuck#Hello_World.21
  [Here is the result demo]: /files/2009/brainflashDemo.html
  [source code here]: /files/2009/brainflashDemo.zip
  [Panu Kalliokoski's Brainfuck Archive]: http://esoteric.sange.fi/brainfuck/bf-source/prog/
