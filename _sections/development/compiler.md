---
title: Reference compiler
parent: Development
order: 2
---

The Shadow reference compiler is written in Java, using [ANTLR 4](http://www.antlr.org/) to parse source files and generate abstract syntax trees.  We use Maven as our build manager.  Most of us use Eclipse or IntelliJ IDEA for development. You need a Java 8 JDK or higher, Maven, and LLVM installed.  See the [Downloads]({% link downloads.md %}) page for more information about installing LLVM on your platform.
			
The GitHub site for the Shadow compiler is below.

- [Shadow Compiler GitHub Repository](https://github.com/TeamShadow/shadow)

1. Clone the [Git repository](https://github.com/TeamShadow/shadow) (and import the project into Eclipse or IntelliJ IDEA if you'd like)
2. Maven clean (`mvn clean`)
3. Maven generate sources (`mvn generate-sources`)


Then, you should have a runnable compiler.  Try running all the JUnit tests in `src/test/java`.  If you want to generate the executable JAR for the compiler, use Maven package (`mvn package` or `mvn -DskipTests=true package` to skip running tests).
			

Please use the compiler [issues](https://github.com/TeamShadow/shadow/issues) page to report any issues you find.