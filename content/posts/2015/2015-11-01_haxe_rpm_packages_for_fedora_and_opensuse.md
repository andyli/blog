Title: Haxe RPM Packages for Fedora and openSUSE
Tags: Haxe, Fedora, openSUSE

After [polishing the Debian/Ubuntu .deb packages](this>2015/10/05/debian_package_and_ubuntu_ppa_for_haxe/), I'm now bringing Haxe to [Fedora](https://getfedora.org/) and [openSUSE](https://www.opensuse.org/), which are very popular Linux distros that use the .rpm package format.

## Haxe arrived in Fedora 23 and Fedora Rawhide  

There was an effort on bringing Haxe to Fedora back in 2008. Richard W.M. Jones, [who is an employee of Red Hat](https://rwmj.wordpress.com/about/), packaged [Neko 1.7.1](https://bugzilla.redhat.com/show_bug.cgi?id=460779) and [Haxe 2.0](https://bugzilla.redhat.com/show_bug.cgi?id=460780). However, only Neko was accepted. There was somehow nobody to review the Haxe package and it was abandoned years after it was submitted. The good thing is that the Neko package is properly maintained since then and Neko 2.0.0 is already available since 2013 (Thanks Richard!).

Went through the weeks-long [submission review process](https://bugzilla.redhat.com/show_bug.cgi?id=1270554), I am happy to announce that Haxe 3.2.1 is now accepted and available in Fedora 23, which will be released on the coming Tuesday (2015-11-03), and [Fedora Rawhide](https://fedoraproject.org/wiki/Releases/Rawhide), which is the current development version of Fedora. Install Haxe on Fedora is now as simple as `sudo dnf install haxe` (as usual, Neko as a dependency will be installed too).

I'm trying to submit Haxe to Fedora 22 too. A re-build of Neko is needed and it is [going through the update procedure](https://bodhi.fedoraproject.org/updates/FEDORA-2015-4fcff24184). Once the Neko update is available in Fedora 22, I will build and submit Haxe. You may check [this page](https://bodhi.fedoraproject.org/users/andyli) to follow the ongoing update activities.

## Submitting Haxe to openSUSE

For openSUSE, again there are nice people built a Haxe package. The status is pretty good: there are [Neko 2.0.0](https://build.opensuse.org/package/show/games/nekovm) and [Haxe 3.2.0](https://build.opensuse.org/package/show/games/haxe) in the Games Project in the openSUSE Build Service. However, they are not part of the official releases of openSUSE in the sense that users have to use `zypper addrepo ...` before `zypper install haxe`. It is kind of like using a PPA in Ubuntu. And Haxe definitely deserves its own project outside Games, since we have a lot of Haxe users building all kinds of good stuffs other than making games.

I've created a new project in the openSUSE Build Service, [devel:languages:haxe](https://build.opensuse.org/package/show/devel:languages:haxe), to provide dedicated maintenance. I've already built Neko 2.0.0 and Haxe 3.2.1 there, and they can be installed to openSUSE 13.1, 13.2, Leap 42.1, and Tumbleweed. I'm still working on the submission to openSUSE Factory (the repository of their releases), but you can already install the packages by following the instructions in the [haxe package page](https://build.opensuse.org/package/show/devel:languages:haxe/haxe) (click "Download package" at the top right corner).

## What's next?

Probably [Arch Linux](https://www.archlinux.org/) will be the next (and the last one in my current plan) Linux distro to receive official Haxe package. In fact, there are more Haxe users interested in using Arch Linux than Fedora and openSUSE combined, according to the Haxe usage survey I conducted recently. And talking about the survey, I'm working hard on polishing the data and plotting graphs using the Haxe Python target. The result will be published in this blog in the coming week, and I will present the analysis procedure as an example of using the Python target in [my talk in PyCon Hong Kong](http://2015.pycon.hk/schedule/topics/haxe-a-statically-typed-language-that-compiles-to-python-and-more/).