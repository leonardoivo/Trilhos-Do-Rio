<!DOCTYPE html>

<html>
<head></head>
<body>



<?php
include("../../config.php");

	
	$operacao=0;
	$tempData="";
	$tempDataautor="";
	$editora="";
	$linhaBusca = 0;
	$QtdLivrosCadastrados=0;
    
	$i=1;
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
	echo "Videos cadastrados";
	echo "<form action=\"videos.php?operacao=1\" method=\"post\">";
	echo "Videos: <input type=\"text\" name=\" pesquisar\">";
	echo "<input type=\"submit\" name=\" Ver\">";
	echo "  <button type=\"submit\" formaction=\"videos.php?operacao=0\">Ver Todos</button>";

	echo "</form>";

	
	 
	
	
	$pesquisar="";
	$operacao=0;
	
	if(isset($_GET['operacao'])){

		$operacao=$_GET['operacao'];

	}

	if(isset($_POST['pesquisar']) && $operacao==1)
	{
		$pesquisar = $_POST['pesquisar'];
		$QueryBusca = "SELECT id_video, nome_video, autor, data_de_cadastramento FROM videos where nome_video like '%$pesquisar%'";
		echo $QueryBusca;
		$query=mysqli_query($link,$QueryBusca);
		?>
			
		<table border=1>
			<tr><th>Nome do Video</th><th>autor</th><th>Data De cadastramento</th></tr>
		<?
		
		while($linhaBusca=mysqli_fetch_assoc($query))
		{
			
			$nome_video=$linhaBusca['nome_video'];
			$editora=$linhaBusca['autor'];
			$tempData=$linhaBusca['data_de_cadastramento'];
			?>
			<tr><td><?  echo $nome_video;?></td>
			<td><?  echo $editora;?></td>
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
	$queryGeral=mysqli_query($link,"SELECT id_video, nome_video, autor, data_de_cadastramento FROM videos order by data_de_cadastramento asc");
	
	echo "<table border=1>";
	echo "<tr><th>Nome do Video</th>";
	echo "<th>Editar</th>";
	echo "<th>Excluir</th></tr>";
	while($linha=mysqli_fetch_assoc($queryGeral))
	  {
	 $id_video = $linha['id_video'];
	 $nome_video=$linha['nome_video'];
	 $editora=$linha['autor'];
	 $tempData=$linha['data_de_cadastramento'];
	

		?>
		<tr><td><?  echo "<a href=\"DadosVideos.php?id_video=".$id_video."\">".$nome_video."</a>";?></td>
		 <td> <?  echo "<a href=\"EditarVideos.php?id_video=".$id_video."\"> Editar</a>"; ?></td>
	  <td> <?  echo "<a href=\"CrudVideos.php?id_video=".$id_video."& operacao=3\"> Apagar</a>"; ?></td></tr>
		
		

		<?
	//$QtdLivrosCadastrados= $i++;
	//$QtdLivrosCadastrados+=1;		
		}
		echo " </table>"; 
        //echo "Quantidade de videos cadastrados: ".$QtdLivrosCadastrados;

}

	echo "<a href=\"InserirVideo.php\"> Cadastrar Video</a>   ";

	echo "<a href=\"../acervo.php\" onclick='location.replace(\"acervo.php\")'>voltar</a>   ";
	echo "<a href=\"../../index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";
?>
</body>
</html>