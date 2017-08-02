<?php
	$path = '../../';
	$subtitle = 'Tutorials<br/>Getting Started - Your First Shadow Program';
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Getting Started - Your First Shadow Program - Shadow Tutorials">
	<meta name="keywords" content="Shadow, language, tutorial">
<title>
	Getting Started - Your First Shadow Program - Tutorials - Shadow
</title>
</head>
<body onload="prettyPrint();">
<div id="container">	
	<div id="content">
		<div class="spacer">
<h2>Getting Started - Your First Shadow Program</h2>

<p>In accordance with programming tradition, the first program demonstrated will print the message <code>&quot;Hello, World!&quot;</code></p>
<pre class="prettyprint lang-shadow">
// This program prints out &quot;Hello, World!&quot;
import shadow:io@Console;

class HelloWorld
{
    public main( String[] args ) =&gt; ()
    {
        Console.printLine(&quot;Hello, World!&quot;);
    }
}
</pre>
<p>Although the function of this code is relatively simple, it contains several important structural elements. Let's examine each section of code independently.</p>
<h3>Comments</h3>
<pre class="prettyprint lang-shadow">
// This program prints out &quot;Hello, World!&quot;
</pre>
<p>The very first line in the program serves as a <em>comment</em>. Comments allow an author to annotate code with relevant information. In practice, comments are used to describe the function of a segment of code or to provide important information about the program. There are two (really thre) different rules which define comments:</p>
<ul>
<li>Anything between <code>//</code> and the end of the line will be ignored</li>
<li>Anything between <code>/*</code> and <code>*/</code> will be ignored - even across multiple lines</li>
</ul>
<p>In accordance with the second rule, the following example is a legal comment.</p>
<pre class="prettyprint lang-shadow">
/*
 * None of this text will be compiled.
 * Not this line.
 * Not this line either.
 */
</pre>
<p>Comments are only present within the source code of a program. Neither the compiler nor the end-product executable will be impacted by comments.  The third kind of comment is a documentation comment which contains specially marked-up information about code that can be used to automatically generate documentation.  A documentation comment looks like the second kind of comment except that it begins with <code>/**</code> instead of <code>/*</code>.</p>
<h3>Importing packages with <code>import</code></h3>
<pre class="prettyprint lang-shadow">
import shadow:io@Console;
</pre>
<p>The <code>import</code> keyword allows the use of code stored in other locations. For organizational purposes, external code can be stored within groupings called <em>packages</em>. In this case, we are using the class <code>Console</code> from the package <code>shadow:io</code>. Additionally, <code>io</code> is a subpackage (a package within another package) of <code>shadow</code>. Subpackages are accessed from within their superpackages via the <code>:</code> operator. Once inside the correct package, individual classes are accessed with the <code>@</code> operator.</p>
<p>To import all classes within a particular package, you can leave off a particular class at the end. If access to the entire contents of <code>io</code> was desired, the following statement could be used:</p>
<pre class="prettyprint lang-shadow">
import shadow:io;
</pre>
<h3>Defining a class</h3>
<pre class="prettyprint lang-shadow">
class HelloWorld
{
    &hellip;
}
</pre>
<p>The first line in this segment declares a class named <code>HelloWorld</code>. The definition of <code>HelloWorld</code> begins on the following line with a left brace (<code>{</code>) and ends several lines later with a corresponding right brace (<code>}</code>). All methods and variables declared in this space become members of <code>HelloWorld</code>. All code in Shadow must be encapsulated within a class.</p>
<h3>The <code>main</code> method</h3>
<pre class="prettyprint lang-shadow">
public main( String[] args ) =&gt; ()
{
    &hellip;
}
</pre>
<p>While this segment demonstrates a typical <em>method</em> definition, it is also the definition of a special-case method known as the <em>main method</em>. In Shadow, most code is written inside of methods; thus, most operations (such as printing text, changing variable values, or calling other methods) can only take place within methods. In addition, a method may be given data as <em>parameters</em> and may <em>return</em> data to its caller.</p>
<p>The statement <code>public main( String[] args ) =&gt; ()</code> specifies a number of attributes for a method named <code>main()</code>, all of which form the method's particular <em>signature</em> when taken as a whole. To distinguish a method from a variable of the same name, we always put parentheses after the method name. The specific structure and meaning of a method declaration will be explained in later tutorials.</p>
<p>Aside from being a member method of <code>HelloWorld</code>, <code>main()</code> serves a unique purpose. In order to compile an executable program, a <code>main()</code> method must be present somewhere within the program. The execution of a program always begins within its <code>main()</code> method, from which other methods may be called. Put simply, it's the starting point of the program.</p>
<h3>Printing text</h3>
<pre class="prettyprint lang-shadow">
Console.printLine(&quot;Hello, world!&quot;);
</pre>
<p>Finally, nested within both the <code>HelloWorld</code> class and the <code>main()</code> method, is the code which actually performs the intended function of the program.</p>
<p>The <code>printLine(&quot;Hello, world!&quot;)</code> portion of this line calls a method named <code>printLine()</code> with the parameter <code>&quot;Hello, World&quot;</code>. In turn, this causes the text <code>&quot;Hello, World&quot;</code> to be printed to the screen. But what is the purpose of the <code>Console</code> portion?</p>
<p>Once again, the syntax in this statement represents a special case. It's worth remembering that methods are members of their surrounding class. In addition, methods can only be called from an existing <em>instance</em> of their class, known as an object. An object must be created prior to calling any member methods.</p>
<p><code>Console</code>, however, is a special kind of class called a singleton. This means that only one <code>Console</code> object can exist within the entire program (in reality, within an individual thread of the program). Normally, an object is created using the <code>create</code> keyword. However, a singleton is created in the first method that uses it. Any later uses of the singleton will retrieve the existing object. In this case, the <code>Console</code> command gives us access to the <code>Console</code> object which has the ability to print out information using its <code>printLine()</code> method described above.  Shadow syntax requires that the name of an object and the name of the method that is being called are separated by a dot.</p>
		</div>
	</div>
	<?php include $path . 'footer.inc'; ?>
</div>		

<div id="sidebar">
	<div id="spacer">
	</div>
</div>
<?php 
	include $path . 'header.inc';
	include $path . 'menu.inc';		
?>
</body>
</html>