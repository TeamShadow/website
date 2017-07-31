<?php
	$path = '../../';
	$subtitle = 'Reference<br/>Reserved Words';	
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Shadow Language FAQ"/>
	<meta name="keywords" content="Shadow, language, FAQ, frequently asked questions"/>
	<style>
		a small { float: right; color: gray; }	
	</style>	
<title>
	Frequently Asked Questions - Shadow
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
		Of course!  The GitHub repository for the compiler is <a href="https://github.com/TeamShadow/shadow/">here</a>.  Head over to the <a href="<?=$path?>Development/">Development</a> page for more information.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		
		<h3><a name="bug">I found a bug!</a></h3>
		
		<p>
		Well, we're not surprised.  Shadow has only been out in the world for a little while and is still in active development.  If you could head over to our <a href="https://github.com/TeamShadow/shadow/issues">issue tracking page</a> and file an issue, we would be grateful.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="memory">How does Shadow do memory management?  Is it garbage-collected?</a></h3>
		
		<p>
		At this point, Shadow is in its earliest alpha release, and we're still deciding on the best way to do memory management.  In other words, there's <em>no</em> memory management yet.  You can allocate memory, but there's no way to deallocate it.  It's a good thing that memory is cheap these days!
		</p>
		
		<p>
		Don't worry: It's high on our list of priorities! For a variety of reasons, we're leaning toward a reference counting system as opposed to mark-and-sweep garbage collection.  Shadow will not allow fully user-controlled memory management because it's impossible to offer the safety guarantees we want in that model.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="parallel">Does Shadow support parallel computation?  How does that work?</a></h3>
		
		<p>
		Parallel computation is central to the design of Shadow.  From the very beginning, our plan has been to make spawning threads easy for the user.  However, none of the parallel language features have been implemented in the compiler yet.		
		</p>
		
		<p>
		Our plan is to use a message-passing rather than a shared-memory paradigm.  To make this system efficient, we have compiler-enforced immutable classes and references.  Immutable objects can be shared freely among threads with no concerns about data races.
		</p>
		
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="long">Why does it take so long to compile a Shadow program?</a></h3>				
		
		<p>
		The issue is related to partial compilation.  The reference Shadow compiler currently recompiles <em>all</em> of the standard library for every program.  In the relatively near future, we will not recompile anything that is up-to-date.  At the moment, the compiler is in such active development that the way LLVM output is generated changes on a weekly basis.  If we didn't recompile everything every time, any change to the compiler would invalidate existing intermediate files.
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
		As a contrast, none of Shadow's members, methods, or inner classes are <code>static</code>.  One small exception are those members declared with the <code>constant</code> keyword, which are in fact constants computed at compile time and visible everywhere.  Most implementations of the singleton design pattern depend on a <code>static</code> member.  Instead, we provide the <code>singleton</code> keyword, which declares a special singleton class.  Unlike traditional singletons which have a maximum of one instance for the entire program, Shadow singletons have a maximum of one instance <em>per thread</em>, to prevent unsafe sharing.
		</p>
				
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="todo">What major features are still left to be implemented in Shadow?</a></h3>				
		
		<p>
		Quite a few!  We have already mentioned a couple of issues, but here's a list of what's absolutely critical.
		</p>
		
		<ul>
			<li>Memory management</li>
			<li>Threading and message passing</li>
			<li>Method pointers</li>
			<li>Local methods (closures)</li>
			<li>Enums</li>
		</ul>
		
		<p>
		There are also some issues that are either less critical or can be addressed incrementally.  At a minimum, these include the following.
		</p>
		
		<ul>
			<li>Partial compilation</li>
			<li>Expanded standard library</li>
			<li>Better data flow and control flow analysis for improved optimization</li>
			<li>Faster and more accurate conversion from floating point values to <code>String</code> representations and back</li>
			<li>Eclipse plug-in with functionality beyond syntax highlighting</li>
		</ul>
		
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="compiler">How does the Shadow compiler work?</a></h3>
		
		<p>
		The reference Shadow compiler is almost entirely written in Java.  It uses <a href="https://java.net/projects/javacc">JavaCC</a> to build an abstract syntax tree (AST) for a program. During the process, some dependency checking is done to see which other Shadow files will need to be compiled, adding them in if necessary. Then, it performs typechecking on the AST and converts it into canonical three-address code (TAC).  Last, it converts the TAC into LLVM.  At that point, the LLVM compiler turns the output into object code for the appropriate platform. Finally, all the object code is linked together with a linker, usually <tt>gcc</tt>.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
		<h3><a name="licensing">How is Shadow licensed?</a></h3>
		
		<p>
		All Shadow source code and binaries are free and open-source, licensed under the  <a href="http://www.apache.org/licenses/LICENSE-2.0.html">Apache 2.0 license</a>, which allows pretty wide usage for almost anything, even commercial applications.  The Windows distribution may include pre-compiled LLVM binaries, distributed under the <a href="http://llvm.org/docs/DeveloperPolicy.html#llvm-license">LLVM license</a>.
		</p>
		
		<a href="#top"><small>Back to top</small></a><br/>	
		
			
		</div>
	</div>
	<div id="push"></div>
</div>
<?php
	include $path . 'footer.inc';
	include $path . 'header.inc';
	include $path . 'menu.inc';	
?>


			
			