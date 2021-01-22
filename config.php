<?php
$host="localhost";
$database="TrilhosDoRio";
//$tabela="usuarios";
$login_db="root";
//$senha_db="usbw";
$senha_db="784512";
$link=mysqli_connect($host,$login_db,$senha_db);
$db=mysqli_select_db($link,$database);
//$novodb = new pdo('mysql:host=localhost;dbname=TrilhosDoRio','root','784512');
?>
