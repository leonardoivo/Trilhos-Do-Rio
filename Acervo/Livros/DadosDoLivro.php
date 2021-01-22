<?php
include("../../config.php");
$id_livro=" ";
if(isset($_GET['id_livro'])){


	$id_livro=$_GET['id_livro'];

}



$QueryResultado = "select id_livros, nome_do_livro, Editora, dataDeCadastramento FROM livros where id_livros='".$id_livro."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head></head><body>
	
<table border=1>
	<tr><th>Nome do Livro</th><th>Editora</th><th>Data Do Email</th></tr>
<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$nome_do_livro=$linhaBusca['nome_do_livro'];
	$editora=$linhaBusca['Editora'];
	$tempData=$linhaBusca['dataDeCadastramento'];
	?>
	<tr><td><?  echo $nome_do_livro;?></td>
	<td><?  echo $editora;?></td>
	<td><?  echo $tempData;?></td>
	
	</tr>
	
	<?
	
	
	}

?>
</table>	
<?echo "<a href=\"livros.php\" onclick='location.replace(\"livros.php\")'>voltar</a>"; ?></body>
</html>




