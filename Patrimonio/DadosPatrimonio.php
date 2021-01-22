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
<link href="../../Estilos/css/bootstrap.css" rel="stylesheet">
    <link href="../../Estilos/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../../Estilos/css/bootstrap-min.css" rel="stylesheet">
    <!--Javascript -->
     <script src="../../Estilos/js/bootstrap.js"></script>
      <script src="../../Estilos/js/bootstrap-min.js"></script>



</head><body>
	
<table border=1>
	<tr><th>Nome do Patrimonio</th><th>marca</th><th>Data Do Email</th></tr>
<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$nome_do_bem=$linhaBusca['nome_do_bem'];
	$marca=$linhaBusca['marca'];
	$tempData=$linhaBusca['data_de_integracao'];
	?>
	<tr><td><?  echo $nome_do_bem;?></td>
	<td><?  echo $marca;?></td>
	<td><?  echo $tempData;?></td>
	
	</tr>
	
	<?
	
	
	}

?>
</table>	
<?echo "<a href=\"patrimonio.php\" onclick='location.replace(\"patrimonio.php\")'>voltar</a>"; ?></body>
</html>




