---
title: FAQ
parent: Reference
order: 2
---

### Where does the name Shadow come from?
		
At this point, no one clearly remembers.  But it's still a pretty awesome name.
	
### Who's developing the Shadow language?
Barry Wittman and Bill Speirs are the original designers of the language.  They got a lot of help on the compiler back-end from Jacob Young.  Now, the compiler is hosted on [GitHub](https://github.com/), so anyone can work on it.
	
### Can I work on Shadow?

Of course!  The GitHub repository for the compiler is [here](https://github.com/TeamShadow/shadow/).  Head over to the [Development]({% link development.md %}) page for more information.
	
### I found a bug!

Well, we're not surprised.  Shadow has only been out in the world for a little while and is still in active development.  If you could head over to our [issue tracking page](https://github.com/TeamShadow/shadow/issues) and file an issue, we'd be grateful.
	
### How does Shadow do memory management?  Is it garbage-collected?

Since release 0.7.5, Shadow has done garbage collection through reference counting.  Since mutable objects are not shared between threads in Shadow, reference counting allows garbage collection to be handled on a thread by thread basis.  In other words, there's no need for garbage collection pauses that lock up all threads.  Unfortunately, reference counting is also relatively slow, and our system does not deal with circular references at all yet.  Although reference counting will probably remain one aspect of garbage collection in Shadow, we hope to employ a hybrid approach, using some kind of ownership model as well.
	
### Does Shadow support parallel computation?  How does that work?

Parallel computation is central to the design of Shadow.  From the very beginning, our plan has been to make spawning threads easy for the user.  However, none of the parallel language features have been implemented in the compiler yet. (They should be coming in the next release!)		
Our plan is to use a message-passing rather than a shared-memory paradigm.  To make this system efficient, we have compiler-enforced immutable classes and references.  Immutable objects can be shared freely among threads with no concerns about data races.
	
### Why does it take so long to compile a Shadow program?
				
**Update:** As of Shadow 0.7.5, it no longer takes nearly as long to compile a Shadow program!  After installation, compiling your first Shadow program may still take a while because most of the standard library has to be compiled for the first time.  It's not unusual for that first compilation to take 15-30 seconds.  After that first compilation, however, the process shouldn't take nearly as long.  Our compiler is written in Java, so there is some inevitable latency as the JVM fires up.
	
### Why doesn't feature X work the way it does in language Y?

Chances are good that we've thought about this feature and made a strategic decision.  Not everyone will agree with the decision we've made, but the language is still relatively fluid.  Give us a good argument about why we should do something differently, and we'll be happy to think it over.
	
### What happened to the `static` keyword?

The `static` keyword exists in C, C++, C#, Java, and other languages.  In C, the keyword relates mostly to variable scope.  In C++, C#, and Java, it primarily marks methods and members as belonging to the class as a whole, rather than to a particular object.  This feature undermines the philosophy of object-oriented programming because `static` methods cannot be overridden.

Likewise, `static` members are essentially global variables, allowing data to be shared too easily between classes and between threads.  Now, we understand why `static` members and methods have been used in the past: Both are easy to implement on the compiler, and `static` methods are more efficient to call because they don't have dynamic dispatch.

As a contrast, none of Shadow's members or methods are `static`.  One small exception are those members declared with the `constant` keyword, which are in fact constants computed at compile time and visible everywhere.  Most implementations of the singleton design pattern depend on a `static` member.  Instead, we provide the `singleton` keyword, which declares a special singleton class.  Unlike traditional singletons which have a maximum of one instance for the entire program, Shadow singletons have a maximum of one instance *per thread*, to prevent unsafe sharing.

Java takes the route of having `static` nested classes and "true" inner classes.  In the Java world, a "true" inner class object is actually associated with a particular outer class object and can read its members and call its methods directly.  This design is ideal for something like an iterator, which is intended to have complete access to one particular list.  However, many students and even some professional Java developers don't understand inner class usage correctly.  Furthermore, this kind of inner class design causes additional complexity in the compiler and the run-time system.  The inner classes in both C++ and C# behave like `static` nested classes in Java: Each is a class in its own right whose visibility may be restricted to methods within its outer class.  Although these inner classes do not automatically have a reference to an outer class object, they can manipulate the `private` and `protected` members of such an object if they get a reference to it.  Since version 0.7.5, Shadow has adopted the approach of C++ and C#, providing inner classes as a way to give finer-grained control over visibility and access but not tying inner class objects to particular outer class objects.
		
	
### What major features are still left to be implemented in Shadow?				

Quite a few!  We've already mentioned a couple of issues, but here's a list of what's absolutely critical.
- Threading and message passing
- Method references
- Local methods (closures)
- Enums

There are also some issues that are either less critical or can be addressed incrementally.  At a minimum, these include the following.			
- Expanded standard library
- Better memory management
- Faster and more accurate conversion from floating point values to `String` representations and back
- Plug-ins for other popular IDEs such as [IntelliJ IDEA](https://www.jetbrains.com/idea/) and [Visual Studio Code](https://code.visualstudio.com/)
	
### How does the Shadow compiler work?

The reference Shadow compiler is almost entirely written in Java.  It uses [ANTLR 4](http://www.antlr.org/) to build an abstract syntax tree (AST) for a program. During the process, some dependency checking is done to see which other Shadow files will need to be compiled, adding them in if necessary. Then, it performs type-checking on the AST and converts it into canonical three-address code (TAC).  Last, it converts the TAC into LLVM IR.  At that point, the LLVM optimizer turns the LLVM IR into optimized LLVM bitcode, which can be reused in future compilations if the source file remains unchanged.  Then, the LLVM compiler turns the LLVM bitcode into machine-dependent object code. Finally, all the object code is linked together with a linker, usually `clang`.
	
### How is Shadow licensed?

All Shadow source code and binaries are free and open-source, licensed under the  [Apache 2.0 license](https://www.apache.org/licenses/LICENSE-2.0.html), which allows pretty wide usage for almost anything, even commercial applications.  The Windows distribution may include pre-compiled LLVM binaries, distributed under the [LLVM license](http://llvm.org/docs/DeveloperPolicy.html#llvm-license).