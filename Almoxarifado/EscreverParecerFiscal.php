<!DOCTYPE html>

<html>
<head></head>
<body>



<?php
include("config.php");
session_start();
$usuario=$_SESSION["usuario"];
$parecer = '';
$relatorio = '';
$id_usuario="";
$id_cargo=0;
$cargoConselho="";
$tipo_cargo=0;
if(isset($usuario)){
	
if(isset($_POST['Parecer'])&&isset($_POST['relatorio'])){
	$parecer = $_POST['Parecer'];
	$relatorio = $_POST['relatorio'];

}


//echo "User: ".$usuario;
$queryConsFiscal = "select cg.id_usuario,cg.tipo_cargo,cg.id_cargo, user.nome from cargos cg inner join usuarios user on cg.id_usuario=user.id_usuario where user.cpf=".$usuario;
$queryVerConselheiro = mysqli_query($link,$queryConsFiscal) or  die("erro ou sem dados a exibir");
// if($queryVerConselheiro === FALSE) {
//     // Consulta falhou, parar aqui 
//     die(mysqli_error());
//}
while($linha=mysqli_fetch_assoc($queryVerConselheiro)){

$id_cargo = $linha['id_cargo'];
$id_usuario =$linha['id_usuario'];
//$cargoConselho==$linha['nome_cargo'];
$tipo_cargo=$linha['tipo_cargo'];

}

function InserirRelatorio($parecer,$relatorio,$id_cargo,$id_usuario, $link){

if(isset($parecer)&&isset($relatorio)&&isset($id_cargo)&&isset($id_usuario)){

	$queryRegistroConselho = "insert into conselhofiscal(Titulo,Relatorio,id_cargo,id_usuario) values ('$parecer','$relatorio',$id_cargo,$id_usuario)";
 //echo $queryRegistroConselho;
	$queryInserirRegistro = mysqli_query($link,$queryRegistroConselho)or die("Erro inadimissivel!!");
	//echo $queryInserirRegistro;
	//$query2=mysqli_query($link,$Cadastrar)or die(mysqli_error($link));

	if($queryInserirRegistro == true){

		header("Location:conselhofiscal.php");
	}
	
	
}
}

switch ($tipo_cargo){
  case '5':
  InserirRelatorio($parecer,$relatorio,$id_cargo,$id_usuario, $link);
	break;
  case '6':
  InserirRelatorio($parecer,$relatorio,$id_cargo,$id_usuario, $link);
	break;
  case '7':
  InserirRelatorio($parecer,$relatorio,$id_cargo,$id_usuario, $link);
	break;
  case '8':
  InserirRelatorio($parecer,$relatorio,$id_cargo,$id_usuario, $link);
	break;
  case '1':
  InserirRelatorio($parecer,$relatorio,$id_cargo,$id_usuario, $link);
	break;
}






// if($tipo_cargo==5){
// $queryRegistroConselho = " insert into conselho fiscal(Titulo,Relatorio,id_cargo,id_usuario) values ('$parecer','$relatorio','$id_cargo','$id_usuario')";
// $queryInserirRegistro = mysqli_query($link,$queryConsFiscal);
// }

}
	else{
		
		header("Location:login.html");
		
		}

?>
</body>
</html>