<?php
	$path = '../../';	
	$subtitle = 'Downloads<br/>Windows';
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Shadow Language Downloads">
	<meta name="keywords" content="Shadow, language, downloads, binary, Windows">
<title>
	Windows - Downloads - Shadow
</title>
</head>
<body onload="prettyPrint();">
<div id="container">	
	<div id="content">
		<div class="spacer">
		
			<h2>Windows Installation</a></h2>
		
			<p>
			The Shadow compiler is written in Java.  It is distributed as a JAR file with directories containing the standard Shadow libraries, written in Shadow with a few LLVM source files for lower level functionality.
			</p>						
			
			<p>
			There will one day be a slick Shadow installer for Windows, but it's just a <tt>zip</tt> file now.  One difficulty with Windows is that some of the LLVM tools we need are not available as pre-compiled binaries.  Another problem is that LLVM needs an external linker.
			</p>
			
			<h3><a name="prerequisites">Prerequisites</a></h3>
			
			<p>
			We solve these problems by providing LLVM binaries for you and using the <tt>gcc</tt> provided by MinGW as a linker.  Unfortunately, executables produced using this process can only be compiled for a 32-bit architecture.  The Windows prerequisites are as follows.
			</p>
			
			<ol>
				<li><a href="http://java.com/download">Java 7 or higher</a></li>
				<li><a href="https://sourceforge.net/projects/mingw-w64/files/latest/download?source=files"</a>MinGW</a></li>
			</ol>
			
			<h3><a name="installation">Installation</a></h3>
			
			<p>
			Click the link below for the 0.7.5 Windows distribution of the compiler, which includes LLVM binaries.
			</p>
			
			<div class="download">
				<div class="spacer">
					<a href="https://github.com/TeamShadow/shadow/releases/download/v0.7.5-beta/shadow-0.7.5-windows.zip">Download Shadow for Windows</a>
				</div>
			</div>
			
			<p>
			Once you've downloaded and extracted the files inside, running the <tt>install.bat</tt> script will add the install directory to the user path. Then, you can run <tt>shadowc.exe</tt> and <tt>shadox.exe</tt> from the command line.
			</p>			
			
			<p>
			If you're the kind of Windows user who wants to build your own LLVM binaries, <a href="http://llvm.org/docs/GettingStartedVS.html">this page</a> has information about how to build LLVM using Visual Studio.  If you go this route, it is even theoretically possible to use Visual Studio to link your Shadow executables instead of <tt>gcc</tt>.  Build LLVM on your machine and add the binaries to your path.  Then, you can install Shadow using the instructions above and delete the LLVM executables included with the zip file, since your files will be a later version.
			</p>
			
			<h3><a name="older">Older Versions</a></h3>
			
			<p>Since Shadow is still in beta, these old versions are not supported in any way.  They have more bugs and are harder to install.</p>
			
			<ul>
				<li><a href="https://github.com/TeamShadow/shadow/releases/download/v0.6-beta/shadow-0.6-windows.zip">Shadow 0.6 for Windows</a></li>
				
				<li><a href="https://github.com/TeamShadow/shadow/releases/download/v0.5-beta/shadow-0.5-windows.zip">Shadow 0.5 for Windows</a></li>
			</ul>
			
		</div>
	</div>
	<?php include $path . 'footer.inc'; ?>
</div>

<div id="sidebar">
	<div id="spacer">
		<ul>
			<li><a href="#prerequisites">Prerequisites</a></li>						
			<li><a href="#installation">Installation</a></li>
			<li><a href="#older">Older Versions</a></li>						
		</ul>		
	</div>
</div>
<?php
	include $path . 'header.inc';
	include $path . 'menu.inc';	
?>