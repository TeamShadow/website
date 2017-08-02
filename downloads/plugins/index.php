<?php
	$path = '../../';
	$subtitle = 'Downloads<br/>Plug-ins';
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Shadow Plug-in Downloads">
	<meta name="keywords" content="Shadow, language, downloads, plugins, syntax highlighter">
<title>
	Plug-ins - Downloads - Shadow
</title>
</head>
<body onload="prettyPrint();">
<div id="container">	
	<div id="content">
		<div class="spacer">		
		
			<h2>Plug-ins</h2>
			
			<p>
			This page provides downloads for plug-ins, syntax highlighters, and other tools that might be helpful for developing software in Shadow. We hope to add tools for many more platforms in the future.
			</p>
		
			<h3><a name="eclipse">Eclipse Plug-in</a></h3>
			
			<p>
			We provide an Eclipse plug-in for Shadow development with many useful features:
			</p>
			
			<ul>
				<li>Syntax highlighting</li>
				<li>Parsing and type-checking errors and warnings reported as you type</li>
				<li>Compiling and launching Shadow programs from the IDE, with redirected console I/O</li>
				<li>Outline view for easy code navigation</li>
				<li>Comment/uncomment code and documentation comment generation</li>
				<li>Automatic code indentation</li>
			</ul>
			
			<p>
			To install the plug-in, click on the <strong>Help -> Install New Software...</strong> menu.  Once there, click the <strong>Add...</strong> button to add an update site.  Provide whatever name you like and enter the following location:<br/>
			<tt>http://www.shadow-language.org/updates</tt>
			</p>
		
			<p>
			If you have an older Shadow plugin, please uninstall it from Eclipse first.
			</p>				

			<br/>

			<h3><a name="emacs">Emacs Syntax Highlighter</a></h3>
			
			<p><a href="https://www.gnu.org/software/emacs/">Emacs</a> needs no introduction.  Below is an Emacs Lisp file that defines a Shadow major mode for Emacs with simple syntax highlighting.</p>
			
			<ul>
				<li><a href="https://raw.githubusercontent.com/TeamShadow/syntax-highlighters/master/Emacs/shadow-mode.el">Download Emacs Syntax Highlighting Major Mode for Shadow</a></li>
			</ul>
			
			<br/>

			<h3><a name="notepad">Notepad++ Syntax Highlighter</a></h3>
			
			<p><a href="https://notepad-plus-plus.org/">Notepad++</a> is a popular, free text editor for Windows.  Below is an XML file that defines syntax highlighting for Shadow inside of Nodepad++.</p>
			
			<ul>
				<li><a href="https://raw.githubusercontent.com/TeamShadow/syntax-highlighters/master/Notepad%2B%2B/shadow-notepad.xml">Download Notepad++ Syntax Highlighting Definitions for Shadow</a></li>
			</ul>
			
			<p>
			To install the syntax highlighter, click on <strong>Define your language...</strong> under the <strong>Language</strong> menu in Notepad++.  In the dialog that opens, click on the <strong>Import...</strong> button and select the <tt>shadow-notepad.xml</tt> file you have just downloaded from the link above.			
			</p>
			
			<br/>

			<h3><a name="vim">Vim Syntax Highlighter</a></h3>
			
			<p>Like Emacs, <a href="http://www.vim.org/">vim</a> needs no introduction.  Below is a vim syntax file and a vim file-type detect file that allow syntax highlighting for Shadow in vim.</p>
			
			<ul>
				<li><a href="https://raw.githubusercontent.com/TeamShadow/syntax-highlighters/master/vim/syntax/shadow.vim">Vim Syntax File</a></li>
				<li><a href="https://raw.githubusercontent.com/TeamShadow/syntax-highlighters/master/vim/ftdetect/shadow.vim">Vim File-Type Detect File</a></li>
			</ul>

			<p>
			To install the syntax highlighter, store the syntax file into <tt>~/.vim/syntax/</tt> and store the file-type detect file into <tt>~/.vim/ftdetect/</tt>.			
			</p>									
			
		</div>
	</div>
	<?php include $path . 'footer.inc'; ?>
	<div id="sidebar">
		<div id="spacer">
			<ul>						
				<li><a href="#eclipse">Eclipse Plug-in</a></li>
				<li><a href="#emacs">Emacs Syntax Highlighter</a></li>
				<li><a href="#notepad">Notepad++ Syntax Highlighter</a></li>												
				<li><a href="#vim">Vim Syntax Highlighter</a></li>						
			</ul>
		</div>
	</div>
</div>
<?php
	include $path . 'header.inc';
	include $path . 'menu.inc';	
?>