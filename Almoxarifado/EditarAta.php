<?php
include("config.php");
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
$id_conselho = $_GET['id_conselho'];
$numeroRelatorio = 0;
$titulo="";
$relatorio="";
$autor="";
$id_usuario=0;
$tituloEditado="";
$relatorioEditado="";



if(isset($id_conselho)){
$query ="select cs.id_conselho numeroRelatorio, cs.titulo titulo, cs.relatorio relatorio, user.nome nome , user.sobrenome sobrenome, user.id_usuario  from conselhofiscal cs inner join usuarios user on cs.id_usuario=user.id_usuario where id_conselho=".$id_conselho;
$queryRelatorio = mysqli_query($link,$query);

while($linha=mysqli_fetch_assoc($queryRelatorio)){

    $numeroRelatorio = $linha['numeroRelatorio'];
    $titulo=$linha['titulo'];
    $relatorio=$linha['relatorio'];
    $autor=$linha['nome'].$linha['sobrenome'];  
    $id_usuario = $linha['id_usuario'];
    

}
}
?>

<!DOCTYPE html>
<html>
<head></head>
<body>
<h1>Relatório</h1>



<form action="EfetivarEdicaoRelatorio.php" method="post">
Titulo:<input type="text" name="titulo" value="<? echo $titulo;?>"><br/>
<input type="hidden" name="id_conselho" value="<? echo $id_conselho; ?>"/>
Relatorio:<textarea name="relatorio" rows="4" cols="50"> <? echo $relatorio; ?></textarea>
<input type="submit" text="enviar">
</form>


<?echo "<a href=\"conselhofiscal.php\" onclick='location.replace(\"conselhofiscal.php\")'>voltar</a>"; ?>
<?
 



    
}
else{
		
    header("Location:login.html");
    
    }
?>

</body>
</html>