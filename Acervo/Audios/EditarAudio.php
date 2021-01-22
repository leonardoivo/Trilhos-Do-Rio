<?php
include("../../config.php");
$id_livro=" ";
if(isset($_GET['id_livro'])){


	$id_livro=$_GET['id_livro'];

}



$QueryResultado = "select id_audios, nome_audio, autor, data_de_gravacao FROM audios where id_audios='".$id_livro."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head></head><body>
	

<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$nome_audio=$linhaBusca['nome_audio'];
	$autor=$linhaBusca['autor'];
	$tempData=$linhaBusca['data_de_gravacao	'];
	?>
	
	
	
	
	
	
	<?
	
	
	}

?>
<div   style="text-align:center;">
<h1>  Livros</h1>

<!--<h2><a href="testedeconexao.php">Verificar epubs alterados em Kobo</a></h2>-->
<h2> Cadastrar Livro</h2>
<form method="post" action="CrudAudio.php?operacao=2"> 

Nome do livro:<input type="text" name="nome_audio" value="<?  echo $nome_audio;?>"> <br/>
Editor: <input type="text" name="autor" value="<?  echo $autor;?>">
Data de publicação:<input type="date"  name="data_de_gravacao	" value="<?  echo $tempData;?> ">
<input type="submit" name="cadastrar"><br/>

</form>
</div>
<?echo "<a href=\"audios.php\" onclick='location.replace(\"audios.php\")'>voltar</a>"; ?></body>
</html>




