---
title: <code>var</code> type
parent: Features
order: 4
---

Shadow is a strongly typed language, but the types for variables are generally obvious.  Java often forces you to spell out the name of a type twice.

{% highlight java %}
// Java code
Crate<Hamdinger, Underwear> crate = new Crate<Hamdinger, Underwear>();
{% endhighlight %}			

Like C# (and similar to the `auto` keyword in C++11), Shadow provides a `var` keyword that can be used to declare local variables that have an initializer.

{% highlight shadow %}
// Shadow equivalent
var crate = Crate<Hamdinger, Underwear>:create();
{% endhighlight %}