Title: Usability, accessibility and SEO of Flash-only website
Date: 2008-09-16 03:08
Tags: Flash, web usability design and engineering
Slug: usability-and-accessibility-of-flash-only-website

I wanna blog about this because I always use Flash and building
websites.

Usability, accessibility and SEO of a website are becoming a great
concern these days while Flash/Flex technology is becoming a big big
part of the web. Flash contents are always said to be bad for usability,
accessibility and SEO, e.g. not search engine friendly, can't be easily
read by other programs that even making a lot of browser functions dead,
large file size... But wait, are all of these still be true NOW?

Here are some misunderstanding or not-updated thoughts on Flash content
(especially Flash-only website):

#### Flash contents cannot be crawled and indexed by search engines

Wrong! Google has already announced that they can now index Flash
contents (including those dynamic text fields!).  
Ref: Official Google Webmaster Central Blog:
<http://googlewebmastercentral.blogspot.com/2008/06/improved-flash-indexing.html>

#### Flash-only websites make browser's back button not usable

The back buttons (also history and bookmark) are still alive on
Flash-only websites as the website use SWFAddress - using a technique
called deep-linking (also can be used in AJAX).  
Ref: SWFAddress official website: <http://www.asual.com/swfaddress/>

#### Flash contents are having large file size

The large file size is mostly cause by embedding images or other media
files, not the swf itself. If you use many images in your html site, it
still needs plenty of time to load. Actually, comparing to JavaScript,
the file size of the scripting part may be even smaller and load/run
faster when we use AS3, since they are all complied.
