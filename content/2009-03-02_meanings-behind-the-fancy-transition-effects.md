Title: Meanings behind the fancy transition effects
Date: 2009-03-02 22:59
Tags: web 2.0, web usability design and engineering
Slug: meanings-behind-the-fancy-transition-effects

It is quite popular that websites have more and more “AJAX animation
effects”(which should be JavaScript animation effects actually…). Many
AJAX learners are obsessed with adding fancy animated effects on there
web page, and sometimes, adding it without thinking the particular
effect’s meaning, will actually confuse or disturb the end users.

In the following, I will follow [script.aculo.us][]'s effect naming. You
may see the live effects in its [wiki][].

There are quite a few animation effects that are common, like fade
in/out, blind up/down, slide up/down. They can be seen easily over the
web and their meanings are obvious: to bring things in or out. But there
is still some different among them.

For *fade*, the transition is much smoother then the others since there
is no moving part. It should be applied on things that do not need much
attention, like changing top banner’s background image, just let the
users focus on what they are reading.

For *blinding/sliding*, the sense of changing is stronger. One of their
special usages is to resize things, like panels. Since resizing panels
often leads to change of layout, if there is no transition, the user may
not be able to catch up with the movement of the page elements.

Some less popular effects like puff, shake are more easily to be used
wrong.

For *puff*, since the animation ends with zero alpha, some developers
may use it as disappearing effect, but that’s wrong. Since Mac OSX is
using puff for a visual effect on opening files/programs, many Mac user
may be confused if you use it on removing elements.

For *shake*, some developers may think that it can draw user’s attention
effectively. Really, but we should use it carefully since shaking will
cause the user not able to see the elements inside the shaking area
easily. So, it takes time to let the shake stop and refocus on the
element’s details and it may disturb the user’s work.

  [script.aculo.us]: http://script.aculo.us/
  [wiki]: http://wiki.github.com/madrobby/scriptaculous/combination-effects-demo
