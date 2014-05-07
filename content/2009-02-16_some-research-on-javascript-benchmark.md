Title: Some research on JavaScript benchmark
Date: 2009-02-16 14:02
Tags: web 2.0, web usability design and engineering
Slug: some-research-on-javascript-benchmark

Since I am going to make a benchmark for ActionScript performance across
different browser/platform, I take a look into the JavaScript benchmark
to see if I can simply port one to be used in ActionScript.

The most famous ones should be Apple's [SunSpider][], Google's [V8
Benchmark Suite][], Mozilla's [Dromaeo][]. All the benchmarks are
compose of several test areas, basically including some basic JavaScript
operation test like Array manipulations, some more practical based test
like regular expression, ray-tracing etc.

V8 Benchmark Suite consist 6 tests which has the least tests among the
three. But when I take a look into the source code, the testes are very
long. It even overrides Math.random() to a seeded random generator.

SunSpider's structure seems to be more simple and the tests inside are
more easy to read (although less documented compares to V8's). I think
it should be not that hard to port to AS.

I still do not have time to look into Dromaeo's source but it has quite
a lot of tests. And some of the tests includes DOM and use of library
like jQuery and Prototype, which is not quite appropriate to be ported.

My target should be porting SunSpider. But there is still some things to
be considered like whether to use AS's build-in library, coverage of
Graphic manipulation etc. More researchs are needed ;-) .

  [SunSpider]: http://www2.webkit.org/perf/sunspider-0.9/sunspider.html
  [V8 Benchmark Suite]: http://v8.googlecode.com/svn/data/benchmarks/v3/run.html
  [Dromaeo]: http://dromaeo.com/
