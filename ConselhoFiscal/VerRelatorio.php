<?php
include("../config.php");
$id_conselho = $_GET['id_conselho'];
$query ="select cs.id_conselho numeroRelatorio, cs.titulo titulo, cs.relatorio relatorio, user.nome nome , user.sobrenome sobrenome from conselhofiscal cs inner join usuarios user on cs.id_usuario=user.id_usuario where id_conselho=".$id_conselho;
$queryRelatorio = mysqli_query($link,$query);
$numeroRelatorio = 0;
$titulo="";
$relatorio="";
$autor="";
while($linha=mysqli_fetch_assoc($queryRelatorio)){

    $numeroRelatorio = $linha['numeroRelatorio'];
    $titulo=$linha['titulo'];
    $relatorio=$linha['relatorio'];
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
<?echo "<a href=\"../ConselhoFiscal/conselhofiscal.php\" onclick='location.replace(\"conselhofiscal.php\")'>voltar</a>"; ?>


</body>
</html>