---
title: Returning multiple values
parent: Features
order: 3
---
Have you ever wanted to write a method that returns multiple things? Of course you have!  C gets around the problem by passing pointers.  C++ gets around the problem with pass-by-reference parameters.  Similarly, C# has reference and output parameters.  Java has no good solution, forcing hacks like returning an object created just for the occasion or passing in small arrays to simulate pass-by-reference.

Shadow uses the same sequence syntax to return multiple values and to store them into variables after the return.  The following is a toy method that returns both the quotient and the remainder of a division.

{% highlight shadow %}
public divide(int a, int b) => (int, int)
{
	int quotient = a / b;
	int remainder = a % b;
	return (quotient, remainder);
}
{% endhighlight %}

Note the slightly different method syntax that puts all return types on the right side of the method header.  A method that returns nothing leaves those parentheses empty. Presto! The `void` keyword is no longer needed.  Calling the method behaves the same as any sequence assignment.

{% highlight shadow %}
(result, modulus) = divide(7, 3); // stores 2 and 1, respectively
{% endhighlight %}

If you don't need to store one of the values, just leave it out of the list.

{% highlight shadow %}
(result, ) = divide(7, 3); // only stores 2
{% endhighlight %}