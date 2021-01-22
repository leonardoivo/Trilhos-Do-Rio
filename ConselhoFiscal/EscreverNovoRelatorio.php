<?php
include("../config.php");
session_start();
$usuario=$_SESSION["usuario"];

if(isset($usuario)){
	echo"<!DOCTYPE html>";
	echo"<html>";
	echo"<head>";
	echo"<link href=\"../../TDR/Estilos/css/bootstrap.css\" rel=\"stylesheet\">"; 
	echo "<link href=\" ../../TDR/Estilos/css/bootstrap-responsive.css\" rel=\"stylesheet\">" ;  
	echo  "<link href=\" ../../TDR/Estilos/css/bootstrap-min.css\" rel=\"stylesheet\">" ;
	echo "<!--Javascript -->";
	echo  "<script src=\"../../TDR/Estilos/js/bootstrap.js\"</script>" ; 
	
	echo   "<script src=\"../../TDR/Estilos/js/bootstrap-min.js\" ></script>" ;
	echo "<script src=\".././js/ckeditor/ckeditor.js\"></script>";
	echo "</head>";
	echo "<body>";
	
?>
	<form name="registrar" method="post" action="CrudConselho.php?operacao=1" >
	Parecer: <input type="text" name="Parecer" cols="70"><br/>
	<br/>
	Relatório: <textarea name="relatorio" rows="100" cols="80"></textarea>
	
	<input type="submit" text="enviar">
	<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'relatorio' );
            </script>
	</form>
	
	<a href="../ConselhoFiscal/conselhofiscal.php" onclick='location.replace("conselhofiscal.php")'>voltar</a>

	
<?	


}
	else{
		
		header("Location:login.html");
		
		}

?>
</body>
</html>
