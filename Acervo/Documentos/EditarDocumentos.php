<?php
include("../../config.php");
$id_documento=" ";
if(isset($_GET['id_documento'])){


	$id_documento=$_GET['id_documento'];

}



$QueryResultado = "select id_documento, nome_documento, Descricao, dataDeCadastramento FROM documentos where id_documento='".$id_documento."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head></head><body>
	

<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$nome_documento=$linhaBusca['nome_documento'];
	$Descricao=$linhaBusca['Descricao'];
	$tempData=$linhaBusca['dataDeCadastramento'];
	?>
	
	
	
	
	
	
	<?
	
	
	}

?>
<div   style="text-align:center;">
<h1>  Documentos</h1>

<!--<h2><a href="testedeconexao.php">Verificar epubs alterados em Kobo</a></h2>-->
<h2> Editar Documento</h2>
<form method="post" action="CrudDocumentos.php?operacao=2"> 

Nome do documento:<input type="text" name="nome_documento" value="<?  echo $nome_documento;?>"> <br/>
Descricao: <input type="text" name="Descricao" value="<?  echo $Descricao;?>">
Data de cadastramento:<input type="date"  name="dataDeCadastramento" value="<?  echo $tempData;?> ">
<input type="submit" name="cadastrar"><br/>

</form>
</div>
<?echo "<a href=\"documentos.php\" onclick='location.replace(\"documentos.php\")'>voltar</a>"; ?></body>
</html>




