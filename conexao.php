<?php
include("config.php");


$link=mysqli_connect($host,$login_db,$senha_db);
$db=mysqli_select_db($link,$database);
?>