<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt-BR">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Cadastrar Arquivo de audio</title>

</head>
<body>
	<div   style="text-align:center;">
<h1>Cadastrar Arquivo de audio</h1>



<form method="post" action="CrudAudio.php?operacao=1"> 

Nome da gravação:<input type="text" name="data_de_gravacao"> <br/>
Autor: <input type="text" name="editora">
Data de gravação:<input type="date"  name="dataDeCadastramento">
<input type="submit" name="cadastrar"><br/>

</form>
</div>
<?echo "<a href=\"audios.php\" onclick='location.replace(\"audios.php\")'>voltar</a>"; ?>


</body>
</html>
