<?php
include("../config.php");
include("../VerAcesso.php");
session_start();
$acao=1;

$usuario=$_SESSION["usuario"];
if(isset($usuario))
{
    $tipo_cargo=0;
    $usuarioAcesso = $usuario;
    $id_conselho="";
    $departamento="conselho fiscal";
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
		
	    echo "<h1> Conselho Fiscal</h1>";

	$query=mysqli_query($link,"select cs.id_conselho numeroRelatorio, cs.titulo titulo, cs.relatorio relatorio, user.nome nome , user.sobrenome sobrenome, cg.tipo_cargo tipo_cargo from conselhofiscal cs inner join usuarios user on cs.id_usuario=user.id_usuario inner join cargos cg on cs.id_cargo=cg.id_cargo");

      echo "<table border=1>
	<tr><th>Relatórios fiscais</th>
	<th>Titulo</th>
	<th>Autor</th>
	<th>Ver</th>
	<th>Editar</th>
	<th>Excluir</th>
	</tr>";
       while($linha=mysqli_fetch_assoc($query))
      {
           $id_conselho=$linha['numeroRelatorio'];

           $autor=$linha['nome'].$linha['sobrenome'];
           $titulo=$linha['titulo'];
           $tipo_cargo=$linha['tipo_cargo'];
           $relatorio=$linha['relatorio'];
	         echo "<tr><td>".$id_conselho." </td>";
			 echo "<td>".$titulo."</td><td>".$autor."</td>
			 <td> <a href=\"VerRelatorio.php?id_conselho=".$id_conselho."\"> Ver</a></td>";
	       if(VerAcesso($usuarioAcesso,$link)==true)
	           {
	             echo " <td> <a href=\"EditarRelatorioFiscal.php?id_conselho=".$id_conselho."\"> Editar</a></td>";
	             echo " <td> <a href=\"CrudConselho.php?id_conselho=".$id_conselho." & operacao=3\"> Apagar</a></td>";
               }
	       echo "</tr>";
       }
   echo "</table>";
   if(VerAcesso($usuario,$link)==true)
      {
        echo "<a href=\"EscreverNovoRelatorio.php\"> Criar Relatório Fiscal</a>";

      }

         echo "</body></html>";

	
		echo "<a href=\"../index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";
		

	}
	else if (!isset($usuario))
      {
		header("Location: login.html");

      if (headers_sent())
         {

          die("O redirecionamento falhou. Por favor, clique neste link: <a href=...>");
         }
  
     }
     RegistrarAcesso($usuario,$departamento,$acao,$link);
      if(isset($_REQUEST["saida"]))
     {
          session_unset();
          session_destroy();
          header("Location:../TDR/login.html");
          exit(header("Location:../TDR/login.htmll"));
      }

		
?>
</body>
</html>