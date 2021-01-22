<!DOCTYPE html>

<html>
<head></head>
<body>


<?php
include("config.php");
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
	echo "<h1> Conselho Fiscal</h1>";
    $tipo_cargo=0;
$usuarioAcesso = $usuario;
$id_conselho="";
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
	 echo "<td>".$titulo."</td><td>".$autor."</td><td> <a href=\"VerRelatorio.php?id_conselho=".$id_conselho."\"> Ver</a></td>";
    if(VerAcesso($usuarioAcesso,$link)==true){
	 echo " <td> <a href=\"EditarRelatorioFiscal.php?id_conselho=".$id_conselho."\"> Editar</a></td>";
	 echo " <td> <a href=\"ExcluirRelatorio.php?id_conselho=".$id_conselho."\"> Apagar</a></td>";
    }
	 echo "</tr>";
   }
   echo "</table>";
   if(VerAcesso($usuario,$link)==true){
	echo "<a href=\"EscreverNovoRelatorio.php\"> Criar Relatório Fiscal</a>";


 }

   echo "</body></html>";

	
		echo "<a href=\"index.php\" onclick='location.replace(\"index.php\")'>voltar</a>";
		

	}
	else{
		
		header("Location:login.html");
		
		}

		function VerAcesso($usuario,$link){

			$queryConsFiscal = "select cg.tipo_cargo tipo_cargo from cargos cg inner join usuarios user on cg.id_usuario=user.id_usuario where user.cpf=".$usuario;
             $queryVerAcesso=mysqli_query($link,$queryConsFiscal);
  
			while($linhaAcesso=mysqli_fetch_assoc($queryVerAcesso)){
         
				$tipo_cargo=$linhaAcesso['tipo_cargo'];



			}

			$Acesso=false;
			switch ($tipo_cargo){
				case '5':
				$Acesso=true;
				  break;
				case '6':
				$Acesso=true;
				  break;
				case '7':
				$Acesso=true;
				  break;
				case '8':
				$Acesso=true;
				  break;
				case '1':
				$Acesso=true;
				  break;
			  }

           return $Acesso;

		}
?>
</body>
</html>