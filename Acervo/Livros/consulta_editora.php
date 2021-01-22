<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt-BR">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title> teste de conexão com o Mysql</title>
</head>
<body>
<?php
include("../../config.php");

$link=mysqli_connect("localhost","root","784512") or die ("A conexão falhou");
$db_selected = mysqli_select_db($link,"ebooks_alterados") or die ("Ele não existe, infelizmente");

function consulta_editora(){
$dado_da_editora=$_POST['consulta_editora'];	

$consulta="SELECT nome_do_livro, Editora, data_do_email FROM ebooks_kobo where Editora like '%$dado_da_editora%' and data_do_email and nome_do_livro";
//$consulta="SELECT nome_do_livro, Editora, data_do_email FROM ebooks_kobo where Editora='".$dado_da_editora."'";
//$consulta="SELECT nome_do_livro, Editora, data_do_email FROM ebooks_kobo where Editora='".$dado_da_editora."'";



$resultado=mysqli_query($link,$consulta) or die ("não tem nada dentro");

echo '<select name="#">';
while ($linha=mysqli_fetch_assoc($resultado)){

$nome_do_livro=$linha['nome_do_livro'];
$editora=$linha['Editora'];
$data_do_email=$linha['data_do_email'];

echo '<option value="#">'.$editora.'</option>';
         }

echo '</select>';
 

echo "<br/>".$nome_do_livro;
echo "<br/>".$editora;

echo "<br/>".$data_do_email;

//while(
/*$array = mysql_fetch_array($resultado);//){
$testarray=$array['Editora'];
if($testarray=="Dracaena")
{
	echo "E ela!".$testarray;
	} 
	else
	{
		 echo "não e ela!";
		 }*/
//}

}
consulta_editora();
?>
<p><a href="ebooksalterados.php">Voltar</a></p>
<?="teste";?>
</body>


</html>
