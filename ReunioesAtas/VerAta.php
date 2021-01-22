<?php
include("../config.php");
$id_reuniao= $_GET['id_reuniao'];
$query ="select rat.id_reuniao, rat.nome_reuniao, rat.desc_reuniao, rat.relat_ata_reuniao, rat.local, rat.data_reuniao, rat.id_cargo, user.nome, user.sobrenome, user.id_usuario from reuniao rat inner join usuarios user on rat.id_usuarios=user.id_usuario where id_reuniao=".$id_reuniao;
$queryRelatorio = mysqli_query($link,$query);
$nome_reuniao = '';
$desc_reuniao = '';
$relatorio_reuniao = '';
$id_usuario="";
$local = "";
$data_reuniao_ata="";
$id_cargo=0;

while($linha=mysqli_fetch_assoc($queryRelatorio)){

   
    $id_reuniao = $linha['id_reuniao'];

    $autor=$linha['nome'].$linha['sobrenome'];  
    $id_usuario = $linha['id_usuario'];
    $nome_reuniao = $linha['nome_reuniao'];
    $desc_reuniao = $linha['desc_reuniao'];
    $relatorio_reuniao = $linha['relat_ata_reuniao'];
    $local = $linha['local'];
    $data_reuniao_ata=$linha['data_reuniao'];

    $id_cargo=$linha['id_cargo'];

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

Nome da reuniao: <? echo $nome_reuniao;?><br/>
Descricao da Reuniao: <? echo $desc_reuniao;?><br/>
local da reuniao: <? echo $local;?><br/>
Data: <? echo $data_reuniao_ata;?><br/>
Relatorio de Ata:  <? echo $relatorio_reuniao; ?>
<?echo "<a href=\"./reunioesatas.php\" onclick='location.replace(\"reunioesatas.php\")'>voltar</a>"; ?>


</body>
</html>