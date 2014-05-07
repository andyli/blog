Title: FLARtoolkit trick: use a colored marker
Date: 2009-05-23 10:40
Tags: FLARtoolkit, Flash, Pixel Bender, trick
Slug: flartoolkit-trick-use-a-colored-marker

[youtube]http://www.youtube.com/watch?v=DY7TPBRPpFI[/youtube]

Reasons why should we use colored marker instead of standard black and white only marker
----------------------------------------------------------------------------------------

### Using a black and white only marker is boring

There are more and more AR applications in the world, but seems
everybody use only the black square marker. May be the public is not yet
bored by the black square yet, but if can use other color for the
square, we can integrate the marker into real-life objects more
beautifully and more flexible.

### Increase marker detection performance

The internal algorithm of AR marker detection has a characteristic that,
the less pixels' color is the same of the marker, faster the detection
can be done. When we use black square marker, the detector will waste a
lot of time to process non-marker pixels as you can imagine that it is
common to have black objects in real-life (especially we the Chinese
people have black hair). So if we target less common color, the detector
will be able to ignore most of the non-marker area.

How to achieve this in FLARtoolkit
----------------------------------

We will create a custom detector class since we need to work at lower
level of the FLARtoolkit. If you have not look into the internal classes
of FLARtoolkit (because the [FLARmanager][] is so much easier to work
with ;-) ), there are two detectors: FLARSingleMarkerDetector and
FLARMultiMarkerDetector. As their names suggest, one is for single
marker detection and the other one can detect multiple markers. For
simplicity, I will go through only the single detection for a red marker
(if you want me to cover the other ones too, leave comment).

First we just copy all the codes inside FLARSingleMarkerDetector to a
new class, I named it FLARSingleRedMarkerDetector.

To detect markers, we use the detectMarkerLite method, which is:

    public function detectMarkerLite(i_raster:IFLARRgbRaster, i_threshold:int):Boolean

IFLARRgbRaster wraps a BitmapData, we can get it by:

    var srcImg:BitmapData = (i_raster as FLARRgbRaster_BitmapData).bitmapData;

Originally, the method uses a threshold filter to extract black areas
and give the result to other classes to process. As you might think of,
we can simply swap the filter code. Originally the black areas will be
turned to white pixels and others will be turned black and be ignored.
We now want to detect red markers, so just try to turn everything black
except the red regions to white. You may use ColorTransform if you want,
but I am now obsessed with PixelBender. My version of kernel is:

```pixelbender" escaped="true
kernel extractRedARMarker
<   namespace : "net.onthewings.filters";
    vendor : "Andy Li";
    version : 1;
    description : "used for FLARtoolkit, pre-proccess for red marker.";
>
{
    input image4 src;
    output pixel4 dst;

    parameter float threshold<
        minValue: 0.0;
        maxValue: 1.0;
        defaultValue: 0.4;
        description:"decrease to increase likelihood of marker detection.";
    >;

    void
    evaluatePixel()
    {
        float4 p = sampleNearest(src,outCoord());
        float sum = p.r+p.g+p.b;
        float val = p.r - (p.g + p.b)*0.5;

        if (val+(1.0-(sum/3.0))*0.1 <= threshold) {
            val = 0.0;
        } else {
            val = 1.0;
        }
        dst = float4 (val,val,val,1);
    }
}
```

Note that I let the dark red pass the threshold easier since I find it
is common the web cam image is too dark.

To use the finished detector class:

```actionscript
tempFLARRgbRaster_BitmapData.bitmapData.draw(videoDisplay);
if (detector.detectMarkerLite(tempFLARRgbRaster_BitmapData,170)){
    detector.getTransformMatrix(lastDetectionResult);
    //FLARPVGeomUtils is from FLARmanager
    overlay3dObj.transform = FLARPVGeomUtils.convertFLARMatrixToPVMatrix(lastDetectionResult);
    overlay3dObj.visible = true;
} else {
    overlay3dObj.visible = false;
}
render();
```

Now you get all the concepts. So let's skip all the boring stuff and
[see it in action][]. Or [get the finished codes][].

Happy AR!

* * * * *

Update: Here I have a PB kernel that works with any color. [Try it][]!

</p>

  [FLARmanager]: http://words.transmote.com/wp/20090328/flarmanager-v03/
  [see it in action]: http://www.onthewings.net/
  [get the finished codes]: http://blog.onthewings.net/wp-content/uploads/2009/05/redmarkerdetection.zip
  [Try it]: http://blog.onthewings.net/2009/12/10/chroma-key-and-thresholding-in-flash-pixel-bender-revised/
