<?php
include("../../config.php");
$id_receita=" ";
$valorReceita = " ";
$id_financeiro = " ";
$id_tipoRec = " ";
$DataDeInclusao = " ";


if(isset($_GET['id_receita'])){


	$id_receita=$_GET['id_receita'];

}

$QueryResultado = "select rc.id_receita,rc.Valor, tr.nome_receita, rc.id_tipoRec,rc.id_financeiro,rc.data_de_inclusao from receita rc inner join tipo_receita tr on rc.id_tipoRec= tr.id_tipoRec where rc.id_receita='".$id_receita."'";
$query=mysqli_query($link,$QueryResultado);
?>
<html><head></head><body>
	

<?

while($linhaBusca=mysqli_fetch_assoc($query))
{
	
	$valorReceita = $linhaBusca['Valor'];
	$id_financeiro = $linhaBusca['id_financeiro'];
	$id_tipoRec = $linhaBusca['id_tipoRec'];
	$DataDeInclusao = $linhaBusca['data_de_inclusao'];
	
	}

?>
<div   style="text-align:center;">
<h1>  Editar Receita</h1>



<form method="post" action="CrudReceita.php?operacao=2"> 

Tipo de Receita:<?    
$consulta="select  id_tipoRec,nome_receita from tipo_receita";
$resultado=mysqli_query($link,$consulta);
echo "<select name=\"id_tipoRec\">";
while($linha=mysqli_fetch_assoc($resultado))
{
	$nome_receita=$linha['nome_receita'];
	$id_tipoRec =  $linha['id_tipoRec'];
echo   "<option value='$id_tipoRec' selected>".$nome_receita."</option><br/>";


}
$Novadata= date("m/d/Y",strtotime($DataDeInclusao) );
echo "</select>";
?> <br/>
<input type="hidden" name="id_receita" value="<? echo $id_receita; ?>"/>
Valor Arrecadado: <input type="text" name="Valor" value="<?  echo $valorReceita;?>">
Data de inserção:<input type="date"  name="dataDeInclusao" value="<?  echo date("m/d/Y",strtotime($DataDeInclusao) );?> ">
<input type="submit" name="cadastrar"><br/>

</form>
</div>
<?echo "<a href=\"receita.php\" onclick='location.replace(\"receita.php\")'>voltar</a>"; ?></body>
</html>




