---
title: "Why can't a language be fast and safe?"
parent: About
order: 2
---

It can!  Sure, you have to pay for checks on array bounds and a few other things, but some trade-offs are worth making.

For hardcore systems programming, C and C++ have been the only practical options. Shadow doesn't allow direct pointer arithmetic like those languages, but for those rare situations when you need that level of control, Shadow allows you to declare a method that can be implemented in C or raw LLVM.

The Java Virtual Machine is a great execution environment, but the overhead of dynamic class loading, just-in-time compilation, and other VM services is not zero, especially when it comes to memory footprint.  Our goal in making Shadow was the best of both worlds: the modern syntax and safety guarantees of Java combined with the performance of C++.