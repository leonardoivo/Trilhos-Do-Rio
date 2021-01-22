<?php

include("../config.php");
session_start();
$usuario=$_SESSION["usuario"];
$id_c= " ";
$operacao=$_GET['operacao'];
$numeroRelatorio = 0;
$titulo="";
$relatorio="";
$autor="";
$id_usuario=0;

if(isset($usuario)){



switch($operacao){

    case '1':
    if(isset($_POST['Parecer'])&&isset($_POST['relatorio'])){
        $parecer = $_POST['Parecer'];
        $relatorio = $_POST['relatorio'];
    
    }

    InserirRelatorio($parecer,$relatorio,$id_cargo,$id_usuario, $link);
    
    
    break;

    case '2':

    if(isset($_POST['titulo'])&& isset($_POST['relatorio'])&& isset($_POST['id_conselho'])){
        $titulo = $_POST['titulo'];
        $relatorio = $_POST['relatorio'];
        $id_conselho = $_POST['id_conselho'];
       
    }


    EditarRelatorio($titulo,$relatorio,$usuario,$id_conselho, $link);

    break;


    case '3':
    if(isset($_GET['id_conselho'])){
        $id_conselho=$_GET['id_conselho'];
        }
    ApagarRelatorio($id_conselho,$link);

    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


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



function InserirRelatorio($parecer,$relatorio,$id_cargo,$id_usuario, $link){

//if(isset($parecer)&&isset($relatorio)&&isset($id_cargo)&&isset($id_usuario)){

	$queryRegistroConselho = "insert into conselhofiscal(Titulo,Relatorio,id_cargo,id_usuario) values ('$parecer','$relatorio',$id_cargo,$id_usuario)";
 //echo $queryRegistroConselho;
	$queryInserirRegistro = mysqli_query($link,$queryRegistroConselho)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

	if($queryInserirRegistro == true){

		header("Location:conselhofiscal.php");
	}
	
	
//}
}




function ApagarRelatorio($id_conselho,$link){
    $queryApagarRelatorio="delete from conselhofiscal where id_conselho=".$id_conselho;
    echo $queryApagarRelatorio;
    $relatorioApagado= mysqli_query($link,$queryApagarRelatorio);
    
    header("Location:conselhofiscal.php");
    
    }
?>

