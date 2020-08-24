---
title: Numeric types and literals
parent: Features
order: 14
---

Many languages assume that integer-like types are of primitive type `int`.  In Shadow, even literals are marked with their type, including a `u` for unsigned values.  Below is a table of all the numeric types with sizes, value ranges, and example literal syntax.

<aside>
<table>
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
</table>
<table>
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
	<td><code>1000us</code></td>
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
</aside>