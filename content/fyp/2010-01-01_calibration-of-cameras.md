Title: Calibration of cameras
Date: 2010-01-01 04:33
Category: FYP
Slug: calibration-of-cameras

+--------------------------------------+--------------------------------------+
| <p>                                  | <p>                                  |
| [caption id="attachment\_653"        | [caption id="attachment\_655"        |
| align="alignnone" width="320"        | align="alignnone" width="320"        |
| caption="Camera 0: 2.1mm lens, no    | caption="Camera 1: 2.1mm lens, no    |
| filter(visible+IR                    | filter(visible+IR                    |
| light)"][![][]][][/caption]          | light)"][![][1]][][/caption]         |
+--------------------------------------+--------------------------------------+
| <p>                                  | <p>                                  |
| [caption id="attachment\_654"        | [caption id="attachment\_656"        |
| align="alignnone" width="320"        | align="alignnone" width="320"        |
| caption="Camera 2: OEM               | caption="Camera 3: OEM               |
| lens(\~3.6mm), 850nm filter(IR       | lens(\~3.6mm), 850nm filter(IR       |
| lights)"][![][2]][][/caption]        | lights)"][![][3]][][/caption]        |
+--------------------------------------+--------------------------------------+

Above are 4 images taken at the same time via the app I wrote in
OpenFrameworks. All the cameras are aligned on the same horizontal
alignment and placed on top of the one-way mirror. I have switched on
two IR lamps to assist the calibration process, which will be off when
running the final app. The chessboard pattern was detected using OpenCV,
marked with colors.

There is a problem that I'm using IR filters (on camera 2 and 3) that
the camera mounts do not fit, so the images are blurred, affecting the
detection. I've ordered the correct lens mounts to replace, and they
should be ready next week...

+--------------------------------------+--------------------------------------+
| <p>                                  | <p>                                  |
| [caption id="attachment\_658"        | [caption id="attachment\_657"        |
| align="alignnone" width="320"        | align="alignnone" width="320"        |
| caption="3D glasses with IR LEDs on  | caption="The IR LEDs shown on camera |
| the sides"][![][4]][][/caption]      | 2."][![][5]][][/caption]             |
+--------------------------------------+--------------------------------------+

Camera 2 and 3 will be used for head tracking, which I decide to use IR
LEDs placed on left and right side of the glasses the user will put on.

The LEDs are diffused by sanding them with sand paper. The method is
found from [here][].

  []: http://blog.onthewings.net/wp-content/uploads/2010/01/0-00.jpg
    "0-00"
  [![][]]: http://blog.onthewings.net/wp-content/uploads/2010/01/0-00.jpg
  [1]: http://blog.onthewings.net/wp-content/uploads/2010/01/0-10.jpg
    "0-10"
  [![][1]]: http://blog.onthewings.net/wp-content/uploads/2010/01/0-10.jpg
  [2]: http://blog.onthewings.net/wp-content/uploads/2010/01/0-01.jpg
    "0-01"
  [![][2]]: http://blog.onthewings.net/wp-content/uploads/2010/01/0-01.jpg
  [3]: http://blog.onthewings.net/wp-content/uploads/2010/01/0-11.jpg
    "0-11"
  [![][3]]: http://blog.onthewings.net/wp-content/uploads/2010/01/0-11.jpg
  [4]: http://blog.onthewings.net/wp-content/uploads/2010/01/P1040678-450x337.jpg
    "3D glasses"
  [![][4]]: http://blog.onthewings.net/wp-content/uploads/2010/01/P1040678.jpg
  [5]: http://blog.onthewings.net/wp-content/uploads/2010/01/Image.jpg
    "head tracking"
  [![][5]]: http://blog.onthewings.net/wp-content/uploads/2010/01/Image.jpg
  [here]: http://www.instructables.com/id/how-to-defuse-an-LED/
