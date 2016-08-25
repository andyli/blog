Title: The right way to work with a web service
Date: 2009-02-23 00:51
Tags: web 2.0
Slug: the-right-way-to-work-with-a-web-service

Mash-up is certainly a big feature of web 2.0. It make use of different
open web services to create creative apps, or even artworks. But
creative is creative, "hacking" open APIs with some way might not be so
appropriate.

Let say here is a blogging API
------------------------------

The API lets people write and read blogs in the server. For security
reason, the web service do not allow HTML appears in the post content.
Certainly, as a user, we hate this feature since plain text is boring
and a text-only blog is likely nobody would like to read. So, developers
(and even bloggers) will try their best to create some workarounds.

One developer thinks that he might encode the blog content in his
software before sending to the web service, so the server will not
recognize the HTML stuff and store the whole content. When retrieving
back, the content is decoded before showing up to the users.

What's wrong?
-------------

Firstly, the security problem that "patched" by filtering out HTML is
come back again, like we are back to the starting point. Secondly, since
the API is open, that means there are other software/programs that will
make use of the API, and they all do not know the decoding method used
by the developer. So, the end users of that developer's software will be
likely blogging encoded posts that no one can read without using the
same software. Thirdly, this may break the terms of use of the API.

There is no hope in that case?
------------------------------

If you want HTML, no, there is no hope. But you might still implement
other methods to work with the API.

For example, Twitter is very similar to this case, micro blogging with
plain text, but there is [TwitPic][], which store the picture in other
server and insert the link of the picture to the tweet. Users of TwitPic
is certainly seeing their picture displayed beautifully. And the normal
Twitter users can still see the picture by clicking on the links. The
idea is similar to "graceful degrading".

  [TwitPic]: http://twitpic.com/
