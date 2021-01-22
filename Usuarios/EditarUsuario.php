<?php
include("../config.php");
include("../VerAcesso.php");

$cpf=$_GET['cpf'];
$query= mysqli_query($link, "SELECT * from usuarios where cpf=".$cpf);
$cpfUser="";
$nome="";
$numero="";
$bairro="";
$sobrenome="";
$Endereco="";
$Complemento="";
$CEP="";
$Pais="";
$cidade="";
$estado="";
$DataDeNascimento="";
$Naturalidade="";
$Email="";
$Telefone="";
while($linha=mysqli_fetch_assoc($query)){
	      $cpfUser=$linha['cpf'];
          $nome=$linha['nome'];
          $numero=$linha['numero'];
          $bairro=$linha['bairro'];
          $sobrenome=$linha['sobrenome'];
          $Endereco=$linha['endereco'];
          $Complemento=$linha['complemento'];
          $CEP=$linha['cep'];
          $cidade=$linha['cidade'];
          $estado=$linha['estado'];
          $Pais=$linha['pais'];
          $DataDeNascimento=$linha['data_de_nascimento'];
          $Naturalidade=$linha['naturalidade'];
          $Email=$linha['email'];
	      $Telefone=$linha['telefone'];

	}

?>
<!DOCTYPE html>
<html><head>
</head><body>
<form action="EfetivarEdicaoRelatorio.php" method="post">

<table>
<tr>	<td>
CPF:<? echo $cpfUser; ?></td>
</tr>


<input type="hidden" name="id_usuario" value="<? echo $cpfUser; ?>"/>

<tr><td>Nome:<input type="text" name="nome" value="<?  echo $nome; ?>"></td><td> Sobrenome: <input type="text" name="sobrenome" value="<?  echo $sobrenome; ?>"></td></tr>
<tr><td>Endereço:<input type="text" name="Endereco" value="<?  echo $Endereco; ?>"></td><td>Numero:<input type="text" name="numero" value="<?  echo $numero; ?>"></td><td> Complemento: <input type="text" name="titulo" value="<?  echo $Complemento; ?>"></td><td>CEP: <input type="text" name="titulo" value="<?  echo $CEP; ?>"></td></tr>
<tr><td> Bairro:<input type="text" name="Bairro" value="<? echo $bairro; ?>"></td><td>Cidade: <input type="text" name="cidade" value="<?  echo $cidade; ?> "></td><td>Estado: <input type="text" name="titulo" value="<?  echo $estado; ?>"></td><td>Pais: <input type="text" name="pais" value="<?  echo $Pais; ?>"> </td></tr>
<tr><td>Data de Nascimento <input type="text" name="DataDeNascimento" value="<?  echo $DataDeNascimento; ?>"></td><td> Naturalidade: <input type="text" name="naturalidade" value="<? echo $Naturalidade; ?>"></td></tr>
<tr><td>Email:<input type="text" name="Email" value="<?  echo $Email; ?>"></td><td>Telefone:<input type="text" name="telefone" value="<? echo $Telefone;?>"></td></tr>
<tr><td><input type="submit" text="enviar"></td></tr>




</table>
</form>
<a href="associados.php">Voltar</a>

</body>
</html>
