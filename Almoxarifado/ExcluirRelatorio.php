<?php
include("config.php");
session_start();
$usuario=$_SESSION["usuario"];
$id_conselho=$_GET['id_conselho'];
if(isset($usuario)){
function ApagarRelatorio($id_conselho,$link){
    $queryApagarRelatorio="delete from conselhofiscal where id_conselho=".$id_conselho;
    echo $queryApagarRelatorio;
    $relatorioApagado= mysqli_query($link,$queryApagarRelatorio);
    
    header("Location:conselhofiscal.php");
    
    }
    if(isset($_GET['id_conselho'])){
    $id_conselho=$_GET['id_conselho'];
    }
    ApagarRelatorio($id_conselho,$link);
}
else{
		
    header("Location:login.html");
    
    }
?>