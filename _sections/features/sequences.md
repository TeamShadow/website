---
title: Sequences
parent: Features
order: 2
---

Let's say you want to assign two different values to two different variables on the same line.  To do so in Shadow, you could use a <em>sequence</em>.

{% highlight shadow %}
(x, y) = (3.5, 6.8);
{% endhighlight %}


Sequences are syntactic structures only, not types.  Unlike Python, you cannot declare a variable with a sequence type.  In a sequence assignment, values on the right are copied element-by-element into the variables on the left.  

Doesn't seem all that useful yet?  What about for a swap?

{% highlight shadow %}
(x, y) = (y, x);
{% endhighlight %}

All values on the right side are evaluated before the assignments.  Sequence assignments can also be done with a single value on the right side, storing that value into each element of the sequence on the left. Doing so is called a *splat*.


{% highlight shadow %}
(x, y, z) = 0.0; // All three are now 0.0
{% endhighlight %}

Splats are useful because assignment doesn't evaluate to a value in Shadow.  For example, the following is a syntax error.

{% highlight shadow %}
x = y = z = 0.0; // Illegal in Shadow!
{% endhighlight %}			

Why did we make that illegal?  First, especially with complicated assignments, the results can become unclear in C++ or Java.

{% highlight c++ %}
// C++ code
int i = 4;
i = i++; // Different versions of gcc get different results for i!
{% endhighlight %}

Of course, this issue is minimized because `i++` isn't legal in Shadow either.  (Use `i += 1` instead.)  The second reason is the use of assignments in conditions, which is sometimes slick and sometimes an error.

			
{% highlight java %}
// Java code
boolean value = false;
if( value = true ) { // Always true, but illegal in Shadow
	...
}
{% endhighlight %}	