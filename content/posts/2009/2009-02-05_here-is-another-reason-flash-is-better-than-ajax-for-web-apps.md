Title: Here is another reason Flash is better than AJAX for web apps
Date: 2009-02-05 00:56
Tags: Flash, web 2.0
Slug: here-is-another-reason-flash-is-better-than-ajax-for-web-apps

[AppleInsider | IE8's JavaScript performance lags well behind Safari,
Chrome](http://www.appleinsider.com/articles/09/01/27/ie8s_javascript_performance_lags_well_behind_safari_chrome.html)

Above is a recent article on the JavaScript performance of the
next-generation web browsers/rendering engines, including IE8, Firefox
3.1, Webkit r40220, Chrome 2.0.158.0 and Opera 10.

From the test result in the article, we can see that the performance of
JS varies a lot across the browsers (up to 1:10). This make developing
cross-platform web apps using AJAX much more difficult since you need to
make it as lightweight as possible.

Developing in Flash would not face this problem because swf content runs
inside the virtual machine. Although it has been claimed that Flash
content runs relatively slower under Mac, but the different is not
noticeable in most cases. And the performance of ActionScript (3) is A
LOT higher than JavaScript in any browser.

When developing large scale CPU hungry web apps, you better use Flash
instead of AJAX. (for other stuff, AJAX may be better, or a lot
better...)

PS. I've googled around for some benchmarks on AS/JS to prove my point,
but seems that there is no recent benchmark that aims for this (only [a
2007 one][]). Hopefully I will have time to do it by myself in this
week.

  [a 2007 one]: http://www.jamesward.com/blog/2007/04/30/ajax-and-flex-data-loading-benchmarks/
