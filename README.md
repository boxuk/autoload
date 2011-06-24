
Box UK Autoload
===============

This small library provides a simple PSR0 autoloader that can be used to load
any compliant library.

Usage
=====

<pre>
<?php

include 'BoxUK\Autoload.php';

BoxUK\Autoload::register( '/path/to/mydir' );

</pre>

Autoloading PEAR
================

If you'd like to autoload any PEAR classes then you can do this using the
following method.

