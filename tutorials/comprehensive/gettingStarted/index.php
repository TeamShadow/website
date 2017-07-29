<?php
	$path = '../../../';
	$subtitle = 'Tutorials<br/>Comprehensive Track<br/>Your First Shadow Program';
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Your First Shadow Program - Comprehensive Track - Shadow Tutorials">
	<meta name="keywords" content="Shadow, language, tutorial">
<title>
	Your First Shadow Program - Comprehensive Track - Tutorials - Shadow
</title>
</head>
<body onload="updateShading(); prettyPrint();">
<div id="container">	
	<div id="content">
		<div class="spacer">
<h2>Getting Started - &quot;Hello, World!&quot;</h2>
<p><strong>Note: A basic understanding of both procedural and object-oriented programming are suggested as prerequisites to this tutorial.</strong></p>
<p>In accordance with programming tradition, the first program demonstrated will print the message <code>&quot;Hello, World!&quot;</code></p>
<pre class="prettyprint lang-shadow">
// This program prints out &quot;Hello, World!&quot;
import shadow:io@Console;

class HelloWorld
{
    public main( String[] args ) =&gt; ()
    {
        Console out = Console:instance;
        out.printLine(&quot;Hello, World!&quot;);
    }
}
</pre>
<p>Although this code is relatively simple, it contains several important structural elements. Let's examine each  section of code independently.</p>
<h3>Comments</h3>
<pre class="prettyprint lang-shadow">
// This program prints out &quot;Hello, World!&quot;
</pre>
<p>The very first line in the program serves as a <em>comment</em>. Comments allow an author to annotate code with relevant information. Comments can be used to describe the function of a  segment of code or to provide important metadata about the program. There are two different rules which define comments:</p>
<ul>
<li>Anything between <code>//</code> and the end of the line will be ignored</li>
<li>Anything between <code>/*</code> and <code>*/</code> will be ignored - even across multiple lines</li>
</ul>
<p>In accordance with the second rule, the following example would be a legal comment.</p>
<pre class="prettyprint lang-shadow">
/*
 * None of this text will be compiled.
 * Not this line.
 * Not this line either.
 */
</pre>
<p>Comments are only present within the source code of a program. Neither the compiler nor the end-product executable will be impacted by comments.</p>
<h3>Importing packages with <code>import</code></h3>
<pre class="prettyprint lang-shadow">
import shadow:io@Console;
</pre>
<p>The <code>import</code> keyword allows the use of code stored in other locations. For organizational purposes, external code is stored within groupings called <em>packages</em>. In this case, we are using the class <code>Console</code> from the package <code>shadow:io</code>. Additionally, <code>io</code> is a subpackage (a package within another package) of <code>shadow</code>. Subpackages are accessed from within their superpackages via the <code>:</code> operator. Once inside the correct package, individual classes are specified with the <code>@</code> operator.</p>
<p>To import all classes within a particular package, you can leave off a particular class at the end. If access to the entire contents of <code>io</code> was desired, the following statement would be used.</p>
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
<p>The first line in this segment declares a <em>class</em> named <code>HelloWorld</code>. The definition of <code>HelloWorld</code> begins on the following line with a left brace (<code>{</code>) and ends several lines later with a corresponding right brace (<code>}</code>). All methods and variables declared in this space become <em>members</em> of <code>HelloWorld</code>. All code in Shadow must be encapsulated within a class.</p>
<h3>The <code>main()</code> method</h3>
<pre class="prettyprint lang-shadow">
public main( String[] args ) =&gt; ()
{
    &hellip;
}
</pre>
<p>While the above segment demonstrates a typical <em>method</em> definition, it is also the definition of a special-case method known as the <em>main method</em>. In Shadow, most code is written inside of methods; thus, most operations (such as printing text, changing variable values, or calling other methods) can only take place within methods. In addition, a method may be given data as <em>parameters</em> and may <em>return</em> data to its caller.</p>

<p>The line <code>public main( String[] args ) =&gt; ()</code> specifies a number of attributes for a method named <code>main()</code>, all of which form the method's particular <em>signature</em> when taken as a whole. To distinguish a method from a variable of the same name, we always put parentheses after the method name.  The specific structure and meaning of a method declaration will be explained in later tutorials.</p>

<p>Aside from being a member method of <code>HelloWorld</code>, <code>main()</code> serves a unique purpose. In order to compile an executable Shadow program, a <code>main()</code> method must be present somewhere within the program. The execution of any program always begins within its <code>main()</code> method, from which other methods may be called.  It's the starting point.  </p>

<h3>Printing text</h3>
<pre class="prettyprint lang-shadow">
Console out = Console:instance;
out.printLine(&quot;Hello, World!&quot;);
</pre>
<p>Finally, nested within both the <code>HelloWorld</code> class and the <code>main()</code> method is the code which actually performs the intended function of the program.</p>

<p>Methods can only be called from an existing <em>instance</em> of a given class, known as an <em>object</em>. An object must be created prior to calling any member methods.</p>

<p>The first line declares a reference to an <code>Console</code> object and retrives a <code>Console</code> object for it to point at.  <code>Console</code> is a special kind of class called a <em>singleton</em>. This means that only one <code>Console</code> object can exist within the program (in reality, within an individual thread of the program). Normally, an object is created using the <code>create</code> keyword.  However, a singleton is created the first time the <code>instance</code> keyword is used.  Any later uses of <code>instance</code> will retrieve the existing object. In this case, the <code>Console:instance</code> command gives us access to the <code>Console</code> object which has the ability to print out information using its <code>printLine()</code> method.</p>

<p>The second line calls this method named <code>printLine()</code> with the parameter <code>&quot;Hello, World&quot;</code>. In turn, this causes the text <tt>Hello, World</tt> to be printed to the screen.</p>

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