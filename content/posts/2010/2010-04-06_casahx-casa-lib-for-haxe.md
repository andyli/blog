Title: CasaHx - CASA Lib for haXe
Date: 2010-04-06 21:13
Tags: Haxe
Slug: casahx-casa-lib-for-haxe

I've mentioned that I was porting [CASA Lib for AS3][] to haXe in the
last blog post. I'm happy to tell you that it is finished and has been
uploaded to [haxelib][].

If you're not familiar with it, it has a set of display object classes
that have build in methods for removing all listeners/all children, and
a destroy method that do that all in once. There are also simple
tweening classes, layout helper and a huge set of utilities.

I try to make all the classes as cross-target as possible so that you
can use it in JS/C++/PHP/Neko (some of them need nme/neash/canvas-nme).

With haXe's `using` keyword, the utility classes are even sweeter than
the AS3 version. Let's take an example form the official
documentation(in AS3):

```actionscript3
var people:Array = new Array( {name: "Aaron", sex: "Male", hair: "Brown"},
                {name: "Linda", sex: "Female", hair: "Blonde"},
                {name: "Katie", sex: "Female", hair: "Brown"},
                {name: "Nikki", sex: "Female", hair: "Blonde"}  );

var person:Object = ArrayUtil.getItemByKeys(people, {sex: "Female", hair: "Brown"});
trace(person.name); // Traces "Katie"
```

Now you can write it in haXe in this way:

```haxe
using org.casalib.ArrayUtil;

var people = [  {name: "Aaron", sex: "Male", hair: "Brown"},
        {name: "Linda", sex: "Female", hair: "Blonde"},
        {name: "Katie", sex: "Female", hair: "Brown"},
        {name: "Nikki", sex: "Female", hair: "Blonde"}  ];

var person = people.getItemByKeys({sex: "Female", hair: "Brown"});
trace(person.name); // Traces "Katie"
```

Note that with `using`, auto-completion can also show the added methods
(from `ArrayUtil`, for the above example).

I've also typed all the methods. That means, for
`ArrayUtil.getItemByKeys()` with a `Array<Point>` input, its output will
be typed as `Point`. Nice feature of haXe isn't it?

PS. Aaron Clinger, the author of CASA Lib, has found me some days ago.
He is very nice that may put CasaHx as the official branch of CASA Lib
when it is mature enough :)

  [CASA Lib for AS3]: http://casalib.org/
  [haxelib]: http://lib.haxe.org/p/casalib
