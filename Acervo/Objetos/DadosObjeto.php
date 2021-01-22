<?php
include("../../config.php");
$id_objeto=" ";
if(isset($_GET['id_objeto'])){


	$id_objeto=$_GET['id_objeto'];

}



$QueryResultado = "select id_objeto, nome_objeto, autor, data_de_coleta FROM objeto where id_objeto='".$id_objeto."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head></head><body>
	
<table border=1>
	<tr><th>Nome do Objeto</th><th>autor</th><th>Data Da Coleta</th></tr>
<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$nome_objeto=$linhaBusca['nome_objeto'];
	$autor=$linhaBusca['autor'];
	$tempData=$linhaBusca['data_de_coleta'];
	?>
	<tr><td><?  echo $nome_objeto;?></td>
	<td><?  echo $autor;?></td>
	<td><?  echo $tempData;?></td>
	
	</tr>
	
	<?
	
	
	}

?>
</table>	
<?echo "<a href=\"objeto.php\" onclick='location.replace(\"objeto.php\")'>voltar</a>"; ?></body>
</html>




