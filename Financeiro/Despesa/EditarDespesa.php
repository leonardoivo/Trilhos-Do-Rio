<?php
include("../../config.php");
$id_despesa=" ";
$valorDespesa = " ";
$id_financeiro = " ";
$id_tipoDesp = " ";
$DataDeInclusao = " ";


if(isset($_GET['id_despesa'])){


	$id_despesa=$_GET['id_despesa'];

}

$QueryResultado = "select rd.id_despesa,rd.Valor, td.nome_despesa, rd.id_tipoDesp,rd.id_financeiro,rd.data_de_inclusao from despesa rd inner join tipo_despesa td on rd.id_tipoDesp= td.id_tipoDesp where rd.id_despesa='".$id_despesa."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head>
<link href="./../Estilos/css/bootstrap.css" rel="stylesheet">
    <link href="./../Estilos/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="./../Estilos/css/bootstrap-min.css" rel="stylesheet">
    <!--Javascript -->
     <script src="./../Estilos/js/bootstrap.js"></script>
      <script src="./../Estilos/js/bootstrap-min.js"></script>





</head><body>
	

<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$valorDespesa = $linhaBusca['Valor'];
	$id_financeiro = $linhaBusca['id_financeiro'];
	$id_tipoDesp = $linhaBusca['id_tipoDesp'];
	$DataDeInclusao = $linhaBusca['data_de_inclusao'];
	
	}

?>
<div   style="text-align:center;">
<h1>  Editar Despesa</h1>



<form method="post" action="CrudDespesa.php?operacao=2"> 

Tipo de Despesa:<?    
$consulta="select  id_tipoDesp,nome_despesa from tipo_despesa ";
$resultado=mysqli_query($link,$consulta);
echo "<select name=\"id_tipoDesp\" >";
while($linha=mysqli_fetch_assoc($resultado))
{
	$nome_despesa=$linha['nome_despesa'];
	$id_tipoDesp =  $linha['id_tipoDesp'];
echo   "<option value='$id_tipoDesp' selected>".$nome_despesa."</option><br/>";


}
echo "</select>";
?> <br/>
<input type="hidden" name="id_despesa" value="<? echo $id_despesa; ?>"/>
Valor a ser descontado: <input type="text" name="Valor" value="<?  echo $valorDespesa;?>">
Data de inserção:<input type="date"  name="dataDeInclusao" value="<?  echo $DataDeInclusao;?> ">
<input type="submit" name="cadastdar"><br/>

</form>
</div>
<?echo "<a href=\"despesa.php\" onclick='location.replace(\"despesa.php\")'>voltar</a>"; ?></body>
</html>




