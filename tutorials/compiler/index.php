<?php
	$path = '../../';
	$subtitle = 'Tutorials<br/>Using the Shadow Compiler';
	include $path . 'start.inc';	
?>
	<meta name="author" content="Team Shadow" />
	<meta name="description" content="Using the Shadow Compiler - Shadow Tutorials">
	<meta name="keywords" content="Shadow, language, tutorial">
<title>
	Using the Shadow Compiler - Tutorials - Shadow
</title>
</head>
<body onload="prettyPrint();">
<div id="container">	
	<div id="content">
		<div class="spacer">
<h2>Using the Shadow Compiler</h2>
<p><em>Note: This tutorial is for version 0.7.5 of the Shadow compiler and may not be accurate for other versions.</em></p>
<p>The Shadow compiler is required in order to transform written Shadow programs into their executable counterparts. It provides a number of helpful features, including descriptive error-messages and a simple, automated build system. The compiler, along with detailed installation instructions, is available on the <a href="<?=$path?>downloads">Downloads</a> page.</p>
<h3>Getting Started</h3>
<p>Like many utilities, the Shadow compiler is operated via the command-line. Access to the command-line varies by platform, but is usually available through a terminal emulator. Running the install script included with the Shadow compiler adds its location to the system's <tt>PATH</tt> variable, allowing it to be run from any directory with the command <tt>shadowc</tt>.</p>
<p>For simple programs, compilation can be invoked with the following command:</p>
<pre class="terminal">
shadowc Main.shadow
</pre>
<p>In this case, <tt>Main.shadow</tt> is a Shadow source file containing a <code>main</code> method. This <code>main</code> method will become the entry point of the program in the resulting executable. The compiler will automatically attempt to resolve any dependencies, both locally and within the standard library.</p>
<p>By default, the resulting executable will bear the same name as the source file (in this case <tt>Main.exe</tt> on Windows and <tt>Main</tt> on other systems). The executable name can be specified using the <tt>-o</tt> option:</p>
<pre class="terminal">
shadowc Main.shadow -o UsefulProgram.exe
</pre>
<h3>Additional Options</h3>
<p>When run with the option <tt>-h</tt> (or <tt>--help</tt>), the compiler will print a list of all available options and their descriptions. This will also occur if an invalid option or argument is specified, along with a corresponding error message. For reference, the help printout is reproduced below:</p>
<pre>
usage: shadowc &lt;mainSource.shadow&gt; [-o &lt;output&gt;] [-c &lt;config.xml&gt;]
 -c,--config &lt;config.xml&gt;   Specify optional configuration file
                            If shadow.xml exists, it will be checked
 -f,--force-recompile       Recompile all source files, even if
                            unnecessary
 -h,--help                  Display command line options and exit
 -i,--information           Display information about the compiler and
                            exit
 -n,--nolink                Compile Shadow files but do not link
 -o,--output &lt;file&gt;         Place output into &lt;file&gt;
 -r,--human-readable        Generate human-readable IR code
 -t,--typecheck             Parse and type-check the Shadow files
 -v,--verbose               Print detailed information about the
                            compilation process
 -w,--warning &lt;flag&gt;        Specify warning flags
