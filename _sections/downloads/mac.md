---
title: macOS
parent: Downloads
order: 3
---

The biggest difficulty with the macOS installation is that some of the LLVM tools we need are not available as pre-compiled binaries.  Further complicating the matter is that a version of LLVM is already included with many recent versions of macOS.  For now, we suggest using Homebrew to get the correct versions of the needed LLVM tools. **Warning:** Using Homebrew to install the required LLVM tools will likely mean that two different versions of LLVM will be installed on your computer, which could have unpredictable results.

Before you can download and run Shadow, you must install [Homebrew](http://brew.sh/).

### Installation

Click the button below for the 0.8 macOS distribution of the compiler.
<aside>
<form method="get" action="https://github.com/TeamShadow/shadow/releases/download/v0.8-beta/shadow-0.8-mac.zip">
	<button type="submit">Download Shadow for macOS</button>
</form>
<br/>
</aside>
	

Once you've downloaded and extracted the files inside, running the `install.sh` script will use Homebrew to install LLVM 6.0 or higher, add links to `shadowc` and `shadox` into `/usr/local/bin/`, and add the environment variable `SHADOW_HOME` to your login script.  Then, you can run `shadowc` from any terminal. <strong>Note:</strong> Installing LLVM make take a little while.

It's not absolutely necessary to use Homebrew to install LLVM.  You can also [download Clang and LLVM](https://releases.llvm.org/download.html) and compile them yourself, if you prefer. You must build LLVM 6.0 or higher for Shadow 0.8 to work. Once you've built LLVM, you can run the following script (with root privileges) instead of the one included in the `zip` file to create the appropriate Java links to run `shadowc` and `shadox`.
			
{% highlight bash %}
#!/bin/bash
SCRIPT_PATH="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
COMPILER="/usr/local/bin/shadowc"
echo "java -jar \"$SCRIPT_PATH/shadow.jar\"" '"$@"' > $COMPILER
chmod 0755 $COMPILER
DOCUMENTATION="/usr/local/bin/shadox"
echo "java -cp \"$SCRIPT_PATH/shadow.jar\" shadow.doctool.DocumentationTool" '"$@"' > $DOCUMENTATION
chmod 0755 $DOCUMENTATION
echo "export SHADOW_HOME=\"$SCRIPT_PATH\"" >> ~/.bash_profile
source ~/.bash_profile
{% endhighlight %}


### Older Versions
			
Since Shadow is still in beta, these old versions are not supported in any way.  They have more bugs and are harder to install.  They might require earlier versions of LLVM that are harder to get a hold of.
			
- [Shadow 0.7.5 for macOS](https://github.com/TeamShadow/shadow/releases/download/v0.7.5-beta/shadow-0.7.5-mac.zip)
- [Shadow 0.6 for macOS](https://github.com/TeamShadow/shadow/releases/download/v0.6-beta/shadow-0.6-mac.zip)