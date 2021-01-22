<?php
     include("../config.php");
     session_start();
     $usuario=$_SESSION["usuario"];
     require __DIR__ . '../../Nucleo/buscaviacep/src/BuscaViaCEP_inc.php';
     
	 //usar o helper
     use Jarouche\ViaCEP\HelperViaCep;
	 
     //tipos permitidos
     $array_tipos =['Querty','Piped','JSON','JSONP','XML'];
     
     

    //Utilizando via Classe
    $class = new Jarouche\ViaCEP\BuscaViaCEPJSONP();
    /*como é JSONP, existe a opção de setar o nome da callback function, 
     * ESTÁ OPÇÃO ESTÁ SOMENTE DISPONÍVEL SE UTILIZAR A CLASSE Jarouche\ViaCEP\BuscaViaCEPJSONP();
     */
    $texto=$_POST['teste'];
    $class->setCallbackFunction('Logradouro');

    if(isset($texto)){
        $result = $class->retornaCEP($texto);
    }
    
    
   
$endereco=$result['logradouro'];
$Complemento=$result['complemento'];
$Bairro=$result['bairro'];
$Cidade=$result['localidade'];
$UF=$result['uf'];
$cep=$result['cep'];


     if(isset($usuario)){
?>

<!DOCTYPE html>
<head></head>
<body>
<html>
	<h1>Cadastro</h1>
    <form action="IncluirUsuario.php" method="post">
Cep: <input type="text" name="teste"><br>
<input type="submit" value="Pesquisar">
</form>
  


<form name="cadastrar" method="post" action="EnviaCadastro.php">
<table  border="0" cellspacing="0" cellpadding="0">
<tr>
	<td>
CPF:<input type="text"  maxlength="11" name="cpf"></td>
</tr>
<tr><td>Nome:<input type="text" name="nome"></td><td> Sobrenome: <input type="text" name="sobrenome"></td></tr>


<tr><td>Endereço:<input type="text" name="endereco"  value="<? echo $endereco;?>" ></td><td>Numero:<input type="text" name="numero"></td><td> Complemento: <input type="text" name="Complemento"  value="<? echo $Complemento;?>"></td><td>CEP: <input type="text" name="Cep" value="<? echo $cep;?>"></td></tr>
<tr><td> Bairro:<input type="text" name="bairro" value="<? echo $Bairro;?>"></td><td>Cidade: <input type="text" name="Cidade" value="<? echo $Cidade;?>"> </td><td>Estado: <input type="text" name="Estado" value="<? echo $UF;?>"> </td><td>Pais: <input type="text" name="Pais"> </td></tr>



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







     <?
    
    }
    else{
            
        header("Location:../login.html");
        
        }





?>








