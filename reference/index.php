<?php
	$path = '../';
	$subtitle = 'Language Reference';
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Shadow Language Reference"/>
	<meta name="keywords" content="Shadow, language, documentation, reference"/>
<title>
	Reference - Shadow
</title>
</head>
<body onload="updateShading(); prettyPrint();">
<div id="container">		
	<div id="content">
		<div class="spacer">
			
			<h2>Reference</h2>
			
			<ul>
				<li><a href="<?=$path?>/documentation/">Shadow Library Documentation</a></br>Documentation for the Shadow standard library that accompanies Shadow 0.6.</li><br/>
				
				<li><a href="reserved/">Reserved Words</a></br>Reserved words in Shadow 0.6</li>
			</ul>
						
			<p>
			Additional reference material including a grammar and formal language specification are planned.  Until we can get this reference material created, please look at the <a href="<?=$path?>/features">Features</a> page for major differences from Java.  Once you download the Shadow compiler, explore <tt>shadow/utility</tt> for information about Shadow utility classes and <tt>shadow/test</tt> for some example Shadow programs.
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
</body>
</html>