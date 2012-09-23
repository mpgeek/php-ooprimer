<?php
/**
 * @file ex2.php
 *
 * Create an Article class of your own, with a constructor, and instantiate it.
 * Call var_dump (or something similar) to check that your object is what you
 * expected. Add two properties and two methods to your class, of your choice
 * but as a suggestion, how about:
 * 	- properties: title and body
 * 	- methods: getBody() and getExcerpt()
 *
 * For bonus points move your class declaration to a separate file and 
 * autoload it instead of including it.
 * 
 */

// The standard, easy way to include your class specifications.
//include_once('Article.class.php');

// Autoloading is another method of including your classes. Consider a real
// application where you have tens, or even hundreds of classes needed.
// Further imagine that you are developing classes along side the application
// and you don't want to have to maintain a litany of include_once declartions.
// Using autoloading, we can dynamically load classes from our library based
// on the classname in question. 

// This assumes that you have some location in your development enviornment
// where this library is located.

// A real application would have a more useful path, and possibly a more
// interesting determination of that path.
define('CLIB_PATH', '.');	
function my_autoloder($classname) {
	include(CLIB_PATH . '/' . $classname . '.class.php'); 
}
spl_autoload_register('my_autoloder');


$meTitle = 'Teletubbies, yo!';
$meBody = 'Do you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it? No? Well, that\'s what you see at a toy store. And you must think you\'re in a toy store, because you\'re here shopping for an infant named Jeb.';

$meArticle = new Article($meTitle, $meBody); 

?>

<html>
<head>
  <title>A Simple Class | PHP4Devs</title>
</head>
<body>
  <h1>Simple Class Thingy!</h1>
  <p><?php print '<pre>' . print_r($meArticle,TRUE) . '</pre>' ?></p>
  <h2>An Excerpt</h2>
  <p><?php print $meArticle->getExcerpt(38) ?></p>
</body>
</html>
