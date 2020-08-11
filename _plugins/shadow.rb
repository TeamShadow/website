# -*- coding: utf-8 -*- #
# frozen_string_literal: true

require "rouge"

# This class defines the Shadow lexer which is used to highlight "shadow" code snippets during render-time
module Rouge
  module Lexers
	class Shadow < RegexLexer
	  title "Shadow"
	  desc "The Shadow programming language (shadow-language.com)"

	  tag 'shadow'
	  filenames '*.shadow'
	  mimetypes 'text/x-shadow'

	  keywords = %w(	  
		and assert break case cast catch check continue copy create default destroy do else exception finally for foreach freeze if in is or recover return send skip spawn super switch this throw try while xor
	  )

	  declarations = %w(
		abstract constant extern get import immutable locked native nullable private protected public readonly set
	  )

	  types = %w(boolean byte code double float int long short ubyte uint ulong ushort var)

	  id = /[[:alpha:]_][[:word:]]*/
	  const_name = /[[:upper:]][[:upper:][:digit:]_]*\b/
	  class_name = /[[:upper:]][[:alnum:]]*\b/

	  state :root do
		rule %r/[^\S\n]+/, Text
		rule %r(//.*?$), Comment::Single
		rule %r(/\*.*?\*/)m, Comment::Multiline
		# keywords: go before method names to avoid lexing "throw new XYZ"
		# as a method signature
		rule %r/(?:#{keywords.join('|')})\b/, Keyword

		rule %r(
		  ([a-zA-Z_][a-zA-Z0-9_]*)                  # method name
		  (\s*)(\()                                 # signature start
		)mx do |m|
		  # TODO: do this better, this shouldn't need a delegation
		  token Name::Function, m[1]
		  token Text, m[2]
		  token Operator, m[3]
		end

		rule %r/\[#{id}(,#{id})*\]/, Name::Decorator
		rule %r/(?:#{declarations.join('|')})\b/, Keyword::Declaration
		rule %r/(?:#{types.join('|')})\b/, Keyword::Type
		rule %r/(?:true|false|null)\b/, Keyword::Constant
		rule %r/(?:class|enum|exception|interface|singleton)\b/, Keyword::Declaration, :class
		rule %r/(?:import)\b/, Keyword::Namespace, :import
		rule %r/"(\\\\|\\"|[^"])*"/, Str
		rule %r/'(?:\\.|[^\\]|\\u[0-9a-f]{4})'/, Str::Char
		rule %r/(\.)(#{id})/ do
		  groups Operator, Name::Attribute
		end

		rule const_name, Name::Constant
		rule class_name, Name::Class
		rule %r/\$?#{id}/, Name
		rule %r/[#~^*!%&\[\](){}<>\|+=:;,.\/?-]/, Operator

		digit = /[0-9]+/
		bin_digit = /[01]+/
		oct_digit = /[0-7]+/
		hex_digit = /[0-9a-f]+/i
		rule %r/#{digit}+\.#{digit}+([eE]#{digit}+)?[fFdD]?/, Num::Float
		rule %r/0b#{bin_digit}+L?u?/i, Num::Bin
		rule %r/0x#{hex_digit}+L?u?/i, Num::Hex
		rule %r/0c#{oct_digit}+L?u?/i, Num::Oct
		rule %r/#{digit}+L?u?/i, Num::Integer
		rule %r/\n/, Text
	  end

	  state :class do
		rule %r/\s+/m, Text
		rule id, Name::Class, :pop!
	  end

	  state :import do
		rule %r/\s+/m, Text
		rule %r/((#{id}:)+#{id}@)?#{id}/, Name::Namespace, :pop!
	  end
	end
  end
end


