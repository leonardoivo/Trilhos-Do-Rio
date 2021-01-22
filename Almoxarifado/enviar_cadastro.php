<?php

include "config.php";
$db=mysql_connect($host,$login_db,$senha_db) or die ("Não foi possivel acessar o banco");
$basedados = mysql_connect($database);
$pesquisar= mysql_query("select * from usuarios where login='$login'",$db);
$contagem= mysql_num_rows($pesquisar);
if ($pesquisar==1){
	
	$errors.="Login escolhido ja cadastrado."
}
if($login ==""){
	$errors.="Voce nao digitou um login";
}
if($senha==$senha2){
	$errors.="voce digitou senhas diferentes";
	
	}
	
	if($errors==""){
$cadastrar=mysql_query("insert into '$tabela' (nome,login,senha,,email) values('$nome','$login','$senha','$email')",$db);
if(cadastrar==1){
	echo"<div align=center>Cadastro com sucesso!</div>";
	
	}else{
		echo"<div align=center> Ocorreu erro no cadastro</div>";
		
		
		}
		// else{
		// 	echo "<div> houve mais erros</div>";
		// 	}		
			
			
			
	}
?>
