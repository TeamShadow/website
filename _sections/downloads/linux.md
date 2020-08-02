---
title: Linux
parent: Downloads
order: 2
---

Ubuntu 18.04 and higher is supported, but other distributions and releases of Linux can run Shadow. The chief hurdle to overcome is installing LLVM 6.0 or higher binaries, which are not available from all package managers.

### Installation

Click the button below for the 0.8 Linux distribution of the compiler.
<aside>
<form method="get" action="https://github.com/TeamShadow/shadow/releases/download/v0.8-beta/shadow-0.8-linux.tar.gz">
	<button type="submit">Download Shadow for Linux</button>
</form>
<br/>
</aside>


Once you've downloaded and extracted the files inside, running the `install.sh` script with root privileges will use `apt`, `dnf`, or `pacman` to install clang and LLVM 6.0 or higher, add links to `shadowc` and `shadox` into `/usr/local/bin/`, and add the environment variable `SHADOW_HOME` to your login script. Then, you can run `shadowc` from any terminal. Note: Installing LLVM make take a little while.

It's not absolutely necessary to use a package manager to install LLVM. You can also [download Clang and LLVM](https://releases.llvm.org/download.html) and compile them yourself, if you prefer. You must build LLVM 6.0 or higher for Shadow 0.8 to work. Once you've built LLVM, you can run the following script (with root privileges) instead of the one included in the `tar.gz` file to create the appropriate Java links to run `shadowc` and `shadox`.

{% highlight bash %}
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
{% endhighlight %}

### Older Versions

Since Shadow is still in beta, these old versions are not supported in any way. They have more bugs and are harder to install. They might require earlier versions of LLVM that are harder to get a hold of.
- [Shadow 0.7.5 for Linux](https://github.com/TeamShadow/shadow/releases/download/v0.7.5-beta/shadow-0.7.5-linux.tar.gz)
- [Shadow 0.6 for Linux](https://github.com/TeamShadow/shadow/releases/download/v0.6-beta/shadow-0.6-linux.tar.gz)
- [Shadow 0.5 for Linux](https://github.com/TeamShadow/shadow/releases/download/v0.5-beta/shadow-0.5-linux.tar.gz)