<?php
include("../../config.php");
$id_video=" ";
if(isset($_GET['id_video'])){


	$id_video=$_GET['id_video'];

}



$QueryResultado = "select id_video, nome_video, autor, data_de_cadastramento FROM livros where id_video='".$id_video."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head></head><body>
	

<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$nome_video=$linhaBusca['nome_video'];
	$autor=$linhaBusca['autor'];
	$tempData=$linhaBusca['data_de_cadastramento'];
	?>
	
	
	
	
	
	
	<?
	
	
	}

?>
<div   style="text-align:center;">
<h1>  Videos</h1>

<!--<h2><a href="testedeconexao.php">Verificar epubs alterados em Kobo</a></h2>-->
<h2> Cadastrar Video</h2>
<form method="post" action="CrudVideos.php?operacao=2"> 

Nome do Video:<input type="text" name="nome_video" value="<?  echo $nome_video;?>"> <br/>
autor: <input type="text" name="autor" value="<?  echo $autor;?>">
Data de publicação:<input type="date"  name="data_de_cadastramento" value="<?  echo $tempData;?> ">
<input type="submit" name="cadastrar"><br/>

</form>
</div>
<?echo "<a href=\"Videos.php\" onclick='location.replace(\"Videos.php\")'>voltar</a>"; ?></body>
</html>




