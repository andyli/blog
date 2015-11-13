Title: Haxe Usage Survey
Tags: Haxe, data analysis
Status: draft

Last month I've sent to [the Haxe mailing list](https://groups.google.com/forum/#!searchin/haxelang/survey/haxelang/nxPTx2xfeUA/JkUee_Z-CgAJ) and [Twitter](https://twitter.com/andy_li/status/652348811524739072) a short questionnaire in order to find out what operating systems our community is using or interested in using, such that I can ensure there is enough installer or package support. I've also added some questions on the other aspects of how Haxe is used, e.g. is it being used in professional works, which compilation targets are being used or interested in using etc. 

I also took this chance to have some hand-on experience with the Haxe Python target. I always wanted to use Haxe for data analysis during my PhD study. However, I'm not aware of any statistics package available to any of the Haxe targets available at that time. The Python target was released too late for my thesis. So, for my PhD, I used just vanilla Python and R, which were being used for the statistics courses I attended. Another reason to use the Haxe Python target this time is that I wanted to present this data analysis as a demo project in [my talk in PyCon HK 2015](http://2015.pycon.hk/schedule/topics/haxe-a-statically-typed-language-that-compiles-to-python-and-more/), which happened during the last weekend.

## Results

I've collected 361 entries in about 2 weeks. After removing the invalid ones (people who just don't know or not interested in Haxe) and the duplicated ones (people clicked submit twice, resulted in having entries filled with the same email address), there are 351 valid records. It clearly shows that our Haxe community is so active and cares so much about the development of Haxe. Thank you for all the helps!

The first thing I asked in the questionnaire is the experience on using Haxe, in particular is it being used for professional works. My hypothesis is that my questionnaire should reach more "serious" Haxe users and the ones who care to submit a response should also be the "serious" ones. The result meets my expectation and there are about half of the respondents using Haxe for professional works, as illustrated in the figure as follows:

<span class="center">
![Do you use Haxe?](https://raw.githubusercontent.com/andyli/haxe-usage-survey/master/out/fig_exp.png)
</span>

Knowing that there are more than 160 professional Haxe users is pretty impressive to me.

So, what are our community creating? It has been well-known that Haxe is popular among game developers. It is so popular to a point that for once [all the top three winners of the Ludum Dare game jam were all using Haxe](https://twitter.com/ncannasse/status/598041755540389888)... Here the second question asks what kind of things Haxe is being used or interested in using Haxe to build:

<span class="center">
![What are you creating, or want to use Haxe to create?](https://raw.githubusercontent.com/andyli/haxe-usage-survey/master/out/fig_create.png)
</span>

As expected, most respondents are making or interested to make games with Haxe. But other than games, there are also high interests in using Haxe for mobile/desktop applications, web sites, and even software libraries and frameworks. It suggests that Haxe is indeed a general purpose language and we cannot ignore the interest outside of game development.

The next thing is to find out which compilation targets are being used or are generating interests. Historically Haxe was developed as a replacement of AS3, so I know there were lots of people using it to create Flash contents. But given HTML5 is the current hype so I suspected there is huge interest in the JS target too. The result is as follows:

<span class="center">
![Which Haxe targets are you using, or want to use / test?](https://raw.githubusercontent.com/andyli/haxe-usage-survey/master/out/fig_target.png)
</span>

As expected, the JS target is the most used / interesting target. And it is somewhat surprising to me that the number of respondents who are interested in the C++ target is nearly as high as the ones who are interested in the JS target. I believe it is due to the high performance nature of C++, making it very attractive for everything other than the web. Since you're interested in the C++ target, I think you will be happy to know that Hugh has been actively improving it in all these year and there was a [great performance improvement recently](http://gamehaxe.com/2015/10/01/how-i-improved-hxcpp-speed-6x/) : )

The interests in the Java, C#, and Python targets are relatively low and I personally think that they should deserve more attention from the community, because there exist large amount of solid libraries in those languages. For the Java and C# targets, we don't even have to write externs but simply add a line of `-java-lib`/`-net-lib` and we can make use of any Java/C# libraries. Maybe the lower interests are caused by lack of documentation and usage example, which I hope they will be improved.

Another information that can be extracted from the same question is the number of interested target per respondent. Given being multi-target as the most prominent Haxe feature, I suspect Haxe users are using or interested in more then one target. The result meets my expectation:

<span class="center">
![Number of interested targets per respondent](https://raw.githubusercontent.com/andyli/haxe-usage-survey/master/out/fig_target_count_grouped.png)
</span>

As shown above, over 90% of the respondents are using or interested in 2 or more targets. It is pretty much a normal distribution and the mode is 3 targets.

We will then turns to analyze the development setup in the next question, which is to ask which version(s) of Haxe are the respondents using, or want to use / test. The result is plotted in the figure as follows:

<span class="center">
![Which version(s) of Haxe are you using, or want to use / test?](https://raw.githubusercontent.com/andyli/haxe-usage-survey/master/out/fig_version.png)
</span>

Over 90% of the respondents are using or interested in the using the 3.2 series. The interests of earlier versions are much less (< 10% of the respondents). It is good in the way that we can mainly focus on developing the latest version without the headache of backporting bug-fixes and features to the earlier versions. 

Another interesting view to the data is the number of interested Haxe versions per respondent:

<span class="center">
![Number of interested Haxe versions per respondent](https://raw.githubusercontent.com/andyli/haxe-usage-survey/master/out/fig_version_count_grouped.png)
</span>

We can see that there is some interest in using more than one Haxe version (~20%), but the majority of respondents are interested in using only one target. That means it is not urgent to support installing multiple version of Haxe in a system. But of course it would be great to have a way to do so in the long run. [HVM](https://github.com/dpeek/hvm) sounds promising although I haven't tried.

For the installation method, I asked how Haxe was being installed:

<span class="center">
![How did you obtain Haxe?](https://raw.githubusercontent.com/andyli/haxe-usage-survey/master/out/fig_install_haxe.png)
</span>

As shown above, most respondents used the official installer from the haxe.org web site. There are some respondents used the third-party installer or script, which I suspect it is due to the fact that the haxe.org web site doesn't provide a installer for Linux and people resort to using the installer script provide by OpenFL. Given we now have Linux packages officially maintained by the Haxe Foundation, I think the OpenFL installer script can be deprecated and the usage of Linux package managers will be much higher soon. Self-remainder: I have to go to update the haxe.org download page to provide the Linux packages info.

Since I want to know what Haxe installation methods have to be improved, I also asked what installation methods are being used for general development tools:

<span class="center">
![Which is your preferred way to obtain development software (not necessarily Haxe)?](https://raw.githubusercontent.com/andyli/haxe-usage-survey/master/out/fig_install_pref.png)
</span>

As expected, most respondents prefer to use official installers as well as package managers. Note that the number of respondents preferred to using package managers is higher than the number of respondents actually used package managers to install Haxe. I believe it is because the Haxe packages were not updated until recently, so people opted to use another installation method. It means my recent effort in updating the Linux packages for the Haxe Foundation should be useful and you can start to use 
package managers to install Haxe as you wished now :) I've also considered providing a Haxe Docker image, but given the interest is extremely low so I will save my effort for other important things for now.


