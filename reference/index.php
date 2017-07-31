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
<body onload="prettyPrint();">
<div id="container">		
	<div id="content">
		<div class="spacer">
			
			<h2>Reference</h2>
			
			<ul>
				<li><a href="faq/">FAQ</a></br>Frequently asked questions</li><br/>		
			
				<li><a href="<?=$path?>documentation/">Shadow Library Documentation</a></br>Documentation for the Shadow standard library that accompanies Shadow 0.7.5.</li><br/>
				
				<li><a href="reserved/">Reserved Words</a></br>Reserved words in Shadow 0.7.5</li>
			</ul>
						
			<p>
			Additional reference material including a grammar and formal language specification are planned.  For more information, please look at the <a href="<?=$path?>/features">Features</a> page for major differences from Java and <a href="<?=$path?>tutorials">Tutorials</a> for tutorials on how to write Shadow.
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