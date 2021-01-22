<!DOCTYPE html>

<html>
<head></head>
<body>

<?php
include("../../config.php");

	
	$operacao=0;
	$tempData="";
	$tempDataautor="";
	$autor="";
	$linhaBusca = 0;
	$QtdObjetosCadastrados=0;
    
	$i=1;
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
	echo "Objetos cadastrados";
	echo "<form action=\"objetos.php?operacao=1\" method=\"post\">";
	echo "Livro: <input type=\"text\" name=\" pesquisar\">";
	echo "<input type=\"submit\" name=\" Ver\">";
	echo "  <button type=\"submit\" formaction=\"objetos.php?operacao=0\">Ver Todos</button>";

	echo "</form>";

	
	
	$pesquisar="";
	$operacao=0;
	
	if(isset($_GET['operacao'])){

		$operacao=$_GET['operacao'];

	}
  
	if( $operacao==1)
	{
		$pesquisar = $_POST['pesquisar'];
		buscaUnitaria($pesquisar,$operacao,$link);
	
	}

	else if($operacao==0){
	
		VerTodos($link);
	}


	
	}
	else{
		
		header("Location:../login.html");
		
		}
		if(isset($_REQUEST["saida"])){

		
			session_unset();
			session_destroy();
			header("Location:../ login.html");
			
		}

function VerTodos($link){
	$queryGeral=mysqli_query($link,"SELECT id_objeto, nome_objeto, autor, data_de_coleta FROM objeto order by data_de_coleta asc");
	
	echo "<table border=1>";
	echo "<tr><th>Nome do Objeto</th>";
	echo "<th>Editar</th>";
	echo "<th>Excluir</th></tr>";
	while($linha=mysqli_fetch_assoc($queryGeral))
	  {
	 $id_objeto = $linha['id_objeto'];
	 $nome_objeto=$linha['nome_objeto'];
	 $autor=$linha['autor'];
	 $tempData=$linha['data_de_coleta'];
	

		?>
		<tr><td><?  echo "<a href=\"DadosObjeto.php?id_objeto=".$id_objeto."\">".$nome_objeto."</a>";?></td>
		 <td> <?  echo "<a href=\"EditarObjeto.php?id_objeto=".$id_objeto."\"> Editar</a>"; ?></td>
	  <td> <?  echo "<a href=\"CrudObjetos.php?id_objeto=".$id_objeto."& operacao=3\"> Apagar</a>"; ?></td></tr>
		
		

		<?
	//$QtdLivrosCadastrados= $i++;
	//$QtdLivrosCadastrados+=1;		
		}
		echo " </table>"; 
        //echo "Quantidade de livros cadastrados: ".$QtdLivrosCadastrados;

}

function buscaUnitaria($pesquisar,$operacao,$link){

		$QueryBusca = "SELECT id_objeto, nome_objeto, autor, data_de_coleta FROM objeto where nome_objeto like '%$pesquisar%'";
		echo $QueryBusca;
		$query=mysqli_query($link,$QueryBusca);
		?>
			
		<table border=1>
			<tr><th>Nome do Objeto</th><th>autor</th><th>Data Da Coleta</th></tr>
		<?
		
		while($linhaBusca=mysqli_fetch_assoc($query))
		{
			
			$nome_objeto=$linhaBusca['nome_objeto'];
			$autor=$linhaBusca['autor'];
			$tempData=$linhaBusca['data_de_coleta'];
			?>
			<tr><td><?  echo $nome_objeto;?></td>
			<td><?  echo $autor;?></td>
			<td><?  echo $tempData;?></td>
			
			</tr>
			
			<?
			
			
			}
			
		?>
		
		</table>
		
	<?
	
	
}







	echo "<a href=\"InserirObjetos.php\"> Cadastrar Objetos</a>   ";

	echo "<a href=\"../acervo.php\" onclick='location.replace(\"acervo.php\")'>voltar</a>   ";
	echo "<a href=\"../../index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";
?>
</body>
</html>