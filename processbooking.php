<?php
// ---------------- PHP SECTION ----------------
$errors = [];
$firstname = $lastname = $age = $species = "";
$accom = $fourday = $tenday = $food = $date = $partysize = "";

// Only run if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Extract & sanitize user input
    $firstname  = htmlspecialchars($_POST['firstname'] ?? '');
    $lastname   = htmlspecialchars($_POST['lastname'] ?? '');
    $age        = htmlspecialchars($_POST['age'] ?? '');
    $species    = htmlspecialchars($_POST['species'] ?? '');
    $accom      = isset($_POST['accom']) ? "Accommodation" : "";
    $fourday    = isset($_POST['4day']) ? "4 Day Tour" : "";
    $tenday     = isset($_POST['10day']) ? "10 Day Tour" : "";
    $food       = htmlspecialchars($_POST['food'] ?? '');
    $date       = htmlspecialchars($_POST['bookday'] ?? '');
    $partysize  = htmlspecialchars($_POST['partysize'] ?? '');

    // Validation
    if ($firstname == "") $errors[] = "First name is required.";
    if ($lastname == "") $errors[]  = "Last name is required.";
    if ($age == "" || !is_numeric($age)) $errors[] = "Age must be a number.";
    if ($date == "") $errors[] = "Please enter a booking date.";
    if ($partysize == "" || !is_numeric($partysize)) $errors[] = "Number of travellers must be numeric.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Booking Confirmation</title>
  <link rel="stylesheet" type="text/css" href="style/style.css">
  <link rel="stylesheet" type="text/css" href="style/register.css">
</head>
<body>

<header><h1>Rohirrim Dude Ranch</h1></header>

<nav>
  <ul>
    <li><a href="construction.html">Home</a></li>
    <li><a href="construction.html">Accommodation</a></li>
    <li><a href="construction.html">Horse Riding</a></li>
    <li><a href="construction.html">Sight Seeing</a></li>
    <li><a href="register.html">Book</a></li>
  </ul>
</nav>

<article>
  <h2>Rohirrim Tour Booking Confirmation</h2>

  <?php if ($_SERVER["REQUEST_METHOD"] != "POST") { ?>
      <p style="color:red;">No booking data received.</p>

  <?php } elseif (count($errors) > 0) { ?>
      <h3 style="color:red;">There were some errors:</h3>
      <ul>
        <?php foreach ($errors as $err) echo "<li>$err</li>"; ?>
      </ul>
      <p><a href="register.html">Go back and fix the form.</a></p>

  <?php } else { ?>
      <p>Thank you, <strong><?= $firstname ?> <?= $lastname ?></strong>.</p>
      <p>Species: <strong><?= $species ?></strong></p>
      <p>Age: <strong><?= $age ?></strong></p>

      <p>Booking details:</p>
      <ul>
        <?php if ($accom) echo "<li>$accom</li>"; ?>
        <?php if ($fourday) echo "<li>$fourday</li>"; ?>
        <?php if ($tenday) echo "<li>$tenday</li>"; ?>
      </ul>

      <p>Menu preference: <strong><?= $food ?></strong></p>
      <p>Booking Date: <strong><?= $date ?></strong></p>
      <p>Party Size: <strong><?= $partysize ?></strong></p>
      <p>Your booking has been successfully received.</p>
  <?php } ?>
</article>

<footer>
  <div>
    <h1 class="fineprint">Conditions Apply</h1>
    <p class="fineprint">
      Rohirrim Dude Ranch management takes no responsibility for any injury,
      beheadings, spells, spider-bites suffered by guests, or anything whatsoever.
    </p>
  </div>
  <p id="contact">Any enquiries please email the
    <a href="mailto:something@something.com">manager</a></p>
</footer>

</body>
</html>
