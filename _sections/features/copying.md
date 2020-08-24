---
title: Deep copying
parent: Features
order: 9
---

What happens when you want to make a copy of an object?  You can store the object into another reference, but that only creates an alias for the same object, not a copy.

All objects in Java have a `clone()` method, which allocates a new object and copies over all of its members.  Unfortunately, its operation depends on everyone implementing the `clone()` method correctly for every class.  Many developers do not implement the  `clone()` at all.  Likewise, the `clone()` method often cannot perform a true deep copy, in which all the members of the object are also copied.  The risk in doing so would be the presence of a circular reference, which would begin a cycle of copying that would never finish.

In Shadow, there are two keywords specifically designed for deep copies: `copy` and `freeze`.  When `copy` is used to copy an object, it performs a full deep copy, making deep copies of all the members as well.  Internally, the `copy` command keeps track of all the new objects allocated.  If a circular reference would cause something to be copied a second time, the `copy` command instead uses the first copy.  The exception to the rule is `immutable` objects, which cannot be changed anyway.  References to such objects are assigned directly, without making copies of the underlying objects.

The `freeze` command works exactly like the `copy` command except that all of the copies it creates are `immutable`.  The `freeze` command is the only way to create an `immutable` version of an existing object whose class is not already `immutable`. 

{% highlight shadow %}
Person stanleyBurrell = Person:create("Stanley Kirk Burrell");
Person mcHammer = copy(stanleyBurrell);
mcHammer.setName("MC Hammer"); // Doesn't affect stanleyBurrell
immutable Person cantTouchThis = freeze(mcHammer); // Can never have its internals changed
{% endhighlight %}