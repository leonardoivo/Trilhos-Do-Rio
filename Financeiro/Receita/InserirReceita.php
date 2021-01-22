<?php 
include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt-BR">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Cadastrar Receita</title>
<link href=".././Estilos/css/bootstrap.css" rel="stylesheet">
    <link href=".././Estilos/css/bootstrap-responsive.css" rel="stylesheet">
    <link href=".././Estilos/css/bootstrap-min.css" rel="stylesheet">
    <!--Javascript -->
     <script src=".././Estilos/js/bootstrap.js"></script>
      <script src=".././Estilos/js/bootstrap-min.js"></script>



</head>
<body>
	<div   style="text-align:center;">
<h1>  Cadastrar Receita</h1>



<form name="registrar" method="post" action="CrudReceita.php?operacao=1"> 

Tipo de receita: <?    
$consulta="select  id_tipoRec,nome_receita from tipo_receita";
$resultado=mysqli_query($link,$consulta) or die("Não tem nada dentro");
echo "<select name=\"id_tipoRec\">";
while($linha=mysqli_fetch_assoc($resultado))
{
	$nome_receita=$linha['nome_receita'];
	$id_tipoRec =  $linha['id_tipoRec'];
echo   "<option value='$id_tipoRec'>".$nome_receita."</option>";

//echo $a;
}
echo "</select>";
?> <br/>



Valor arrecadado: <input type="text" name="Valor"><br/>

Data de inserção:<input type="date"  name="dataDeInclusao">


<input type="submit" name="cadastrar"><br/>

</form>
</div>

<?echo "<a href=\"receita.php\" onclick='location.replace(\"receita.php\")'>voltar</a>"; ?>
</body>
</html>
<?
}
else{
		
    header("Location:login.html");
    
    }




?>