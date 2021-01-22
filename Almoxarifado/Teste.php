<?php

define('WWW_ROOT',dirname(__FILE__));
define('DS',DIRECTORY_SEPARATOR);
require_once(WWW_ROOT.DS.'autoloader.php');
use TDR\View\login;
$cpf=$_POST['cpf'];
$senha=$_POST['senha'];

$novasecao= new login($cpf,$senha);
$novasecao->logar();
//use \ArrayObject;

//use FG\DAL\CrudSecao;
// $usuarios = new ControleAcesso();

// $usuarios->acesso(1,1);

// $usuarios->ListaUsuarios();



//echo $inserir;




?>