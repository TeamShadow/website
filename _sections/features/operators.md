---
title: (Limited) operator overloading
parent: Features
order: 11
---

In effect, the discussion above demonstrates a kind of operator overloading for the `==` operator; however, operator overloading is a slippery slope.  In our opinion, C++ went overboard, allowing even fundamental operators like assignment (`=`) to be overloaded in arbitrary ways.

The Shadow approach is limited and based on interfaces.  For overloading arithmetic operators, the interfaces `CanAdd<T>`, `CanSubtract<T>`, `CanMultiply<T>`, `CanDivide<T>`, and `CanModulus<T>` can be implemented to allow overloading of the `+`, `-`, `*`, `/`, and `%` operators, respectively.  Below is an example of a `Complex` class for manipulating complex numbers that overloads `+`, `-`, and `*`.

{% highlight shadow %}
immutable class Complex
is  CanAdd<Complex> 
and CanSubtract<Complex>
and CanMultiply<Complex>
and CanEqual<Complex>
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
{% endhighlight %}	

Thus, objects of type `Complex` could be added together as shown below.

{% highlight shadow %}
Complex a = Complex:create(1, 3);
Complex b = Complex:create(-5, 2);
Complex c = a + b;
{% endhighlight %}

In addition to the standard arithmetic operators, there's an interface for the bitwise operators `&amp;`, `|`, `^`, `<<`, `>>`, `<<<`, `>>>`, and `~`, but they come as a bundle.  It's expected that they will only be useful for classes that have bitwise behavior similar to an integer, like `BigInteger`.

Having the `CanIndex<V,K>` interface overloads the index operator (`[]`) to read values from an index.  Consider the following code that allows array-like indexing of an `ArrayList`.

{% highlight shadow %}
var band = ArrayList<String>:create();
band.add("John");
band.add("Paul");
band.add("George");
band.add("Ringo");
String drummer = band[3];
{% endhighlight %}

There's also a `CanIndexStore<V,K>` interface that allows the index operator (`[]`) to be overloaded so that it can  store values into an index. Both interfaces can be implemented independently of each other, allowing classes that can load from an index, classes that can store to an index, and classes that can do both. Consider the following code that stores values into a `HashMap` using array-like indexing.

{% highlight shadow %}
var clan = HashMap<String, String>:create();
clan["Russell Jones"] = "ODB";
clan["Clifford Smith"] = "Method Man";
clan["Dennis Coles"] = "Ghostface Killah";
{% endhighlight %}
