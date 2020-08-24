---
title: Null handling
parent: Features
order: 12
---

In C++, dereferencing a null pointer can have unpredictable consequences but often leads to a segmentation fault. In Java, dereferencing a null reference causes a `NullPointerException` to be thrown.  Furthermore, the JVM has to make checks to guarantee that a reference is not null.

The Shadow solution is that normal references can never be null, since most references never need to be: They are initialized to some non-null value or easily could be.  In Shadow, only references marked `nullable` can be null.  In order to dereference them or store them into a regular reference, the normal approach is to use the `check` keyword inside of a `try` block with a matching `recover` block.  If the reference is null, execution will jump to the `recover` block.  If the reference is null and isn't in a `try` with a `recover` block, an `UnexpectedNullException` will be thrown.

{% highlight shadow %}
nullable Hypothesis unknown = getHypothesis();
try 
{
	Hypothesis hypothesis = check(unknown);
	hypothesis.test();
}
recover
{
	Console.printLine("It's the null hypothesis!");
}
{% endhighlight %}

It seems annoying to deal with these `nullable` references, but they don't come up very often.  When they do come up, the code you write reminds you of the cost of checking them.  Alternatively,  you can use the coalesce operator (`??`) to quickly use a non-null value as a default if the object under consideration is null.  In the following code, `"random junk"` will be stored in `notNull` only if `whoKnows` is null.

{% highlight shadow %}
nullable String whoKnows = getStuff();
String notNull = whoKnows ?? "random junk";
{% endhighlight %}