</pre>
<h3>Configuration Files</h3>
<p><strong>The Shadow compiler ships with tested configuration files. Outside of special cases, most users will not need to worry about creating their own configuration files. If the compiler works as desired on your platform, this section can safely be ignored.</strong></p>
<p>In some cases, it is necessary or convenient to specify additional options in a configuration file. Such cases include cross-compiling (compiling for another platform) and the addition of non-typical include paths (those which the compiler won't look through on its own). When no configuration file is present, the compiler makes assumptions (either through default values or automatic detection) about the appropriate settings for the given platform. If the file is present but does not make use of all possible options, the same process will be applied to the unspecified fields.</p>
<p>Configuration files are XML-based, and may be passed to the compiler following the option <tt>-c</tt> (or <tt>--config</tt>). If the option is not used, the compiler will check for the file <tt>shadow.xml</tt>, first in the directory of the given source file and then in the compiler executable's directory. If neither file exists, the compiler will fall back on default settings. The following is a complete description of all legal tags and attributes within a Shadow configuration file:</p>
<p><strong>Tags:</strong></p>
<ul>
<li><code>&lt;shadow&gt;</code> - The outermost tag of the file, used to specify platform information for the compilation process. <em>(required)</em></li>
<li><code>&lt;system&gt;</code> - Used to specify the location of the Shadow standard libraries. Only one standard path may be specified. <em>(optional)</em></li>
<li><code>&lt;include&gt;</code> - Used to define additional search paths for resolving dependencies (<tt>import</tt> statements). If any include paths are specified, the path <code>&lt;include&gt;.&lt;/include&gt;</code> must also be. <em>(optional)</em></li>
</ul>
<p><strong>Attributes of the <code>&lt;shadow&gt;</code> tag:</strong>
<em>Note: All of the following attributes are entirely optional, and will be determined by the compiler if absent. The default values are generally accurate, and should not be overridden unless necessary.</em></p>
<ul>
<li><code>os</code> - The operating system on which the program is being compiled and on which it will run. This determines the choice of system calls to be used by the standard libraries, and may also determine the linker to be used by the compiler (<tt>gcc</tt> or <tt>clang</tt>). Any name may be specified, but only those containing the text &quot;Windows&quot;, &quot;Mac&quot;, and &quot;Linux&quot; currently receive special treatment. All others are interpreted as &quot;Linux&quot;.</li>
<li><code>arch</code> - The addressing mode (32 or 64) used by the target platform's processor. This information determines pointer size and is used by Shadow's exception handling system.</li>
<li><code>target</code> - The target triple used by the LLVM component of the Shadow compiler. See the <a href="#triples">LLVM Target Triples</a> section for more information</li>
<li><code>link</code> - The parameters to be passed to the linker.</li>
</ul>
<p>The following example demonstrates the general structure of a Shadow configuration file:</p>
<pre class="prettyprint">
&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;
&lt;shadow os=&quot;Linux&quot; arch=&quot;64&quot; target=&quot;x86_64-unknown-linux-gnu&quot;&gt;
  &lt;system&gt;/home/dave/standardlibs&lt;/system&gt;
  &lt;import&gt;.&lt;/import&gt;
  &lt;import&gt;/usr/local/lib/extralibs&lt;/import&gt;
&lt;/shadow&gt;
</pre>
<p>In the example above, the user has explicitly specified some platform and directory information. Within the <code>&lt;shadow&gt;</code> tag, the <code>os=&quot;Linux&quot;</code> attribute ensures that the compiler will use Linux-compliant system calls for standard library functions. The attribute <code>arch=&quot;64&quot;</code> ensures that 64-bit addressing is used. Although the <code>target</code> attribute seems to contain redundant information, it represents a special set of information used by the compiler's LLVM backend (specifically, the last stages of compilation which output platform-specific machine code). See the section on <a href="#triples">LLVM Target Triples</a> for more information.</p>
<p>The <code>&lt;system&gt;</code> tag is used to explicitly specify that the Shadow standard library is located in <tt>/home/dave/standardlibs/</tt>. Within this directory, the compiler looks for the directory <tt>shadow/</tt> containing the libraries in question. The tag <code>&lt;import&gt;.&lt;/import&gt;</code> tells the compiler to resolve import statements by searching directories relative to the file being compiled. This tag must always be specified <strong>if</strong> any other include paths are specified, or the standard libraries (and presumably most user programs) will fail to resolve dependencies. Additional paths, such as the one specified in <code>&lt;import&gt;/usr/local/lib/extralibs&lt;/import&gt;</code> will also be searched when resolving dependencies.</p>
<h4><a name="windows">Configuration for Microsoft Windows</a></h4>
<p>The configuration file below describes the platform attributes for compiling on (and for) Microsoft Windows. Because MinGW does not support 64-bit compilation, it is important to prevent the compiler from attempting to do so.</p>
<pre class="prettyprint">
&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;
&lt;shadow os=&quot;Windows&quot; arch=&quot;32&quot; target=&quot;x86-unknown-mingw32&quot;&gt;
&lt;/shadow&gt;
</pre>
<h4><a name="triples">LLVM Target Triples</a></h4>
<p>During compilation, the Shadow compiler uses a third party tool, the LLVM compiler, to generate the final, platform-specific machine code of an executable. Because the LLVM compiler is an external tool, it requires its own set of platform information to generate valid machine code. During compilation, the contents of the <code>target</code> attribute (either taken from a configuration file or automatically determined) are handed directly to the LLVM compiler. Thus, the attribute must follow the formatting of an LLVM target &quot;triple&quot;. The following information provides some explanation of how to format these triples:</p>
<p>The canonical form of LLVM target triple is either <code>Architecture-Vendor-OperatingSystem</code> or <code>Architecture-Vendor-OperatingSystem-Environment</code>.</p>
<ul>
<li>Architecture: <code>arm</code>, <code>mips</code>, <code>sparc</code>, <code>x86</code>, <code>x86_64</code>, etc.</li>
<li>Vendor: <code>apple</code>, <code>pc</code>, <code>nvidia</code>, etc.</li>
<li>Operating System: <code>freebsd</code>, <code>ios</code>, <code>linux</code>, <code>macosx</code>, <code>win32</code>, <code>windows</code>, etc.</li>
<li>Environment: <code>gnu</code>, <code>android</code>, <code>msvc</code>, etc.</li>
</ul>
<p><em>Note: <code>unknown</code> is a valid entry in any of these fields. The most critical fields to fill in are those for architecture and operating system.</em></p>
<p>Many additional, arguably more obscure options exist for each field. See the beginning of the <a href="http://llvm.org/docs/doxygen/html/Triple_8h_source.html">header file</a> from LLVM's triple-handling code for a more complete listing. Unfortunately, the document seems to provide incomplete information (for example, the <code>mingw32</code> operating system attribute is not listed).</p>
<p><strong>Examples:</strong></p>
<ul>
<li><code>x86-unknown-Win32</code></li>
<li><code>x86_64-unknown-Linux-GNU</code></li>
<li><code>x86_64-Apple-MacOSX</code></li>
</ul>
<p>All LLVM tools are capable of automatically detecting the correct triple for a given platform. If LLVM is properly installed, the command <tt>llc --version</tt> will display information including the default triple. A compiled version of this tool comes with the Windows installation of Shadow, and can be run from the associated directory. However, the Windows platform currently has limitations. See the <a href="#windows">Windows</a> section for details.</p>
		</div>
	</div>
	<?php include $path . 'footer.inc'; ?>
	<div id="sidebar">
		<div id="spacer">
		</div>
	</div>
</div>		
<?php 
	include $path . 'header.inc';
	include $path . 'menu.inc';		
?>
</body>
</html>