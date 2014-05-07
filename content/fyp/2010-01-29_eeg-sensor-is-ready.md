Title: EEG sensor is ready
Date: 2010-01-29 02:43
Category: FYP
Slug: eeg-sensor-is-ready

The [emotiv][] EEG sensor is arrived. I have roughly tested it and
everything is fine.

The SDK only runs in Windows but the project is targeting Ubuntu(because
PS3Eye driver in Windows only support 2 instances but I need 4). So the
sensor will be run inside a virtual machine(Vista, using [VirtualBox][])
so that I can use it. After some configuration, the sensor is now
successfully connected and running via the above method.

I am planning to write a simple socket app to stream the EEG data back
to the OpenFrameworks app in Ubuntu.

  [emotiv]: http://emotiv.com/
  [VirtualBox]: http://www.virtualbox.org/
