<?php

include("../../config.php");

function VerTodos($link){
	$queryGeral=mysqli_query($link,"SELECT id_livros, nome_do_livro, Editora, dataDeCadastramento FROM livros order by dataDeCadastramento asc");
	
	echo "<table border=1>";
	echo "<tr><th>Nome do Livro</th>";
	echo "<th>Editar</th>";
	echo "<th>Excluir</th></tr>";
	while($linha=mysqli_fetch_assoc($queryGeral))
	  {
	 $id_Livro = $linha['id_livros'];
	 $nome_do_livro=$linha['nome_do_livro'];
	 $editora=$linha['Editora'];
	 $tempData=$linha['dataDeCadastramento'];
	

		?>
		<tr><td><?  echo "<a href=\"DadosDoLivro.php?id_livro=".$id_Livro."\">".$nome_do_livro."</a>";?></td>
		 <td> <?  echo "<a href=\"EditarLivro.php?id_livro=".$id_Livro."\"> Editar</a>"; ?></td>
	  <td> <?  echo "<a href=\"CrudLivro.php?id_livro=".$id_Livro."& operacao=3\"> Apagar</a>"; ?></td></tr>
		
		

		<?
	
		}
		echo " </table>"; 
      

}

function BuscaUnitaria($pesquisar,$operacao,$link){

	
	$QueryBusca = "SELECT id_livros, nome_do_livro, Editora, dataDeCadastramento FROM livros where nome_do_livro like '%$pesquisar%'";
	//echo $QueryBusca;
	$query=mysqli_query($link,$QueryBusca);
	?>
		
	<table border=1>
		<tr><th>Nome do Livro</th><th>Editora</th><th>Data De cadastramento</th></tr>
	<?
	
	while($linhaBusca=mysqli_fetch_assoc($query))
	{
		
		$nome_do_livro=$linhaBusca['nome_do_livro'];
		$editora=$linhaBusca['Editora'];
		$tempData=$linhaBusca['dataDeCadastramento'];
		?>
		<tr><td><?  echo $nome_do_livro;?></td>
		<td><?  echo $editora;?></td>
		<td><?  echo $tempData;?></td>
		
		</tr>
		
		<?
		
		
		}
		
    }
?>