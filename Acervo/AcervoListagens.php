<?php

include("../config.php");

function VerTodos($link){
	$queryGeral=mysqli_query($link,"SELECT id_acervo, nome_acervo, Descricao, DataDeCriacao FROM acervo order by DataDeCriacao asc");
	
	echo "<table border=1>";
	echo "<tr><th>Nome do Acervo</th>";
	echo "<th>Editar</th>";
	echo "<th>Excluir</th></tr>";
	while($linha=mysqli_fetch_assoc($queryGeral))
	  {
	 $id_Acervo = $linha['id_acervo'];
	 $nome_acervo=$linha['nome_acervo'];
	 $Descricao=$linha['Descricao'];
	 $tempData=$linha['DataDeCriacao'];
	

		?>
		<tr><td><?  echo "<a href=\"DadosDoAcervo.php?id_acervo=".$id_Acervo."\">".$nome_acervo."</a>";?></td>
		 <td> <?  echo "<a href=\"EditarAcervo.php?id_acervo=".$id_Acervo."\"> Editar</a>"; ?></td>
	  <td> <?  echo "<a href=\"CrudAcervo.php?id_acervo=".$id_Acervo."& operacao=3\"> Apagar</a>"; ?></td></tr>
		
		

		<?
	
		}
		echo " </table>"; 
      

}

function BuscaUnitaria($pesquisar,$operacao,$link){

	
	$QueryBusca = "SELECT id_acervo, nome_acervo, Descricao, DataDeCriacao FROM acervo where nome_acervo like '%$pesquisar%'";
	//echo $QueryBusca;
	$query=mysqli_query($link,$QueryBusca);
	?>
		
	<table border=1>
		<tr><th>Nome do Acervo</th><th>Descricao</th><th>Data De Criação</th></tr>
	<?
	
	while($linhaBusca=mysqli_fetch_assoc($query))
	{
		
		$nome_acervo=$linhaBusca['nome_acervo'];
		$Descricao=$linhaBusca['Descricao'];
		$tempData=$linhaBusca['DataDeCriacao'];
		?>
		<tr><td><?  echo $nome_acervo;?></td>
		<td><?  echo $Descricao;?></td>
		<td><?  echo $tempData;?></td>
		
		</tr>
		
		<?
		
		
		}
		
    }
?>