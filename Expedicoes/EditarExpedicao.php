<?php
include("../config.php");
include("../VerAcesso.php");

session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
$id_expedicao = $_GET['id_expedicao'];
$nome_expedicao = "";
$data_expedicao = "";
$desc_expedicao = "";
$relat_exped = "";
$num_participantes = "";
$participantes="";
$localExpedicao = "";
$id_usuario=0;




if(isset($id_expedicao)){
$query ="select ex.id_exp numeroExpedicao,ex.nome_expedicao nomeExpedicao, ex.data_expedicao,ex.desc_expedicao descricao,ex.relat_exped,ex.id_usuario,us.nome nome,us.sobrenome sobrenome, ex.num_participantes,ex.participantes,ex.localExpedicao from expedicoes ex inner join usuarios us on ex.id_usuario=us.id_usuario where ex.id_exp=".$id_expedicao;
$queryRelatorio = mysqli_query($link,$query);

while($linha=mysqli_fetch_assoc($queryRelatorio)){

    
    $autor=$linha['nome'].$linha['sobrenome'];  
    $id_usuario = $linha['id_usuario'];
    
    $id_expedicao=$linha['numeroExpedicao'];
    $nome_expedicao = $linha['nomeExpedicao'];
    $data_expedicao =  $linha['data_expedicao'];
    $desc_expedicao = $linha['descricao'];
    $relat_exped = $linha['relat_exped'];
    $num_participantes = $linha['num_participantes'];
    $participantes=$linha['participantes'];
    $localExpedicao = $linha['localExpedicao'];
}
$DataEXpedicao =  date("d/m/Y", strtotime($data_expedicao));

}
?>

<!DOCTYPE html>
<html>
<head>

<link href=".././Estilos/css/bootstrap.css" rel="stylesheet">
    <link href=".././Estilos/css/bootstrap-responsive.css" rel="stylesheet">
    <link href=".././Estilos/css/bootstrap-min.css" rel="stylesheet">
    <!--Javascript -->
     <script src=".././Estilos/js/bootstrap.js"></script>
      <script src=".././Estilos/js/bootstrap-min.js"></script>






</head>
<body>
<h1>Editar Expedição</h1>


<form action="CrudExpedicao.php?operacao=2" method="post">
<input type="hidden" name="id_expedicao" value="<? echo $id_expedicao; ?>"/>

Nome da Expedicão <input type="text" name="nome_expedicao" value="<? echo $nome_expedicao;?>"><br/>
	Data Da Expedicão 	<input type="date" name="data_expedicao" value="<? echo $data_expedicao;?>"><br/>
	Numero de Participantes <input type="number" name="num_participantes" value="<? echo $num_participantes;?>"><br/>
	Descricao 	<textarea name="desc_expedicao" rows="4" cols="50" value="<? echo $desc_expedicao;?>"></textarea>
	Relatorio de Expedição	<textarea name="relat_exped" rows="4" cols="50" value="<? echo $relat_exped;?>" ></textarea>
	Local da Expedição 	<textarea name="localExpedicao" rows="4" cols="50" value="<? echo $localExpedicao;?>"></textarea>
	Nome dos particpantes	<textarea name="participantes" rows="4" cols="50" value="<? echo $participantes;?>"></textarea>

<input type="submit" text="enviar">
</form>


<?echo "<a href=\"./Expedicoes.php\" onclick='location.replace(\"Expedicoes.php\")'>voltar</a>"; ?>
<?
 



    
}
else{
		
    header("Location:../login.html");
    
    }
?>

</body>
</html>