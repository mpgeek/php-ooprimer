<?php
/**
 * @file ex1.php
 *
 * Create an Article class of your own, with a constructor, and instantiate it.
 * Call var_dump to check that your object is what you expected.
 * Add two properties and two methods to your class, of your choice but as a
 * suggestion how about:
 * - properties: title and body
 * - methods: getBody() and getExcerpt()
 *
 * For bonus points move your class declaration to a separate file and 
 * autoload it instead of including it.
 * 
 */

// standard load
include_once('Article.php');

// auto load
//??


$meTitle = 'Aye, Mateys.';
$meBody = 'Shiver me timbers.';
$meArticle = new Article($meTitle, $meBody); 

?>

<html>
<head>
  <title>A Simple Class | PHP4Devs</title>
</head>
<body>
  <h1>Simple Class Thingy!</h1>
  <p><?php print '<pre>' . print_r($meArticle,TRUE) . '</pre>' ?></p>
</body>
</html>
