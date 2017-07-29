<?php
	$path = '../../';
	$subtitle = 'Downloads<br/>Plugins';
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Shadow Plugin Downloads">
	<meta name="keywords" content="Shadow, language, downloads, plugins, syntax highlighter">
<title>
	Plugins - Downloads - Shadow
</title>
</head>
<body onload="prettyPrint();">
<div id="container">	
	<div id="content">
		<div class="spacer">
		
		<div class="note">				
				<div class="box">
					<ul>
						<li><a href="#eclipse">Eclipse Plugin</a></li>
						<li><a href="#notepad">Notepad++ Syntax Highlighter</a></li>						
					</ul>
				</div>
			</div>
		
		
			<h2>Plugins</h2>
			
			<p>
			This page provides downloads for plugins, syntax highlighters, and other tools that might be helpful for developing software in Shadow.
			</p>
		
			<h3><a name="eclipse">Eclipse Plugin</a></h3>
			
			<p>
			It's much easier to write Shadow code with syntax highlighting. Below is an Eclipse plugin that does syntax highlighting for Shadow.  In the future, we plan for greater integration with the Eclipse IDE (and other IDEs).
			</p>
			
			<ul>
				<li><a href="https://github.com/TeamShadow/plugin/releases/download/0.6/org.shadow-language_0.6.0.jar">Download Eclipse Plugin</a></li>
			</ul>
			
			<p>
			To install the plugin, copy it into the <tt>eclipse/plugins</tt> directory and restart Eclipse. If you have an older plugin (e.g. <tt>org.shadow-language_0.5.0.jar</tt>), please delete it first.
			</p>	

			<h3><a name="notepad">Notepad++ Syntax Highlighter</a></h3>
			
			<p><a href="https://notepad-plus-plus.org/">Notepad++</a> is a popular, free text editor for Windows.  Below is an XML file that defines syntax highlighting for Shadow inside of Nodepad++.</p>
			
			<ul>
				<li><a href="http://www.shadow-language.org/downloads/plugins/shadow-notepad.xml">Download Notepad++ Syntax Highlighting Definitions for Shadow</a></li>
			</ul>
			
			<p>
			To install the syntax highlighter, click on <strong>Define your language...</strong> under the <strong>Language</strong> menu in Notepad++.  In the dialog that opens, click on the <strong>Import...</strong> button and select the <tt>shadow-notepad.xml</tt> file you have just downloaded from the link above.			
			</p>	
			
		</div>
	</div>
	<div id="push"></div>
</div>
<?php
	include $path . 'footer.inc';
	include $path . 'header.inc';
	include $path . 'menu.inc';	
?>