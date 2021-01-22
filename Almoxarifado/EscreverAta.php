<!DOCTYPE html>

<html>
<head></head>
<body>



<?php
include("config.php");
session_start();
$usuario=$_SESSION["usuario"];

if(isset($usuario)){
?>
	<form name="registrar" method="post" action="EscreverParecerFiscal.php" >
	Parecer: <input type="text" name="Parecer"><br/>
	Relatório: <textarea name="relatorio" rows="4" cols="50"></textarea>
	<input type="submit" text="enviar">
	</form>
	
	<a href="conselhofiscal.php" onclick='location.replace("conselhofiscal.php")'>voltar</a>

	
<?	


}
	else{
		
		header("Location:login.html");
		
		}

?>
</body>
</html>