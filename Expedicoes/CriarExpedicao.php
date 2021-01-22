<?php
session_start();
include("../config.php");

echo"<!DOCTYPE html>";
echo"<html>";
echo"<head>";
echo"<link href=\"../../TDR/Estilos/css/bootstrap.css\" rel=\"stylesheet\">"; 
echo "<link href=\" ../../TDR/Estilos/css/bootstrap-responsive.css\" rel=\"stylesheet\">" ;  
echo  "<link href=\" ../../TDR/Estilos/css/bootstrap-min.css\" rel=\"stylesheet\">" ;
echo "<!--Javascript -->";
echo  "<script src=\"../../TDR/Estilos/js/bootstrap.js\"</script>" ; 

echo   "<script src=\"../../TDR/Estilos/js/bootstrap-min.js\" ></script>" ;
echo "</head>";
echo "<body>";
$usuario=$_SESSION["usuario"];

if(isset($usuario)){
?>
	<form name="registrar" method="post" action="CrudExpedicao.php?operacao=1" >

	
	Nome da Expedicão <input type="text" name="nome_expedicao"><br/>
	Data Da Expedicão 	<input type="date" name="data_expedicao"><br/>
	Numero de Participantes <input type="number" name="num_participantes"><br/>
	Descricao 	<textarea name="desc_expedicao" rows="4" cols="50"></textarea>
	Relatorio de Expedição	<textarea name="relat_exped" rows="4" cols="50"></textarea>
	Local da Expedição 	<textarea name="localExpedicao" rows="4" cols="50"></textarea>
	Nome dos particpantes	<textarea name="participantes" rows="4" cols="50"></textarea>

	
	<input type="submit" text="enviar">
	</form>
	
	<a href="../Expedicoes/Expedicoes.php" onclick='location.replace("Expedicoes.php")'>voltar</a>

	
<?	


}
	else{
		
		header("Location:../login.html");
		
		}

?>
</body>
</html>
