<?php
	$path = '../';
	$subtitle = 'Features';
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Shadow Language Features"/>
	<meta name="keywords" content="Shadow, language, features"/>
	<style>
		a small { float: right; color: gray; }	
	</style>
<title>
	Features - Shadow
</title>
</head>
<body onload="updateShading(); prettyPrint();">
<div id="container">	
	<div id="content">
		<div class="spacer">
		
			<div class="note">				
				<div class="box">
					<ul>
						<li><a href="#sequences">Sequences</a></li>
						<li><a href="#multiple">Returning multiple values</a></li>
						<li><a href="#var"><code>var</code> type</a></li>
						<li><a href="#cat">Cat operator</a></li>
						<li><a href="#properties">Properties</a></li>
						<li><a href="#singletons">Singletons</a></li>
						<li><a href="#immutable">Immutable classes and references</a></li>						
						<li><a href="#copying">Deep copying</a></li>						
						<li><a href="#equals">Useful <code>==</code> operator</a></li>
						<li><a href="#overloading">(Limited) operator overloading</a></li>						
						<li><a href="#nonull">No null reference exceptions</a></li>
						<li><a href="#unsigned">Unsigned types</a></li>
						<li><a href="#literals">Numeric types and literals</a></li>
						<li><a href="#utf8">UTF-8 support</a></li>
					</ul>
				</div>
			</div>
		
		
			<h2>Dragging people into the Shadow</h2>
		
			<p>
			When designing Shadow, we wanted to keep syntax as familiar as possible to ease the learning curve.  On the other hand, we thought we could do some things more cleanly or more safely.  The features below describe the syntax that gives Shadow its distinctive flavor.
			</p>
			
			<h3><a name="sequences">Sequences</a></h3>
			
			<p>
			Let's say you want to assign two different values to two different variables on the same line.  To do so in Shadow, you could use a <em>sequence</em>.
			</p>
			
<pre class="prettyprint lang-shadow">
(x, y) = (3.5, 6.8);
</pre>
			
			<p>
			Sequences are syntactic structures only, not types.  Unlike Python, you cannot declare a variable with a sequence type.  In a sequence assignment, values on the right are copied element-by-element into the variables on the left.  
			</p>
			
			<p>
			Doesn't seem all that useful yet?  What about for a swap?
			</p>
			
<pre class="prettyprint lang-shadow">
(x, y) = (y, x);
</pre>

			<p>
			All values on the right side are evaluated before the assignments.  Sequence assignments can also be done with a single value on the right side, storing that value into each element of the sequence on the left. Doing so is called a <em>splat</em>.
			</p>
			
<pre class="prettyprint lang-shadow">
(x, y, z) = 0.0; // all three are now 0.0
</pre>
		
			<p>
			Splats are useful because assignment doesn't evaluate to a value in Shadow.  For example, the following is a syntax error.
			</p>
			
<pre class="prettyprint lang-shadow">
x = y = z = 0.0; // illegal in Shadow!
</pre>			
		
			<p>
			Why did we make that illegal?  First, especially with complicated assignments, the results can become unclear in C++ or Java.
			</p>
			
<pre class="prettyprint lang-cc">
// C++ code
int i = 4;
i = i++; // different versions of gcc get different results for i!
</pre>

			<p>
			Of course, this issue is minimized because <code>i++</code> isn't legal in Shadow either.  (Use <code>i += 1</code> instead.)  The second reason is the use of assignments in conditions, which is sometimes slick and sometimes an error.
			</p>
			
<pre class="prettyprint lang-java">
// Java code
boolean value = false;
if( value = true ) // always true, but illegal in Shadow
{
	...
}
</pre>			

			<a href="#top"><small>Back to top</small></a><br/>	

			
			<h3><a name="multiple">Returning multiple values</a></h3>
			
			<p>
			Have you ever wanted to write a method that returns multiple things? Of course you have!  C gets around the problem by passing pointers.  C++ gets around the problem with pass-by-reference parameters.  Similarly, C# has reference and output parameters.  Java has no good solution, forcing hacks like returning an object created just for the occasion or passing in small arrays to simulate pass-by-reference.
			</p>
			
			<p>
			Shadow uses the same sequence syntax to return multiple values and to store them into variables after the return.  The following is a toy method that returns both the quotient and the remainder of a division.
			</p>
			
