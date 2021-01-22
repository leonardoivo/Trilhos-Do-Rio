<!DOCTYPE html>

<html>
<head></head>
<body>



<?php
include("../../config.php");

	
	$operacao=0;
	$tempData="";
	$tempDatadescricao="";
	$descricao="";
	$linhaBusca = 0;
	$QtdLivrosCadastrados=0;
    
	$i=1;
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
	echo "Documentos cadastrados";
	echo "<form action=\"documentos.php?operacao=1\" method=\"post\">";
	echo "Documento: <input type=\"text\" name=\" pesquisar\">";
	echo "<input type=\"submit\" name=\" Ver\">";
	echo "  <button type=\"submit\" formaction=\"documentos.php?operacao=0\">Ver Todos</button>";

	echo "</form>";

	
	 
	
	
	$pesquisar="";
	$operacao=0;
	
	if(isset($_GET['operacao'])){

		$operacao=$_GET['operacao'];

	}

	if(isset($_POST['pesquisar']) && $operacao==1)
	{
		$pesquisar = $_POST['pesquisar'];
		$QueryBusca = "SELECT id_documento,nome_documento, descricao,dataDeCadastramento  FROM documentos where nome_documento like '%$pesquisar%'";
		echo $QueryBusca;
		$query=mysqli_query($link,$QueryBusca);
		?>
			
		<table border=1>
			<tr><th>Nome do Livro</th><th>descricao</th><th>Data De cadastramento</th></tr>
		<?
		
		while($linhaBusca=mysqli_fetch_assoc($query))
		{
			
			$nome_documento=$linhaBusca['nome_documento'];
			$descricao=$linhaBusca['descricao'];
			$tempData=$linhaBusca['dataDeCadastramento '];
			?>
			<tr><td><?  echo $nome_documento;?></td>
			<td><?  echo $descricao;?></td>
			<td><?  echo $tempData;?></td>
			
			</tr>
			
			<?
			
			
			}
			
		?>
		
		</table>
		
	<?
	
	}
	//isset($_POST['pesquisar']) && $_POST['pesquisar'] == ""
	else if($operacao==0){
	
		VerTodos($link);
	}


	
	}
	else{
		
		header("Location:../login.html");
		
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
			header("Location:../ login.html");
			 //exit(header("Location: login.html"));
		   //}
	
	
		}

function VerTodos($link){
	$queryGeral=mysqli_query($link,"SELECT id_documento,nome_documento, descricao,dataDeCadastramento  FROM documentos order by dataDeCadastramento  asc");
	
	echo "<table border=1>";
	echo "<tr><th>Nome do Documento</th>";
	echo "<th>Editar</th>";
	echo "<th>Excluir</th></tr>";
	while($linha=mysqli_fetch_assoc($queryGeral))
	  {
	 $id_documento = $linha['id_documento'];
	 $nome_documento=$linha['nome_documento'];
	 $descricao=$linha['descricao'];
	 $tempData=$linha['dataDeCadastramento'];
	

		?>
		<tr><td><?  echo "<a href=\"DadosDocumentos.php?id_documento=".$id_documento."\">".$nome_documento."</a>";?></td>
		 <td> <?  echo "<a href=\"EditarDocumentos.php?id_documento=".$id_documento."\"> Editar</a>"; ?></td>
	  <td> <?  echo "<a href=\"CrudDocumentos.php?id_documento=".$id_documento."& operacao=3\"> Apagar</a>"; ?></td></tr>
		
		

		<?
	//$QtdLivrosCadastrados= $i++;
	//$QtdLivrosCadastrados+=1;		
		}
		echo " </table>"; 
        //echo "Quantidade de documentos cadastrados: ".$QtdLivrosCadastrados;

}

	echo "<a href=\"InserirDocumento.php\"> Cadastrar Documentos</a>   ";

	echo "<a href=\"../acervo.php\" onclick='location.replace(\"acervo.php\")'>voltar</a>   ";
	echo "<a href=\"../../index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";
?>
</body>
</html>