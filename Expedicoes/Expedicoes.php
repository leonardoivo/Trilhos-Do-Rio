<?php
session_start();
include("../config.php");
include("../VerAcesso.php");
$usuario=$_SESSION["usuario"];
$departamento="Expedicoes";
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
		



	    $tipo_cargo=0;
	    $usuarioAcesso = $usuario;
 	    $id_conselho="";
	    $query=mysqli_query($link,"select ex.id_exp, ex.nome_expedicao expedicao,ex.data_expedicao data, ex.id_usuario usuario, cg.tipo_cargo cargo, us.nome from expedicoes  ex inner join usuarios us on ex.id_usuario=us.id_usuario inner join cargos cg on us.id_usuario=cg.id_usuario");

	    echo "<h1> Expedicoes</h1>";
        echo "<table border=1>

	    <th>Nome da  Expedicão</th>
	    <th>Data Da Expedicão</th>
	    <th>Descricao</th>
	    <th>Numero de Participantes</th>
	    <th>Editar</th>
	    <th>Excluir</th>
	    </tr>";
   while($linha=mysqli_fetch_assoc($query))
      {
            $id_expedicao=$linha['id_exp'];
            $NomeExpedicao=$linha['expedicao'];
            $data_Expedicao=$linha['data'];
            // $tipo_cargo=$linha['tipo_cargo'];
            $nomeOrganizador=$linha['nome'];
		 
		    echo "<tr><td>".$id_expedicao." </td>";
	        echo "<td>".$NomeExpedicao."</td><td>".$nomeOrganizador."</td><td> <a href=\"VerExpedicao.php?id_expedicao=".$id_expedicao."\"> Ver</a></td>";
		
		     if(VerAcesso($usuarioAcesso,$link)==true)
		    {
	         echo " <td> <a href=\"EditarExpedicao.php?id_expedicao=".$id_expedicao."\"> Editar</a></td>";
	         echo " <td> <a href=\"CrudExpedicao.php?id_expedicao=".$id_expedicao."& operacao=3\"> Apagar</a></td>";
            }
	      echo "</tr>";
      }
         echo "</table>";
	   if(VerAcesso($usuario,$link)==true)
	     {
	        echo "<a href=\"CriarExpedicao.php\"> Criar Expedição</a>";
         }

        echo "</body></html>";
 		echo "<a href=\"../index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";

		 RegistrarAcesso($usuario,$departamento,$acao,$link);


	}
	else if (!isset($usuario))
	{
	 header("Location: login.html");
		   if (headers_sent())
			{
 
			 die("O redirecionamento falhou. Por favor, clique neste link: <a href=...>");
			}
	 
	 }
	  if(isset($_REQUEST["saida"]))
	 {
	   session_unset();
	   session_destroy();
	   header("Location:../ login.html");
	   exit(header("Location: login.html"));
	 }

	
?>
</body>
</html>