<pre class="prettyprint lang-shadow">
public divide(int a, int b) => (int, int)
{
	int quotient = a / b;
	int remainder = a % b;
	return (quotient, remainder);
}
</pre>

			<p>
			Note the slightly different method syntax that puts all return types on the right side of the method header.  A method that returns nothing leaves those parentheses empty. Presto! The <code>void</code> keyword is no longer needed.  Calling the method behaves the same as any sequence assignment.
			</p>
			
<pre class="prettyprint lang-shadow">
(result, modulus) = divide(7, 3); // stores 2 and 1, respectively
</pre>

			<p>
			If you don't need to store one of the values, just leave it out of the list.
			</p>
			
<pre class="prettyprint lang-shadow">
(result, ) = divide(7, 3); // only stores 2
</pre>
			
			<a href="#top"><small>Back to top</small></a><br/>	
			
			<h3><a name="var"><code>var</code> type</a></h3>
			
			<p>
			Shadow is a strongly typed language, but the types for variables are generally obvious.  Java often forces you to spell out the name of a type twice.
			</p>
			
<pre class="prettyprint lang-java">
// Java code
Crate&lt;Hamdinger, Underwear&gt; crate = new Crate&lt;Hamdinger, Underwear&gt;();
</pre>			

			<p>
			Like C# (and similar to the <code>auto</code> keyword in C++11), Shadow provides a <code>var</code> keyword that can be used to declare local variables that have an initializer.
			</p>

<pre class="prettyprint lang-shadow">
// Shadow equivalent
var crate = Crate&lt;Hamdinger, Underwear&gt;:create();
</pre>			
			
			<a href="#top"><small>Back to top</small></a><br/>	
			
			<h3><a name="cat">Cat operator</a></h3>
			
			<p>
			In Java and C#, the plus (<code>+</code>) operator is used to concatenate other types onto string values.  Because the plus operator is used for numerical operations, its use can be ambiguous.			
			</p>
			
