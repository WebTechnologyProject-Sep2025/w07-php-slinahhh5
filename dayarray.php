<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Days Array</title>
</head>
<body>
  <h1>Days of the Week (English)</h1>
  <?php
  $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
  echo "<ul>";
  foreach ($days as $d) echo "<li>$d</li>";
  echo "</ul>";
  ?>

  <h1>Days of the Week (French)</h1>
  <?php
  $jours = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
  echo "<ul>";
  foreach ($jours as $j) echo "<li>$j</li>";
  echo "</ul>";
  ?>
</body>
</html>
