Title: Improving Haxe Syntax Highlighting Support of Pygments
Date: 2013-02-26 02:00
Tags: Haxe, Python
Slug: improving-haxe-syntax-highlighting-support-of-pygments

3 months ago I have started to rewrite the Haxe laxer in [Pygments][],
which is a syntax highlighter written in Python, used in both [Github][]
and [Bitbucket][]. Pygments included initial Haxe support back in 2010,
but sadly is not complete. Haxers should have seen some broken
highlighting like the following:

![Poor old haxe syntax highlight in Github][]

Surely it is less than optimal, so I fixed it as the following:

![Great new improved Haxe syntax highlighting][]

Looks nice? I also took the chance to include 100% [Haxe 3][] support
(and still backward compatible for highlighting Haxe2 code), which
includes [Array/Map comprehension][], [import wildcard][],
[macro-reification][] and even [string interpolation][]! In fact I've
tested ALL 1589 Haxe source files appeared in the source of Haxe,
including the core std library of Haxe and its unit test files. So it
is guaranteed to be as complete as possible, supporting all tiny Haxe
features you may have never noticed (and I myself indeed learned a few
tricks and even detected some typos in the Haxe std lib when running the
test!).

I've made [a pull request to Pygments][], which hopefully they will
merge it soon. But even when they've merged it, it will still take some
time to let the Github guys updates their internal Pygments. But don't
be sad, the future is here: I created a Chrome extension, [Pygmentx][],
that replace the Haxe codes on Github (and [Gist][]) with the improved
one. It only supports the normal file view at the moment, not diff view
nor the previews on Gist user page at the moment. Btw, thanks Tong
(a.k.a disktree) again for his [chrome.extension][] Haxe externs ;)

 

  [Pygments]: http://pygments.org/
  [Github]: https://github.com/
  [Bitbucket]: https://bitbucket.org/
  [Poor old haxe syntax highlight in Github]: /files/2013/512b98bb9d29c91162000063.jpeg
  [Great new improved Haxe syntax highlighting]: /files/2013/512b99d39d29c97d6f00007c.jpeg
  [Haxe 3]: http://haxe.org/manual/haxe3
  [Array/Map comprehension]: http://haxe.org/manual/comprehension
  [import wildcard]: http://haxe.org/manual/modules#import
  [macro-reification]: http://haxe.org/manual/macros#macro-reification
  [string interpolation]: http://haxe.org/manual/string_interpolation
  [a pull request to Pygments]: https://bitbucket.org/birkenfeld/pygments-main/pull-request/174/rewrote-the-haxe-lexer-and-haxe-30-support
  [Pygmentx]: https://chrome.google.com/webstore/detail/pygmentx/ckkmmhhaihbeiemghplgkhkgdgdjnddl
  [Gist]: https://gist.github.com/
  [chrome.extension]: https://github.com/tong/chrome.extension
