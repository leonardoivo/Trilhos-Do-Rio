<?php
include("../../config.php");
$id_despesa=" ";
if(isset($_GET['id_despesa'])){


	$id_despesa=$_GET['id_despesa'];

}



$QueryResultado = "select rd.id_despesa,rd.Valor, td.nome_despesa, rd.id_tipoDesp,rd.id_financeiro,rd.data_de_inclusao from despesa rd inner join tipo_despesa td on rd.id_tipoDesp= td.id_tipoDesp where rd.id_despesa='".$id_despesa."'";
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
	<tr><th>Tipo de despesa</th><th>Valor descontado</th><th>id_financeiro</th><th>Data De Inclusão</th></tr>
<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	    
        $valorDespesa = $_POST['Valor'];
        $id_financeiro = $_POST['id_financeiro'];
        $nome_despesa =  $_POST['nome_despesa'];
        $DataDeInclusao = $_POST['data_de_inclusao'];
       
	?>
	<tr><td><?  echo $nome_despesa;?></td>
	<td><?  echo $valorDespesa;?></td>
	<td><?  echo $id_financeiro;?></td>
	<td><?  echo $DataDeInclusao;?></td>
	</tr>
	
	<?
	
	
	}

?>
</table>	
<?echo "<a href=\"despesa.php\" onclick='location.replace(\"despesa.php\")'>voltar</a>"; ?></body>
</html>




