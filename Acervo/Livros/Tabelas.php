
<!DOCTYPE html>
<html>
<body>

<?php
$cars = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );
  $matriz=count($cars);  
    
for ($row = 0; $row <  $matriz; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  $linha=count($cars[$row]);
  
  for ($col = 0; $col < $linha; $col++) {
  
    echo "<li>".$cars[$row][$col]."</li>";
  }
  echo "</ul>";
}
?>

</body>
</html>
