<?php
include("../config.php");
session_start();
$usuario=$_SESSION["usuario"];
//select * from grupos_sub_paginas gp inner join tabelas_sistema ts on gp.id_tabela=ts.id_tabela where gp.id_perfil=4 and not gp.nome_pagina in('receita','despesa')
$queryAcervo="select nome_pagina,pasta from grupos_sub_paginas gp inner join tabelas_sistema ts on gp.id_tabela=ts.id_tabela where gp.id_perfil=4 and not gp.nome_pagina in('receita','despesa')";
$query=mysqli_query($link,$queryAcervo);
echo "<h1> Acervos</h1>";
echo "<nav>";
if(isset($usuario)){
	while($linha=mysqli_fetch_assoc($query)){

		$paginas=$linha['nome_pagina'];
		$pasta= $linha['pasta']."/";
		
       // echo "<a href=\"#\">". $paginas."</a>   ";
		echo "<tr><td> <a href=\"".$pasta.$paginas.".php\">".$paginas. "</a>";


	}
	echo "<a href=\"../index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";

	echo "</nav>";
	
	echo "<a href=\"../index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";

	echo "</body></html>";
	
	
	
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

