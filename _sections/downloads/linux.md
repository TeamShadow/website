---
title: Linux
parent: Downloads
order: 2
---

Linux Installation
The Shadow compiler is written in Java. It is distributed as a JAR file with directories containing the standard Shadow libraries, written in Shadow with a few LLVM and C source files for lower level functionality.

Ubuntu 16.04 and higher, Fedora 24 and higher, and Arch Linux are supported. Other distributions and releases of Linux can run Shadow, but only the listed releases have been tested. The chief hurdle to overcome is installing LLVM 3.8 or higher binaries, which are not available from all package managers.

Prerequisites
Before you can download and run Shadow, there are some prerequisites.

Java 7 or higher
A package manager that supports LLVM 3.8 or higher
Installation
Click the link below for the 0.7.5 Linux distribution of the compiler.

Download Shadow for Linux
Once you've downloaded and extracted the files inside, running the install.sh script with root privileges will use apt, dnf, or pacman to install LLVM 3.8 or higher, add links to shadowc and shadox into /usr/local/bin/, and add the environment variable SHADOW_HOME to your login script. Then, you can run shadowc from any terminal. Note: Installing LLVM make take a little while. On Fedora, the install script will also install gcc, since it isn't included in the distribution by default.

It's not absolutely necessary to use a package manager to install LLVM. You can also download LLVM and build it yourself, if you prefer. You must build LLVM 3.8 or higher for Shadow 0.7.5 to work. Once you've built LLVM, you can run the following script (with root privileges) instead of the one in the tar.gz file to create the appropriate Java links to run shadowc and shadox.

#!/bin/bash
SCRIPT_PATH="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
COMPILER="/usr/local/bin/shadowc"
echo "java -jar \"$SCRIPT_PATH/shadow.jar\"" '"$@"' > $COMPILER
chmod 0755 $COMPILER
DOCUMENTATION="/usr/local/bin/shadox"
echo "java -cp \"$SCRIPT_PATH/shadow.jar\" shadow.doctool.DocumentationTool" '"$@"' > $DOCUMENTATION
chmod 0755 $DOCUMENTATION
echo "export SHADOW_HOME=\"$SCRIPT_PATH\"" >> ~/.bashrc
source ~/.bashrc
Older Versions
Since Shadow is still in beta, these old versions are not supported in any way. They have more bugs and are harder to install. They might require earlier versions of LLVM that are harder to get a hold of.

Shadow 0.6 for Linux
Shadow 0.5 for Linux