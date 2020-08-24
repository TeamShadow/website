---
title: Immutable classes and references
parent: Features
order: 8
---

As most Java programmers know, the `String` class is immutable, meaning that the contents of a `String` object cannot be changed after the object is initialized.  Unfortunately, the only way to know this is by reading the documentation for the class.  In Java, there is no way to declare a class as immutable or enforce its immutability with the compiler.

In Shadow, there *is* a way.  The `immutable` keyword allows a class to be marked immutable.  Any code outside of its constructor that seeks to modify its contents will not compile.

It is also possible to declare a reference with the `immutable` keyword.  In this case, there are no mutable references to the object the immutable reference points to.  It can be freely shared between all methods and threads with no concern that its contents will be changed.

The trouble is that an `immutable` reference cannot be stored into a normal reference without losing the guarantee that its contents are protected.  To mediate between the two different kinds of references, `readonly` references are used.  A `readonly` reference cannot have any mutable methods called on it.  You can store either an `immutable` reference or a normal reference into a `readonly` reference.

![Relationship between immutable, readonly, and normal references](/assets/images/immutable.png)

At first, `immutable` references seem indistinguishable from `readonly` references.  Remember this: With a `readonly` reference, *someone* might have a normal reference they can use to change the contents of the object.  With an `immutable` reference, it's as if all the references to the object are `readonly`.  No one can *ever* change the contents of such an object.

Finally, a method can be marked `readonly`, meaning that it's guaranteed not to change the contents of the object it's in. This is similar to `const` methods in C++.  All the methods in an `immutable` class are `readonly` automatically.