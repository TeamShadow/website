---
title: Unsigned types
parent: Features
order: 13
---

All integral Java types are signed.  Java added some indirect support for unsigned manipulations in Java 8, but they still don't have unsigned primitives.  We do!  Each integral type has an unsigned version.  Be warned:  You shouldn't be using these unless you really have a good reason.  Shadow type-checking is pretty strict, and unsigned types are not exempt.  If you want to store an `int` value into a `uint` or vice-versa, you'll have to do a cast.

See the section on [numeric types and literals](#numeric-types-and-literals) for details about using unsigned types.