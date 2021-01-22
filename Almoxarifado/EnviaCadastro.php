<?php
include("config.php");
//$link=mysqli_connect($host,$login_db,$senha_db);
$cpf=$_POST['cpf'];
$nome=$_POST['nome'];
$numero=$_POST['numero'];
$bairro=$_POST['bairro'];
$sobrenome=$_POST['sobrenome'];
$Endereco=$_POST['endereco'];
$Complemento=$_POST['Complemento'];
$CEP=$_POST['Cep'];
$cidade=$_POST['Cidade'];
$estado=$_POST['Estado'];
$Pais=$_POST['Pais'];
$DataDeNascimento=$_POST['DataDeNascimento'];
$Naturalidade=$_POST['Naturalidade'];
$Email=$_POST['email'];
$Senha=$_POST['senha'];
$Ressenha=$_POST['re-senha'];
$Telefone=$_POST['telefone'];

if(!isset($Senha)||!isset($Ressenha)){
	
	echo "Campo senha vazio";
	 header("location:cadastrar.php");

	}

if($Senha!=$Ressenha){
	
	echo "As senhas não coincidem!";
	


	}
	
$Cadastrar="insert into usuarios (cpf,nome,endereco,numero,complemento,bairro,cep,cidade,data_de_nascimento,email,senha,sobrenome,naturalidade,pais,estado) values('$cpf','$nome','$Endereco','$numero','$Complemento','$bairro','$CEP','$cidade','$DataDeNascimento','$Email','$Senha','$sobrenome','$Naturalidade','$Pais','$estado')";


$query=mysqli_query($link,"SELECT * from usuarios where cpf=".$cpf);

$cadastro= mysqli_num_rows($query); 

   if($cadastro>0){

	   echo "usuario já cadastrado";

	 }
   else if($cadastro==0){
		$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

		echo "Cadastrado com sucesso!";

	 }

//try {
   //$query=mysqli_query($link,$Cadastrar);

		//echo "Cadastrado com sucesso!";
//} catch (Exception $e) {
    //echo 'Causa do Erro: ',  $e->getMessage(), "\n";
//}
       	 //header("location:cadastrar.php");

?>
