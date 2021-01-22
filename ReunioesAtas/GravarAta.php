<!DOCTYPE html>

<html>
<head></head>
<body>



<?php
include("../config.php");
session_start();
$usuario=$_SESSION["usuario"];
$nome_reuniao = '';
$desc_reuniao = '';
$relatorio_reuniao = '';
$id_usuario="";
$local = "";
$data_reuniao_ata="";

$id_cargo=0;

$tipo_cargo=0;
if(isset($usuario)){

if(isset($_POST['nome_reuniao']) && isset($_POST['desc_reuniao']) && isset($_POST['relatorio_reuniao']) && isset($_POST['local']) && isset($_POST['data_reuniao_ata']) ){
	
	
	$nome_reuniao = $_POST['nome_reuniao'];
	$desc_reuniao = $_POST['desc_reuniao'];
	$relatorio_reuniao = $_POST['relatorio_reuniao'];
	$local = $_POST['local'];
	$data_reuniao_ata=$_POST['data_reuniao_ata'];


}
//echo $acao;

//echo "User: ".$usuario;
$queryReuniaoAta = "select cg.id_usuario,cg.tipo_cargo,cg.id_cargo, user.nome from cargos cg inner join usuarios user on cg.id_usuario=user.id_usuario where user.cpf=".$usuario;
$queryVerSecretario = mysqli_query($link,$queryReuniaoAta) or  die("erro ou sem dados a exibir");
// if($queryVerConselheiro === FALSE) {
//     // Consulta falhou, parar aqui 
//     die(mysqli_error());
//}
while($linha=mysqli_fetch_assoc($queryVerSecretario)){

$id_cargo = $linha['id_cargo'];
$id_usuario =$linha['id_usuario'];
//$cargoConselho==$linha['nome_cargo'];
$tipo_cargo=$linha['tipo_cargo'];

}

function InserirAtaReuniao($nome_reuniao,$desc_reuniao,$relatorio_reuniao,$local,$data_reuniao_ata,$id_cargo,$id_usuario, $link){
	if(isset($nome_reuniao) && isset($desc_reuniao) && isset($relatorio_reuniao) && isset($local) && isset($data_reuniao_ata) && isset($id_cargo) && isset($id_usuario)){


	$queryRegistroConselho = "INSERT INTO reuniao(nome_reuniao, desc_reuniao, relat_ata_reuniao, local, data_reuniao, id_usuarios, id_cargo) VALUES ('$nome_reuniao ','$desc_reuniao ','$relatorio_reuniao ','$local ','$data_reuniao_ata ',$id_usuario,$id_cargo)";
 //echo $queryRegistroConselho;
	$queryInserirRegistro = mysqli_query($link,$queryRegistroConselho)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));
	//mysqli_close($link);
	header("Location:reunioesatas.php");

	}
}

if($tipo_cargo==3 || $tipo_cargo==1){

	InserirAtaReuniao($nome_reuniao,$desc_reuniao,$relatorio_reuniao,$local,$data_reuniao_ata,$id_cargo,$id_usuario, $link);

}



}
	else{
		
		header("Location:login.html");
		
		}

?>
</body>
</html>

