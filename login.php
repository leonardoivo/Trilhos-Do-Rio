<?php
include("config.php");
$cpf=$_POST['cpf'];
$senha=$_POST['senha'];
$cpfComp="";
$senhaComp="";
$logado=0;
ob_start();  


//echo "select cpf, senha from usuarios where cpf='$cpf' and senha=".$senha;
$resultado= mysqli_query($link,"select cpf, senha from usuarios where cpf='$cpf' and senha=".$senha);
	            
	/*while($linha=mysqli_fetch_assoc($resultado)){
		
		$cpfComp=$linha['cpf'];
	    $senhaComp=$linha['senha'];

		}*/
		if(isset($cpf)&& isset($senha)){
		//if($cpfComp==$cpf && $senhaComp==$senha){
		if (mysqli_num_rows($resultado) == 1){
		//if(0==strcmp($cpfComp,$cpf) && 0==strcmp($senhaComp,$senha)){

		$logado=1;
		
		}
	else{
		
			header("Location: login.html");
			
	        exit();
		
		}

if($logado==1){
	session_start();
	//session_register("SESSION");
	//session_register("SESSION_UNAME");
	//$SESSION_UNAME = $cpf;
	$_SESSION['usuario'] =$cpf;
    header("Location:index.php");
	exit();	
		}

}

?>
