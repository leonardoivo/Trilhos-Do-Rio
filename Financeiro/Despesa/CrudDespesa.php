<?php

include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
$operacao=$_GET['operacao'];

$valorDespesa="";
$id_financeiro="";
$DataDeInclusao="";
$id_despesa=0;
$id_tipoDesp=0;
if(isset($usuario)){



switch($operacao){

    case '1':
    if(isset($_POST['Valor'])&& isset($_POST['id_tipoDesp']) && isset($_POST['dataDeInclusao']) ){
       $valorDespesa = $_POST['Valor'];
        $id_tipoDesp =  $_POST['id_tipoDesp'];
        $DataDeInclusao = $_POST['dataDeInclusao'];
       

    }
   
    
 
 CadastrarDespesa($valorDespesa,$id_tipoDesp,$DataDeInclusao, $link);
    
    
    break;

    case '2':

    if(isset($_POST['id_despesa']) && isset($_POST['Valor'])&& isset($_POST['id_tipoDesp']) && isset($_POST['dataDeInclusao']) ){
        $valorDespesa = $_POST['Valor'];
         $id_tipoDesp =  $_POST['id_tipoDesp'];
        $DataDeInclusao = $_POST['dataDeInclusao'];
        $id_despesa = $_POST['id_despesa'];
    }


    EditarDespesa($id_despesa,$valorDespesa,$id_tipoDesp,$DataDeInclusao, $link);
    
    break;


    case '3':
    if(isset($_GET['id_despesa'])){
        $id_despesa=$_GET['id_despesa'];
        }
      
    ApagarDespesa($id_despesa,$link);

    break;

    case '4':

    if(isset($_POST['id_despesa'])&&  isset($_POST['Valor'])&& isset($_POST['id_tipoDesp'])&& isset($_POST['id_financeiro']) && isset($_POST['dataDeInclusao']) ){
        $valorReceita = $_POST['Valor'];
        $id_financeiro = $_POST['id_financeiro'];
        $id_tipoDesp =  $_POST['id_tipoDesp'];
        $DataDeInclusao = $_POST['dataDeInclusao'];
    }


    EditarDespesaComBalanco($valorDespesa,$id_tipoDesp,$id_financeiro,$DataDeInclusao, $link);
    
    break;



}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarDespesa($id_despesa,$valorDespesa,$id_tipoDesp,$DataDeInclusao, $link){
    echo $id_despesa;
    
      
        $dtInclusao =  date("m/d/Y", strtotime($DataDeInclusao));     
         
               
            $queryEditarDespesa = " update despesa SET Valor='$valorDespesa',id_tipoDesp='$id_tipoDesp', data_de_inclusao=str_to_date(\"$dtInclusao\",  \"%d/%m/%Y\")  WHERE id_despesa=".$id_despesa;
            echo  $queryEditarDespesa;
            $queryDespesaEditado = mysqli_query($link, $queryEditarDespesa)or die("Erro inadimissivel!!");
           
            header("Location:despesa.php");
    
    }
    function EditarDespesaComBalanco($id_despesa,$valorDespesa,$id_tipoDesp,$id_financeiro,$DataDeInclusao, $link){
        echo $id_despesa;
        
          
            $dtInclusao =  date("m/d/Y", strtotime($DataDeInclusao));     
             
                   
                $queryEditarDespesa = " update despesa SET Valor='$valorDespesa',id_financeiro='$id_financeiro',id_tipoDesp='$id_tipoDesp', data_de_inclusao=str_to_date(\"$dtInclusao\",  \"%d/%m/%Y\")  WHERE id_despesa=".$id_despesa;
                echo  $queryEditarDespesa;
                $queryDespesaEditado = mysqli_query($link, $queryEditarDespesa)or die("Erro inadimissivel!!");
               
                header("Location:despesa.php");
        
        }


function CadastrarDespesa($valorDespesa,$id_tipoDesp,$DataDeInclusao, $link){

    $dtInclusao =  date("d/m/Y", strtotime($DataDeInclusao));   
	$queryInserirDespesa = "insert into despesa (valor,Id_tipoDesp,data_de_inclusao) values ('$valorDespesa','$id_tipoDesp',str_to_date(\"$dtInclusao\",  \"%d/%m/%Y\"))";
    echo $queryInserirDespesa ;
	$queryDespesa = mysqli_query($link,$queryInserirDespesa)or die("Erro inadimissivel!!");
	if($queryDespesa == true){

		header("Location:despesa.php");
	}
	
	
//}
}




function ApagarDespesa($id_despesa,$link){
    $queryApagaDespesa="delete from despesa where id_despesa=".$id_despesa;
    echo $queryApagaDespesa;
    $DespesaApagada= mysqli_query($link,$queryApagaDespesa);
 
   header("Location:despesa.php");
    
    }
?>

