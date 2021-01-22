<?php

include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
$operacao=$_GET['operacao'];
$numeroautor = 0;
$nome_imagem="";
$autor="";
$autor="";
$DataDeCadastramento="";
$id_usuario=0;
$id_imagem=0;
$nome_imagem = "";
if(isset($usuario)){



switch($operacao){

    case '1':
    if(isset($_POST['nome_imagem'])&& isset($_POST['autor']) && isset($_POST['data_de_inclusao']) ){
        $nome_imagem = $_POST['nome_imagem'];
        $autor = $_POST['autor'];
        $DataDeCadastramento = $_POST['data_de_inclusao'];
       

    }
   
    
 
 CadastrarImagem($nome_imagem,$autor,$DataDeCadastramento, $link);
    
    
    break;

    case '2':

    if(isset($_POST['nome_imagem'])&& isset($_POST['autor'])&& isset($_POST['id_imagem'])&&isset($_POST['data_de_inclusao'])){
        $nome_imagem = $_POST['nome_imagem'];
        $autor = $_POST['autor'];
        $id_imagem = $_POST['id_imagem'];
       $DataDeCadastramento = $_POST['data_de_inclusao'];
    }


    EditarImagem($nome_imagem,$autor,$DataDeCadastramento,$id_imagem, $link);
    
    break;


    case '3':
    if(isset($_GET['id_imagem'])){
        $id_imagem=$_GET['id_imagem'];
        }
    ApagarImagem($id_imagem,$link);

    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarImagem($nome_imagem,$autor,$DataDeCadastramento,$id_imagem, $link){
    echo $id_imagem;
    
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
               
            $queryEditarImagem = " update imagens SET nome_imagem='$nome_imagem',autor='$autor', data_de_inclusao=str_to_date(\"$DataLivro\",  \"%d/%m/%Y\")  WHERE id_imagems=".$id_imagem;
            echo  $queryEditarImagem;
            $queryLivroEditado = mysqli_query($link, $queryEditarImagem)or die("Erro inadimissivel!!");
           
            header("Location:Imagens.php");
    
    }



function CadastrarImagem($nome_imagem,$autor,$DataDeCadastramento, $link){

    $DataLivro =  date("d/m/Y", strtotime($DataDeCadastramento));   
 //if(isset($nome_imagem)&&isset($autor)&&isset($id_cargo)&&isset($id_usuario)){
	$queryInserirLivro = "insert into imagens(nome_imagem,autor,data_de_inclusao) values ('$nome_imagem','$autor',str_to_date(\"$DataLivro\",  \"%d/%m/%Y\"))";
 echo $queryInserirLivro ;
	$queryLivro = mysqli_query($link,$queryInserirLivro)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

	if($queryLivro == true){

		header("Location:Imagens.php");
	}
	
	
//}
}




function ApagarImagem($id_imagem,$link){
    $queryApagarautor="delete from imagens where id_imagem=".$id_imagem;
    echo $queryApagarautor;
    $autorApagado= mysqli_query($link,$queryApagarautor);
    
    header("Location:imagens.php");
    
    }
?>

