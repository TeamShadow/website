---
title: Plug-ins
parent: Downloads
order: 5
---

This page provides downloads for plug-ins, syntax highlighters, and other tools that might be helpful for developing software in Shadow. We hope to add tools for many more platforms in the future.


### Eclipse Plug-in


We provide an Eclipse plug-in for Shadow development with many useful features:
- Syntax highlighting
- Parsing and type-checking errors and warnings reported as you type
- Compiling and launching Shadow programs from the IDE, with redirected console I/O
- Outline view for easy code navigation
- Comment/uncomment code and documentation comment generation
- Automatic code indentation

To install the plug-in, click on the **Help -> Install New Software...** menu.  Once there, click the **Add...** button to add an update site.  Provide whatever name you like and enter the following location:
`http://www.shadow-language.org/updates`

If you have an older Shadow plugin, please uninstall it from Eclipse first.

### Emacs Syntax Highlighter

[Emacs](https://www.gnu.org/software/emacs/) needs no introduction.  Below is an Emacs Lisp file that defines a Shadow major mode for Emacs with simple syntax highlighting.
- [Download Emacs Syntax Highlighting Major Mode for Shadow](https://raw.githubusercontent.com/TeamShadow/syntax-highlighters/master/Emacs/shadow-mode.el)

### Notepad++ Syntax Highlighter

[Notepad++](https://notepad-plus-plus.org/) is a popular, free text editor for Windows.  Below is an XML file that defines syntax highlighting for Shadow inside of Nodepad++.
- [Download Notepad++ Syntax Highlighting Definitions for Shadow](https://raw.githubusercontent.com/TeamShadow/syntax-highlighters/master/Notepad%2B%2B/shadow-notepad.xml)

To install the syntax highlighter, click on **Define your language...** under the **Language** menu in Notepad++.  In the dialog that opens, click on the **Import...** button and select the `shadow-notepad.xml` file you have just downloaded from the link above.

### Vim Syntax Highlighter

Like Emacs, [vim](http://www.vim.org/) needs no introduction.  Below is a vim syntax file and a vim file-type detect file that allow syntax highlighting for Shadow in vim.
- [Vim Syntax File](https://raw.githubusercontent.com/TeamShadow/syntax-highlighters/master/vim/syntax/shadow.vim)
- [Vim File-Type Detect File](https://raw.githubusercontent.com/TeamShadow/syntax-highlighters/master/vim/ftdetect/shadow.vim)

To install the syntax highlighter, store the syntax file into `~/.vim/syntax/` and store the file-type detect file into `~/.vim/ftdetect/`.