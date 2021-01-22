


<!DOCTYPE html>

<html>
<head>

<link href=".././Estilos/css/bootstrap.css" rel="stylesheet">
    <link href=".././Estilos/css/bootstrap-responsive.css" rel="stylesheet">
    <link href=".././Estilos/css/bootstrap-min.css" rel="stylesheet">
    <!--Javascript -->
     <script src=".././Estilos/js/bootstrap.js"></script>
      <script src=".././Estilos/js/bootstrap-min.js"></script>
      <script src=".././js/ckeditor/ckeditor.js"></script>

</head>
<body>



<?php
include("../config.php");
session_start();
$usuario=$_SESSION["usuario"];

if(isset($usuario)){
?>
<form name="registrar" method="post" action="GravarAta.php?acao=Gravar" >
Nome da reuniao: <input type="" name="nome_reuniao"><br/>
Descricao da Reuniao: <input type="text" name="desc_reuniao"><br/>
local da reuniao: <input type="text" name="local"><br/>
Data: <input type="date" name="data_reuniao_ata"><br/>
Relatorio de Ata: <textarea name="relatorio_reuniao" rows="4" cols="50"></textarea>
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'relatorio_reuniao' );
            </script>
<input type="submit" text="enviar">
</form>

<a href="reunioesatas.php" onclick='location.replace("reunioesatas.php")'>voltar</a>


<?	


}
	else{
		
		header("Location:login.html");
		
		}

?>
</body>
</html>