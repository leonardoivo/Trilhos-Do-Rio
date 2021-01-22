<?php
include("../config.php");

session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
	







	
	
	echo "<a href=\"index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";

	echo "<a href=\"../index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";

	
	}
	else{
		
		header("Location:login.html");
		
		}
		if(isset($_REQUEST["saida"])){

			//session_unset();
			// session_destroy();
		//	if (headers_sent()) {
		  //  die("O redirecionamento falhou. Por favor, clique neste link: <a href=...>");
		  //   }
		  //  else{
			session_unset();
			session_destroy();
			header("Location: login.html");
			 //exit(header("Location: login.html"));
		   //}
	
	
		}
?>
