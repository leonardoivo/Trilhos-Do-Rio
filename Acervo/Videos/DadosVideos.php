<?php
include("../../config.php");
$id_video=" ";
if(isset($_GET['id_livro'])){


	$id_video=$_GET['id_livro'];

}



$QueryResultado = "select id_video, nome_video, autor, data_de_cadastramento FROM videos where id_video='".$id_video."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head></head><body>
	
<table border=1>
	<tr><th>Nome do Video</th><th>autor</th><th>Data De Cadastramento</th></tr>
<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$nome_video=$linhaBusca['nome_video'];
	$autor=$linhaBusca['autor'];
	$tempData=$linhaBusca['data_de_cadastramento'];
	?>
	<tr><td><?  echo $nome_video;?></td>
	<td><?  echo $autor;?></td>
	<td><?  echo $tempData;?></td>
	
	</tr>
	
	<?
	
	
	}

?>
</table>	
<?echo "<a href=\"videos.php\" onclick='location.replace(\"videos.php\")'>voltar</a>"; ?></body>
</html>




