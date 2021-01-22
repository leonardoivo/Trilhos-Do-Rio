<?php

include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
$operacao=$_GET['operacao'];
$numeroautor = 0;
$nome_audio="";
$autor="";
$autor="";
$data_de_gravacao	="";
$id_usuario=0;
$id_audio=0;
$nome_audio = "";
if(isset($usuario)){



switch($operacao){

    case '1':
    if(isset($_POST['nome_audio'])&& isset($_POST['autor']) && isset($_POST['data_de_gravacao']) ){
        $nome_audio = $_POST['nome_audio'];
        $autor = $_POST['autor'];
        $data_de_gravacao	 = $_POST['data_de_gravacao'];
       

    }
   
    
 
 CadastrarAudio($nome_audio,$autor,$data_de_gravacao, $link);
    
    
    break;

    case '2':

    if(isset($_POST['nome_audio'])&& isset($_POST['autor'])&& isset($_POST['id_audio'])&&isset($_POST['data_de_gravacao'])){
        $nome_audio = $_POST['nome_audio'];
        $autor = $_POST['autor'];
        $id_audio = $_POST['id_audio'];
       $data_de_gravacao	 = $_POST['data_de_gravacao'];
    }


    EditarAudio($nome_audio,$autor,$data_de_gravacao,$id_audio, $link);
    
    break;


    case '3':
    if(isset($_GET['id_audio'])){
        $id_audio=$_GET['id_audio'];
        }
    ApagarAudio($id_audio,$link);

    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarAudio($nome_audio,$autor,$data_de_gravacao,$id_audio, $link){
    echo $id_audio;
    
      
    
        $DataAudio =  date("m/d/Y", strtotime($data_de_gravacao	));     
               
            $queryEditarAudio = " update audios	 SET nome_audio	='$nome_audio',autor='$autor', data_de_gravacao=str_to_date(\"$DataAudio\",  \"%d/%m/%Y\")  WHERE id_audios=".$id_audio;
            echo  $queryEditarAudio;
            $queryLivroEditado = mysqli_query($link, $queryEditarAudio)or die("Erro inadimissivel!!");
           
            header("Location:audios.php");
    
    }



function CadastrarAudio($nome_audio,$autor,$data_de_gravacao	, $link){

    $DataAudio =  date("d/m/Y", strtotime($data_de_gravacao	));   
 //if(isset($nome_audio)&&isset($autor)&&isset($id_cargo)&&isset($id_usuario)){
	$queryInserirAudio = "insert into audios (nome_audio	,autor,data_de_gravacao) values ('$nome_audio','$autor',str_to_date(\"$DataAudio\",  \"%d/%m/%Y\"))";
 echo $queryInserirAudio ;
	$queryAudio = mysqli_query($link,$queryInserirAudio)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

	if($queryAudio == true){

		header("Location:audios.php");
	}
	
	
//}
}




function ApagarAudio($id_audio,$link){
    $queryApagarautor="delete from audios where id_audios=".$id_audio;
    echo $queryApagarautor;
    $autorApagado= mysqli_query($link,$queryApagarautor);
    
    header("Location:audios.php");
    
    }
?>

