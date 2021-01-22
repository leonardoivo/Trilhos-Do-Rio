<?php
include("../config.php");
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
header("Location:acervo.php");

}else{
		
    header("Location:login.html");
    
    }
    if(isset($_REQUEST["saida"])){
        session_unset();
        session_destroy();
        header("Location:login.html");
    }
?>