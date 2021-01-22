<?php
session_start();
include("config.php");
include("VerAcesso.php");
$usuario=$_SESSION['usuario'];
$pagina=(isset($_GET['pagina']))?$_GET['pagina']:1;
$Departamento="Pagina Principal";
$acao=1;

if(isset($usuario))
{
    echo"<!DOCTYPE html>";
	echo"<html>";
	echo"<head>";
	echo"<link href=\"../../TDR/Estilos/css/bootstrap.css\" rel=\"stylesheet\">"; 
	echo "<link href=\" ../../TDR/Estilos/css/bootstrap-responsive.css\" rel=\"stylesheet\">" ;  
	echo  "<link href=\" ../../TDR/Estilos/css/bootstrap-min.css\" rel=\"stylesheet\">" ;
	echo "<!--Javascript -->";
	echo  "<script src=\"../../TDR/Estilos/js/bootstrap.js\"</script>" ; 
	echo   "<script src=\"../../TDR/Estilos/js/bootstrap-min.js\" ></script>" ;
	echo "</head>";
	echo "<body>";

	$queryPermissao="select u.id_usuario, u.nome, tb.nome_tabela, tb.link from usuarios u inner join perfil p on u.id_perfil=p.id_perfil inner join tabelas_sistema tb on p.id_perfil=tb.id_perfil where u.cpf=".$usuario;
	$query=mysqli_query($link,$queryPermissao);
    $nome= NomeUsuario($usuario,$link);
	
	RegistrarAcesso($usuario,$Departamento,$acao,$link);

	
	echo "Ola ".$nome."!</br>";


	echo "<nav>";
	echo "    <div class=\"jumbotron\">";
	echo "<h1> Pagina inicial</h1>";

    while($linha= mysqli_fetch_assoc($query)){
	//while($linha=$query->fetch(PDO::FETCH_ASSOC))
  
		$paginas=$linha['nome_tabela'];
		$pasta= $linha['link']."/";
		echo " <a href=\"".$pasta.$paginas.".php\">".$paginas. "</a>";

	}
//	echo $usuario_nome;
	echo "</div>";
	echo "</nav>";

	ListarRegistrosAcesso($pagina,$link);
	
	
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
		  header("Location:../ login.html");
		  exit(header("Location: login.html"));
		}

?>
</body>
</html>
