
<!doctype>

<html>
<head></head>
<body>
<?php
include("config.php");
session_start();
$usuario=$_SESSION['usuario'];
$queryPermissao="select u.nome, tb.nome_tabela, tb.link from usuarios u inner join perfil p on u.id_perfil=p.id_perfil inner join tabelas_sistema tb on p.id_perfil=tb.id_perfil where u.cpf=".$usuario;
$query=mysqli_query($link,$queryPermissao);
echo "<h1> Pagina inicial</h1>";
echo "<nav>";
if(isset($usuario)){
	while($linha=mysqli_fetch_assoc($query)){

		$paginas=$linha['nome_tabela'];
		$pasta= $linha['link']."/";
		
       // echo "<a href=\"#\">". $paginas."</a>   ";
		echo "<tr><td> <a href=\"".$pasta.$paginas.".php\">".$paginas. "</a>";


	}
	echo "<a href=\"index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";

	echo "</nav>";
	
	
	echo "</body></html>";
	
	
	
	}
	else{
		
		header("Location:login.html");
		
		}
		if(isset($_REQUEST["saida"])){

		
			session_unset();
			session_destroy();
			header("Location: login.html");
		
	
	
		}
?>
</body>
</html>
