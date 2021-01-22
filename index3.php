<?php
include("config.php");
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){





	}
	else{

		header("Location:login.html");

		}


?>
