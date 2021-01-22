<?php
include("../../config.php");
$id_patrimonio=" ";
if(isset($_GET['id_patrimonio'])){


	$id_patrimonio=$_GET['id_patrimonio'];

}



$QueryResultado = "select id_patrimonio, nome_do_bem, marca, data_de_integracao FROM patrimonio where id_patrimonio='".$id_patrimonio."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head>
<link href=".././Estilos/css/bootstrap.css" rel="stylesheet">
    <link href=".././Estilos/css/bootstrap-responsive.css" rel="stylesheet">
    <link href=".././Estilos/css/bootstrap-min.css" rel="stylesheet">
    <!--Javascript -->
     <script src=".././Estilos/js/bootstrap.js"></script>
      <script src=".././Estilos/js/bootstrap-min.js"></script>




</head><body>
	

<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$nome_do_bem=$linhaBusca['nome_do_bem'];
	$marca=$linhaBusca['marca'];
	$tempData=$linhaBusca['data_de_integracao'];
	?>
	
	
	
	
	
	
	<?
	
	
	}

?>
<div   style="text-align:center;">
<h1>  patrimonio</h1>

<!--<h2><a href="testedeconexao.php">Verificar epubs alterados em Kobo</a></h2>-->
<h2> Cadastrar Livro</h2>
<form method="post" action="CrudPatrimonio.php?operacao=2"> 

Nome do livro:<input type="text" name="nome_do_bem" value="<?  echo $nome_do_bem;?>"> <br/>
Editor: <input type="text" name="marca" value="<?  echo $marca;?>">
Data de publicação:<input type="date"  name="data_de_integracao" value="<?  echo $tempData;?> ">
<input type="submit" name="cadastrar"><br/>

</form>
</div>
<?echo "<a href=\"patrimonio.php\" onclick='location.replace(\"patrimonio.php\")'>voltar</a>"; ?></body>
</html>




