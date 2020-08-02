---
title: Cat operator
parent: Features
order: 5
---

In Java and C#, the plus (`+`) operator is used to concatenate other types onto string values.  Because the plus operator is used for numerical operations, its use can be ambiguous.			

{% highlight java %}
// Java code
String song1 = "Love Potion Number " + 4 + 5;
String song2 = "Love Potion Number " + (4 + 5);
{% endhighlight %}

Since Java concatenation has the same precedence as normal addition, `song1` contains  `"Love Potion Number 45"` while `song2` contains `"Love Potion Number 9"`.  Our solution was to use the octothorpe (`#`), now commonly called the pound sign, number sign, or hash tag, as a string concatenation operator.  This operator, called *cat* in Shadow jargon, has a lower precedence than addition. 

{% highlight shadow %}
// Shadow code
String song1 = "Love Potion Number " # 4 + 5;
{% endhighlight %}

In this Shadow version, `song1` contains `"Love Potion Number 9"`.  There is also a unary version of cat, which is equivalent to calling the `toString()` method on any object.

{% highlight shadow %}
Bottle bottle = sea.washUp();
String message = #bottle;
{% endhighlight %}