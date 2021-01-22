<!DOCTYPE html>

<html>
<head></head>
<body>

<?php
include("../../config.php");
include("LivroListagens.php");
	
	$operacao=0;
	$tempData="";
	$tempDataEditora="";
	$editora="";
	$linhaBusca = 0;
	$QtdLivrosCadastrados=0;
    
	$i=1;
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){

	echo "Livros cadastrados";
	echo "<form action=\"livros.php?operacao=1\" method=\"post\">";
	echo "Livro: <input type=\"text\" name=\" pesquisar\">";
	echo "<input type=\"submit\" name=\" Ver\">";
	echo "  <button type=\"submit\" formaction=\"livros.php?operacao=0\">Ver Todos</button>";

	echo "</form>";

	
	$pesquisar="";
	$operacao=0;
	
	    if(isset($_GET['operacao'])){

		  $operacao=$_GET['operacao'];

	    }

	    if($operacao==1)
	   {
		   $pesquisar = $_POST['pesquisar'];
		BuscaUnitaria($pesquisar,$operacao,$link);
	
	   }
	
	     else if($operacao==0){
	
	    	VerTodos($link);
	   }

	}
	else{
		
		header("Location:../login.html");
		
		}
		if(isset($_REQUEST["saida"])){

		
			session_unset();
			session_destroy();
			header("Location:../ login.html");
			
	
		}

	echo "<a href=\"InserirLivro.php\"> Cadastrar Livro</a>   ";

	echo "<a href=\"../acervo.php\" onclick='location.replace(\"acervo.php\")'>voltar</a>   ";
	echo "<a href=\"../../index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";
?>
</body>
</html>