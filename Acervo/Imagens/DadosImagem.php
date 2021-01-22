<?php
include("../../config.php");
$id_imagem=" ";
if(isset($_GET['id_imagem'])){


	$id_imagem=$_GET['id_imagem'];

}



$QueryResultado = "select id_imagem, nome_imagem, autor, data_de_inclusao FROM imagens where id_imagem='".$id_imagem."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head></head><body>
	
<table border=1>
	<tr><th>Nome da imagem</th><th>autor</th><th>Data De Cadastramento</th></tr>
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
<?echo "<a href=\"Imagens.php\" onclick='location.replace(\"Imagens.php\")'>voltar</a>"; ?></body>
</html>




