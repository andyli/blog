Title: Head tracking
Date: 2010-04-14 23:46
Category: FYP
Slug: head-tracking

The positions of the tracked IR LEDs which represent the
head position can be streamed to the haXe rendering program via TCP
socket. The position data is paired with the reconstructed 3D mesh.

The virtual cameras now can be controlled by the IR LEDs and creating a
sense of 3D by moving the LEDs relative to the mirror. Some more camera
facing problem need to be solve and the output image needs to be
distorted according to the head position. The distortion code has
already been created but not yet integrated to the haXe program.

However, my old projector is suddenly out of order, seems that the lamp
inside need to be replaced. Because of this, I cannot test the result
with the whole set up at this moment. I will borrow a projector tmr and
post some result if it is ok.
