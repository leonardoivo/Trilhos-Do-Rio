<?php

include("../config.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt-BR">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Criar Acervo</title>

</head>
<body>
	<div   style="text-align:center;">
<h1>  Cadastrar Acervo</h1>



<form method="post" action="CrudAcervo.php?operacao=1"> 

Nome do Acervo:<input type="text" name="nome_acervo"> <br/>
Descrição: <input type="text" name="Descricao"><br/>
Data de Criação:<input type="date"  name="DataDeCriacao"><br/>
<?
$queryTipoAcervo = mysqli_query($link,"select * from tipoAcervo");

echo"<ul>";
while($linhaTipoAcervo=mysqli_fetch_assoc($queryTipoAcervo)){

$TipoAcervo = $linhaTipoAcervo["nome"];
echo "<li><input type=\"checkbox\" name=\"".$TipoAcervo."\" value=\"Car\">".$TipoAcervo." </li>";


}
echo"</ul>";


?>

<br/>
<input type="submit" name="cadastrar"><br/>

</form>
<?
echo "<a href=\"acervo.php\" onclick='location.replace(\"acervo.php\")'>voltar</a>";
?></div>
</body>
</html>
