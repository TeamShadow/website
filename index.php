<?php
	$path = '';
	$subtitle = 'A fast, safe language for serious projects.';
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Shadow Language Homepage">
	<meta name="keywords" content="Shadow, language, homepage">
<title>
	Shadow Programming Language
</title>
</head>
<body onload="prettyPrint();">
<div id="container">	
	<div id="content">
		<div class="spacer">	
				
		
			<h2>What is Shadow?</h2>
		
			<p>
			Shadow is a type-safe, general purpose, systems language intended to be compiled to machine code.  The reference implementation for Shadow uses <a href="http://llvm.org/">LLVM</a>, the same infrastructure that the C-family compiler <a href="http://clang.llvm.org/">Clang</a> is built on, and targets the x86 architecture for the Linux, Mac, and Windows operating systems.  
			</p>
			
			<p>
			Shadow comes out of the C-like family of languages and shares some syntax with C and C++ but even more with Java and C#.  It's a statically-typed language that emphasizes clarity.  Don't get us wrong: Dynamically typed languages like Python, Ruby, and JavaScript are great for productivity, but sometimes you want stronger guarantees that a program does what you think it does.  Ultimately, it's a question of the right tool for the right job.
			</p>				
			
			
			<h3>Why can't a language be fast and safe?</h3>
			
			<p>
			It can!  Sure, you have to pay for checks on array bounds and null pointers, but some trade-offs are worth making.
			</p>
			
			<p>
			For hardcore systems programming, C and C++ have been the only practical options. Shadow doesn't allow direct pointer arithmetic like those languages, but for those rare situations when you need that level of control, the <code>native</code> keyword allows you to declare a method that can be implemented in C or raw LLVM.
			</p>
			
			<p>
			The Java Virtual Machine is a great execution environment, but the overhead of dynamic class loading, just-in-time compilation, and other VM services is not zero, especially when it comes to memory footprint.  Our goal in making Shadow was the best of both worlds: the modern syntax and safety guarantees of Java combined with the performance of C++.
			</p>
			
			<h3>But what makes Shadow special?</h3>
			
			<p>
			We're so glad you asked!  Despite its roots, it's not merely an unholy amalgamation of Java and C++.  It has a distinctive feel with unique features and syntax.
			</p>
			
			<p>
			Here's a taste:
			</p>
		
			<ul>
				<li>Methods that can return multiple values</li>
				<li>Properties for easy member access</li>
				<li>Immutable types and references</li>
				<li>Reified generics</li>
				<li>Signed and unsigned primitive types</li>
				<li>Language-supported singletons</li>
				<li>Garbage collection through reference counting</li>
				<li>Built-in UTF-8 support</li>
			</ul>
			
			<p>
			Want to know more?  Head over to the <a href="features/">Features</a> page.  If you have more general questions, check out the <a href="reference/faq/">FAQ</a>.
			</p>
			
		</div>
	</div>
	<?php include $path . 'footer.inc'; ?>
</div>

<div id="sidebar">
	<div class="spacer">		
					
		<div class="tag">News</div>
		<div class="box">					
			Shadow 0.7.5 has been released! Read the details on <a href="https://github.com/TeamShadow/shadow/releases/tag/v0.7.5-beta">GitHub</a> or head over the <a href="downloads/">Downloads</a> page to try it out.  Shadow 0.7.5 adds garbage collection, faster compile times, fewer bugs, and better Mac support!					
		</div>
	
		<br/>
	
		<div class="tag">FAQ</div>
		<div class="box">					
			Check out the <a href="reference/faq/">FAQ</a> for some quick answers about Shadow.
		</div>
		
	</div>
</div>
<?php	
	include $path . 'header.inc';
	include $path . 'menu.inc';	
?>