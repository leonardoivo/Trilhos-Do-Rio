<?php
include("config.php");
session_start();
if(isset($_SESSION['usuario'])){
$query=mysqli_query($link,"select * from usuarios order by cpf asc");
echo "<!DOCTYPE html><html><head></head><body>";
echo "<table border=1>
	<tr><th>Usuarios cadastrados</th></tr>";
while($linha=mysqli_fetch_assoc($query))
  {
  $cpf=$linha['cpf'];

 $nome=$linha['nome'];
 $sobrenome=$linha['sobrenome'];
	 echo "<tr><td> <a href=\"DadosUsuarios.php?cpf=".$cpf."\">".$nome." ".$sobrenome."</a></td>";
	 echo "</tr>";
   }
   echo "</table>";
   echo "<a href=\"associados.php?saida=1\" onclick='location.replace(\"login.html\")'>Sair</a>";
   echo "<a href=\"index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";


   echo "</body></html>";
  }else{
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
