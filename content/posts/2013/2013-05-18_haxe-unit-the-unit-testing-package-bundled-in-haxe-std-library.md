Title: haxe.unit, the unit testing package bundled in Haxe std library
Date: 2013-05-18 15:04
Tags: Haxe
Slug: haxe-unit-the-unit-testing-package-bundled-in-haxe-std-library

Not sure if you knew, there has been a minimal basic unit testing
package, [haxe.unit][], bundled in the Haxe std library, since [Haxe
1.02][]! Although its functionality is minimal, but it is enough for
most of the projects and being very target independent. I
would definitely recommend it to any beginner of writing unit test.

The haxe.unit package consists of only 4 classes:

-   `TestCase`
-   `TestResult`
-   `TestRunner`
-   `TestStatus`

Most of the time we need to use only 2 of them: **`TestCase`**
and **`TestRunner`**. We
subclass `TestCase` and put the
test functions as class methods, and then create a `TestRunner` object to
run one or multiple `TestCase` instances.
I usually create one class for each class I want to test and create one
test method for each of the methods.

For example we want to test the [StringTools][]
class in the top-level package of the Haxe std library. Here we wrote
the test function for 2 methods, `endsWith` and `hex`:

```haxe
class TestStringTools extends haxe.unit.TestCase {
    public function testEndsWith():Void {
        this.assertTrue(StringTools.endsWith("abcd", "cd"));
        this.assertFalse(StringTools.endsWith("abcde", "cd"));
    }

    public function testHex():Void {
        this.assertEquals("FFFFFF", StringTools.hex(0xFFFFFF, 6));
        this.assertEquals("000000", StringTools.hex(0, 6));
    }

    static function main():Void {
        var runner = new haxe.unit.TestRunner();
        runner.add(new TestStringTools());
        var success = runner.run();

        #if sys
        Sys.exit(success ? 0 : 1);
        #end
    }
}
```

As illustrated above, to check the return values of the function calls,
there are 3 methods come from the `TestCase` class we
can make use of:

-   `function assertTrue( b : Bool, ?c : PosInfos ) : Void;`
-   `function assertFalse( b : Bool, ?c : PosInfos ) : Void;`
-   `function assertEquals( expected : T, actual : T, ?c : PosInfos ) : Void;`

They are self-explanatory. You may have noticed, they all accept an
extra optional argument of type `PosInfos`, which is
actually used for getting the method name, line number etc for printing
the test result. We should simply ignore it and the compiler will
automatically fill in the value.

Notice that the test methods **have to be named with prefix "test"**. We
can create utility functions, without the "test" prefix, and they will
be ignored by `TestRunner`.

To run the tests, we created a `TestRunner` in the
`main` entry
function. The `main` function can of
course be put into another class, but since we've only one `TestCase` in this
example, let's just put it into our `TestCase`. When we
call `runner.run()`, it
will test all the `TestCase` objects
that are added to the `TestRunner`,
and immediately print the test result, which for our example, it would
be:

```text
Class: TestStringTools ..
OK 2 tests, 0 failed, 2 success
```

Lastly, based on the return value of `runner.run()`, which
is "all tests success or not", we exit the program properly as a best
practice. It is used by many [CI][] softwares, for example [TravisCI][],
in order to get back the test result.

There exist more advanced unit testing frameworks, like [munit][] and
[utest][], but the structure and concept is somewhat similar. Anyway,
writing unit test is easy and the benefit is huge: It will enables us to
discover [regression][] that may caused by [refactoring][], adding new
features, changes in 3rd party library (or Haxe itself) as soon as
possible. Let's start doing it today if you haven't!

  [haxe.unit]: http://haxe.org/doc/cross/unit
  [Haxe 1.02]: https://code.google.com/p/haxe/source/browse/trunk/doc/CHANGES.txt#1051
  [StringTools]: http://api.haxe.org/StringTools.html
  [CI]: http://en.wikipedia.org/wiki/Continuous_integration
  [TravisCI]: |filename|2013-03-19_automated-unit-testing-for-haxe-project-using-travis-ci.md
  [munit]: https://github.com/massiveinteractive/MassiveUnit
  [utest]: https://github.com/fponticelli/utest
  [regression]: http://en.wikipedia.org/wiki/Software_regression
  [refactoring]: https://en.wikipedia.org/wiki/Code_refactoring
