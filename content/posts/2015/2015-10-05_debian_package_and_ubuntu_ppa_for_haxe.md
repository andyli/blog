Title: Debian Package and Ubuntu PPA for Haxe
Tags: Haxe, Debian, Ubuntu

Since the previous month I've been working on Haxe to bring better supports for Debian/Ubuntu. There are still some tasks I would like to work on, but there are already some good stuffs that I want to let you know.

## About Debian and Ubuntu

For people who don't familiar with the Linux world, let me quickly introduce what are Debian and Ubuntu.

Due to the free and open source (FOSS) nature of Linux, there exist a lot of different versions (known as distributions) of Linux, created by different people with different goals. [Debian](https://www.debian.org/) is one of the earliest and largest (most packages available) distributions. One of the most well-known distributions based on Debian is [Ubuntu](http://www.ubuntu.com/), which also has a lot of downstream projects based on it, e.g. [Linux Mint](http://linuxmint.com/).

Both Debian and Ubuntu, together with most of the distributions that based on them, use the .deb file format for packaging software. The Debian project maintains a set of package repositories, which are also used by Ubuntu. Only the approved members can upload packages to those repositories. People who are not Debian developers/maintainers, but want to add or update a Debian package have to file a packaging request, or to go through its [sponsorship/mentoring](http://mentors.debian.net/) process. The concept is similar to git, in which a project owner merge pull requests to accept contribution.

## Updating the Debian Haxe package

Long time ago there are some volunteers who packaged Haxe and Neko and had them uploaded to Debian. But sadly they have moved on and orphaned the packages. The Haxe package stayed in Haxe version 3.0.0, for 2 years since 2013. The Neko package was built with Neko 2.0.0, which is the latest stable release. However, there was a critical bug related to JIT in the Neko package, leading to [haxelib being unusable in the 32 bit platforms](https://bugs.launchpad.net/ubuntu/+source/haxe/+bug/1251221).

Instead of waiting for another volunteer to update the package for us, I stepped in on behalf of the Haxe Foundation and have taken over the maintenance of the packages by going through its sponsorship/mentoring process. It was not trivial since I didn't have much knowledge on Debian packaging, but eventually I've updated the Haxe package to provide Haxe 3.2.0, and the Neko package to include the JIT bug fix.

Debian packages being accepted will be available in the unstable repo at first. If there is no bug being reported in 10 days, the packages will be automatically synced to the testing repo, in which the next stable release of Debian will be based on. Our updated Haxe package [has already been synced to testing](https://packages.debian.org/stretch/haxe). The updated Neko package [is still in unstable only](https://packages.debian.org/sid/neko), and will be synced to testing in 2 days.

If you have a Debian stable release installed, and want to try out the updated Haxe and Neko packages in the testing/unstable repo, consult the [APT Preferences article](https://wiki.debian.org/AptPreferences). If you're using Ubuntu, we have an easier option for you: Personal Package Archives (PPA).

## Ubuntu PPA

[Personal Package Archives](https://help.launchpad.net/Packaging/PPA) (PPA) as its name suggests, is a personal (third party) repository. Once a PPA is added to a system, the system can obtain software packages provided by the PPA via the standard apt-get command. Compared to the configuration required to get packages from Debian testing/unstable, using a PPA is much easier.

I've created an official [launchpad account for the Haxe Foundation](https://launchpad.net/~haxe/). In its [stable releases](https://launchpad.net/~haxe/+archive/ubuntu/releases) repository, the latest versions of Haxe and Neko are provided to all the currently supported Ubuntu versions, which includes Ubuntu 12.04, 14.04, and 15.04. It also provides packages for the upcoming Ubuntu 15.10, which is scheduled to be released on 22nd Oct.

To use the PPA, run the commands as follows:
```
sudo add-apt-repository ppa:haxe/releases -y
sudo apt-get update
sudo apt-get install haxe -y
mkdir ~/haxelib && haxelib setup ~/haxelib
```
The `-y` options above suppress confirmation messages.

I've mentioned another [PPA provided by eyecreate](https://launchpad.net/~eyecreate/+archive/ubuntu/haxe) the first time [I wrote about TravisCI](http://blog.onthewings.net/2013/03/19/automated-unit-testing-for-haxe-project-using-travis-ci/). It was the best PPA available to obtain Haxe on Ubuntu, and he quickly updated the package every time we had a new Haxe release (Thanks!). However, if you're using eyecreate's PPA, I would recommend switching to the Haxe Foundation's. It is because our packages are built as similar to the Debian ones as possible, such that it is easy to switch to use the Debian/Ubuntu ones when they're provided by the next stable releases of Debian/Ubuntu. Moreover, security-wise, it is always safer to use the "official" PPAs for any software.

## What's next?

With the updated Debian package and official Haxe Foundation PPA, it is much easer for the Debian/Ubuntu guys to use Haxe. I will continue to package Haxe for other OSes, e.g. [Fedora](https://getfedora.org/), which uses the .rpm format instead of the Debian .deb format. I also plan to add another PPA to provide automated snapshot builds of the Haxe development branch, which will let us test with the latest commits much easier.
