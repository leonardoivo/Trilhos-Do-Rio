<?php
include("../../config.php");
$id_livro=" ";
if(isset($_GET['id_livro'])){


	$id_livro=$_GET['id_livro'];

}



$QueryResultado = "select id_livros, nome_objeto, autor, data_de_coleta FROM livros where id_livros='".$id_livro."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head></head><body>
	

<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$nome_objeto=$linhaBusca['nome_objeto'];
	$autor=$linhaBusca['autor'];
	$tempData=$linhaBusca['data_de_coleta'];
	?>
	
	
	
	
	
	
	<?
	
	
	}

?>
<div   style="text-align:center;">
<h1>  Objeto</h1>

<!--<h2><a href="testedeconexao.php">Verificar epubs alterados em Kobo</a></h2>-->
<h2> Cadastrar Objeto</h2>
<form method="post" action="CrudObjetos.php?operacao=2"> 

Nome do Objeto:<input type="text" name="nome_objeto" value="<?  echo $nome_objeto;?>"> <br/>
Autor: <input type="text" name="autor" value="<?  echo $autor;?>">
Data da Coleta:<input type="date"  name="data_de_coleta" value="<?  echo $tempData;?> ">
<input type="submit" name="cadastrar"><br/>

</form>
</div>
<?echo "<a href=\"objetos.php\" onclick='location.replace(\"livros.php\")'>voltar</a>"; ?></body>
</html>




