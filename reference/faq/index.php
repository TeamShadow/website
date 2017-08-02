<?php
	$path = '../../';
	$subtitle = 'Reference<br/>Frequently Asked Questions';	
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Shadow Language FAQ"/>
	<meta name="keywords" content="Shadow, language, FAQ, frequently asked questions"/>
	<style>
		a small { float: right; color: gray; }	
	</style>	
<title>
	Frequently Asked Questions - Reference - Shadow
</title>
</head>
<body onload="prettyPrint();">
<div id="container">	
	<div id="content">
		<div class="spacer">
		
			<a name="top"></a>
			<h2>FAQ</h2>						
			<br/>
			
			<ul>
				<li><a href="#name">Where does the name Shadow come from?</a></li>
				<li><a href="#who">Who is developing the Shadow language?</a></li>
				<li><a href="#involvement">Can I work on Shadow?</a></li>
				<li><a href="#bug">I found a bug!</a></li>
				<li><a href="#memory">How does Shadow do memory management?  Is it garbage-collected?</a></li>
				<li><a href="#parallel">Does Shadow support parallel computation?  How does that work?</a></li>
				<li><a href="#long">Why does it take so long to compile a Shadow program?</a></li>				
				<li><a href="#features">Why doesn't feature X work the way it does in language Y?</a></li>
				<li><a href="#static">What happened to the <code>static</code> keyword?</a></li>
				<li><a href="#todo">What major features are left to be implemented in Shadow?</a></li>				
				<li><a href="#compiler">How does the Shadow compiler work?</a></li>
				<li><a href="#licensing">How is Shadow licensed?</a></li>
			</ul>			
		
		
		<h3><a name="name">Where does the name Shadow come from?</a></h3>

		<p>
		At this point, no one clearly remembers.  But it's still a pretty awesome name.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	

		<h3><a name="who">Who is developing the Shadow language?</a></h3>
		
		<p>
		Barry Wittman and Bill Speirs are the original designers of the language.  They got a lot of help on the compiler back-end from Jacob Young.  Now, the compiler is hosted on <a href="https://github.com/">GitHub</a>, so anyone can work on it.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="involvement">Can I work on Shadow?</a></h3>
		
		<p>
		Of course!  The GitHub repository for the compiler is <a href="https://github.com/TeamShadow/shadow/">here</a>.  Head over to the <a href="<?=$path?>development/">Development</a> page for more information.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		
		<h3><a name="bug">I found a bug!</a></h3>
		
		<p>
		Well, we're not surprised.  Shadow has only been out in the world for a little while and is still in active development.  If you could head over to our <a href="https://github.com/TeamShadow/shadow/issues">issue tracking page</a> and file an issue, we would be grateful.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="memory">How does Shadow do memory management?  Is it garbage-collected?</a></h3>
		
		<p>
		Release 0.7.5 adds garbage collection through reference counting.  Since mutable objects are not shared between threads in Shadow, reference counting allows garbage collection to be handled on a thread by thread basis.  In other words, there's no need for garbage collection pauses that lock up all threads.  Unfortunately, reference counting is also relatively slow, and our system does not deal with circular references at all yet.  Although reference counting will probably remain one aspect of garbage collection in Shadow, we hope to employ a hybrid approach, using some kind of ownership model as well.
		</p>
		
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="parallel">Does Shadow support parallel computation?  How does that work?</a></h3>
		
		<p>
		Parallel computation is central to the design of Shadow.  From the very beginning, our plan has been to make spawning threads easy for the user.  However, none of the parallel language features have been implemented in the compiler yet. (They should be coming in the next release!)		
		</p>
		
		<p>
		Our plan is to use a message-passing rather than a shared-memory paradigm.  To make this system efficient, we have compiler-enforced immutable classes and references.  Immutable objects can be shared freely among threads with no concerns about data races.
		</p>
		
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="long">Why does it take so long to compile a Shadow program?</a></h3>				
		
		<p>
		<strong>Update:</strong> As of Shadow 0.7.5, it no longer takes nearly as long to compile a Shadow program!  After installation, compiling your first Shadow program may still take a while because most of the standard library has to be compiled for the first time.  It's not unusual for that first compilation to take 15-30 seconds.  After that first compilation, however, the process shouldn't take nearly as long.  Our compiler is written in Java, so there is some inevitable latency as the JVM fires up.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="features">Why doesn't feature X work the way it does in language Y?</a></h3>
		
		<p>
		Chances are good that we've thought about this feature and made a strategic decision.  Not everyone will agree with the decision we've made, but the language is still relatively fluid.  Give us a good argument about why we should do something differently, and we'll be happy to think it over.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="static">What happened to the <code>static</code> keyword?</a></h3>
		
		<p>
		The <code>static</code> keyword exists in C, C++, C#, Java, and other languages.  In C, the keyword relates mostly to variable scope.  In C++, C#, and Java, it primarily marks methods and members as belonging to the class as a whole, rather than to a particular object.  This feature undermines the philosophy of object-oriented programming because <code>static</code> methods cannot be overridden.
		</p>
		
		<p>
		Likewise, <code>static</code> members are essentially global variables, allowing data to be shared too easily between classes and between threads.  Now, we understand why <code>static</code> members and methods have been used in the past: Both are easy to implement on the compiler, and <code>static</code> methods are more efficient to call because they don't have dynamic dispatch.
		</p>
		
		<p>
		As a contrast, none of Shadow's members or methods are <code>static</code>.  One small exception are those members declared with the <code>constant</code> keyword, which are in fact constants computed at compile time and visible everywhere.  Most implementations of the singleton design pattern depend on a <code>static</code> member.  Instead, we provide the <code>singleton</code> keyword, which declares a special singleton class.  Unlike traditional singletons which have a maximum of one instance for the entire program, Shadow singletons have a maximum of one instance <em>per thread</em>, to prevent unsafe sharing.
		</p>
		
		<p>
		Java takes the route of having <code>static</code> nested classes and "true" inner classes.  In the Java world, a "true" inner class object is actually associated with a particular outer class object and can read its members and call its methods directly.  This design is ideal for something like an iterator, which is intended to have complete access to one particular list.  However, many students and even some professional Java developers don't understand inner class usage correctly.  Furthermore, this kind of inner class design causes additional complexity in the compiler and the run-time system.  The inner classes in both C++ and C# behave like <code>static</code> nested classes in Java: Each is a class in its own right whose visibility may be restricted to methods within its outer class.  Although these inner classes do not automatically have a reference to an outer class object, they can manipulate the <code>private</code> and <code>protected</code> members of such an object if they get a reference to it.  Shadow 0.7.5 adopts the approach of C++ and C#, providing inner classes as a way to give finer-grained control over visibility and access but not tying inner class objects to particular outer class objects.
		</p>
				
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="todo">What major features are still left to be implemented in Shadow?</a></h3>				
		
		<p>
		Quite a few!  We have already mentioned a couple of issues, but here's a list of what's absolutely critical.
		</p>
		
		<ul>			
			<li>Threading and message passing</li>
			<li>Method references</li>
			<li>Local methods (closures)</li>
			<li>Enums</li>
		</ul>
		
		<p>
		There are also some issues that are either less critical or can be addressed incrementally.  At a minimum, these include the following.
		</p>
		
		<ul>			
			<li>Expanded standard library</li>
			<li>Better memory management</li>
			<li>Faster and more accurate conversion from floating point values to <code>String</code> representations and back</li>
			<li>Plug-ins for other popular IDEs such as <a href="https://www.jetbrains.com/idea/">IntelliJ IDEA</a> and <a href="https://code.visualstudio.com/">Visual Studio Code</a></li>
		</ul>
		
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="compiler">How does the Shadow compiler work?</a></h3>
		
		<p>
		The reference Shadow compiler is almost entirely written in Java.  It uses <a href="http://www.antlr.org/">ANTLR 4</a> to build an abstract syntax tree (AST) for a program. During the process, some dependency checking is done to see which other Shadow files will need to be compiled, adding them in if necessary. Then, it performs type-checking on the AST and converts it into canonical three-address code (TAC).  Last, it converts the TAC into LLVM IR.  At that point, the LLVM optimizer turns the LLVM IR into optimized LLVM bitcode, which can be reused in future compilations if the source file remains unchanged.  Then, the LLVM compiler turns the LLVM bitcode into machine-dependent object code. Finally, all the object code is linked together with a linker, usually <tt>gcc</tt>.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="licensing">How is Shadow licensed?</a></h3>
		
		<p>
		All Shadow source code and binaries are free and open-source, licensed under the  <a href="http://www.apache.org/licenses/LICENSE-2.0.html">Apache 2.0 license</a>, which allows pretty wide usage for almost anything, even commercial applications.  The Windows distribution may include pre-compiled LLVM binaries, distributed under the <a href="http://llvm.org/docs/DeveloperPolicy.html#llvm-license">LLVM license</a>.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
			
		</div>
	</div>
	<?php include $path . 'footer.inc'; ?>
</div>

<div id="sidebar">
	<div id="spacer">
		<ul>
			<li><a href="#name">Where does the name Shadow come from?</a></li>
			<li><a href="#who">Who is developing the Shadow language?</a></li>
			<li><a href="#involvement">Can I work on Shadow?</a></li>
			<li><a href="#bug">I found a bug!</a></li>
			<li><a href="#memory">How does Shadow do memory management?  Is it garbage-collected?</a></li>
			<li><a href="#parallel">Does Shadow support parallel computation?  How does that work?</a></li>
			<li><a href="#long">Why does it take so long to compile a Shadow program?</a></li>				
			<li><a href="#features">Why doesn't feature X work the way it does in language Y?</a></li>
			<li><a href="#static">What happened to the <code>static</code> keyword?</a></li>
			<li><a href="#todo">What major features are left to be implemented in Shadow?</a></li>				
			<li><a href="#compiler">How does the Shadow compiler work?</a></li>
			<li><a href="#licensing">How is Shadow licensed?</a></li>
		</ul>		
	</div>
</div>
<?php
	include $path . 'header.inc';
	include $path . 'menu.inc';	
?>


			
			