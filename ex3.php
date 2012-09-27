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

// Autoload our classes.
define('CLIB_PATH', 'clib');
function my_autoload ($classname) {
  include(CLIB_PATH . '/' . $classname . '.class.php'); 
}	
spl_autoload_register('my_autoload');

// Do the faux db_query to get the articles
require_once('articles.inc');
$articles = getArticleData();

// Create the series and add the articles.
$mySeries = new ArticleSeries();
foreach ($articles as $article) {
  $mySeries->insert(new Article($article['title'], $article['body']));
}

?>

<html>
<head>
  <title>Extending a Class | PHP4Devs</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
  <h1>Class Inheritance</h1>
  <p></p>
  <p>COMPUTING ...<br /><?php //print '<pre>' . print_r($mySeries,TRUE) . '</pre>' ?></p>
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
