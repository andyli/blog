Title: 6÷2(1+2)=?
Date: 2011-05-02 03:03
Slug: six-divided-by-two-bracket-one-plus-two

> 6÷2(1+2)=?

It's a question that comes around in Facebook recently (I've also read
it somewhere in the past). There are two major answers: "1" and "9".

For "1", (Assuming “multiplication by juxtaposition” has higher
precedence than regular division. Whether the assumption is true, is
depending on which literature is being referred to. If you don't agree
on it, the answer is simply 9)

6÷(2×(1+2))  
=6÷(2×3)  
=6÷6  
=1

For "9",

6/2\*(1+2)  
=6/2\*3  
=3\*3  
=9

Notice the question is interpreted differently, you can tell it from
looking at the symbols. One is mathematical notation, another is program
operator notation.

The difference between mathematics and programming shown above is that,
they use different kind of symbols(operators), so they have different
[order of operation][].

<div style="display:block; width:100%; height:300px;">

[caption id="attachment\_1008" align="alignleft" width="200"
caption="Google thinks that is 9.   
[Check it yourself.][]"][![][]][][/caption]

[caption id="attachment\_1009" align="alignleft" width="200"
caption="WolframAlpha thinks that is 9.   
[Check it yourself.][1]"][![][2]][][/caption]

[caption id="attachment\_1010" align="alignleft" width="200" caption="My
Casio calculator thinks that is 1."][![][3]][][/caption]

</div>

One interesting thing is, even in programming, different programming
languages may have different order of operation, ie. they have different
operator precedence (or [operator associativity][]). The difference is
mostly on bitwise operations(eg. **\<\<** **&** **|**), and it has been
a nightmare for programmers who want to port algorithms between
languages. And luckily [haXe][], the language I'm in love with, that
outputs C++/JS/PHP and others, already abstracted the different by
inserting the necessary brackets in the output automatically([see
here][]). So I'm happily writing codes in haXe and share the same result
in different platforms ;)

  [order of operation]: http://en.wikipedia.org/wiki/Order_of_operations
  [Check it yourself.]: http://www.google.com.hk/search?q=6%C3%B72(1%2B2)
  []: http://blog.onthewings.net/wp-content/uploads/2011/05/google-200x200.png
    "Google search result of "6÷2(1+2)""
  [![][]]: http://blog.onthewings.net/wp-content/uploads/2011/05/google.png
  [1]: http://www.wolframalpha.com/input/?i=6%C3%B72%281%2B2%29
  [2]: http://blog.onthewings.net/wp-content/uploads/2011/05/wolframalpha-200x200.png
    "WolframAlpha result of "6÷2(1+2)""
  [![][2]]: http://blog.onthewings.net/wp-content/uploads/2011/05/wolframalpha.png
  [3]: http://blog.onthewings.net/wp-content/uploads/2011/05/IMG_20110502_022439-200x200.jpg
    "Casio calculator's result on "6÷2(1+2)""
  [![][3]]: http://blog.onthewings.net/wp-content/uploads/2011/05/IMG_20110502_022439.jpg
  [operator associativity]: http://en.wikipedia.org/wiki/Operator_associativity
  [haXe]: http://haxe.org/
  [see here]: http://haxe.org/manual/operators
