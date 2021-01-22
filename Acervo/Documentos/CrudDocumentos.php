<?php

include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
$operacao=$_GET['operacao'];
$numerodescricao = 0;
$nome_documento="";
$descricao="";
$autor="";
$DataDeCadastramento="";
$id_usuario=0;
$id_documento=0;
$nome_documento = "";
if(isset($usuario)){



switch($operacao){

    case '1':
    if(isset($_POST['nome_documento'])&& isset($_POST['descricao']) && isset($_POST['dataDeCadastramento']) ){
        $nome_documento = $_POST['nome_documento'];
        $descricao = $_POST['descricao'];
        $DataDeCadastramento = $_POST['dataDeCadastramento'];
       

    }
   
    
 
 CadastrarDocumento($nome_documento,$descricao,$DataDeCadastramento, $link);
    
    
    break;

    case '2':

    if(isset($_POST['nome_documento'])&& isset($_POST['descricao'])&& isset($_POST['id_documento'])&&isset($_POST['dataDeCadastramento'])){
        $nome_documento = $_POST['nome_documento'];
        $descricao = $_POST['descricao'];
        $id_documento = $_POST['id_documento'];
       $DataDeCadastramento = $_POST['dataDeCadastramento'];
    }


    EditarDocumento($nome_documento,$descricao,$DataDeCadastramento,$id_documento, $link);
    
    break;


    case '3':
    if(isset($_GET['id_documento'])){
        $id_documento=$_GET['id_documento'];
        }
    ApagarDocumento($id_documento,$link);

    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarDocumento($nome_documento,$descricao,$DataDeCadastramento,$id_documento, $link){
    echo $id_documento;
    
       $id_cargo = "";
        $id_usuario ="";
        
        $tipo_cargo="";
    
        $DataLivro =  date("m/d/Y", strtotime($DataDeCadastramento));     
            // $queryConsFiscal = "select cg.id_usuario,cg.tipo_cargo,cg.id_cargo, user.nome from cargos cg inner join usuarios user on cg.id_usuario=user.id_usuario where user.cpf=".$usuario;
            // $queryVerConselheiro = mysqli_query($link,$queryConsFiscal) or  die("erro ou sem dados a exibir");
          
            // while($linha=mysqli_fetch_assoc($queryVerConselheiro)){
            
            // $id_cargo = $linha['id_cargo'];
            // $id_usuario =$linha['id_usuario'];
          
            // $tipo_cargo=$linha['tipo_cargo'];
            
            // }
               
            $queryEditarDocumento = " update documentos SET nome_documento='$nome_documento',descricao='$descricao', dataDeCadastramento=str_to_date(\"$DataLivro\",  \"%d/%m/%Y\")  WHERE id_documento=".$id_documento;
            echo  $queryEditarDocumento;
            $queryLivroEditado = mysqli_query($link, $queryEditarDocumento)or die("Erro inadimissivel!!");
           
            header("Location:documentos.php");
    
    }



function CadastrarDocumento($nome_documento,$descricao,$DataDeCadastramento, $link){

    $DataLivro =  date("d/m/Y", strtotime($DataDeCadastramento));   
 //if(isset($nome_documento)&&isset($descricao)&&isset($id_cargo)&&isset($id_usuario)){
	$queryInserirLivro = "insert into documentos(nome_documento,descricao,dataDeCadastramento) values ('$nome_documento','$descricao',str_to_date(\"$DataLivro\",  \"%d/%m/%Y\"))";
 echo $queryInserirLivro ;
	$queryLivro = mysqli_query($link,$queryInserirLivro)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

	if($queryLivro == true){

		header("Location:documentos.php");
	}
	
	
//}
}




function ApagarDocumento($id_documento,$link){
    $queryApagardescricao="delete from documentos where id_documento=".$id_documento;
    echo $queryApagardescricao;
    $descricaoApagado= mysqli_query($link,$queryApagardescricao);
    
    header("Location:documentos.php");
    
    }
?>

