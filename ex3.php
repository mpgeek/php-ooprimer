<?php
/**
 * @file index.php
 *		Exercise #3
 *
 * Building on the Article class you built earlier, extend it to make an
 * ArticleSeries class. Objects of this type will be posts in a series, and
 * have awareness of which other articles come before and after them.
 *
 * Create objects of both Article and ArticleSeries types and output them. You
 * could hardcode this, or if you're up to it, create form inputs and store 
 * the data you receive (the simplest approach is to throw the objects into
 * the session, but it would be nicer to write to files or a database. You
 * choose!)
 */

// Autoload our classes with an anonymous function.
define('CLIB_PATH', 'clib');
function my_autoload ($classname) {
  include(CLIB_PATH . '/' . $classname . '.class.php'); 
}	
spl_autoload_register('my_autoload');

// Create the series.
$mySeries = new ArticleSeries();

// Create article.
// It would be cooler if the article data came from a form or input file,
// i suppose. But we are intersted in OOP, so we'll just hardcode the creation
// of articles and make up for that by doing fancy stuff with the Series.
$title = 'Teletubbies, Yo!';
$body = 'Do you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it? No? Well, that\'s what you see at a toy store. And you must think you\'re in a toy store, because you\'re here shopping for an infant named Jeb.';


// Add it to the series.
$mySeries->insert(new Article($title, $body));

// Create second article, add it to the series.
$title = 'Tech Nine';
$body = 'Now that there is the Tec-9, a crappy spray gun from South Miami. This gun is advertised as the most popular gun in American crime. Do you believe that shit? It actually says that in the little book that comes with it: the most popular gun in American crime. Like they\'re actually proud of that shit.';
$mySeries->insert(new Article($title, $body));

// Create second article, add it to the series.
$title = 'Ice, Man.';
$body = 'You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don\'t know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I\'m breaking now. We said we\'d say it was the snow that killed the other two, but it wasn\'t. Nature is lethal but it doesn\'t hold a candle to man.';
$mySeries->insert(new Article($title, $body));


?>

<html>
<head>
  <title>Extending a Class | PHP4Devs</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
  <h1>Class Inheritance</h1>
  <p></p>
  <p>COMPUTING ...<br /><?php print '<pre>' . print_r($mySeries,TRUE) . '</pre>' ?></p>
  <h2>There are <?php echo $mySeries->count() ?> articles in the series.</h2>
  <p>Here is a summary: </p>
  <ul>
    <?php foreach ($mySeries->getTitles() as $title): ?>
      <li><?php print $title ?></li>
    <?php endforeach; ?>
  </ul>
  <?php $mySeries->reverse() ?>
  <h2>I reversed the list.</h2>
  <p>Now here is a summary with teasers:</p>
  <?php $mySeries->reset() ?>
  <?php for ($i = 0; $i < $mySeries->count(); $i++): ?>
    <?php $cur = $mySeries->next() ?>
    <h3><?php print $cur->getTitle() ?></h3>
    <p><?php print $cur->getTeaser(150) ?></p>
  <?php endfor; ?>
  <p>&nbsp;</p>
  <hr/>
  <p><small>&#214; <a href="index.html">BACK 2 INDEX</a> &#214;</small></p>
</body>
</html>
