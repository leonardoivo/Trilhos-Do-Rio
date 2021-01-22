<?php
include("../../config.php");
$id_receita=" ";
$valorReceita = 0;
$id_financeiro = "";
$nome_receita = "";
$DataDeInclusao = "";
if(isset($_GET['id_receita'])){


	$id_receita=$_GET['id_receita'];

}



$QueryResultado = "select rc.id_receita,rc.Valor, tr.nome_receita, rc.id_tipoRec,rc.id_financeiro,rc.data_de_inclusao from receita rc inner join tipo_receita tr on rc.id_tipoRec= tr.id_tipoRec where rc.id_receita='".$id_receita."'";
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
	<tr><th>Tipo de receita</th><th>Valor arrecadado</th><th>id_financeiro</th><th>Data De Inclusão</th></tr>
<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	    
        $valorReceita = $_POST['Valor'];
        $id_financeiro = $_POST['id_financeiro'];
        $nome_receita =  $_POST['nome_receita'];
        $DataDeInclusao = $_POST['data_de_inclusao'];
       
	?>
	<tr><td><?  echo $nome_receita;?></td>
	<td><?  echo $valorReceita;?></td>
	<td><?  echo $id_financeiro;?></td>
	<td><?  echo $DataDeInclusao;?></td>
	</tr>
	
	<?
	
	
	}

?>
</table>	
<?echo "<a href=\"receita.php\" onclick='location.replace(\"receita.php\")'>voltar</a>"; ?></body>
</html>




