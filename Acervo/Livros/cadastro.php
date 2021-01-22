<?php
$link=mysql_connect("127.0.0.1","root","784512") or die("conexão invalida");
mysql_select_db("trilhos_do_rio_db",$link) or die ("naõ tem nada dentro");
$nome=$_POST['nome'];
$cpf=$_POST['cpf'];
$data_de_nascimento=$_POST['data_de_nascimento'];
$endereco=$_POST['endereco'];
$complemento=$_POST['complemento'];
$bairro=$_POST['bairro'];
$cidade=$_POST['cidade'];
$cep=$_POST['CEP'];
$uf=$_POST['UF'];
$pais=$_POST['pais'];
$telefone=$_POST['telefone'];
$celular=$_POST['celular'];
$email=$_POST['email'];
$senha=$_POST['senha'];
mysql_db_query("insert into associados (nome,cpf,data_de_nascimento,endereco,cidade,estado,cep,pais,telefone,celular,email,senha,bairro,complemento) values('$nome','$cpf','$data_de_nascimento','$endereco','$cidade','$estado','$estado','$cep','$pais','$telefone','$celular','$email','$senha','$bairro','$complemento')",$link) or die ("Não cadastrado");
echo ("cadastrado com sucesso");
?>
