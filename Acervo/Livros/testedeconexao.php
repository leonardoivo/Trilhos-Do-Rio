<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt-BR">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title> teste de conexão com o Mysql</title>
</head>
<body>
<?php
$link=mysqli_connect("127.0.0.1","root","784512") or die ("A conexão falhou");
mysqli_select_db($link,"ebooks_alterados") or die ("Ele não existe, infelizmente");

/*function consulta_amazon(){
$consulta="SELECT nome_do_livro, Editora, data_do_email FROM ebooks_amazon";
$resultado=mysql_query($consulta) or die ("não tem nada dentro");
echo "<h1>Dados da amazon</h1>";
while ($linha=mysql_fetch_assoc($resultado)){

$nome_do_livro=$linha['nome_do_livro'];
$editora=$linha['Editora'];
$data_do_email=$linha['data_do_email'];
echo "<b>nome do livro: </b>".$nome_do_livro."<br/>";
echo "<b> Editora</b>:".$editora."<br/>";
echo "<b> Data do email</b>: ".$data_do_email."<br/>";
}
}

consulta_amazon();
echo "<h1>Dados da kobo</h1>";

function consulta_kobo(){
$consulta="SELECT nome_do_livro, Editora, data_do_email FROM ebooks_kobo";
$resultado=mysql_query($consulta) or die ("não tem nada dentro");

while ($linha=mysql_fetch_assoc($resultado)){

$nome_do_livro=$linha['nome_do_livro'];
$editora=$linha['Editora'];
$data_do_email=$linha['data_do_email'];
echo "<b>nome do livro: </b>".$nome_do_livro."<br/>";
echo "<b> Editora</b>:".$editora."<br/>";
echo "<b> Data do email</b>:".$data_do_email."<br/>";
}
}
consulta_kobo();
*/
function consulta_ebook(){
$dado_do_livro=$_POST['consulta'];	

$consulta="SELECT nome_do_livro, Editora, data_do_email FROM ebooks_kobo where nome_do_livro='".$dado_do_livro."'";

$resultado=mysqli_query($link,$consulta) or die ("não tem nada dentro");
while ($linha=mysqli_fetch_assoc($resultado)){

$nome_do_livro=$linha['nome_do_livro'];
$editora=$linha['Editora'];
$data_do_email=$linha['data_do_email'];
echo "<b>nome do livro: </b>".$nome_do_livro."<br/>";
echo "<b> Editora</b>:".$editora."<br/>";
echo "<b> Data do email</b>:".$data_do_email."<br/>";

}

/*$linha=mysql_fetch_assoc($resultado);

$nome_do_livro=$linha['nome_do_livro'];

$editora=$linha['Editora'];

$data_do_email=$linha['data_do_email'];

echo "<b>nome do livro: </b>".$nome_do_livro."<br/>";

echo "<b> Editora</b>:".$editora."<br/>";

echo "<b> Data do email</b>:".$data_do_email."<br/>";*/



}

consulta_ebook();

/*function consulta_editora(){
$dado_da_editora=$_POST['consulta_editora'];	

$consulta="SELECT nome_do_livro, Editora, data_do_email FROM ebooks_kobo where Editora like '%$dado_da_editora%'";

$resultado=mysql_query($consulta) or die ("não tem nada dentro");
while ($linha=mysql_fetch_assoc($resultado)){

$nome_do_livro=$linha['nome_do_livro'];
$editora=$linha['Editora'];
$data_do_email=$linha['data_do_email'];
echo "<b>nome do livro: </b>".$nome_do_livro."<br/>";
echo "<b> Editora</b>:".$editora."<br/>";
echo "<b> Data do email</b>:".$data_do_email."<br/>";

}
}
consulta_editora();*/
?>
<p><a href="ebooksalterados.php">Voltar</a></p>

</body>


</html>
