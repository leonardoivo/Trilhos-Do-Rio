<?php
session_start();
// store session data
$_SESSION['views']=1;
$_SESSION['name']="Leonardo Ivo";
?>
<html>
<body>

<?php
//retrieve session data
echo "Pageviews=". $_SESSION['views'];
echo "Nome:".$_SESSION['name'];
?>

</body>
</html>
