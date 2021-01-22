<?php
include("../config.php");
session_start();
$usuario=$_SESSION["usuario"];
$id_reuniao=$_GET['id_reuniao'];
if(isset($usuario)){
function ApagarAtaReuniao($id_reuniao,$link){
    $queryApagarRelatorio="delete from reuniao where id_reuniao=".$id_reuniao;
    echo $queryApagarRelatorio;
    $relatorioApagado= mysqli_query($link,$queryApagarRelatorio);
    
    header("Location:reunioesatas.php");
    
    }
    if(isset($_GET['id_reuniao'])){
    $id_conselho=$_GET['id_reuniao'];
    }
    ApagarAtaReuniao($id_conselho,$link);
}
else{
		
    header("Location:login.html");
    
    }
?>