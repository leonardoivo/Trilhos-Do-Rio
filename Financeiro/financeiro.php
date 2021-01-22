<?php
include("../config.php");
include("../VerAcesso.php");
session_start();
$usuario=$_SESSION["usuario"];
$departamento="Financeiro";
$acao=1;
//select * from grupos_sub_paginas gp inner join tabelas_sistema ts on gp.id_tabela=ts.id_tabela where gp.id_perfil=4 and not gp.nome_pagina in('receita','despesa')
$queryAcervo="select nome_pagina,pasta from grupos_sub_paginas gp inner join tabelas_sistema ts on gp.id_tabela=ts.id_tabela where gp.id_perfil=4 and gp.id_grupo in (7,8)";
$query=mysqli_query($link,$queryAcervo);
echo "<!DOCTYPE html><html><head>

<!-- CSS-->
<link href=\".././Estilos/css/bootstrap.css\" rel=\"stylesheet\">
  <link href=\".././Estilos/css/bootstrap-responsive.css\" rel=\"stylesheet\">
  <link href=\".././Estilos/css/bootstrap-min.css\" rel=\"stylesheet\">
  <!--Javascript -->
   <script src=\".././Estilos/js/bootstrap.js\"></script>
    <script src=\".././Estilos/js/bootstrap-min.js\"></script>




</head><body>";
echo "<h1> Finanças e Balanços</h1>";
echo "<nav>";
if(isset($usuario)){
	while($linha=mysqli_fetch_assoc($query)){

		$paginas=$linha['nome_pagina'];
		$pasta= $linha['pasta']."/";
		
       // echo "<a href=\"#\">". $paginas."</a>   ";
		echo "<tr><td><h2> <a href=\"".$pasta.$paginas.".php\">".$paginas. "</h2></a>";


	}
	echo "<a href=\"../index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";
	echo "</nav>";
	echo "<a href=\"../index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";

	echo "</body></html>";
	
	RegistrarAcesso($usuario,$departamento,$acao,$link);

	
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
</body>
</html>

