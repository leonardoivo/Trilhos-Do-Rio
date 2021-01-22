<?php

include("../../config.php");

session_start();
$usuario=$_SESSION["usuario"];
$operacao=$_GET['operacao'];
$numeroeditora = 0;
$nomeDoLivro="";
$editora="";
$autor="";
$DataDeCadastramento="";
$id_usuario=0;
$id_livro=0;
$nomeDolivro = "";
if(isset($usuario)){



switch($operacao){

    case '1':
    if(isset($_POST['nomeDoLivro'])&& isset($_POST['editora']) && isset($_POST['dataDeCadastramento']) ){
        $nomeDolivro = $_POST['nomeDoLivro'];
        $editora = $_POST['editora'];
        $DataDeCadastramento = $_POST['dataDeCadastramento'];
       

    }
   
    
 
 CadastrarLivro($nomeDolivro,$editora,$DataDeCadastramento, $link);
    
    
    break;

    case '2':

    if(isset($_POST['nomeDolivro'])&& isset($_POST['editora'])&& isset($_POST['id_livro'])&&isset($_POST['dataDeCadastramento'])){
        $nomeDoLivro = $_POST['nomeDolivro'];
        $editora = $_POST['editora'];
        $id_livro = $_POST['id_livro'];
       $DataDeCadastramento = $_POST['dataDeCadastramento'];
    }


    EditarLivro($nomeDoLivro,$editora,$DataDeCadastramento,$id_livro, $link);
    
    break;


    case '3':
    if(isset($_GET['id_livro'])){
        $id_livro=$_GET['id_livro'];
        }
    ApagarLivro($id_livro,$link);

    break;

}

   
}
else{
		
    header("Location:login.html");
    
    }


function EditarLivro($nomeDoLivro,$editora,$DataDeCadastramento,$id_livro, $link){
    echo $id_livro;
    
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
               
            $queryEditarLivro = " update livros SET nome_do_livro='$nomeDoLivro',Editora='$editora', dataDeCadastramento=str_to_date(\"$DataLivro\",  \"%d/%m/%Y\")  WHERE id_livros=".$id_livro;
            echo  $queryEditarLivro;
            $queryLivroEditado = mysqli_query($link, $queryEditarLivro)or die("Erro inadimissivel!!");
           
            header("Location:livros.php");
    
    }



function CadastrarLivro($nomeDolivro,$editora,$DataDeCadastramento, $link){

    $DataLivro =  date("d/m/Y", strtotime($DataDeCadastramento));   
 //if(isset($nomeDolivro)&&isset($editora)&&isset($id_cargo)&&isset($id_usuario)){
	$queryInserirLivro = "insert into livros(nome_do_livro,Editora,dataDeCadastramento) values ('$nomeDolivro','$editora',str_to_date(\"$DataLivro\",  \"%d/%m/%Y\"))";
 echo $queryInserirLivro ;
	$queryLivro = mysqli_query($link,$queryInserirLivro)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

	if($queryLivro == true){

		header("Location:livros.php");
	}
	
	
//}
}




function ApagarLivro($id_livro,$link){
    $queryApagareditora="delete from livros where id_livros=".$id_livro;
    echo $queryApagareditora;
    $editoraApagado= mysqli_query($link,$queryApagareditora);
    
    header("Location:livros.php");
    
    }
?>

