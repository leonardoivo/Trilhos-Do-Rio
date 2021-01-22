<?php
include("../config.php");
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
$id_reuniao=0;
$nome_reuniao="";
$desc_reuniao="";
$relat_ata_reuniao="";
$local="";
$data_reuniao="";

function EditarAtaReuniao($id_reuniao,$usuario,$id_usuario,$nome_reuniao,$desc_reuniao,$relatorio_reuniao,$local,$data_reuniao,$id_cargo, $link){
   
    
       $id_cargo = "";
        $id_usuario ="";
        
        $tipo_cargo="";
    
    
            $queryReuniaoAtaSec = "select cg.id_usuario,cg.tipo_cargo,cg.id_cargo, user.nome from cargos cg inner join usuarios user on cg.id_usuario=user.id_usuario where user.cpf=".$usuario;
            $queryVerSecretario = mysqli_query($link,$queryReuniaoAtaSec) or  die("erro ou sem dados a exibir");
          
            while($linha=mysqli_fetch_assoc($queryVerSecretario)){
            
            $id_cargo = $linha['id_cargo'];
            $id_usuario =$linha['id_usuario'];
          
            $tipo_cargo=$linha['tipo_cargo'];
            
            }
           
            $queryEdicaoAtaReuniao = " update reuniao SET nome_reuniao='$nome_reuniao',desc_reuniao='$desc_reuniao',relat_ata_reuniao='$relatorio_reuniao',local='$local',data_reuniao='$data_reuniao', id_cargo='$id_cargo ', id_usuarios='$id_usuario' WHERE id_reuniao=".$id_reuniao;
            echo $queryEdicaoAtaReuniao;
            echo "id da reuniao: ".$id_reuniao;
            $queryInserirRegistro = mysqli_query($link,$queryEdicaoAtaReuniao)or die("Erro inadimissivel!!");
           
           header("Location:reunioesatas.php");
    
        
        }
        if(isset($_POST['id_reuniao'],$_POST['nome_reuniao'])&& isset($_POST['desc_reuniao'])&& isset($_POST['relatorio_reuniao'])){
            $id_reuniao=$_POST['id_reuniao'];
            $nome_reuniao = $_POST['nome_reuniao'];
            $desc_reuniao = $_POST['desc_reuniao'];
            $relatorio_reuniao = $_POST['relatorio_reuniao'];
            $local = $_POST['local'];
            $data_reuniao = $_POST['data_reuniao_ata'];
           
        }
    
        EditarAtaReuniao($id_reuniao,$usuario,$id_usuario,$nome_reuniao,$desc_reuniao,$relatorio_reuniao,$local,$data_reuniao,$id_cargo, $link);
    }
   
       

?>