<?php

include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
$operacao=$_GET['operacao'];

$valorReceita="";
$id_financeiro="";
$DataDeInclusao="";
$id_receita=0;
$id_tipoRec =0;
if(isset($usuario)){



switch($operacao){

    case '1':
    if(isset($_POST['Valor'])&& isset($_POST['id_tipoRec'])&& isset($_POST['dataDeInclusao']) ){
      $valorReceita = $_POST['Valor'];
       
        $id_tipoRec =  $_POST['id_tipoRec'];
        $DataDeInclusao = $_POST['dataDeInclusao'];
       

    }
   
 //   echo $valorReceita;
 
 CadastrarReceita($valorReceita,$id_tipoRec,$DataDeInclusao, $link);
    
    
    break;

    case '2':

    if(isset($_POST['id_receita'])&&isset($_POST['Valor'])&&isset($_POST['id_tipoRec']) && isset($_POST['dataDeInclusao']) ){
       $valorReceita = $_POST['Valor'];
       $id_receita = $_POST['id_receita'];
        $id_tipoRec =  $_POST['id_tipoRec'];
        $DataDeInclusao = $_POST['dataDeInclusao'];
    }


    EditarReceita($id_receita,$valorReceita,$id_tipoRec,$DataDeInclusao, $link);
    
    break;


    case '3':
    if(isset($_GET['id_receita'])){
        $id_receita=$_GET['id_receita'];
        }
    ApagarReceita($id_receita,$link);

    break;

    case '4':

    if(isset($_POST['id_receita'])&& isset($_POST['Valor'])&& isset($_POST['id_tipoRec'])&& isset($_POST['id_financeiro']) && isset($_POST['dataDeInclusao']) ){
       $valorReceita = $_POST['Valor'];
        $id_financeiro = $_POST['id_financeiro'];
        $id_tipoRec =  $_POST['id_tipoRec'];
        $DataDeInclusao = $_POST['dataDeInclusao'];
        $id_receita = $_POST['id_receita'];

    }


    EditarReceitaComBalanco($id_receita,$valorReceita,$id_tipoRec,$id_financeiro,$DataDeInclusao, $link);
    
    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarReceita($id_receita,$valorReceita,$id_tipoRec,$DataDeInclusao, $link){
    echo $id_receita;
    
      
        $dtInclusao =  date("m/d/Y", strtotime($DataDeInclusao));     
         
               
            $queryEditarReceita = " update receita SET Valor='$valorReceita',id_tipoRec='$id_tipoRec', data_de_inclusao=str_to_date(\"$dtInclusao\",  \"%d/%m/%Y\")  WHERE id_receita=".$id_receita;
            echo  $queryEditarReceita;
            $queryReceitaEditado = mysqli_query($link, $queryEditarReceita)or die("Erro inadimissivel!!");
           
            header("Location:receita.php");
    
    }
    function EditarReceitaComBalanco($valorReceita,$id_tipoRec,$id_financeiro,$DataDeInclusao, $link){
        echo $id_receita;
        
          
            $dtInclusao =  date("m/d/Y", strtotime($DataDeInclusao));     
             
                   
                $queryEditarReceita = " update receita SET Valor='$valorReceita',id_financeiro='$id_financeiro',id_tipoRec='$id_tipoRec', data_de_inclusao=str_to_date(\"$dtInclusao\",  \"%d/%m/%Y\")  WHERE id_receita=".$id_receita;
                echo  $queryEditarReceita;
                $queryReceitaEditado = mysqli_query($link, $queryEditarReceita)or die("Erro inadimissivel!!");
               
                header("Location:receita.php");
        
        }


function CadastrarReceita($valorReceita,$id_tipoRec,$DataDeInclusao, $link){

    $dtInclusao =  date("d/m/Y", strtotime($DataDeInclusao));   
	$queryInserirReceita = "insert into receita (Valor,id_tipoRec,data_de_inclusao) values ('$valorReceita','$id_tipoRec',str_to_date(\"$dtInclusao\",  \"%d/%m/%Y\"))";
    echo $queryInserirReceita ;
	$queryReceita = mysqli_query($link,$queryInserirReceita)or die("Erro inadimissivel!!");
	if($queryReceita == true){

		header("Location:receita.php");
	}
	
	
//}
}




function ApagarReceita($id_receita,$link){
    $queryApagaReceita="delete from receita where id_receita=".$id_receita;
    echo $queryApagaReceita;
    $ReceitaApagada= mysqli_query($link,$queryApagaReceita);
 
   header("Location:receita.php");
    
    }
?>

