<?php

include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
$operacao=$_GET['operacao'];
$numeroautor = 0;
$nome_objeto="";
$autor="";
$autor="";
$data_de_coleta="";
$id_usuario=0;
$id_objeto=0;
$nome_objeto = "";
if(isset($usuario)){



switch($operacao){

    case '1':
    if(isset($_POST['nome_objeto'])&& isset($_POST['autor']) && isset($_POST['data_de_coleta']) ){
        $nome_objeto = $_POST['nome_objeto'];
        $autor = $_POST['autor'];
        $data_de_coleta = $_POST['data_de_coleta'];
       

    }
   
    
 
        CadastarObjeto($nome_objeto,autor,data_de_coleta, $link);
    
    
    break;

    case '2':

    if(isset($_POST['nome_objeto'])&& isset($_POST['autor'])&& isset($_POST['id_objeto'])&&isset($_POST['data_de_coleta'])){
        $nome_objeto = $_POST['nome_objeto'];
        $autor = $_POST['autor'];
        $id_objeto = $_POST['id_objeto'];
       $data_de_coleta = $_POST['data_de_coleta'];
    }


    EditarObjeto($nome_objeto,$autor,$data_de_coleta,$id_objeto, $link);
    
    break;


    case '3':
    if(isset($_GET['id_objeto'])){
        $id_objeto=$_GET['id_objeto'];
        }
    ApagarObjeto($id_objeto,$link);

    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarObjeto($nome_objeto,$autor,$data_de_coleta,$id_objeto, $link){
    echo $id_objeto;
    
       $id_cargo = "";
        $id_usuario ="";
        
        $tipo_cargo="";
    
        $DataObjeto =  date("m/d/Y", strtotime($data_de_coleta));     
            
               
            $queryEditarObjeto = " update objeto SET nome_do_livro='$nome_objeto',autor='autor', data_de_coleta=str_to_date(\"$DataObjeto\",  \"%d/%m/%Y\")  WHERE id_objeto=".$id_objeto;
            echo  $queryEditarObjeto;
            $queryObjetoEditado = mysqli_query($link, $queryEditarObjeto)or die("Erro inadimissivel!!");
           
            header("Location:objeto.php");
    
    }



function CadastarObjeto($nome_objeto,$autor,$data_de_coleta, $link){

    $DataObjeto =  date("d/m/Y", strtotime(data_de_coleta));   
	$queryInserirObjeto = "insert into objeto(nome_do_livro,autor,data_de_coleta) values ('$nome_objeto','autor',str_to_date(\"$DataObjeto\",  \"%d/%m/%Y\"))";
    echo $queryInserirObjeto ;
	$queryObjeto = mysqli_query($link,$queryInserirObjeto)or die("Erro inadimissivel!!");
	
	if($queryObjeto == true){

		header("Location:objeto.php");
	}
	
	
//}
}




function ApagarObjeto($id_objeto,$link){
    $queryApagarautor="delete from objeto where id_objeto=".$id_objeto;
    echo $queryApagarautor;
    $autorApagado= mysqli_query($link,$queryApagarautor);
    
    header("Location:objeto.php");
    
    }
?>

