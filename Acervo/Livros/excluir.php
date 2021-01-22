<html>
<head></head>
<body>
<?php
$link=mysql_connect("127.0.0.1","root","784512") or die ("A conexão falhou");
mysql_select_db("ebooks_alterados") or die ("Não existe, infelizmente");

$nome_do_livro=$_POST['excluir_livro'];
$Editora=$_POST['editora'];
$exclusao="delete from ebooks_kobo where  nome_do_livro  like '%$nome_do_livro%' and Editora like '%$Editora%'";
$resultado=mysql_query($exclusao) or die ("não tem nada dentro");
echo "Ebook excluido com sucesso";
echo "<h1>Dados excluidos da Kobo</h1>";


function consulta_kobo(){
$dado_da_editora=$_POST['editora'];
$consulta="SELECT nome_do_livro, Editora, data_do_email FROM ebooks_kobo where Editora like '%$dado_da_editora%'";
$resultado=mysql_query($consulta) or die ("não tem nada dentro");
echo "<h1>Dados da Kobo</h1>";
while ($linha=mysql_fetch_assoc($resultado)){

$nome_do_livro=$linha['nome_do_livro'];
$editora=$linha['Editora'];
$data_do_email=$linha['data_do_email'];
echo "<b>nome do livro: </b>".$nome_do_livro."<br/>";
echo "<b> Editora</b>:".$editora."<br/>";
echo "<b> Data do email</b>: ".$data_do_email."<br/>";
}
}

consulta_kobo();

?>
<p><a href="ebooksalterados.php">Voltar</a></p>
</body>
</html>
