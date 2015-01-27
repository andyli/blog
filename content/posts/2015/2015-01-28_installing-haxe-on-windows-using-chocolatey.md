Title: Installing Haxe on Windows Using Chocolatey
Tags: Haxe

<span class="center">
![Haxe loves Chocolatey](this>files/2015/chocolatey-haxe.png)
</span>

Recently I've created the [Haxe Chocolatey package](https://chocolatey.org/packages/haxe). So yeah, we have yet another way to install Haxe (and Neko) on Windows.

[Chocolatey](https://chocolatey.org/) is a package manager for Windows, just like apt-get for Ubuntu and [homebrew](http://brew.sh/) for Mac. The major benefit of using it instead of [the official Windows installer](http://haxe.org/download/) is that the process can be all done in the command line, which is the only option in a CI environment like [AppVeyor](http://www.appveyor.com/).

After Chocolatey is installed, to install Haxe is just a single line of command:

```shell
cinst haxe #or `choco install haxe`
```

Ta-da! We should now have Haxe and Neko installed.

One thing we should remember to do is to refresh the environment variables since the installation modifies PATH. Without refreshing, running haxelib would result in a missing dll error. It can be done by `RefreshEnv` when using command prompt. When using PowerShell we have to close and reopen its window. It is slightly annoying but it is [the current limitation](https://github.com/chocolatey/chocolatey/issues/666).

Finally, to setup haxelib, create a folder for installing Haxe libraries, and run:

```shell
haxelib setup <path_to_folder>
```

That's all ;)