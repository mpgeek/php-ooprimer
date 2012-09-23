<?php
/**
 * @file ex1.php
 *
 * We can work with existing objects before we think about creating our own.
 * there are many already built in to PHP. As an example, take a look at the
 * DateTime extension: http://php.net/datetime. We're going to use this in a
 * simple code-processing example.
 *
 * Create a new form to accept a date. Hint: when you create a new DateTime
 * object, you can supply any string that looks a bit like a date!
 * It understands anything that strtotime understands when the user enters a
 * date, output it a format like: 
 *    1st January, 2012
 * When you have your form and output working, add another section that shows
 * the date three weeks in the future, in UTC.
 */

// If we have input, make a DateTime object from it.
$meDate = NULL;
if ($_POST) {
  $meDate = new DateTime(
    filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING)
  );
} 

?>

<html>
<head>
  <title>Existing Objects | PHP4Devs</title>
</head>
<body>
  <h1>Date thingy!</h1>
  <p>
    <form method="post">
      Enter a date in the format MM/DD/YY:<br />
      <input type="text" name="date" /><input type="submit" />
    </form>
  </p>
  <h2>Response</h2>
  <?php if (isset($meDate)): ?>
    <p>You entered <?php echo $meDate->format('dS F, Y'); ?>. Three weeks in the future from then is <?php $meDate->modify('+3 weeks'); echo $meDate->format('dS F, Y'); ?>.</p>
  <?php else: ?>
    <p>I respond to input and I cannot read your mind.</p>
  <?php endif; ?>
</body>
</html>



