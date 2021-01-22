<?php

include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
$operacao=$_GET['operacao'];
$numeroendereco = 0;
$nome="";
$endereco="";
$autor="";
$DataDeNascimento="";
$id_usuario=0;
$id_usuario=0;
$nomeUsuario = "";
if(isset($usuario)){



switch($operacao){

    case '1':

    
    if(isset($_POST['nome'])&& isset($_POST['endereco']) && isset($_POST['DataDeNascimento']) ){

    //   isset()  




    //   isset()    $cpf=$_POST['cpf'];
    //   isset()    $nome=$_POST['nome'];
    //   isset()   $numero=$_POST['numero'];
    //   isset()   $bairro=$_POST['bairro'];
    //   isset()   $sobrenome=$_POST['sobrenome'];
    //   isset()   $Endereco=$_POST['endereco'];
    //   isset()   $Complemento=$_POST['Complemento'];
    //   isset()    $CEP=$_POST['Cep'];
    //   isset()    $cidade=$_POST['Cidade'];
    //   isset()    $estado=$_POST['Estado'];
    //   isset()    $Pais=$_POST['Pais'];
    //   isset()    $DataDeNascimento=$_POST['DataDeNascimento'];
    //   isset()    $Naturalidade=$_POST['Naturalidade'];
    //   isset()    $Email=$_POST['email'];
    //   isset()    $Senha=$_POST['senha'];
    //   isset()    $Ressenha=$_POST['re-senha'];
    //   isset()    $Telefone=$_POST['telefone'];







        $nomeUsuario = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $DataDeNascimento = $_POST['DataDeNascimento'];
       

    }
   
    
 
 CadastrarUsuario($nomeUsuario,$endereco,$DataDeNascimento, $link);
    
    
    break;

    case '2':

    if(isset($_POST['nomeDolivro'])&& isset($_POST['endereco'])&& isset($_POST['id_usuario'])&&isset($_POST['DataDeNascimento'])){
        $nome = $_POST['nomeDolivro'];
        $endereco = $_POST['endereco'];
        $id_usuario = $_POST['id_usuario'];
       $DataDeNascimento = $_POST['DataDeNascimento'];
    }


    EditarUsuario($nome,$endereco,$DataDeNascimento,$id_usuario, $link);
    
    break;


    case '3':
    if(isset($_GET['id_usuario'])){
        $id_usuario=$_GET['id_usuario'];
        }
    ApagarUsuario($id_usuario,$link);

    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarUsuario($nome,$endereco,$DataDeNascimento,$id_usuario, $link){
    echo $id_usuario;
    
       $id_cargo = "";
        $id_usuario ="";
        
        $tipo_cargo="";
    
        $DataNascUsuario =  date("m/d/Y", strtotime($DataDeNascimento));     
            // $queryConsFiscal = "select cg.id_usuario,cg.tipo_cargo,cg.id_cargo, user.nome from cargos cg inner join usuarios user on cg.id_usuario=user.id_usuario where user.cpf=".$usuario;
            // $queryVerConselheiro = mysqli_query($link,$queryConsFiscal) or  die("erro ou sem dados a exibir");
          
            // while($linha=mysqli_fetch_assoc($queryVerConselheiro)){
            
            // $id_cargo = $linha['id_cargo'];
            // $id_usuario =$linha['id_usuario'];
          
            // $tipo_cargo=$linha['tipo_cargo'];
            
            // }
               
            $queryEditarUsuario = " update usuarios SET nome='$nome',endereco='$endereco', DataDeNascimento=str_to_date(\"$DataNascUsuario\",  \"%d/%m/%Y\")  WHERE id_usuario=".$id_usuario;
            echo  $queryEditarUsuario;
            $queryLivroEditado = mysqli_query($link, $queryEditarUsuario)or die("Erro inadimissivel!!");
           
            header("Location:usuarios.php");
    
    }



function CadastrarUsuario($nomeUsuario,$endereco,$DataDeNascimento, $link){

    $DataNascUsuario =  date("d/m/Y", strtotime($DataDeNascimento));   
 //if(isset($nomeUsuario)&&isset($endereco)&&isset($id_cargo)&&isset($id_usuario)){
	$queryInserirLivro = "insert into usuarios(nome,endereco,DataDeNascimento) values ('$nomeUsuario','$endereco',str_to_date(\"$DataNascUsuario\",  \"%d/%m/%Y\"))";
 echo $queryInserirLivro ;
	$queryLivro = mysqli_query($link,$queryInserirLivro)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

	if($queryLivro == true){

		header("Location:usuarios.php");
	}
	
	
//}
}




function ApagarUsuario($id_usuario,$link){
    $queryApagarUsuario="delete from usuarios where id_usuario=".$id_usuario;
    echo $queryApagarUsuario;
    $enderecoApagado= mysqli_query($link,$queryApagarUsuario);
    
    header("Location:usuarios.php");
    
    }
?>

