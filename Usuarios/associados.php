<?php
include("../config.php");
include("../VerAcesso.php");
session_start();
$usuario=$_SESSION['usuario'];
$acao=1;
if(isset($_SESSION['usuario'])){
$query=mysqli_query($link,"select * from usuarios order by cpf asc");
echo "<!DOCTYPE html><html><head>

<!-- CSS-->
<link href=\".././Estilos/css/bootstrap.css\" rel=\"stylesheet\">
  <link href=\".././Estilos/css/bootstrap-responsive.css\" rel=\"stylesheet\">
  <link href=\".././Estilos/css/bootstrap-min.css\" rel=\"stylesheet\">
  <!--Javascript -->
   <script src=\".././Estilos/js/bootstrap.js\"></script>
    <script src=\".././Estilos/js/bootstrap-min.js\"></script>




</head><body>";

RegistrarAcesso($usuario,"Associados",$acao,$link);
echo "<h1>Usuários cadastrados</h1>";
echo "<table class=\"table-sm table-striped \">
<thead>
<tr>
  <th scope=\"col\">CPF</th>
  <th scope=\"col\">Nome</th>
 
</tr>
</thead><tbody>";
while($linha=mysqli_fetch_assoc($query))
  {
  $cpf=$linha['cpf'];

 $nome=$linha['nome'];
 $sobrenome=$linha['sobrenome'];
   echo "<tr><td> <a href=\"DadosUsuarios.php?cpf=".$cpf."\">".$nome." ".$sobrenome."</a></td>";
   if(VerAcesso($usuario,$link)==true){
   echo "<td> <a href=\"EditarUsuario.php?cpf=".$cpf."\">Editar</a></td>";
   }
	 echo "</tr>";
   }
   echo "</tbody></table>";
  
   if(VerAcesso($usuario,$link)==true){
		echo "<a href=\"cadastrar.php\"> Incluir usuário</a>";
	
	
   }
     echo "<a href=\"associados.php?saida=1\" onclick='location.replace(\"login.html\")'>Sair</a>";
      echo "<a href=\"../index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";

      echo "</body></html>";
   }
    else
    {
	     header("Location:login.html");
       
      }
if(isset($_REQUEST["saida"]))
 {

	    session_unset();
		session_destroy();
		header("Location: login.html");
        


	}

?>
