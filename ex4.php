<?php
/**
 * @file ex4.php
 *		Exercise #4: Working with Exceptions
 *
 * Research different built-in Exception types...
 *   http://uk3.php:net/manual/en/spl.exceptions.php
 *
 * Look at your existing code, creating and storing Article and SeriesArticle 
 * objects. What could go wrong? Throw an exception when that happens, and 
 * handle it gracefully.
 */

// Autoload our classes with an anonymous function.
define('CLIB_PATH', 'clib');
function my_autoload ($classname) {
  include(CLIB_PATH . '/' . $classname . '.class.php'); 
}	
spl_autoload_register('my_autoload');

// Try to break article constructors.
$ok = array('code' => '0000','message' => 'OK');
$response = $ok;

// Create and article with a zero-length title.
try {
  $badArticle = new Article('','fake body.');
} catch (Exception $e) {
  $response['code'] = $e->getCode();
  $response['message'] = $e->getMessage();
}
$responses[] = $response;
$response = $ok;

// Create an article with a zero-length body.
try {
  $badArticle = new Article('fake title','');
} catch (Exception $e) {
  $response['code'] = $e->getCode();
  $response['message'] = $e->getMessage();
}
$responses[] = $response;
$response = $ok;

// Do the faux db_query to get the articles
require_once('articles.inc');
$articles = getArticleData();

// Create the series and add the articles.
$mySeries = new ArticleSeries();
foreach ($articles as $article) {
  $mySeries->insert(new Article($article['title'], $article['body']));
}

// Try to get teasers with bad lengths.
try {
  $badTeaser = $mySeries->next()->getTeaser(-99);
} catch (Exception $e) {
  $response['code'] = $e->getCode();
  $response['message'] = $e->getMessage();
}
$responses[] = $response;
$response = $ok;

try {
  $badTeaser = $mySeries->next()->getTeaser(84649);
} catch (Exception $e) {
  $response['code'] = $e->getCode();
  $response['message'] = $e->getMessage();
}
$responses[] = $response;
$response = $ok;

?>

<html>
<head>
  <title>Working with Exceptions | PHP4Devs</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
  <h1>Woring with Exceptions</h1>
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
  <p>I'll spare you the summary, as we want to know about errors. Trust me, the article series is good.</p>
  <h2>Exception Report</h2>
  <p>Here's what our improved Article class said when we tried to break it in several different ways.</p>
  <ul>
  <?php foreach ($responses as $response): ?>
    <li>
      <h3><?php print 'Error code: ' . $response['code'] ?></h3>
      <p><strong>Message:</strong> <?php print $response['message'] ?></p>
    </li>
  <?php endforeach; ?>
</ul>
  <h2>What does it mean?</h2>
  <p>Getting to this point (markup output) means all breakage attempts were gracefully caught by Exception wrapping. Woot!</p>
  <hr/>
  <p><small>&#214; <a href="index.html">BACK 2 INDEX</a> &#214;</small></p>
</body>
</html>
