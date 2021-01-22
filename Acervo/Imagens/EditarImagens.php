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
	

<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$nome_do_livro=$linhaBusca['nome_do_livro'];
	$editora=$linhaBusca['Editora'];
	$tempData=$linhaBusca['dataDeCadastramento'];
	?>
	
	
	
	
	
	
	<?
	
	
	}

?>
<div   style="text-align:center;">
<h1>  Livros</h1>

<!--<h2><a href="testedeconexao.php">Verificar epubs alterados em Kobo</a></h2>-->
<h2> Cadastrar Livro</h2>
<form method="post" action="CrudLivro.php?operacao=2"> 

Nome do livro:<input type="text" name="nomeDoLivro" value="<?  echo $nome_do_livro;?>"> <br/>
Editor: <input type="text" name="editora" value="<?  echo $editora;?>">
Data de publicação:<input type="date"  name="dataDeCadastramento" value="<?  echo $tempData;?> ">
<input type="submit" name="cadastrar"><br/>

</form>
</div>
<?echo "<a href=\"livros.php\" onclick='location.replace(\"livros.php\")'>voltar</a>"; ?></body>
</html>




