---
title: Useful <code>==</code> operator
parent: Features
order: 10
---

In Java, the `==` operator compares two values to see if they are the same.  This comparison is meaningful for primitive types, but for reference types, it only returns `true` when the two references are pointing at the same location.  The proper way to compare two objects in Java is to use the `equals()` method.

Ultimately, this design causes confusion, particularly since it's legal to compare two objects with `==`, even if it's rarely useful.  In Shadow, the `==` operator is only valid between an object that implements the `CanEqual` interface for the other object.  In other words, the `==` operator is syntactic sugar for the `equal()` method (which does not end with an 's' in Shadow).

For primitive types, the `==` operator works exactly as you would expect.  For object types, the first either has an `equal()` method defined to work with the second or the code will fail to compile.  For reference comparison, the `===` operator (yes, three equal signs) is available.  Fortunately, there are few situations when it's needed.