<pre class="prettyprint lang-java">
// Java code
String song1 = "Love Potion Number " + 4 + 5;
String song2 = "Love Potion Number " + (4 + 5);
</pre>

			<p>
			Since Java concatenation has the same precedence as normal addition, <code>song1</code> contains  <code>"Love Potion Number 45"</code> while <code>song2</code> contains <code>"Love Potion Number 9"</code>.  Our solution was to use the octothorpe (<code>#</code>), now commonly called the pound sign, number sign, or hash tag, as a string concatenation operator.  This operator, called <em>cat</em> in Shadow jargon, has a lower precedence than addition. 
			</p>
			
<pre class="prettyprint lang-shadow">
// Shadow code
String song1 = "Love Potion Number " # 4 + 5;
</pre>

			<p>
			In this Shadow version, <code>song1</code> contains <code>"Love Potion Number 9"</code>.  There is also a unary version of cat, which is equivalent to calling the <code>toString()</code> method on any object.
			</p>

<pre class="prettyprint lang-shadow">
Bottle bottle = sea.washUp();
String message = #bottle;
</pre>
	
			<a href="#top"><small>Back to top</small></a><br/>	
			
			
			<h3><a name="properties">Properties</a></h3>
			
			<p>
			In Shadow, all member variables are private.  That's great for upholding OOP principles, but doesn't it get tedious writing accessors and mutators for all of those member variables?  It could, but Shadow will create them for you at the drop of a hat.  Let's look at a toy <code>Wombat</code> class.
			</p>

<pre class="prettyprint lang-shadow">
class Wombat
{    
    get String name;
    set double weight;
    get set int age;
    
    public create(String name, double weight)
    {        
        this:name = name;
        this:weight = weight;
        age = 0;
    }
}
</pre>

			<p>
			Because the <code>name</code> member is marked <code>get</code>, its value can be retrieved with a <em>property</em>.  Properties are accessed with the arrow operator (<code>-></code>).
			</p>
			
<pre class="prettyprint lang-shadow">
Wombat bob = Wombat:create("Bob", 12.5);
String greeting = "Hey, " # bob->name # "!";
</pre>
			<p>
			Since <code>weight</code> is marked <code>set</code>, the arrow operator can be used in the same way to store a value into it.
			</p>
			
<pre class="prettyprint lang-shadow">
bob->weight = 14.8; // Bob gained weight
</pre>
		
			<p>
			Even more conveniently, a member that is marked both <code>get</code> and <code>set</code> can be both retrieved and stored, even at the same time.
			</p>

<pre class="prettyprint lang-shadow">
bob->age += 1; // Bob had a birthday!
</pre>	

			<p>
			Of course, properties are more flexible than that.  If you want to do something other than the default operations of retrieving and storing, you can write your own.
			</p>
			
<pre class="prettyprint lang-shadow">
class Wombat
{    
    get String name;
    set double weight;
    get set int age;
    
    public create(String name, double weight)
    {        
        this:name = name;
        this:weight = weight;
        age = 0;
    }
    
    public set age(int value) => ()
    {
        if( value >= 0 )
            age = value;
    }    
}
</pre>

			<p>
			This second version of the <code>Wombat</code> class has a custom specification for the <code>set</code> part of the <code>age</code> property which prevents users from storing a negative value into <code>age</code>.  Note that the name of the method is exactly the same as the member.  This method and indeed all properties can also be called directly as methods (since that's what they are, under the covers), but we suggest that property syntax is used whenever possible.
			</p>
			
			<p>
			C# also has properties, but we think Shadow improves on them in a few ways:
			</p>
			
			<ol>
				<li>The addition of only the <code>get</code> and <code>set</code> modifiers adds default properties with no extra work.</li>
				<li>Properties and their related member variables have the same name.</li>
				<li>Using the arrow (<code>-></code>) rather than the dot (<code>.</code>) distinguishes a property call (which can potentially execute arbitrarily complex code) from a member access.  </li>
			</ol>
			
			<a href="#top"><small>Back to top</small></a><br/>
			
			<h3><a name="singletons">Singletons</a></h3>
			
			<p>
			There is no <code>static</code> keyword in Shadow, but in other languages it is occasionally necessary to use a <code>static</code> member to share a single item among many pieces of code.  Perhaps the best reason to do so is the singleton design pattern, in which there is only ever a single object of a given class. Our solution is singleton classes, of which there can only be a single object at any time, per thread.
			</p>
			
			<p>A singleton object never needs to be created, since its creation is handled in the first method where it appears.A good example of a singleton is the <code>Console</code> class used for command line I/O.  Although not necessary, a singleton variable can be used, which is just a convenient alias for the singleton.
			</p>
			
<pre class="prettyprint lang-shadow">
Console out; // no create needed (or possible)
out.printLine("Bring rap justice!");
Console screen; // still the same object
screen.printLine("Shut 'em down!");
</pre>	
			<a href="#top"><small>Back to top</small></a><br/>	
			
						
			<h3><a name="immutable">Immutable classes and references</a></h3>
			
			<p>As most Java programmers know, the <code>String</code> class is immutable, meaning that the contents of a <code>String</code> object cannot be changed after the object is initialized.  Unfortunately, the only way to know this is by reading the documentation for the class.  In Java, there is no way to declare a class as immutable or enforce its immutability with the compiler.
			</p>
			
			<p>
			In Shadow, there is a way.  The <code>immutable</code> keyword allows a class to be marked immutable.  Any code outside of its constructor that seeks to modify its contents will not compile.
			</p>
			
			<p>
			It is also possible to declare a reference with the <code>immutable</code> keyword.  In this case, there are no mutable references to the object the immutable reference points to.  It can be freely shared between all methods and threads with no concern that its contents will be changed.
			</p>
			
			<p>
			The trouble is that an <code>immutable</code> reference cannot be stored into a normal reference without losing the guarantee that its contents are protected.  To mediate between the two different kinds of references, <code>readonly</code> references are used.  A <code>readonly</code> reference cannot have any mutable methods called on it.  You can store either an <code>immutable</code> reference or a normal reference into a <code>readonly</code> reference.
			</p>
			
			<img src="<?=$path?>/images/immutable.png" alt="Relationship between immutable, readonly, and normal references" class="center" />
			
			<p>
			At first, <code>immutable</code> references seem indistinguishable from <code>readonly</code> references.  Remember this: With a <code>readonly</code> reference, someone might have a normal reference they can use to change the contents of the object.  With an <code>immutable</code> reference, it's as if all the references to the object are <code>readonly</code>.  No one can ever change the contents of such an object.
			</p>
			
			<p>
			Finally, a method can be marked <code>readonly</code>, meaning that it's guaranteed not to change the contents of the object it's in. This is similar to <code>const</code> methods in C++.  All the methods in an <code>immutable</code> class are <code>readonly</code> automatically.
			</p>
			
			
			
			<a href="#top"><small>Back to top</small></a><br/>			
			
			<h3><a name="copying">Deep copying</a></h3>
			
			<p>
			What happens when you want to make a copy of an object?  You can store the object into another reference, but that only creates an alias for the same object, not a copy.
			</p>
			
			<p>
			All objects in Java have a <code>clone()</code> method, which allocates a new object and copies over all of its members.  Unfortunately, its operation depends on everyone implementing the <code>clone()</code> method correctly for every class.  Many developers do not implement the  <code>clone()</code> at all.  Likewise, the <code>clone()</code> method often cannot perform a true deep copy, in which all the members of the object are also copied.  The risk in doing so would be the presence of a circular reference, which would begin a cycle of copying that would never finish.
			</p>
			
			<p>
			In Shadow, there are two keywords specifically designed for deep copies: <code>copy</code> and <code>freeze</code>.  When <code>copy</code> is used to copy an object, it performs a full deep copy, making deep copies of all the members as well.  Internally, the <code>copy</code> command keeps track of all the new objects allocated.  If a circular reference would cause something to be copied a second time, the <code>copy</code> command instead uses the first copy.  The exception to the rule are <code>immutable</code> objects, which cannot be changed anyway.  References to such objects are assigned directly, without making copies of the underlying objects.
			</p>
			
			<p>
			The <code>freeze</code> command works exactly like the <code>copy</code> command except that all of the copies it creates are <code>immutable</code>.  The <code>freeze</code> command is the only way to create an <code>immutable</code> version of an existing object whose class is not already <code>immutable</code>. 
			</p>
			

<pre class="prettyprint lang-shadow">
Person stanleyBurrell = Person:create("Stanley Kirk Burrell");
Person mcHammer = copy(stanleyBurrell);
mcHammer.setName("MC Hammer"); // doesn't affect stanleyBurrell
immutable Person cantTouchThis = freeze(mcHammer); // can never have its internals changed
</pre>			
			
			
			<a href="#top"><small>Back to top</small></a><br/>			
			
			
			<h3><a name="equals">Useful <code>==</code> operator</a></h3>
			
			<p>
			In Java, the <code>==</code> operator compares two values to see if they are the same.  This comparison is meaningful for primitive types, but for reference types, it only returns <code>true</code> when the two references are pointing at the same location.  The proper way to compare two objects in Java is to use the <code>equals()</code> method.
			</p>
			
			<p>
			Ultimately, this design causes confusion, particularly since it is legal to compare two objects with <code>==</code>, even if it is rarely useful.  In Shadow, the <code>==</code> operator is only valid between an object that implements the <code>CanEqual</code> interface for the other object.  In other words, the <code>==</code> operator is syntactic sugar for the <code>equal()</code> method (which does not end with an 's' in Shadow).
			</p>
			
			<p>
			For primitive types, the <code>==</code> operator works exactly as you would expect.  For object types, the first either has an <code>equal()</code> method defined to work with the second or the code will fail to compile.  For reference comparison, the <code>===</code> operator (yes, three equal signs) is available.  Fortunately, there are few situations when it is needed.
			</p>
			
			<a href="#top"><small>Back to top</small></a><br/>
			
			<h3><a name="overloading">(Limited) operator overloading</a></h3>
			
			<p>
			In effect, the discussion above demonstrates a kind of operator overloading for the <code>==</code> operator; however, operator overloading is a slippery slope.  In our opinion, C++ went overboard, allowing even fundamental operators like assignment (<code>=</code>) to be overloaded in arbitrary ways.
			</p>
			
			<p>
			The Shadow approach is limited and based on interfaces.  For overloading arithmetic operators, the interfaces <code>CanAdd&lt;T&gt;</code>, <code>CanSubtract&lt;T&gt;</code>, <code>CanMultiply&lt;T&gt;</code>, <code>CanDivide&lt;T&gt;</code>, and <code>CanModulus&lt;T&gt;</code> can be implemented to allow overloading of the <code>+</code>, <code>-</code>, <code>*</code>, <code>/</code>, and <code>%</code> operators, respectively.  Below is an example of a <code>Complex</code> class for manipulating complex numbers that overloads <code>+</code>, <code>-</code>, and <code>*</code>.
			</p>
			
			
<pre class="prettyprint lang-shadow">
immutable class Complex
is  CanAdd&lt;Complex&gt; 
and CanSubtract&lt;Complex&gt;
and CanMultiply&lt;Complex&gt;
and CanEqual&lt;Complex&gt;
{
    get int real;
    get int imaginary;
    
    public create(int real, int imaginary)
    {
        this:real = real;
        this:imaginary = imaginary;
    }

    public add(Complex other) => (Complex)
    {
        return Complex:create(real + other:real, imaginary + other:imaginary);
    }
    
    public subtract(Complex other) => (Complex)
    {
        return Complex:create(real - other:real, imaginary - other:imaginary);
    }
    
    public multiply(Complex other) => (Complex)
    {
        return Complex:create(real * other:real - imaginary * other:imaginary,
                    real * other:imaginary + imaginary * other:real);    
    }
    
    public equal(Complex other) => (boolean)
    {
        return real == other:real and imaginary == other:imaginary;
    }
}
</pre>	

			<p>
			Thus, objects of type <code>Complex</code> could be added together as shown below.
			</p>
			
<pre class="prettyprint lang-shadow">
Complex a = Complex:create(1, 3);
Complex b = Complex:create(-5, 2);
Complex c = a + b;
</pre>

		
			<p>
			In addition to the standard arithmetic operators, there is an interface for the bitwise operators <code>&amp;</code>, <code>|</code>, <code>^</code>, <code>&lt;&lt;</code>, <code>&gt;&gt;</code>, <code>&lt;&lt;&lt;</code>, <code>&gt;&gt;&gt;</code>, and <code>~</code>, but they come as a bundle.  It's expected that they will only be useful for classes that have bitwise behavior similar to an integer, like <code>BigInteger</code>.
			</p>
			
			<p>
			Having the <code>CanIndex&lt;V,K&gt;</code> interface overloads the index operator (<code>[]</code>) to read values from an index.  Consider the following code that allows array-like indexing of an <code>ArrayList</code>.
			</p>
			
<pre class="prettyprint lang-shadow">
var band = ArrayList&lt;String&gt;:create();
band.add("John");
band.add("Paul");
band.add("George");
band.add("Ringo");
String drummer = band[3];
</pre>

			<p>
			The <code>CanIndexStore&lt;V,K&gt;</code> interface has the <code>CanIndex&lt;V,K&gt;</code> interface and overloads the index operator (<code>[]</code>) further so that it can also store values into an index.  Consider the following code that stores values into a <code>HashMap</code> using array-like indexing.
			</p>
			
<pre class="prettyprint lang-shadow">
var clan = HashMap&lt;String, String&gt;:create();
clan["Russell Jones"] = "ODB";
clan["Clifford Smith"] = "Method Man";
clan["Dennis Coles"] = "Ghostface Killah";
</pre>			
			
			<a href="#top"><small>Back to top</small></a><br/>	
		
			
			<h3><a name="nonull">No null reference exceptions</a></h3>
			
			<p>
			In C++, dereferencing a null pointer can have unpredictable consequences but often leads to a segmentation fault. In Java, dereferencing a null reference causes a <code>NullPointerException</code> to be thrown.  Furthermore, the JVM has to make checks to guarantee that a reference is not null.
			</p>
			
			<p>
			The Shadow solution is that normal references can never be null, since most references never need to be: They are initialized to some non-null value or easily could be.  In Shadow, only references marked <code>nullable</code> or <code>weak</code> can be null.  In order to dereference them or store them into a regular reference, the normal approach is to use the <code>check</code> keyword inside of a <code>try</code> block with a matching <code>recover</code> block.  If the reference is null, execution will jump to the <code>recover</code> block.
			</p>
			
<pre class="prettyprint lang-shadow">
nullable Hypothesis unknown = getHypothesis();
try
{
    Hypothesis hypothesis = check(unknown);
    hypothesis.test();
}
recover
{
    Console.printLine("It's the null hypothesis!");
}
</pre>

			<p>
			It seems annoying to deal with these <code>nullable</code> references, but they don't come up very often.  When they do come up, the code that you write reminds you of the cost of checking them.  Alternatively,  you can use the coalesce operator (<code>??</code>) to quickly use a non-null value as a default if the object under consideration is null.  In the following code, <code>"random junk"</code> will be stored in <code>notNull</code> only if <code>whoKnows</code> is null.
			</p>

<pre class="prettyprint lang-shadow">
nullable String whoKnows = getStuff();
String notNull = whoKnows ?? "random junk";
</pre>
			
			
			<a href="#top"><small>Back to top</small></a><br/>	
			
			<h3><a name="unsigned">Unsigned types</a></h3>
			
			<p>
			All integral Java types are signed.  Java added some indirect support for unsigned manipulations in Java 8, but they still don't have unsigned primitives.  We do!  Each integral type has an unsigned version.  Be warned:  You shouldn't be using these unless you really have a good reason.  Shadow type-checking is pretty strict, and unsigned types are not exempt.  If you want to store an <code>int</code> value into a <code>uint</code> or vice-versa, you'll have to do a cast.
			</p>
			
			<p>
			See the section on <a href="#literals">numeric types and literals</a> for details about using unsigned types.
			</p>
			
			<a href="#top"><small>Back to top</small></a><br/>	
			
			<h3><a name="literals">Numeric types and literals</a></h3>
			
			<p>
			Many languages assume that integer-like types are of primitive type <code>int</code>.  In Shadow, even literals are marked with their type, including a <code>u</code> for unsigned values.  Below is a table of all the numeric types with sizes, value ranges, and example literal syntax.
			</p>
			
			<table class="shaded">
				<tr>
					<th colspan="5">Signed Types</th>
				</tr>
				<tr>
					<th>Type</th>
					<th>Size (Bytes)</th>
					<th>Minimum Value</th>
					<th>Maximum Value</th>
					<th>Example Literal</th>
				</tr>
				<tr>
					<td><code>byte</code></td>
					<td>1</td>
					<td> −128</td>
					<td>127</td>
					<td><code>64y</code></td>
				</tr>
				<tr>
					<td><code>short</code></td>
					<td>2</td>
					<td>−32768</td>
					<td>32767</td>
					<td><code>1000s</code></td>
				</tr>
				<tr>
					<td><code>int</code></td>
					<td>4</td>
					<td>−2147483648</td>
					<td>2147483647</td>
					<td><code>15</code></td>
				</tr>
				<tr>
					<td><code>long</code></td>
					<td>8</td>
					<td>−9223372036854775808</td>
					<td>9223372036854775807</td>
					<td><code>0L</code></td>
				</tr>		
				<tr>
					<th colspan="5">Unsigned Types</th>
				</tr>
				<tr>
					<th>Type</th>
					<th>Size (Bytes)</th>
					<th colspan="2">Maximum Value</th>
					<th>Example Literal</th>
				</tr>
				<tr>
					<td><code>ubyte</code></td>
					<td>1</td>
					<td colspan="2">255</td>
					<td><code>128uy</code></td>
				</tr>
				<tr>
					<td><code>ushort</code></td>
					<td>2</td>
					<td colspan="2">65535</td>
					<td><code>1000<b>us</b></code></td>
				</tr>
				<tr>
					<td><code>uint</code></td>
					<td>4</td>
					<td colspan="2">4294967295</td>
					<td><code>15u</code></td>
				</tr>
				<tr>
					<td><code>ulong</code></td>
					<td>8</td>
					<td colspan="2">18446744073709551615</td>
					<td><code>0uL</code></td>
				</tr>				
			</table>
			
			<a href="#top"><small>Back to top</small></a><br/>	
			
			<h3><a name="utf8">UTF-8 support</a></h3>		
			
			<p>
			When C was invented, not many people were thinking about how to store characters from all over the world in computer memory.  Strings in C are built on sequences of the single byte <code>char</code> type.  Various implementations of C++ have various styles of wide-character support.
			</p>
			
			<p>
			Java's solution was simple and elegant:  Use UTF-16. The <code>char</code> type is two bytes, and a <code>String</code> is a sequence of those.  Unfortunately, that means that the memory cost of storing plain old ASCII text doubled when compared to C.  And there is a hole in the elegance of their solution. UTF-16 sometimes needs two <code>char</code> values to represent some characters, usually from Asian languages.
			</p>
			
			<p>
			Shadow's solution goes a step further with UTF-8, a variable byte size scheme.  If you're using plain old ASCII, it only costs you a byte per character.  Many characters can be expressed in two bytes, although some require three or even four bytes.  How does that work in a <code>String</code>?			
			</p>
			
			<p>
			A <code>String</code> is a sequence of <code>byte</code> values.  If you index into a location using brackets (<code>[]</code>) or by calling the <code>index()</code> method, you'll get a <code>byte</code> value.  That's great if all you care about is ASCII.
			</p>
			
			<p>
			However, we use the four-byte <code>code</code> (short for codepoint) type to represent arbitrary UTF-8 characters.  A <code>String</code> iterator can cycle  through a <code>String</code>, returning each <code>code</code> value contained within it.
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