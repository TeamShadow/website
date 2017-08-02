<?php
	$path = '../../';
	$subtitle = 'Downloads<br/>macOS';
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Shadow Language Downloads">
	<meta name="keywords" content="Shadow, language, downloads, binary, macOS">
<title>
	macOS - Downloads - Shadow
</title>
</head>
<body onload="prettyPrint();">
<div id="container">	
	<div id="content">
		<div class="spacer">
		
			<h2>macOS Installation</h2>
		
			<p>
			The Shadow compiler is written in Java.  It is distributed as a JAR file with directories containing the standard Shadow libraries, written in Shadow with a few LLVM source files for lower level functionality.
			</p>						
			
			<p>
			Shadow 0.7.5 includes better macOS support than ever. The biggest difficulty with the macOS installation is that some of the LLVM tools we need are not available as pre-compiled binaries.  Further complicating the matter is that a version of LLVM is already included with many recent versions of macOS.  For now, we suggest using Homebrew to get the correct versions of the needed LLVM tools. <strong>Warning:</strong> Using Homebrew to install the required LLVM tools will likely mean that two different versions of LLVM will be installed on your computer, which could have unpredictable results.
			</p>
						
			<h3><a name="prerequisites">Prerequisites</a></h3>
			
			<p>
			Before you can download and run Shadow, there are some prerequisites.
			</p>
			
			<ol>
				<li><a href="http://java.com/download">Java 7 or higher</a></li>
				<li><a href="http://brew.sh/">Homebrew</a></li>
			</ol>
			
			
			<h3><a name="installation">Installation</a></h3>
			
			<p>
			Click the link below for the 0.7.5 macOS distribution of the compiler.
			</p>
			
			<div class="download">
				<div class="spacer">
					<a href="https://github.com/TeamShadow/shadow/releases/download/v0.7.5-beta/shadow-0.7.5-mac.zip">Download Shadow for macOS</a>
				</div>
			</div>			

			<p>
			Once you've downloaded and extracted the files inside, running the <tt>install.sh</tt> script will use Homebrew to install LLVM 3.8 or higher, add links to <tt>shadowc</tt> and <tt>shadox</tt> into <tt>/usr/local/bin/</tt>, and add the environment variable <tt>SHADOW_HOME</tt> to your login script.  Then, you can run <tt>shadowc</tt> from any terminal. <strong>Note:</strong> Installing LLVM make take a little while.
			</p>
			
			<p>
			It's not absolutely necessary to use Homebrew to install LLVM.  You can also <a href="http://llvm.org/releases/download.html">download LLVM</a> and build it yourself, if you prefer.  You must build LLVM 3.8 or higher for Shadow 0.7.5 to work.  Once you've built LLVM, you can use the following script instead of the one in the <tt>zip</tt> file to create the appropriate Java links to run <tt>shadowc</tt> and <tt>shadox</tt>.
			</p>
			
<pre class="prettyprint">
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
</pre>

			<h3><a name="older">Older Versions</a></h3>
			
			<p>Since Shadow is still in beta, these old versions are not supported in any way.  They have more bugs and are harder to install.  They might require earlier versions of LLVM that are harder to get a hold of.
			</p>
			
			<ul>
				<li><a href="https://github.com/TeamShadow/shadow/releases/download/v0.6-beta/shadow-0.6-mac.zip">Shadow 0.6 for macOS</a></li>				
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