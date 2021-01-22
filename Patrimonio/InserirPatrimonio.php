<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt-BR">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Cadastrar Patrimonio</title>
<link href="./../Estilos/css/bootstrap.css" rel="stylesheet">
    <link href="./../Estilos/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="./../Estilos/css/bootstrap-min.css" rel="stylesheet">
    <!--Javascript -->
     <script src="./../Estilos/js/bootstrap.js"></script>
      <script src="./../Estilos/js/bootstrap-min.js"></script>

</head>
<body>
	<div   style="text-align:center;">
<h1>  Cadastrar Patrimonio</h1>



<form method="post" action="CrudPatrimonio.php?operacao=1"> 

Nome do Bem:<input type="text" name="nome_do_bem"> <br/>
Marca: <input type="text" name="marca">
Data de integração:<input type="date"  name="data_de_integracao">
<input type="submit" name="cadastrar"><br/>

</form>
</div>


</body>
</html>
