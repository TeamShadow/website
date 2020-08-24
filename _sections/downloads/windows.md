---
title: Windows
parent: Downloads
order: 4
---
		
There will one day be a slick Shadow installer for Windows, but it's just a `zip` file now.  One difficulty with Windows is that some of the LLVM tools we need are not available as pre-compiled binaries.  Another problem is that LLVM needs an external linker. We solve these problems by providing LLVM binaries for you and using Clang as a linker.

* Before you can download and run Shadow, you must install [Clang](https://github.com/llvm/llvm-project/releases/download/llvmorg-10.0.0/LLVM-10.0.0-win64.exe).  After installation, you may need to add the directory holding `clang.exe` (likely something like `C:\Program Files\LLVM\bin`) to your path.
* Then, you must install the [Microsoft C++ Build Tools](https://visualstudio.microsoft.com/visual-cpp-build-tools/) so that you can link Windows libraries. When you run this installer, you need to select the C++ build tools as well as the optional MSVC VS 2019 C++ x64/x86 build tools and the optional Windows 10 SDK. It might not be necessary to install these tools if you have already installed Visual Studio.


### Installation

Click the button below for the 0.8 Windows distribution of the compiler.
<aside>
<form method="get" action="https://github.com/TeamShadow/shadow/releases/download/v0.8-beta/shadow-0.8-windows.zip">
	<button type="submit">Download Shadow for Windows</button>
</form>
<br/>
</aside>

Once you've downloaded and extracted the files inside, running the `install.bat` script  will add the install directory to the user path. Then, you can run `shadowc.exe` and `shadox.exe` from the command line.
			
If you're the kind of Windows user who wants to build your own LLVM binaries, [this page](http://llvm.org/docs/GettingStartedVS.html) has information about how to build LLVM using Visual Studio. Build LLVM on your machine and add the binaries to your path.  Then, you can install Shadow using the instructions above and delete the LLVM executables included with the zip file, since your files will be a later version.


### Older Versions

Since Shadow is still in beta, these old versions are not supported in any way.  They have more bugs and are harder to install.  Note that they also require [MinGW](https://sourceforge.net/projects/mingw-w64/files/latest/download?source=files) to work.
- [Shadow 0.7.5 for Windows](https://github.com/TeamShadow/shadow/releases/download/v0.7.5-beta/shadow-0.7.5-windows.zip)
- [Shadow 0.6 for Windows](https://github.com/TeamShadow/shadow/releases/download/v0.6-beta/shadow-0.6-windows.zip)
- [Shadow 0.5 for Windows](https://github.com/TeamShadow/shadow/releases/download/v0.5-beta/shadow-0.5-windows.zip)