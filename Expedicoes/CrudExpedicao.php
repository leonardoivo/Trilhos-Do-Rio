<?php

include("../config.php");
session_start();
$usuario=$_SESSION["usuario"];
$id_expedicao= " ";
$operacao=$_GET['operacao'];
$numeroExpedicao = 0;
$titulo="";
$relatorio="";
$id_usuario=0;

if(isset($usuario)){


switch($operacao){

    case '1':
    if(isset($_POST['nome_expedicao'])&& isset($_POST['data_expedicao']) &&isset($_POST['desc_expedicao']) && isset($_POST['relat_exped'])&& isset($_POST['num_participantes'])&& isset($_POST['participantes'])  &&isset($_POST['localExpedicao']) ){
        $nome_expedicao = $_POST['nome_expedicao'];
        $data_expedicao = $_POST['data_expedicao'];
        $desc_expedicao = $_POST['desc_expedicao'];
        $relat_exped = $_POST['relat_exped'];
        $num_participantes = $_POST['num_participantes'];
        $participantes=$_POST['participantes'];
        $localExpedicao = $_POST['localExpedicao'];
    }


   CriarExpedicao($nome_expedicao,$data_expedicao,$desc_expedicao,$relat_exped,$usuario, $num_participantes,$participantes, $localExpedicao,$link);
    
    
    break;

    case '2':

    if(isset($_POST['id_exp']) && isset($_POST['nome_expedicao'])&& isset($_POST['data_expedicao']) &&isset($_POST['desc_expedicao']) && isset($_POST['relat_exped'])&& isset($_POST['num_participantes'])&& isset($_POST['participantes'])  &&isset($_POST['localExpedicao']) ){
        $id_expedicao=$_POST['id_exp'];
        $nome_expedicao = $_POST['nome_expedicao'];
        $data_expedicao = $_POST['data_expedicao'];
        $desc_expedicao = $_POST['desc_expedicao'];
        $relat_exped = $_POST['relat_exped'];
        $num_participantes = $_POST['num_participantes'];
        $participantes=$_POST['participantes'];
        $localExpedicao = $_POST['localExpedicao'];
    }

    EditarRelatorio($id_expedicao,$nome_expedicao,$data_expedicao,$desc_expedicao,$relat_exped,$usuario, $num_participantes,$participantes ,$localExpedicao,$link);

    break;


    case '3':
    if(isset($_GET['id_expedicao'])){
        $id_expedicao=$_GET['id_expedicao'];
        }
    ApagarRelatorio($id_expedicao,$link);

    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarRelatorio ($id_expedicao,$nome_expedicao,$data_expedicao,$desc_expedicao,$relat_exped,$usuario, $num_participantes,$participantes ,$localExpedicao,$link)          
{
    echo $id_expedicao;
    
       $id_cargo = "";
        $id_usuario ="";
        
        $tipo_cargo="";
        $DataExpedicao =  date("d/m/Y", strtotime($data_expedicao));

    
            $queryConsFiscal = "select cg.id_usuario,cg.tipo_cargo,cg.id_cargo, user.nome from cargos cg inner join usuarios user on cg.id_usuario=user.id_usuario where user.cpf=".$usuario;
            $queryVerConselheiro = mysqli_query($link,$queryConsFiscal) or  die("erro ou sem dados a exibir");
          
            while($linha=mysqli_fetch_assoc($queryVerConselheiro)){
            
            $id_cargo = $linha['id_cargo'];
            $id_usuario =$linha['id_usuario'];
          
            $tipo_cargo=$linha['tipo_cargo'];
            
            }
    
            $queryRegistroConselho = " update expedicoes SET nome_expedicao=$nome_expedicao',data_expedicao=str_to_date(\"$DataExpedicao\",  \"%d/%m/%Y\"),desc_expedicao='$desc_expedicao',relat_exped='$relat_exped', num_participantes=$num_participantes, localExpedicao='$localExpedicao' WHERE id_exp=".$id_expedicao;
            echo $queryRegistroConselho;
            $queryInserirRegistro = mysqli_query($link,$queryRegistroConselho)or die("Erro inadimissivel!!");
           
            header("Location:conselhofiscal.php");
    
    }



function CriarExpedicao($nome_expedicao,$data_expedicao,$desc_expedicao,$relat_exped,$usuario, $num_participantes,$participantes, $localExpedicao,$link)          
{

//if(isset($parecer)&&isset($relatorio)&&isset($id_cargo)&&isset($id_usuario)){
   $DataExpedicao =  date("d/m/Y", strtotime($data_expedicao));

	$queryCriarExpedicao = "INSERT INTO expedicoes(nome_expedicao, data_expedicao, desc_expedicao, relat_exped, id_usuario, num_participantes, participantes, localExpedicao) VALUES     ('$nome_expedicao',str_to_date(\"$DataExpedicao\",  \"%d/%m/%Y\"),'$desc_expedicao','$relat_exped',$usuario, $num_participantes,'$participantes','$localExpedicao')";
  echo $queryCriarExpedicao ;
    $queryInserirExpedicao = mysqli_query($link,$queryCriarExpedicao)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

	if($queryInserirExpedicao == true){

		header("Location:Expedicoes.php");
	}
	
	
//}
}




function ApagarRelatorio($id_expedicao,$link){
    $queryApagarRelatorio="delete from expedicoes where id_exp=".$id_expedicao;
    echo $queryApagarRelatorio;
    $relatorioApagado= mysqli_query($link,$queryApagarRelatorio);
    
    header("Location:Expedicoes.php");
    
    }
?>

