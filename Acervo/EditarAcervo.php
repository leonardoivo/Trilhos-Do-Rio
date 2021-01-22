<?php
include("../config.php");
$id_acervo=" ";
if(isset($_GET['id_acervo'])){


	$id_acervo=$_GET['id_acervo'];

}

$nome_acervo="";
	$Descricao="";
	$DataDeCriacao="";

$QueryResultado = "select id_acervo, nome_acervo, Descricao, DataDeCriacao FROM acervo where id_acervo='".$id_acervo."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head></head><body>
	

<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$nome_acervo=$linhaBusca['nome_acervo'];
	$Descricao=$linhaBusca['Descricao'];
	$DataDeCriacao=$linhaBusca['DataDeCriacao'];
	?>
	
	
	
	
	
	
	<?
	
	
	}

?>
<div   style="text-align:center;">
<h1>  acervo</h1>

<!--<h2><a href="testedeconexao.php">Verificar epubs alterados em Kobo</a></h2>-->
<h2> Editar Acervo</h2>
<form method="post" action="CrudAcervo.php?operacao=2"> 

Nome do Acervo:<input type="text" name="nome_acervo" value="<?  echo $nome_acervo;?>"> <br/>
Descrição: <input type="text" name="Descricao" value="<?  echo $Descricao;?>">
Data de Criação:<input type="date"  name="DataDeCriacao" value="<?  echo $DataDeCriacao;?> ">
<input type="submit" name="cadastrar"><br/>

</form>
</div>
<?echo "<a href=\"acervo.php\" onclick='location.replace(\"acervo.php\")'>voltar</a>"; ?></body>
</html>




