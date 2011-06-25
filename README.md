
Box UK Autoload
===============

This small library provides a simple PSR0 autoloader that can be used to load
any compliant library.

Usage
=====

<pre>

include 'BoxUK\Autoload.php';

BoxUK\Autoload::register( '/path/to/mydir' );

</pre>

Autoload PEAR
=============

There is also an option to register a PEAR autoloader, which will load any
PEAR packages you have installed which are PSR0 compliant.

<pre>

include 'BoxUK\Autoload.php';

BoxUK\Autoload::registerPear();

</pre>
