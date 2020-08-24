---
title: Singletons
parent: Features
order: 7
---

There is no `static` keyword in Shadow, but in other languages it is occasionally necessary to use a `static` member to share a single item among many pieces of code.  Perhaps the best reason to do so is the singleton design pattern, in which there is only ever a single object of a given class. Our solution is singleton classes, of which there can only be a single object at any time, per thread.

A singleton object never needs to be created, since its creation is handled in the first method where it appears. A good example of a singleton is the `Console` class used for command line I/O.  Although not necessary, a singleton variable can be used, which is just a convenient alias for the singleton.

{% highlight shadow %}
Console out; // No create needed (or possible)
out.printLine("Bring rap justice!");
Console screen; // Still the same object
screen.printLine("Shut 'em down!");
{% endhighlight %}