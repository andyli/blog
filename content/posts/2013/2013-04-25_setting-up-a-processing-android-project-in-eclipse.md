Title: Setting up a Processing Android project in Eclipse
Date: 2013-04-25 04:32
Tags: Android, Java, Processing
Slug: setting-up-a-processing-android-project-in-eclipse

<span class="center">
![Processing, Android, Eclipse][]
</span>

[Processing][] is written in Java, and it plays very well with the
Android platform. Every serious programmer knows that the Processing IDE
is far from being a proper IDE, and the official Android IDE
is [Eclipse][], so we better stick to Eclipse.

To setup a Processing Android project in Eclipse, follow these steps:

1.  Setup a normal Eclipse Android
    project, such that we can run a simple hello world with a **blank
    activity**, targeting Android **API 10+**.
2.  Download Processing **2.0+**.
3.  Copy **android-core.zip** to the **libs** folder as
    **android-core.jar** inside our Eclipse Android project (Yes, rename
    to **.jar**).  
    The location of android-core.zip is:
    </p>
    -   For Processing 2.0 beta 9 and above, after installing the
        Android mode from within the Processing IDE,
        **Documents/Processing/modes/AndroidMode/android-core.zip**.
    -   For Processing 2.0 beta 8 and below, inside the Processing
        folder, **modes/android/android-core.zip**. For Mac, the
        Processing folder can be found by right-clicking Processing.app,
        show package contents, /Contents/Resources/Java.

4.  Right-click the Eclipse Android project, **properties**. Choose
    **Java Build Path**, under the **Libraries** tab, click **Add
    JARs...** button. Choose the **android-core.jar** we've copied in
    previous step.
5.  Modify the **MainActivity** class such that it
    extends **processing.core.PApplet** instead of android.app.Activity:
    
        ::java
        package net.onthewings.android; //the package of MainActivity

        import processing.core.*;

        public class MainActivity extends PApplet { //PApplet in fact extends android.app.Activity
            public void setup() {
                /*...*/
            }

            public void draw() {
                /*...*/
            }
        }

6.  Run the project and you should see a blank full screen app :)

Notice that it is not even necessary to use additional Eclipse plug-in
like [proclipsing][]. By coding in plain Java, we can mix the Processing
drawing API with the Android API easily. Additional Processing
Android details can be found at <http://wiki.processing.org/w/Android>.

  [Processing, Android, Eclipse]: /files/2013/android_processing_eclipse.png
  [Processing]: http://processing.org/
  [Eclipse]: http://www.eclipse.org/
  [proclipsing]: https://code.google.com/p/proclipsing/
