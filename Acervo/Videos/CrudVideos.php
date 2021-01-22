<?php

include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
$operacao=$_GET['operacao'];
$numeroautor = 0;
$nome_video="";
$autor="";
$autor="";
$DataDeCadastramento="";
$id_usuario=0;
$id_video=0;
$nome_video = "";
if(isset($usuario)){



switch($operacao){

    case '1':
    if(isset($_POST['nome_video'])&& isset($_POST['autor']) && isset($_POST['data_de_cadastramento']) ){
        $nome_video = $_POST['nome_video'];
        $autor = $_POST['autor'];
        $DataDeCadastramento = $_POST['data_de_cadastramento'];
       

    }
   
    
 
 CadastrarVideo($nome_video,$autor,$DataDeCadastramento, $link);
    
    
    break;

    case '2':

    if(isset($_POST['nome_video'])&& isset($_POST['autor'])&& isset($_POST['id_video'])&&isset($_POST['data_de_cadastramento'])){
        $nome_video = $_POST['nome_video'];
        $autor = $_POST['autor'];
        $id_video = $_POST['id_video'];
       $DataDeCadastramento = $_POST['data_de_cadastramento'];
    }


    EditarVideo($nome_video,$autor,$DataDeCadastramento,$id_video, $link);
    
    break;


    case '3':
    if(isset($_GET['id_video'])){
        $id_video=$_GET['id_video'];
        }
    ApagarVideo($id_video,$link);

    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarVideo($nome_video,$autor,$DataDeCadastramento,$id_video, $link){
    echo $id_video;
    
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
               
            $queryEditarVideo = " update videos SET nome_do_livro='$nome_video',autor='$autor', data_de_cadastramento=str_to_date(\"$DataLivro\",  \"%d/%m/%Y\")  WHERE id_video=".$id_video;
            echo  $queryEditarVideo;
            $queryLivroEditado = mysqli_query($link, $queryEditarVideo)or die("Erro inadimissivel!!");
           
            header("Location:videos.php");
    
    }



function CadastrarVideo($nome_video,$autor,$DataDeCadastramento, $link){

    $DataLivro =  date("d/m/Y", strtotime($DataDeCadastramento));   
 //if(isset($nome_video)&&isset($autor)&&isset($id_cargo)&&isset($id_usuario)){
	$queryInserirLivro = "insert into videos(nome_do_livro,autor,data_de_cadastramento) values ('$nome_video','$autor',str_to_date(\"$DataLivro\",  \"%d/%m/%Y\"))";
 echo $queryInserirLivro ;
	$queryLivro = mysqli_query($link,$queryInserirLivro)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

	if($queryLivro == true){

		header("Location:videos.php");
	}
	
	
//}
}




function ApagarVideo($id_video,$link){
    $queryApagarautor="delete from videos where id_video=".$id_video;
    echo $queryApagarautor;
    $autorApagado= mysqli_query($link,$queryApagarautor);
    
    header("Location:videos.php");
    
    }
?>

