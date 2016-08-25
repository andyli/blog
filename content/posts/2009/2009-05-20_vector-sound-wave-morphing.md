Title: Vector Sound Wave Morphing
Date: 2009-05-20 06:53
Tags: 3D, CityU, experiment, Flash, Flex
Slug: vector-sound-wave-morphing

This my my final project for the course "Interactivity I". For this
final project, my aim is to explore the vector nature of sound wave
while making a tool to let people create their own waveform which can
then be saved for other use.

The waveform in the program consists of 10 control points. The first
point and the last point are fixed at zero so that the wave can be
looped smoothly to form a sound wave. The controls points can be
adjusted by dragging or by using keyboard. The points are assigned with
keys labelled near them, which are number keys (+shift to move points up
instead of down). I recommend using the keyboard as you may adjust
multiple points at the same time (which feels like using multitouch
surface 8-) ).

[Degrafa][] is used to construct the wave form. I choose to use cubic
bezier curve as it is easier for me to implement the algorithm (with the
still-in-beta [AdvancedCubicBezier][] which available via SVN).

The 3D cylinder is made by Flash Player 10's 3D API. It looks quite nice
as similar to landscapes.

Sound is synthesized dynamically in real-time (with some delay... okay?
;-) ). If you hear some "clicks" or "pops", try to export the sound
first by clicking on the export button at the bottom-right corner (it
will be in wav format, encoded by the [WavEncoder from popforge][]) .

If you hear nothing, you may try to increase the buffer size or use the
export function.

<object type="application/x-shockwave-flash" data="/files/2009/vectorsoundwave.swf" width="600" height="450" id="swf86781" style="visibility: visible;"><param name="wmode" value="opaque"><param name="menu" value="true"><param name="quality" value="high"><param name="bgcolor" value="#FFFFFF"><param name="allowScriptAccess" value="always"><param name="allowFullScreen" value="true"></object>

[source][]

  [Degrafa]: http://degrafa.org/
  [AdvancedCubicBezier]: http://algorithmist.wordpress.com/2009/01/19/degrafa-cubic-bezier-y-at-x/
  [WavEncoder from popforge]: http://code.google.com/p/popforge/source/browse/trunk/flash/PopforgeLibrary/src/de/popforge/format/wav/WavEncoder.as
  [source]: /files/2009/vectorsoundwave.zip
