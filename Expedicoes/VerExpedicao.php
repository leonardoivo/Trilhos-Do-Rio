<?php
include("../config.php");
$id_expedicao = $_GET['id_expedicao'];
$query ="select ex.id_exp numeroExpedicao,ex.nome_expedicao nomeExpedicao, ex.data_expedicao,ex.desc_expedicao descricao,ex.relat_exped,ex.id_usuario,us.nome nome,us.sobrenome sobrenome, ex.num_participantes,ex.participantes,ex.localExpedicao from expedicoes ex inner join usuarios us on ex.id_usuario=us.id_usuario where ex.id_exp=".$id_expedicao;
//echo $query;
$queryRelatorio = mysqli_query($link,$query);
$db="";
if($queryRelatorio  === FALSE) { 
    die(mysqli_error($db));
 }
echo $db;
$numeroRelatorio = 0;
$titulo="";
$relatorio="";
$autor="";
while($linha=mysqli_fetch_assoc($queryRelatorio)){

    $numeroRelatorio = $linha['numeroExpedicao'];
    $titulo=$linha['nomeExpedicao'];
    $relatorio=$linha['descricao'];
    $autor=$linha['nome'].$linha['sobrenome'];  


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
<h1>Relatório</h1>

Autor: <? echo $autor; ?> <br/>
Titulo:<? echo $titulo;?><br/>
Relatorio:<p><? echo $relatorio; ?></p>
<?echo "<a href=\"../Expedicoes/Expedicoes.php\" onclick='location.replace(\"Expedicoes.php\")'>voltar</a>"; ?>


</body>
</html>