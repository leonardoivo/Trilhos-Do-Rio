<?php
include("config.php");
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){

$numeroRelatorio = 0;
$titulo="";
$relatorio="";
$autor="";
$id_usuario=0;
$tituloEditado="";
$relatorioEditado="";
function EditarRelatorio($titulo,$relatorio,$usuario,$id_conselho, $link){
    echo $id_conselho;
    
       $id_cargo = "";
        $id_usuario ="";
        
        $tipo_cargo="";
    
    
            $queryConsFiscal = "select cg.id_usuario,cg.tipo_cargo,cg.id_cargo, user.nome from cargos cg inner join usuarios user on cg.id_usuario=user.id_usuario where user.cpf=".$usuario;
            $queryVerConselheiro = mysqli_query($link,$queryConsFiscal) or  die("erro ou sem dados a exibir");
          
            while($linha=mysqli_fetch_assoc($queryVerConselheiro)){
            
            $id_cargo = $linha['id_cargo'];
            $id_usuario =$linha['id_usuario'];
          
            $tipo_cargo=$linha['tipo_cargo'];
            
            }
    
            $queryRegistroConselho = " update conselhofiscal SET Titulo='$titulo',Relatorio='$relatorio', id_cargo='$id_cargo ', id_usuario='$id_usuario' WHERE id_conselho=".$id_conselho;
            echo $queryRegistroConselho;
            $queryInserirRegistro = mysqli_query($link,$queryRegistroConselho)or die("Erro inadimissivel!!");
           
           header("Location:conselhofiscal.php");
    
        
        }
        if(isset($_POST['titulo'])&& isset($_POST['relatorio'])&& isset($_POST['id_conselho'])){
            $titulo = $_POST['titulo'];
            $relatorio = $_POST['relatorio'];
            $id_conselho = $_POST['id_conselho'];
           
        }
    
        EditarRelatorio($titulo,$relatorio,$usuario,$id_conselho, $link);
    }
   
        // if($relatorio!=$relatorioEditado || $titulo!=$tituloEditado){
    
        //     EditarRelatorio($tituloEditado,$relatorioEditado,$usuario,$id_conselho, $link);
    
    
        // }

?>