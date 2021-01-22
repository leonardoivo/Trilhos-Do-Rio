<?php
$link=mysql_connect("127.0.0.1","root","784512") or die ("A conexão falhou"); //Essa função faz a conexão com o banco.
mysql_select_db("ebooks_alterados") or die ("Ele não existe, infelizmente"); //Aqui é feita a escolha do banco da aplicação.


$nome_do_livro=$_POST['nome_do_livro'];
$editora=$_POST['editora'];
$data_do_email=$_POST['data_do_email'];

$inclusao="insert into ebooks_kobo(nome_do_livro,Editora,data_do_email)values('$nome_do_livro','$editora','$data_do_email')";
$resultado= mysql_query($inclusao) or die ("não tem nada dentro");

echo "Dados inseridos com sucesso";
echo "<h1>Dados alterados da Amazon</h1>";

function consulta_amazon(){
$consulta="SELECT nome_do_livro, Editora, data_do_email FROM ebooks_amazon";
$resultado=mysql_query($consulta) or die ("não tem nada dentro"); //essa faz a consulta no banco.
echo "<h1>Dados da amazon</h1>";
while ($linha=mysql_fetch_assoc($resultado)){   //a função mysq_fetch_assoc converte os resultados das querys em arrays.

$nome_do_livro=$linha['nome_do_livro']; //Cada campo da query do banco é indice do vetor de array.
$editora=$linha['Editora'];
$data_do_email=$linha['data_do_email'];
echo "<b>nome do livro: </b>".$nome_do_livro."<br/>";
echo "<b> Editora</b>:".$editora."<br/>";
echo "<b> Data do email</b>: ".$data_do_email."<br/>";
}
}

consulta_amazon();
?>
