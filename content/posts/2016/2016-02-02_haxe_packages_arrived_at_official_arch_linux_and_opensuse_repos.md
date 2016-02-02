Title: Haxe packages arrived at Official Arch Linux and openSUSE Repositories
Tags: Haxe, Arch Linux, openSUSE

Yes, our Haxe and Neko packages have arrived at official Arch Linux and openSUSE repositories!

## Haxe in the Arch Linux "community" repository

There were already nice Haxe and Neko packages existed in the [Arch User Repository (AUR)](https://aur.archlinux.org/), which is somewhat like a Ubuntu PPA, except that AUR stores only source tar balls. It means that people using the AUR will still have to get the tar balls and then build the packages. It is, therefor, time-consuming.

The Haxe and Neko packages are now moved to ["community"](https://wiki.archlinux.org/index.php/official_repositories#community), which is one of the Arch Linux official repositories, which stores both source and binary packages. The Arch Linux package management tool, pacman, can directly install built packages from those official repositories. Therefor, installing Haxe and Neko is now as easy as issuing a single command: `sudo pacman -S haxe`.

Packages in the "community" repository can only be submitted and maintained by ["Trusted Users"](https://wiki.archlinux.org/index.php/Trusted_Users). The Haxe and Neko packages are kindly maintained by [Alexander Rødseth](https://aur.archlinux.org/account/xyproto). I will also try assist him to update the packages when new versions are released.

## Haxe in openSUSE Factory

I've created a [devel project](https://build.opensuse.org/project/show/devel:languages:haxe) for Haxe in the openSUSE Build Service [as mentioned previously](this>2015/11/01/haxe_rpm_packages_for_fedora_and_opensuse/). People can use that to install Haxe and Neko packages on openSUSE, but they were not openSUSE official packages.

After months of submissions and revisions, the Haxe and Neko packages are now accepted into [openSUSE Factory](https://en.opensuse.org/Portal:Factory). It means that if you're using Tumbleweed, openSUSE's rolling release, you will be able to install Haxe and Neko simply by `sudo zypper install haxe`.

## Haxe ♥ Linux

As of now, we've packages for Debian, Ubuntu, Fedora, openSUSE, and Arch Linux. All the info and installation instructions of the Haxe Foundation maintained packages are documented in the [haxe.org Linux Software Packages page](http://haxe.org/download/linux).

According to the [Haxe usage survey](this>2015/11/14/haxe_usage_survey/), we covered most users' need. We will provide packages for other Linux distros when they become popular. If you want to create Haxe packages for other distros, go ahead and [let us know](https://github.com/HaxeFoundation/haxe/issues) when you've any question.
