<?php
	$path = '../../';
	$subtitle = 'Downloads<br/>Mac';
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Shadow Language Downloads">
	<meta name="keywords" content="Shadow, language, downloads, binary, Mac OS X">
<title>
	Mac - Downloads - Shadow
</title>
</head>
<body onload="updateShading(); prettyPrint();">
<div id="container">	
	<div id="content">
		<div class="spacer">
		
		<div class="note">				
				<div class="box">
					<ul>
						<li><a href="#prerequisites">Prerequisites</a></li>						
						<li><a href="#installation">Installation</a></li>						
					</ul>
				</div>
			</div>
		
		
			<h2>Mac Installation</h2>
		
			<p>
			The Shadow compiler is written in Java.  It is distributed as a JAR file with directories containing the standard Shadow libraries, written in Shadow with a few LLVM source files for lower level functionality.
			</p>						
			
			<p>
			Shadow 0.6 now includes Mac support. The biggest difficulty with the Mac installation is that some of the LLVM tools we need don't come with the pre-compiled binaries that are available.  Further complicating the matter is that a version of LLVM is already included with many recent versions of Mac OS X.  For now, we suggest using Homebrew to get the correct versions of the needed LLVM tools.  <strong>Warning:</strong> Using Homebrew to install the required LLVM tools will likely mean that two different versions of LLVM will be installed on your Mac, which could have unpredictable results in some cases.
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
			Click the link below for the Mac distribution of the compiler.
			</p>
			
			<div class="download">
				<div class="spacer">
					<a href="https://github.com/TeamShadow/shadow/releases/download/v0.6-beta/shadow-0.6-mac.zip">Download Shadow for Mac</a>
				</div>
			</div>			

			<p>
			Once you've downloaded and extracted the files inside, running the <tt>install.sh</tt> script with root privileges will use Homebrew to install LLVM 3.7 and then add links to <tt>shadowc</tt> and <tt>shadox</tt> into <tt>/usr/local/bin/</tt>.  Then, you can run <tt>shadowc</tt> from any terminal. <strong>Note:</strong> Installing LLVM make take half an hour or more.
			</p>
			
			<p>
			It's not absolutely necessary to use Homebrew to install LLVM.  You can also <a href="http://llvm.org/releases/download.html">download LLVM</a> and build it yourself, if you prefer.  You must build LLVM 3.7 or higher without assertions for Shadow 0.6 to work.  Once you've built LLVM, you can use the following script instead of the one in the <tt>zip</tt> file to create the appropriate Java links to run <tt>shadowc</tt> and <tt>shadox</tt>.
			</p>
			
<pre class="prettyprint">
#!/bin/bash
SCRIPT_PATH="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
COMPILER="/usr/local/bin/shadowc"
echo "java -jar $SCRIPT_PATH/shadow.jar" '$@' > $COMPILER
chmod 0755 $COMPILER
DOCUMENTATION="/usr/local/bin/shadox"
echo "java -cp $SCRIPT_PATH/shadow.jar shadow.doctool.DocumentationTool" '$@' > $DOCUMENTATION
chmod 0755 $DOCUMENTATION
</pre>
			
		</div>
	</div>
	<div id="push"></div>
</div>
<?php
	include $path . 'footer.inc';
	include $path . 'header.inc';
	include $path . 'menu.inc';	
?>