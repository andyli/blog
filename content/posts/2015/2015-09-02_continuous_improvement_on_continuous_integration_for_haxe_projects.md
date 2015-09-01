Title: Continuous Improvement on Continuous Integration for Haxe Projects
Tags: Haxe, CI

Things have been moving fast! Since I have written about Travis CI the first time [around 2 years ago](this>2013/03/19/automated-unit-testing-for-haxe-project-using-travis-ci/), there are many news and improvements regarding to using CI services for Haxe projects.

## WWX 2015 presentation

The video of my WWX 2015 talk, ["Continuous Integration for Haxe Projects"](http://www.silexlabs.org/continuous-integration-for-haxe-projects/), was released a few days ago. The key idea of my talk is that, CI is surprisingly easy to set up. We don't even have to write tests - we can simply let the build service compile our code, and the mighty Haxe compiler is already able to catch all kinds of errors for us. I've also demonstrated how to set up Travis CI and AppVeyor for a hello world project. Additional links and details can be found in [the slides](https://docs.google.com/presentation/d/1AcqUbB_Zn5dQyxpv9BYokOXMPuEcYEXMA7w6E50kpNo/edit?usp=sharing).

<style>
.wrapper_16-9 {
	position: relative;
	padding-bottom: 56.25%;
	padding-top: 25px;
	height: 0;
}
.wrapper_16-9 iframe {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
}
</style>
<div class="wrapper_16-9">
<iframe width="854" height="480" style="width:" src="https://www.youtube.com/embed/ZYMyvkrownQ" frameborder="0" allowfullscreen></iframe>
</div>

## Built-in Haxe support in Travis CI

As mentioned in my talk, earlier this year we've contributed [Haxe support in Travis CI](http://blog.travis-ci.com/2015-04-07-haxe-now-available-on-travis-ci/) as one of its "community-supported languages". Since then using Haxe in Travis CI is easier than ever. No need to figure out how to use a PPA or to use a install script. Just specify in `.travis.yml` that we want to use Haxe and optionally what version(s) we what to use as follows:

```yml
language: haxe
haxe:
  - "3.2.0"
  - development
```

## Multi-OS testing

Previously [Travis CI's multi-OS feature](http://docs.travis-ci.com/user/multi-os/) is limited to selected repositories. One has to ask their staff to manually turn it on for specific Github repositories. Earlier this week, Travis CI made their multi-OS feature publicly available. It means that we can now test on both Linux (Ubuntu) and Mac OSX by adding an `os` section in `.travis.yml` as follows:

```yml
os:
  - linux
  - osx
```

Windows testing can be done on [AppVeyor](http://www.appveyor.com/). Although Haxe is not pre-installed in AppVeyor's environment, and there is no such concept of "supported languages", we can still [install Haxe easily using Chocolatey](this>2015/01/28/installing-haxe-on-windows-using-chocolatey/) in the `install` section of `appveyor.yml`:

```yml
install:
  - cinst haxe -version 3.2.0 -y
  - RefreshEnv
  - mkdir C:\projects\haxelib
  - haxelib setup C:\projects\haxelib
```

By the way, AppVeyor has also rolled out [a faster build environment](http://www.appveyor.com/blog/2015/06/23/new-oss-build-environment-and-xamarin-support), which is used by default for new free OSS accounts. The old environment was super slow that it was a pain to build hxcpp projects in it. With the new environment, building on AppVeyor is now as fast as using local machine or using Travis CI.

## More docs and samples

I've created a Github repository, [HaxeCI](https://github.com/andyli/HaxeCI), as an example of using CI for a Haxe project. As of writing, it contains configurations for Travis CI and AppVeyor. It also demonstrates how to build and run for each of the Haxe targets in the CI environments. (Thank [Andreas](https://github.com/ciscoheat) for the contributions regarding to the PhantomJS and Flash testing!)

If you haven't started using CI, NOW is the best time to check it out!
