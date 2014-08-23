Title: Deep Linking for AJAX
Date: 2009-04-08 10:28
Tags: web 2.0, web usability design and engineering
Slug: deep-linking-for-ajax

I have just made a independent study on "deep linking for AJAX" for the
course Web 2.0 technology. Seems that most of the info on the web about
deep linking implementation are for Flash web site but not AJAX's, so I
release my report and presentation slide here hoping can help somebody.

<iframe src="//www.slideshare.net/slideshow/embed_code/1262036" width="427" height="356" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC; border-width:1px; margin-bottom:5px; max-width: 100%;" allowfullscreen> </iframe> <div style="margin-bottom:5px"> <strong> <a href="https://www.slideshare.net/andy_li/deep-linking-for-ajax-presentation" title="Deep Linking For Ajax Presentation" target="_blank">Deep Linking For Ajax Presentation</a> </strong> from <strong><a href="http://www.slideshare.net/andy_li" target="_blank">Andy Li</a></strong> </div>

* * * * *

What is Deep Linking
--------------------

Deep Linking is a URL that point to a specific resource like a web page
or a file. User can access the resource directly through the URL without
further navigation (ie. bypassing "home" or "portal" page).

Why is Deep Linking Important
-----------------------------

Deep linking is originally a build-in function of the web, enabling the
web pages to be interconnected, letting the users go to a specific
resource easily by clicking on the links from any web page. Without deep
linking, the web sites will become too separated and cannot be called as
a "web".

Moreover, deep linking is the basic requirement for bookmarking. Since
bookmarking is keeping the URL of a specific web page (or any other
resources), if the page itself do not have its own URL, there is no way
to bookmark it.

Search engines, which index the web pages like we bookmark them, require
heavily on deep linking too. Search engines find the links on a page and
follow the links to index the pages. Texts or other resources that can
only be triggered to shown by script will be ignored by (most of the)
search engines. So deep linking has its value of SEO.

To conclude, it is the matter of usability. Wherever the deep links are
presented, eg. bookmark menu, search results, they are more usable since
they are more likely to satisfy users' needs and nearly all web-related
software works with deep links since it is the architecture of the web.

The Situation of AJAX
---------------------

Since the contents of AJAX sites are loaded by script in client side,
they do not own a URL by default. ie. There is no deep link to that
loaded content. It is a product of what AJAX intended to do: to prevent
reloading of the whole page.

What is worse is when the user click the back button in the browser, the
page would not reload the previous content but go the page before
visiting the site. It is because the back button is implemented to track
the change of URL but not the change of content.

Most of the time it does not matter since the loaded content is very
small and subtle, for example validation of forms or log in result or
hot posts. They are not the main content of the page so no deep link is
reasonable.But if there are some cases that the main content is loaded
by AJAX, deep linking should be implemented.

* * * * *

How to Implement Deep Linking for AJAX
--------------------------------------

### Low Level Concept

There is a trick that use '\#' in the URL. The '\#' is known as a hash,
which is originally used for links that link to the same page. For
example:

    <a href="#C4">See also Chapter 4.</a>

The above link will link to the anchor tag with attribute 'name' equals
to 'C4'. When clicked, the page will scrolled to the element.

It is used for implementing deep linking for AJAX because the browser
would not refresh the page when the link is clicked.

What we need to do is when the page loaded, check the URL to see if
there is any hash value, do the loading if needed. After that, listen
for the change of the hash in the navigation bar. When it is changed,
get the value and do the according operation.

For the links, simply append some hash like 'http://someURL/\#info' to
let JavaScript to detect the values.

The above actions can be done trivially by using the following property:

    window.location.hash

### Use of Libraries

There are quite a few libraries for deep linking. They are already
stable and widely used in commercial projects. We can use these
libraries to avoid reinventing the wheel.

I coded two minimal demos for the two libraries (which are different
from below), which can be viewed at
<http://blog.onthewings.net/page/deep-linking-for-ajax-demo/>.

#### SWFAddress (<http://www.asual.com/swfaddress/>)

It is originally made for Flash, since Flash is facing the same deep
linking problem. The library is supporting both Flash and AJAX, sharing
the same core JavaScript to detect and change hash values.

The most simple example is first link the library in head:

    <script type="text/javascript" src="swfaddress/swfaddress.js"></script>

And then declare a function to handle the change of hash value and add
the listener.

    <script type="text/javascript">
    function handleChange(evt){
        if (evt.pathNames[0] == 'info'){
            //load info page
        } else if (evt.pathNames[0] == 'contact') {
            //load contact page
        } else {
            //load default page
        }
    }

    SWFAddress.addEventListener(SWFAddressEvent.CHANGE, handleChange);
    </script>

More examples can be found on
<http://www.asual.com/swfaddress/samples/>.

#### History, JQuery plug-in (<http://plugins.jquery.com/project/history>)

This is a the plug-ins written for jQuery.

To use it, similar to SWFAddress, first link to the JavaScript file
after jQuery:

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jquery.history.js"></script>

And then declare a function to handle the change of hash value. This
plug-in unlike SWFAddress, it do not auto listen the change of URL. So
we need to set up our own function to do so or as below bind the
function to the anchor tags.

    <script type="text/javascript">
    function pageload(hash) {
        if(hash) {
            //load some page
        } else {
            //load default page
        }
    }

    $(document).ready(function(){
        // Initialize history plugin.
        $.history.init(pageload);

        $("a").live("click",function(){
            if ($(this).attr("href").charAt(0) == '#'){
                var hash = $(this).attr("href");
                hash = hash.replace(/^.*#/, '');
                $.history.load(hash);
                return false;
            } else {
                return true;
            }
        })
    });
    </script>

* * * * *

Limitation
----------

Note that although using the above technique, the user can now bookmark
the deep link and using the 'back button' as normal, SEO problem is
still not solved. It is because the technique require use of JavaScript,
which is ignored by most of the search engines.

The workaround is making a non-AJAX version of the web site. Not only it
can solve the SEO problem, it can provide a fall-back when JavaScript is
disabled.

* * * * *

Reference
---------

-   "Deep Linking" in the World Wide Web, W3C  
    <http://www.w3.org/2001/tag/doc/deeplinking.html>
-   Deep Linking is Good Linking, useit.com  
    <http://www.useit.com/alertbox/20020303.html>
-   Deep Linking in Flash and AJAX Applications, Christian Cantrell  
    <http://weblogs.macromedia.com/cantrell/archives/2005/06/deep_linking_in.html>
-   Unique URLs - Ajax Patterns  
    <http://ajaxpatterns.org/Unique_URLs>
-   SWFAddress, Asual  
    <http://www.asual.com/swfaddress/>
-   History, JQuery Plug-in  
    <http://plugins.jquery.com/project/history>
-   Deep Linking, Wikipedia  
    <http://en.wikipedia.org/wiki/Deep_linking>

  [Deep Linking For Ajax Presentation]: http://www.slideshare.net/andy_li/deep-linking-for-ajax-presentation?type=powerpoint
    "Deep Linking For Ajax Presentation"
  [presentations]: http://www.slideshare.net/
  [andy\_li]: http://www.slideshare.net/andy_li
