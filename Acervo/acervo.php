<?php
session_start();
include("../config.php");
include("AcervoListagens.php");
include("../VerAcesso.php");
echo "<!DOCTYPE html><html><head>
<!-- CSS-->
<link href=\".././Estilos/css/bootstrap.css\" rel=\"stylesheet\">
  <link href=\".././Estilos/css/bootstrap-responsive.css\" rel=\"stylesheet\">
  <link href=\".././Estilos/css/bootstrap-min.css\" rel=\"stylesheet\">
  <!--Javascript -->
   <script src=\".././Estilos/js/bootstrap.js\"></script>
    <script src=\".././Estilos/js/bootstrap-min.js\"></script>
</head><body>";
$usuario=$_SESSION["usuario"];
//select * from grupos_sub_paginas gp inner join tabelas_sistema ts on gp.id_tabela=ts.id_tabela where gp.id_perfil=4 and not gp.nome_pagina in('receita','despesa')
$queryAcervo="select nome_pagina,pasta from grupos_sub_paginas gp inner join tabelas_sistema ts on gp.id_tabela=ts.id_tabela where gp.id_perfil=4 and not gp.nome_pagina in('receita','despesa')";
$query=mysqli_query($link,$queryAcervo);
$Departamento="Acervos";
$acao=1;
echo "<h1> Acervos</h1>";
echo "<nav>";
if(isset($usuario)){
	while($linha=mysqli_fetch_assoc($query)){

		$paginas=$linha['nome_pagina'];
		$pasta= $linha['pasta']."/";
		
       // echo "<a href=\"#\">". $paginas."</a>   ";
		echo "<tr><td> <a href=\"".$pasta.$paginas.".php\">".$paginas. "</a>";
	}

   echo "<br/><br/>";
	echo "Acervos cadastrados";
	echo "<form action=\"acervo.php?operacao=1\" method=\"post\">";
	echo "Acervo: <input type=\"text\" name=\" pesquisar\">";
	echo "<input type=\"submit\" name=\" Ver\">";
	echo "  <button type=\"submit\" formaction=\"acervo.php?operacao=0\">Ver Todos</button>";

	echo "</form>";

	$pesquisar="";
	$operacao=0;
	
	if(isset($_GET['operacao'])){

		$operacao=$_GET['operacao'];

	}
  
	if( $operacao==1)
	{
		$pesquisar = $_POST['pesquisar'];
		buscaUnitaria($pesquisar,$operacao,$link);
	
	}

	else if($operacao==0){
	
		VerTodos($link);
	}


	echo "</nav>";
	echo "<a href=\"InserirAcervo.php\"> Cadastrar Acervo</a>   ";
	
	echo "<a href=\"../index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";
	echo "<a href=\"../../index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>  ";
	echo "</body></html>";
	
	RegistrarAcesso($usuario,$Departamento,$acao,$link);
	}
	else{
		 	if (headers_sent()) {
             die("O redirecionamento falhou. Por favor, clique neste link: <a href=...>");
		
		
		}
		//header("Location:login.html");
		
		}
		if(isset($_REQUEST["saida"])){

			session_unset();
			session_destroy();
			header("Location: login.html");
	
	
		}
?>
</body>
</html>

