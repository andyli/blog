Title: Automated unit-testing for Haxe project using Travis-CI
Date: 2013-03-19 05:08
Tags: Haxe
Slug: automated-unit-testing-for-haxe-project-using-travis-ci

### What is Travis-CI?

[Travis-CI][] is "a hosted continuous integration service for the open
source community". It is tightly integrated with [github][], once we
enabled its commit hook, whenever there is a new commit, or a pull
request, on any branch, it will automatically build and run the unit
test and notify us any problem respecting to certain commits.

### Why use it?

It gives us an extra level of safety, which safety is what we Haxe users
love, after all that's one of the reasons to use a strictly typed
language over a dynamic one. Travis-CI's unit test on pull request is
particularly useful, which we can instantly identify on the github pull
request page any incoming changes that breaks our specification.

And did I mention this great hosted service is in fact free for open
source projects?

### How to use it?

All we have to do is to toggle the repo on in the Travis-CI accounts
control panel, and then commit a **.travis.yml** in the root directory.

Here is an example **.travis.yml **that test C++, Neko and PHP targets:

```yaml
# The first thing is to tell which VM environment we want the test to be run on.
# It dosen't quite matter for Haxe, just choose one of the targets our project support (e.g. PHP),
# and than apt-get install the others (e.g. Neko, C++).
# For more info, see http://about.travis-ci.org/docs/user/ci-environment/
language: php

# Install Haxe before running the test.
before_script:
  - sudo apt-get update                                # run update before installing anything
  - sudo apt-get install python-software-properties -y # for the next command
  - sudo add-apt-repository ppa:eyecreate/haxe -y      # add the ubuntu ppa that contains haxe
  - sudo apt-get update                                # pull info from ppa
  - sudo apt-get install haxe -y                       # install haxe (and neko)
  - sudo apt-get install gcc-multilib g++-multilib -y  # VM is 64bit but hxcpp builds 32bit
  - mkdir ~/haxelib                                    # create a folder for installing haxelib
  - haxelib setup ~/haxelib
  - haxelib install hxcpp                              # install hxcpp to test C++ target
  - mkdir bin                                          # create an output folder if needed

# Run the test!
script:
  - haxe travis.hxml
```

Note that at the time of writing, Travis-CI is running 64bit Ubuntu 12.4
VMs, and the ppa we used above will install Haxe 3.0RC and Neko 2.0.

Every command specified in the "script" section is actual test and
**should exit with code 0 if it pass or non-0 if fail**. The above
example simply try to compile the project. We can
specify subsequent command to run a Haxe written test case, which we can
use `Sys.exit(allPass
? 0 : 1)` to properly inform the test result.

Finally, we can check the repo page on Travis-CI for the test result. By
default, if the test failed, [an email will be sent][] to the commit
author and the committer.

### Existing Haxe project using Travis-CI

Some Haxe projects have been using the Travis-CI service for some time,
for example [flambe][], [HaxePunk][] and [Ash-HaXe][]. We will soon
re-enabled the TravisCI test of [NME][] too! Hope it will help Haxe to
become more solid every day, every commit ;)

  [Travis-CI]: http://about.travis-ci.org/docs/
  [github]: https://github.com/
  [an email will be sent]: http://about.travis-ci.org/docs/user/notifications/
  [flambe]: https://github.com/aduros/flambe
  [HaxePunk]: https://github.com/MattTuttle/HaxePunk
  [Ash-HaXe]: https://github.com/nadako/Ash-HaXe
  [NME]: https://github.com/haxenme/NME
