Title: Colorblink - An AIR app that simulates how color blind people see Flash and images
Date: 2010-02-19 20:55
Tags: Flash, Flex, Pixel Bender, web usability design and engineering
Slug: colorblink-an-air-app-that-simulates-how-color-blind-people-see-flash-and-images

[caption id="attachment\_718" align="alignleft" width="450"
caption="Select color blind type from the menu."][![][]][][/caption]

Accessibility is a an important part of both web and game design. And
for web and game design, one of the popular tool is Flash. That means
very often you need to ensure accessibility in Flash. However there are
still not many tools available even for simple things like color blind
simulation... so I write my own:)

[\>\> download installer (.air)][]

It's a very simple AIR app. You open it, drop a swf file on its window,
select the color blind type and that's it.

The inner of Colorblink is using a Pixel Bender filter, applying to the
whole application. The algorithm is just a color transform matrix, found
in [a Java Color-Blindness Simulators][]. That simulator have more
simulation config, which I used only the simplest one.

This is also my first time using a git repo. So [go to have a look][],
see if you can fork it for more features.

<span style="text-decoration:line-through">One thing is, there is
problem loading Flex applications into Colorblink... I don't know how to
read the loaded app's default width and height and then resize it... So,
if you want to test your Flex app, [get the filter][] and apply it to
your app manually (can't be easier).</span>  
Now you can load Flex swf or even html file! But the app wouldn't
resize automatically since the size cannot be determined. If Colorblink
does not work for you, you can still always [get the filter][] and apply
it to your app manually (can't be easier).

Oh, yes, there is a simulation of what a dog sees... So, design some
game for your dogs in your free time...

  []: http://blog.onthewings.net/wp-content/uploads/2010/02/colorblink-demo-450x364.png
    "Colorblink demo"
  [![][]]: http://blog.onthewings.net/wp-content/uploads/2010/02/colorblink-demo.png
  [\>\> download installer (.air)]: http://github.com/andyli/Colorblink/raw/master/Colorblink.air
  [a Java Color-Blindness Simulators]: http://homepage.mac.com/lpetrich/ColorBlindnessSim/ColorBlindnessSim.html
  [go to have a look]: http://github.com/andyli/Colorblink
  [get the filter]: http://github.com/andyli/Colorblink/tree/master/src/net/onthewings/filters/
