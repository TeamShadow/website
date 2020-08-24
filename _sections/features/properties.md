---
title: Properties
parent: Features
order: 6
---

In Shadow, all member variables are private.  That's great for upholding OOP principles, but doesn't it get tedious writing accessors and mutators for all of those member variables?  It could, but Shadow will create them for you at the drop of a hat.  Let's look at a toy `Wombat` class.

{% highlight shadow %}
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
{% endhighlight %}

Because the `name` member is marked `get`, its value can be retrieved with a *property*.  Properties are accessed with the arrow operator (`->`).

{% highlight shadow %}
Wombat bob = Wombat:create("Bob", 12.5);
String greeting = "Hey, " # bob->name # "!";
{% endhighlight %}

Since `weight` is marked `set`, the arrow operator can be used in the same way to store a value into it.

{% highlight shadow %}
bob->weight = 14.8; // Bob gained weight
{% endhighlight %}

Even more conveniently, a member that is marked both `get` and `set` can be both retrieved and stored, even at the same time.

{% highlight shadow %}
bob->age += 1; // Bob had a birthday!
{% endhighlight %}	

Of course, properties are more flexible than that.  If you want to do something other than the default operations of retrieving and storing, you can write your own.

{% highlight shadow %}
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
{% endhighlight %}

This second version of the `Wombat` class has a custom specification for the `set` part of the `age` property which prevents users from storing a negative value into `age`.  Note that the name of the method is exactly the same as the member.  This method and indeed all properties can also be called directly as methods (since that's what they are, under the covers), but we suggest that property syntax is used whenever possible.

C# also has properties, but we think Shadow improves on them in a few ways:

1. The addition of only the `get` and `set` modifiers adds default properties with no extra work.
2. Properties and their related member variables have the same name.
3. Using the arrow (`->`) distinguishes a property call (which can potentially execute arbitrarily complex code) from a member access.