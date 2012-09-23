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

// If we've POSTed, take action.
$meDisplayDate = 'NOTHING!';
$in3weeksDisplay = 'NEVER!';
if ($_POST) {
  $safe_input = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
  
  // Make a date from input, create human-readable string for outuput.
  $meDate = new DateTime($safe_input);
  $meDisplayDate = $meDate->format('dS F, Y');

  // Create human-readable date 3 weeks into the future from original.
  $meDate->modify('+3 weeks');
  $in3weeksDisplay = $meDate->format('dS F, Y'); 
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
  <p>You entered <?php echo $meDisplayDate ?>. Three weeks in the future from then is <?php echo $in3weeksDisplay ?>.</p>
</body>
</html>



