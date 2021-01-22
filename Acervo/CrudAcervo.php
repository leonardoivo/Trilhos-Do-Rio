<?php

include("../config.php");
include("../VerAcesso.php");
session_start();
$usuario=$_SESSION["usuario"];
$operacao=$_GET['operacao'];
$numeroDescricao = 0;
$nome_acervo="";
$Descricao="";
$autor="";
$DataDeCriacao="";
$id_usuario=0;
$id_acervo=0;
$nome_acervo = ""; 
$acao=0;
$preenchido=isset($_POST['nome_acervo']) && isset($_POST['Descricao']) && isset($_POST['DataDeCriacao'])?true:false;
$EditComIdPrenchido = isset($_POST['id_acervo'])&& (isset($_POST['Descricao'])|| isset($_POST['nome_acervo'])||isset($_POST['DataDeCriacao']))?true:false;
$id_valido = isset($_GET['id_acervo'])?true:false;
$Departamento="Acervos";
if(isset($usuario)){



switch($operacao){

    case '1':
    if($preenchido ){
        
        $nome_acervo = $_POST['nome_acervo'];
        $Descricao = $_POST['Descricao'];
        $DataDeCriacao = $_POST['DataDeCriacao'];
       

    }
    $acao=4;
    CadastrarAcervo($nome_acervo,$Descricao,$DataDeCriacao, $link);
    RegistrarAcesso($usuario,$Departamento,$acao,$link);
    
    break;

    case '2':

    if($EditComIdPrenchido){
        $nome_acervo = $_POST['nome_acervo'];
        $Descricao = $_POST['Descricao'];
        $id_acervo = $_POST['id_acervo'];
       $DataDeCriacao = $_POST['DataDeCriacao'];
    }

    $acao=2;
    EditarAcervo($nome_acervo,$Descricao,$DataDeCriacao,$id_acervo, $link);
    RegistrarAcesso($usuario,$Departamento,$acao,$link);
    break;


    case '3':
    if($id_valido){
        $id_acervo=$_GET['id_acervo'];
        }
    ApagarAcervo($id_acervo,$link);
    $acao=3;
    RegistrarAcesso($usuario,$Departamento,$acao,$link);
    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarAcervo($nome_acervo,$Descricao,$DataDeCriacao,$id_acervo, $link){
    echo $id_acervo;
    
       $id_cargo = "";
        $id_usuario ="";
        
        $tipo_cargo="";
    
        $DataAcervo =  date("m/d/Y", strtotime($DataDeCriacao));     
            // $queryConsFiscal = "select cg.id_usuario,cg.tipo_cargo,cg.id_cargo, user.nome from cargos cg inner join usuarios user on cg.id_usuario=user.id_usuario where user.cpf=".$usuario;
            // $queryVerConselheiro = mysqli_query($link,$queryConsFiscal) or  die("erro ou sem dados a exibir");
          
            // while($linha=mysqli_fetch_assoc($queryVerConselheiro)){
            
            // $id_cargo = $linha['id_cargo'];
            // $id_usuario =$linha['id_usuario'];
          
            // $tipo_cargo=$linha['tipo_cargo'];
            
            // }
               
            $queryEditarAcervo = " update acervo SET nome_acervo='$nome_acervo',Descricao='$Descricao', DataDeCriacao=str_to_date(\"$DataAcervo\",  \"%d/%m/%Y\")  WHERE id_acervo=".$id_acervo;
            echo  $queryEditarAcervo;
            $queryLivroEditado = mysqli_query($link, $queryEditarAcervo)or die("Erro inadimissivel!!");
           
            header("Location:acervo.php");
    
    }



function CadastrarAcervo($nome_acervo,$Descricao,$DataDeCriacao, $link){

    $DataAcervo =  date("d/m/Y", strtotime($DataDeCriacao));   
 //if(isset($nome_acervo)&&isset($Descricao)&&isset($id_cargo)&&isset($id_usuario)){
	$queryCriarAcervo = "insert into acervo(nome_acervo,Descricao,DataDeCriacao) values ('$nome_acervo','$Descricao',str_to_date(\"$DataAcervo\",  \"%d/%m/%Y\"))";
    echo $queryCriarAcervo ;
	$queryLivro = mysqli_query($link,$queryCriarAcervo)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

	if($queryLivro == true){

		header("Location:acervo.php");
	}
	
	
//}
}




function ApagarAcervo($id_acervo,$link){
    $queryApagarDescricao="delete from acervo where id_acervo=".$id_acervo;
    echo $queryApagarDescricao;
    $DescricaoApagado= mysqli_query($link,$queryApagarDescricao);
    
    header("Location:acervo.php");
    
    }
?>

