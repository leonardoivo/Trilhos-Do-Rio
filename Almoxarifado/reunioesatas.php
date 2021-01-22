<!DOCTYPE html>

<html>
<head></head>
<body>


<?php
include("config.php");
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
	echo "<h1> Reuniões e Atas</h1>";
	$tipo_cargo=0;
	$usuarioAcesso = $usuario;
	$id_conselho="";
		$query=mysqli_query($link,"select ra.id_reuniao , ra.desc_reuniao, ra.relat_ata_reuniao,ra.local,ra.data_reuniao, user.nome nome , user.sobrenome sobrenome, cg.tipo_cargo tipo_cargo from reuniao ra inner join usuarios user on ra.id_usuarios=user.id_usuario inner join cargos cg on ra.id_cargo=cg.id_cargo");
	
	echo "<table border=1>
		<tr><th>Reuniao</th>
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
	 $relatorio=$linha['relat_ata_reuniao'];
		 echo "<tr><td>".$id_conselho." </td>";
		 echo "<td>".$desc_reuniao."</td><td>".$autor."</td><td> <a href=\"VerAta.php?id_conselho=".$id_conselho."\"> Ver</a></td>";
		if(VerAcesso($usuarioAcesso,$link)==true){
		 echo " <td> <a href=\"EditarAta.php?id_conselho=".$id_conselho."\"> Editar</a></td>";
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