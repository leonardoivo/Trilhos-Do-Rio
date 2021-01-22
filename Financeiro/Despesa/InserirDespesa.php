<?php 
include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt-BR">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Cadastrar nome_despesa</title>
<link href="../../Estilos/css/bootstrap.css" rel="stylesheet">
    <link href="../../Estilos/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../../Estilos/css/bootstrap-min.css" rel="stylesheet">
    <!--Javascript -->
     <script src="../../Estilos/js/bootstrap.js"></script>
      <script src="../../Estilos/js/bootstrap-min.js"></script>



</head>
<body>
	<div   style="text-align:center;">
<h1>  Cadastrar Despesa</h1>



<form method="post" action="CrudDespesa.php?operacao=1"> 

Tipo de Despesa:
<?    
$consulta="select  id_tipoDesp,nome_despesa from tipo_despesa";
$resultado=mysqli_query($link,$consulta) or die("Não tem nada dentro");
echo "<select name=\"id_tipoDesp\" >";
while($linha=mysqli_fetch_assoc($resultado))
{
	$nome_despesa=$linha['nome_despesa'];
	$id_tipoDesp =  $linha['id_tipoDesp'];
echo   "<option value='$id_tipoDesp'>".$nome_despesa."</option><br/>";

//echo $a;
}
echo "</select >";
?> <br/>



Valor a ser descontado: <input type="text" name="Valor"><br/>

Data de inserção:<input type="date"  name="dataDeInclusao">


<input type="submit" name="cadastrar"><br/>

</form>
</div>

<?echo "<a href=\"despesa.php\" onclick='location.replace(\"despesa.php\")'>voltar</a>"; ?>
</body>
</html>
<?
}
else{
		
    header("Location:login.html");
    
    }




?>