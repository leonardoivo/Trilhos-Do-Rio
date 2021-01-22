<?php






?>
<!DOCTYPE html>
<head>

<link href=".././Estilos/css/bootstrap.css" rel="stylesheet">
    <link href=".././Estilos/css/bootstrap-responsive.css" rel="stylesheet">
    <link href=".././Estilos/css/bootstrap-min.css" rel="stylesheet">
    <!--Javascript -->
     <script src=".././Estilos/js/bootstrap.js"></script>
      <script src=".././Estilos/js/bootstrap-min.js"></script>






</head>
<body>
<html>
	<h1>Cadastro</h1>
<form name="cadastrar" method="post" action="EnviaCadastro.php">
<table  border="0" cellspacing="0" cellpadding="0">
<tr>
	<td>
CPF:<input type="text"  maxlength="11" name="cpf"></td>
</tr>
<tr><td>Nome:<input type="text" name="nome"></td><td> Sobrenome: <input type="text" name="sobrenome"></td></tr>
<tr><td>Endereço:<input type="text" name="endereco"></td><td>Numero:<input type="text" name="numero"></td><td> Complemento: <input type="text" name="Complemento"></td><td>CEP: <input type="text" name="Cep"></td></tr>
<tr><td> Bairro:<input type="text" name="bairro"></td><td>Cidade: <input type="text" name="Cidade"> </td><td>Estado: <input type="text" name="Estado"> </td><td>Pais: <input type="text" name="Pais"> </td></tr>
<tr><td>Data de Nascimento <input type="date" name="DataDeNascimento"></td><td> Naturalidade: <input type="text" name="Naturalidade"> </td></tr>
<tr><td>Email:<input type="text" name="email"></td></tr>
<tr><td>Senha:<input type="password" name="senha"></td></tr>
<tr><td>Re-senha:<input type="password" name="re-senha"></td></tr>
<tr><td>Telefone:<input type="text" name="telefone"></td></tr>


</table>
<input type="submit" value="cadastrar">

</body>
</form>
</html>







