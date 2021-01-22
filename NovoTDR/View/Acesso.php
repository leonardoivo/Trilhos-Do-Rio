<?php
use TDR\BL\{ControleAcesso as AcessoLogin,ManterUsuario};
use TDR\DTO\{UsuariosDTO,PerfilDTO};
require '../StartLoader/autoloader.php';
$cpf=$_POST['cpf'];
$senha=$_POST['senha'];
$logado=0;
ob_start(); 
$novoAcesso = new AcessoLogin();
$resultado=$novoAcesso->acesso($cpf,$senha);
		if ($resultado == true){
		$logado=1;		
		}
	else{		
			header("Location:../login.html");			
	        exit();		
		}
if($logado==1){
	session_start();
	$_SESSION['usuario'] =$cpf;
    header("Location:index.php");
	exit();	
		}

// use TDR\View\login;
// require '../StartLoader/autoloader.php';


// $cpf=$_POST['cpf'];
// $senha=$_POST['senha'];

// $novasecao= new login($cpf,$senha);
// $novasecao->logar();
// //use \ArrayObject;

//use FG\DAL\CrudSecao;
// $usuarios = new ControleAcesso();

// $usuarios->acesso(1,1);

// $usuarios->ListaUsuarios();



//echo $inserir;




?>