<?php
namespace TDR\View{
use TDR\BL\ControleAcesso;

class login{
    private $login;
    private $senha;
function __construct($login,$senha){
 $this->login=$login;
 $this->senha=$senha;
    
}

function logar(){
    $login=$this->login;
    $senha=$this->senha;    
    $acesso = new ControleAcesso();
    $logado=$acesso->acesso($login,$senha);
    if($logado==true){
        session_start();
        $_SESSION['usuario'] =$login;
        header("Location:index.php");
        exit();		
		}
	else{		
			header("Location: login.html");		
	        exit();	
		}

}

}



}


?>
