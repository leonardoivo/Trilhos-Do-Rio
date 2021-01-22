<?php
include("../config.php");
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
$id_reuniao = $_GET['id_reuniao'];

$nome_reuniao = '';
$desc_reuniao = '';
$relatorio_reuniao = '';
$id_usuario="";
$local = "";
$data_reuniao_ata="";

$id_cargo=0;



if(isset($id_reuniao)){
$query ="select rat.id_reuniao, rat.nome_reuniao, rat.desc_reuniao, rat.relat_ata_reuniao, rat.local, rat.data_reuniao, rat.id_cargo, user.nome, user.sobrenome, user.id_usuario from reuniao rat inner join usuarios user on rat.id_usuarios=user.id_usuario where id_reuniao=".$id_reuniao;
$queryRelatorio = mysqli_query($link,$query);

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

	  <script src=".././js/ckeditor/ckeditor.js"></script>


</head>
<body>
<h1>Relatório</h1>

<form name="registrar" method="post" action="GravarEdicaoAta.php" >
Nome da reuniao: <input type="text" name="nome_reuniao" value="<?php echo $nome_reuniao;?>"><br/>
Descricao da Reuniao: <input type="text" name="desc_reuniao" value="<?phecho $desc_reuniao;?>"><br/>
local da reuniao: <input type="text" name="local" value="<?phecho $local;?>"><br/>
Data: <input type="date" name="data_reuniao_ata" value="<?phecho $data_reuniao_ata;?>"><br/>
Relatorio de Ata: <textarea name="relatorio_reuniao"  rows="4" cols="50"> <?phecho $relatorio_reuniao; ?></textarea>
<input type="hidden" name="id_reuniao" value="<?phecho $id_reuniao; ?>"/>

<input type="submit" text="enviar">
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'relatorio_reuniao' );
            </script>



<?echo "<a href=\"reunioesatas.php\" onclick='location.replace(\"reunioesatas.php\")'>voltar</a>"; ?>
<?
 



    
}
else{
		
    header("Location:login.html");
    
    }
?>

</body>
</html>