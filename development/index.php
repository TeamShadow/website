<?php
	$path = '../';
	$subtitle = 'Development';
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Shadow Language Development">
	<meta name="keywords" content="Shadow, language, development, open source">
<title>
	Development - Shadow
</title>
</head>
<body onload="prettyPrint();">
<div id="container">	
	<div id="content">
		<div class="spacer">
		
			<h2>So you want to be a Shadow developer?</h2>
		
			<p>
			Great!  We could sure use the help.  Right now, we have two active projects, the Shadow reference compiler and the Shadow Eclipse plug-in.
			</p>
			
			<h3><a name="compiler">Shadow Compiler</a></h3>
			
			<p>
			The Shadow compiler is written in Java, using <a href="http://www.antlr.org/">ANTLR 4</a> to parse source files and generate abstract syntax trees.  We use Maven as our build manager.  Most of us use Eclipse for development. You need a Java 7 JDK or higher, Maven, and LLVM installed.  See the <a href="<?=$path?>/downloads">Downloads</a> page for more information about installing LLVM on your platform.
			</p>
						
			<p>
			The GitHub site for the Shadow compiler is below.
			</p>
			
			<ul>
				<li><a href="https://github.com/TeamShadow/shadow">Shadow Compiler GitHub Repository</a></li>
			</ul>			

			<p>
			To get the compiler working, follow these steps:
			</p>
			
			<ol>
				<li>Clone the <a href="https://github.com/TeamShadow/shadow">Git repository</a> (and import the project into Eclipse if you'd like)
				<li>Maven clean (<tt>mvn clean</tt>)</li>
				<li>Maven generate sources (<tt>mvn generate-sources</tt>)</li>
			</ol>
			
			<p>
			Then, you should have a runnable compiler.  Try running all the JUnit tests in <tt>src/test/java</tt>.  If you want to generate the executable JAR for the compiler, use Maven package (<tt>mvn package</tt> or <tt>mvn -DskipTests=true package</tt> to skip running tests).
			</p>			
			
			<p>
			Please use the compiler <a href="https://github.com/TeamShadow/shadow/issues">issues</a> page to report any issues you find.
			</p>


			<h3><a name="plugin">Shadow Eclipse Plug-in</a></h3>
			
			<p>
			The Shadow Eclipse plugin is also written in Java.  To work on it, you'll need the <a href="http://www.eclipse.org/pde/">Eclipse Plug-in Development Environment (PDE)</a>, which is included in the Eclipse SDK or can be installed through Eclipse.
			</p>
						
			<p>
			The GitHub site for the Shadow Eclipse plugin is below.
			</p>
			
			<ul>
				<li><a href="https://github.com/TeamShadow/plugin">Shadow Eclipse Plugin GitHub Repository</a></li>
			</ul>	
				
			
		</div>
	</div>
	<?php include $path . 'footer.inc'; ?>
</div>

<div id="sidebar">
	<div class="spacer">
		<ul>
			<li><a href="#compiler">Shadow Compiler</a></li>
			<li><a href="#plugin">Shadow Eclipse Plug-in</a></li>					
		</ul>		
	</div>
</div>
<?php
	include $path . 'header.inc';
	include $path . 'menu.inc';	
?>