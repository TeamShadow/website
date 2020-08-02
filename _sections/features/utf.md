---
title: UTF-8 support
parent: Features
order: 15
---

When C was invented, not many people were thinking about how to store characters from all over the world in computer memory.  Strings in C are built on sequences of the single byte `char` type.  Various implementations of C++ have various styles of wide-character support.

Java's solution was simple and elegant:  Use UTF-16. The `char` type is two bytes, and a `String` is a sequence of those.  Unfortunately, that means that the memory cost of storing plain old ASCII text doubled when compared to C.  And there is a hole in the elegance of their solution. UTF-16 sometimes needs two `char` values to represent some characters, usually from Asian languages.

Shadow's solution goes a step further with UTF-8, a variable byte size scheme.  If you're using plain old ASCII, it only costs you a byte per character.  Many characters can be expressed in two bytes, although some require three or even four bytes.  How does that work in a `String`?			

A `String` is a sequence of `byte` values.  If you index into a location using brackets (`[]`) or by calling the `index()` method, you'll get a `byte` value.  That's great if all you care about is ASCII.

However, we use the four-byte `code` (short for codepoint) type to represent arbitrary UTF-8 characters.  A `String` iterator can cycle  through a `String`, returning each `code` value contained within it.
