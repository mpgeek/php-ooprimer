<?php
/**
 * @file index.php
 *		Exercise #3
 *
 * Building on the Article class you built earlier, extend it to make an
 * SeriesArticle class. Objects of this type will be posts in a series, and
 * have awareness of which other articles come before and after them.
 *
 * Create objects of both Article and ArticleSeries types and output them. You
 * could hardcode this, or if you're up to it, create form inputs and store 
 * the data you receive (the simplest approach is to throw the objects into
 * the session, but it would be nicer to write to files or a database. You
 * choose!)
 */

// Autoload our classes.
define('CLIB_PATH', 'clib');	
function my_autoloder($classname) {
	include(CLIB_PATH . '/' . $classname . '.class.php'); 
}
spl_autoload_register('my_autoloder');

?>

<html>
<head>
  <title>Extending a Class | PHP4Devs</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
  <h1>Class Inheritance</h1>
  <p>&nbsp;</p>
  <p><small>&#214; <a href="index.html">BACK 2 INDEX</a> &#214;</small></p>
</body>
</html>
