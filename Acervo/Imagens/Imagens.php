<!DOCTYPE html>

<html>
<head></head>
<body>



<?php
include("../../config.php");

	
	$operacao=0;
	$tempData="";
	$tempDataautor="";
	$autor="";
	$linhaBusca = 0;
	$QtdImagensCadastradas=0;
    
	$i=1;
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
	echo "Imagens cadastradas";
	echo "<form action=\"imagens.php?operacao=1\" method=\"post\">";
	echo "Imagem: <input type=\"text\" name=\" pesquisar\">";
	echo "<input type=\"submit\" name=\" Ver\">";
	echo "  <button type=\"submit\" formaction=\"imagens.php?operacao=0\">Ver Todos</button>";

	echo "</form>";

	
	 
	
	
	$pesquisar="";
	$operacao=0;
	
	if(isset($_GET['operacao'])){

		$operacao=$_GET['operacao'];

	}

	if(isset($_POST['pesquisar']) && $operacao==1)
	{
		$pesquisar = $_POST['pesquisar'];
		$QueryBusca = "SELECT id_imagem, nome_imagem, autor, data_de_inclusao FROM imagens where nome_imagem like '%$pesquisar%'";
		echo $QueryBusca;
		$query=mysqli_query($link,$QueryBusca);
		?>
			
		<table border=1>
			<tr><th>Nome da imagem</th><th>autor</th><th>Data Da Fotografia</th></tr>
		<?
		
		while($linhaBusca=mysqli_fetch_assoc($query))
		{
			
			$nome_imagem=$linhaBusca['nome_imagem'];
			$autor=$linhaBusca['autor'];
			$tempData=$linhaBusca['data_de_inclusao'];
			?>
			<tr><td><?  echo $nome_imagem;?></td>
			<td><?  echo $autor;?></td>
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
	$queryGeral=mysqli_query($link,"SELECT id_imagem, nome_imagem, autor, data_de_inclusao FROM imagens order by data_de_inclusao asc");
	
	echo "<table border=1>";
	echo "<tr><th>Nome da imagem</th>";
	echo "<th>Editar</th>";
	echo "<th>Excluir</th></tr>";
	while($linha=mysqli_fetch_assoc($queryGeral))
	  {
	 $id_imagem = $linha['id_imagem'];
	 $nome_imagem=$linha['nome_imagem'];
	 $autor=$linha['autor'];
	 $tempData=$linha['data_de_inclusao'];
	

		?>
		<tr><td><?  echo "<a href=\"DadosImagem.php?id_imagem=".$id_imagem."\">".$nome_imagem."</a>";?></td>
		 <td> <?  echo "<a href=\"EditarImagens.php?id_imagem=".$id_imagem."\"> Editar</a>"; ?></td>
	  <td> <?  echo "<a href=\"CrudImagens.php?id_imagem=".$id_imagem."& operacao=3\"> Apagar</a>"; ?></td></tr>
		
		

		<?
	//$QtdImagensCadastradas= $i++;
	//$QtdImagensCadastradas+=1;		
		}
		echo " </table>"; 
        //echo "Quantidade de imagens cadastrados: ".$QtdImagensCadastradas;

}

	echo "<a href=\"InserirImagem.php\"> Cadastrar Imagem</a>   ";

	echo "<a href=\"../acervo.php\" onclick='location.replace(\"acervo.php\")'>voltar</a>   ";
	echo "<a href=\"../../index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";
?>
</body>
</html>