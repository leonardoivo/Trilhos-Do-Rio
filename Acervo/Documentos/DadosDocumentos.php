<?php
include("../../config.php");
$id_documento=" ";
if(isset($_GET['id_documento'])){


	$id_documento=$_GET['id_documento'];

}



$QueryResultado = "select id_documento, nome_documento, Descricao, dataDeCadastramento FROM documento where id_documento='".$id_documento."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head></head><body>
	
<table border=1>
	<tr><th>Nome do documento</th><th>Descricao</th><th>Data De cadastramento</th></tr>
<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$nome_documento=$linhaBusca['nome_documento'];
	$Descricao=$linhaBusca['Descricao'];
	$tempData=$linhaBusca['dataDeCadastramento'];
	?>
	<tr><td><?  echo $nome_documento;?></td>
	<td><?  echo $Descricao;?></td>
	<td><?  echo $tempData;?></td>
	
	</tr>
	
	<?
	
	
	}

?>
</table>	
<?echo "<a href=\"documento.php\" onclick='location.replace(\"documento.php\")'>voltar</a>"; ?></body>
</html>




