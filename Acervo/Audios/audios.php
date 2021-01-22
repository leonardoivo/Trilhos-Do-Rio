<!DOCTYPE html>

<html>
<head></head>
<body>



<?php
include("../../config.php");

	
	$operacao=0;
	$tempData="";
	$tempDataautor	="";
	$autor="";
	$linhaBusca = 0;
	$QtdLivrosCadastrados=0;
    
	$i=1;
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
	echo "Audios cadastrados";
	echo "<form action=\"audios.php?operacao=1\" method=\"post\">";
	echo "Audio: <input type=\"text\" name=\" pesquisar\">";
	echo "<input type=\"submit\" name=\" Ver\">";
	echo "  <button type=\"submit\" formaction=\"audios.php?operacao=0\">Ver Todos</button>";

	echo "</form>";

	
	 
	
	
	$pesquisar="";
	$operacao=0;
	
	if(isset($_GET['operacao'])){

		$operacao=$_GET['operacao'];

	}

	if(isset($_POST['pesquisar']) && $operacao==1)
	{
		$pesquisar = $_POST['pesquisar'];
		$QueryBusca = "SELECT id_audio	, nome_audio, autor	, data_de_gravacao	 FROM audios where nome_audio	 like '%$pesquisar%'";
		echo $QueryBusca;
		$query=mysqli_query($link,$QueryBusca);
		?>
			
		<table border=1>
			<tr><th>Nome do Audio</th><th>autor	</th><th>Data de Gravação</th></tr>
		<?
		
		while($linhaBusca=mysqli_fetch_assoc($query))
		{
			
			$nome_audio	=$linhaBusca['nome_audio'];
			$autor=$linhaBusca['autor'];
			$tempData=$linhaBusca['data_de_gravacao	'];
			?>
			<tr><td><?  echo $nome_audio	;?></td>
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
	$queryGeral=mysqli_query($link,"SELECT id_audio, nome_audio, autor, data_de_gravacao FROM audios order by data_de_gravacao	 asc");
	
	echo "<table border=1>";
	echo "<tr><th>Nome do Audio</th>";
	echo "<th>Editar</th>";
	echo "<th>Excluir</th></tr>";
	while($linha=mysqli_fetch_assoc($queryGeral))
	  {
	 $id_audio = $linha['id_audio'];
	 $nome_audio=$linha['nome_audio'];
	 $autor=$linha['autor'];
	 $tempData=$linha['data_de_gravacao	'];
	

		?>
		<tr><td><?  echo "<a href=\"DadosDoAudio.php?id_audio=".$id_audio."\">".$nome_audio	."</a>";?></td>
		 <td> <?  echo "<a href=\"EditarAudio.php?id_audio=".$id_audio."\"> Editar</a>"; ?></td>
	  <td> <?  echo "<a href=\"CrudAudio.php?id_audio=".$id_audio."& operacao=3\"> Apagar</a>"; ?></td></tr>
		
		

		<?
	//$QtdLivrosCadastrados= $i++;
	//$QtdLivrosCadastrados+=1;		
		}
		echo " </table>"; 
        //echo "Quantidade de audios cadastrados: ".$QtdLivrosCadastrados;

}

	echo "<a href=\"InserirAudio.php\"> Cadastrar Audio</a>   ";

	echo "<a href=\"../acervo.php\" onclick='location.replace(\"acervo.php\")'>voltar</a>   ";
	echo "<a href=\"../../index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";
?>
</body>
</html>