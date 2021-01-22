<?php

include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
$operacao=$_GET['operacao'];
$numeromarca = 0;
$nome_do_bem="";
$marca="";
$autor="";
$data_de_integracao="";
$id_usuario=0;
$id_patrimonio=0;
$nome_do_bem = "";
if(isset($usuario)){



switch($operacao){

    case '1':
    if(isset($_POST['nome_do_bem'])&& isset($_POST['marca']) && isset($_POST['data_de_integracao']) ){
        $nome_do_bem = $_POST['nome_do_bem'];
        $marca = $_POST['marca'];
        $data_de_integracao = $_POST['data_de_integracao'];
       

    }
   
    
 
 CadastrarPatrimonio($nome_do_bem,$marca,$data_de_integracao, $link);
    
    
    break;

    case '2':

    if(isset($_POST['nome_do_bem'])&& isset($_POST['marca'])&& isset($_POST['id_patrimonio'])&&isset($_POST['data_de_integracao'])){
        $nome_do_bem = $_POST['nome_do_bem'];
        $marca = $_POST['marca'];
        $id_patrimonio = $_POST['id_patrimonio'];
       $data_de_integracao = $_POST['data_de_integracao'];
    }


    EditarPatrimonio($nome_do_bem,$marca,$data_de_integracao,$id_patrimonio, $link);
    
    break;


    case '3':
    if(isset($_GET['id_patrimonio'])){
        $id_patrimonio=$_GET['id_patrimonio'];
        }
    ApagarPatrimonio($id_patrimonio,$link);

    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarPatrimonio($nome_do_bem,$marca,$data_de_integracao,$id_patrimonio, $link){
    echo $id_patrimonio;
    
       $id_cargo = "";
        $id_usuario ="";
        
        $tipo_cargo="";
    
        $DataPatrimonio =  date("m/d/Y", strtotime($data_de_integracao));     
            // $queryConsFiscal = "select cg.id_usuario,cg.tipo_cargo,cg.id_cargo, user.nome from cargos cg inner join usuarios user on cg.id_usuario=user.id_usuario where user.cpf=".$usuario;
            // $queryVerConselheiro = mysqli_query($link,$queryConsFiscal) or  die("erro ou sem dados a exibir");
          
            // while($linha=mysqli_fetch_assoc($queryVerConselheiro)){
            
            // $id_cargo = $linha['id_cargo'];
            // $id_usuario =$linha['id_usuario'];
          
            // $tipo_cargo=$linha['tipo_cargo'];
            
            // }
               
            $queryEditarPatrimonio = " update patrimonio SET nome_do_bem='$nome_do_bem',marca='$marca', data_de_integracao=str_to_date(\"$DataPatrimonio\",  \"%d/%m/%Y\")  WHERE id_patrimonios=".$id_patrimonio;
            echo  $queryEditarPatrimonio;
            $queryLivroEditado = mysqli_query($link, $queryEditarPatrimonio)or die("Erro inadimissivel!!");
           
            header("Location:patrimonio.php");
    
    }



function CadastrarPatrimonio($nome_do_bem,$marca,$data_de_integracao, $link){

    $DataPatrimonio =  date("d/m/Y", strtotime($data_de_integracao));   
 //if(isset($nome_do_bem)&&isset($marca)&&isset($id_cargo)&&isset($id_usuario)){
	$queryInserirLivro = "insert into patrimonio(nome_do_bem,marca,data_de_integracao) values ('$nome_do_bem','$marca',str_to_date(\"$DataPatrimonio\",  \"%d/%m/%Y\"))";
 echo $queryInserirLivro ;
	$queryLivro = mysqli_query($link,$queryInserirLivro)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

	if($queryLivro == true){

		header("Location:patrimonio.php");
	}
	
	
//}
}




function ApagarPatrimonio($id_patrimonio,$link){
    $queryApagarmarca="delete from patrimonio where id_patrimonio=".$id_patrimonio;
    echo $queryApagarmarca;
    $marcaApagado= mysqli_query($link,$queryApagarmarca);
    
    header("Location:patrimonio.php");
    
    }
?>

