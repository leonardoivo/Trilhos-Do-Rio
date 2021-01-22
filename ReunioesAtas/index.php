<?php
session_start();
include("../config.php");
$usuario=$_SESSION["usuario"];

if(isset($usuario))
  {
     header("Location:reunioesatas.php");

   }
   else if (!isset($usuario))
      {
       header("Location: login.html");
      if (headers_sent())
         {

          die("O redirecionamento falhou. Por favor, clique neste link: <a href=...>");
         }
  
     }
      if(isset($_REQUEST["saida"]))
     {
          session_unset();
          session_destroy();
          header("Location:../TDR/login.html");
          exit(header("Location:../TDR/login.htmll"));
      }
?>