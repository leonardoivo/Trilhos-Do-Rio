<?php
include("../config.php");
include("../VerAcesso.php");
session_start();
$usuario=$_SESSION["usuario"];
$departamento="Reuniões e Atas";
$acao=1;
if(isset($usuario))
  {
     echo"<!DOCTYPE html>";
     echo"<html>";
     echo"<head>";
     echo"<link href=\"../../TDR/Estilos/css/bootstrap.css\" rel=\"stylesheet\">"; 
     echo "<link href=\" ../../TDR/Estilos/css/bootstrap-responsive.css\" rel=\"stylesheet\">" ;  
     echo  "<link href=\" ../../TDR/Estilos/css/bootstrap-min.css\" rel=\"stylesheet\">" ;
     echo "<!--Javascript -->";
     echo  "<script src=\"../../TDR/Estilos/js/bootstrap.js\"</script>" ; 
     echo   "<script src=\"../../TDR/Estilos/js/bootstrap-min.js\" ></script>" ;
     echo "</head>";
     echo "<body>";
	 echo "<h1> Reuniões e Atas</h1>";
	$tipo_cargo=0;
	$usuarioAcesso = $usuario;
	$id_reuniao="";
	$nome_reuniao = '';
    $desc_reuniao = '';
    $relatorio_reuniao = '';
    $id_usuario="";
    $local = "";
    $data_reuniao_ata="";
	$query=mysqli_query($link,"select ra.id_reuniao ,ra.nome_reuniao, ra.desc_reuniao, ra.relat_ata_reuniao,ra.local,ra.data_reuniao,ra.id_cargo, user.nome nome , user.sobrenome sobrenome, cg.tipo_cargo tipo_cargo from reuniao ra inner join usuarios user on ra.id_usuarios=user.id_usuario inner join cargos cg on ra.id_cargo=cg.id_cargo");
	
	echo "<table border=1>
		<tr><th>ID</th>
		<th>Nome Reunião</th>
		<th>Descricao</th>
		<th>Data</th>
		<th>Local</th>
		<th>Secretario</th>
		<th>Ver</th>
		<th>Editar</th>
		<th>Excluir</th>
		</tr>";
	while($linha=mysqli_fetch_assoc($query))
	  {
	       $id_reuniaoAta=$linha['id_reuniao'];
	
	        $autor=$linha['nome'].$linha['sobrenome'];
	        $desc_reuniao=$linha['desc_reuniao'];
	        $tipo_cargo=$linha['tipo_cargo'];
	        $nome_reuniao = $linha['nome_reuniao'];
	        $local = $linha['local'];
	        $data_reuniao_ata=$linha['data_reuniao'];
            $id_cargo=$linha['id_cargo'];
	
	       echo "<tr><td>".$id_reuniaoAta." </td>";
		   echo "<td>".$nome_reuniao."</td>
		         <td>".$desc_reuniao."</td>		 
		         <td>".$data_reuniao_ata."</td>
		         <td>".$local."</td>
		         <td>".$autor."</td> <td> <a href=\"VerAta.php?id_reuniao=".$id_reuniaoAta."\"> Ver</a></td>";
		if(VerAcesso($usuarioAcesso,$link)==true)
		 {
		      echo " <td> <a href=\"EditarAta.php?id_reuniao=".$id_reuniaoAta."\"> Editar</a></td>";
		      echo " <td> <a href=\"ExcluirReuniaoAta.php?id_reuniao=".$id_reuniaoAta."\"> Apagar</a></td>";
		 }
		      echo "</tr>";
	   }
	   echo "</table>";
	   if(VerAcesso($usuario,$link)==true)
	   {
		     echo "<a href=\"EscreverAta.php\"> Criar Relatório de Ata ou reunião</a>";
	
	
	    }
	
	   echo "</body></html>";
	
		
			echo "<a href=\"../index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";
			
	// function ApagarRelatorio($id_conselho,$link){
	// $queryApagarRelatorio="delete from conselhofiscal where id_conselho=".$id_conselho;
	// echo $queryApagarRelatorio;
	// $relatorioApagado= mysqli_query($link,$queryApagarRelatorio);
	
	// //header("Location:conselhofiscal.php");
	
	// }
	// if(isset($_GET['id_conselho'])){
	// $id_conselho=$_GET['id_conselho'];
	// }
	// ApagarRelatorio($id_conselho,$link);
	RegistrarAcesso($usuario,$departamento,$acao,$link);

		}
		else if (!isset($usuario))
		{
		 header("Location:../../TDR/login.html");
			   if (headers_sent())
				{
	 
				 die("O redirecionamento falhou. Por favor, clique neste link: <a href=...>");
				}
		 
		 }
		  if(isset($_REQUEST["saida"]))
		 {
		   session_unset();
		   session_destroy();
		   header("Location:../../TDR/login.html");
		   exit(header("Location:../TDR/login.html"));
		 }
	
			
?>
</body>
</html>