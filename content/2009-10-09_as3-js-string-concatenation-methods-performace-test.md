Title: AS3/JS string concatenation methods performace test
Date: 2009-10-09 23:25
Tags: experiment, Flash, JavaScript
Slug: as3-js-string-concatenation-methods-performace-test

When writing [BrainFlash][], I was thinking if the string concatenations
for program output will slow down the whole interpreter. That is because
I was once hit that a year ago when dealing with XML.

I asked for better handling methods over [StackOverflow][]. It is
interesting that some of the answers shown that using "+=" is already
the fastest. But I still want to know more about that, so I wrote my own
simple testing program, which is below:

### ActionScript version

<object type="application/x-shockwave-flash" data="http://blog.onthewings.net/wp-content/uploads/2009/10/test.swf" width="600" height="400" id="swf0a0b1" style="visibility: visible;"><param name="wmode" value="opaque"><param name="menu" value="true"><param name="quality" value="high"><param name="bgcolor" value="#FFFFFF"><param name="allowScriptAccess" value="always"><param name="allowFullScreen" value="true"></object>

[source code][]

Methods used are:

1.  str += concateString;
2.  str = str.concat(concateString);
3.  array.push(concateString); ... str = array.join("");
4.  vector.push(concateString); ... str = vector.join("");
5.  byteArray.writeUTFBytes(concateString); ... str =
    byteArray.readUTFBytes(byteArray.length);
6.  byteArray.writeMultiByte(concateString,"us-ascii"); ... str =
    byteArray.readMultiByte(str.length,"us-ascii");

The result shows that fastest method is using `+=`, but using
Array/Vector is still very close to it. Using ByteArray is slow and with
ASCII instead of UTF-8 is even slower...

And all the methods are performed reasonably fast, what is slow is when
showing the resulting string on TextArea... It takes a few seconds! But
when it is drawn, run it again and it will become normal speed, maybe
there is some caching?

### JavaScript version

I coded a JavaScript port too. [See it here.][]

Methods used are:

1.  str += concateString;
2.  str = str.concat(concateString);
3.  array.push(concateString); ... str = array.join("");

Interesting enough, the result is very similar to AS3. It is the
opposite of what we believe using the Array trick will let it performs
faster. `+=` is the fastest in most cases, if not, that's not much
difference.

I've only tested in IE8(Win), Firefox 3 (Win/Mac), Safari 4 (Win/Mac),
Chrome 3 (Win). The really really really interesting part is in Chrome
3, using the concat method of String is x7000 SLOWER than the other
two!! What are your results?

  [BrainFlash]: http://blog.onthewings.net/2009/10/08/brainflash-the-as3-brainfuck-interpreter/
  [StackOverflow]: http://stackoverflow.com/questions/1536260/string-concatenation-is-extremly-slow-when-input-is-large
  [source code]: http://blog.onthewings.net/wp-content/uploads/2009/10/test.zip
  [See it here.]: http://blog.onthewings.net/wp-content/uploads/2009/10/string-concatenation-methods-performace-test.html
