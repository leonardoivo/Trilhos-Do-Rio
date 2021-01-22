<!DOCTYPE html>

<html>
<head>



</head>
<body>



<?php
include("../../config.php");

	
	$operacao=0;
	$data_de_inclusao="";
	$desc_cargo="";
	$linhaBusca = 0;
	$QtdDespesasCadastradas=0;
    
	$i=1;
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
	echo "Cargos da Trilhos do Rio";
	echo "<form action=\"cargos.php?operacao=1\" method=\"post\">";
	echo "Despesa: <input type=\"text\" name=\" pesquisar\">";
	echo "<input type=\"submit\" name=\" Ver\">";
	echo "  <button type=\"submit\" form action=\"despesa.php?operacao=0\">Ver Todas</button>";

	echo "</form>";

	
	 
	
	
	$pesquisar="";
	$operacao=0;
	
	if(isset($_GET['operacao'])){

		$operacao=$_GET['operacao'];

	}

	if(isset($_POST['pesquisar']) && $operacao==1)
	{
		$pesquisar = $_POST['pesquisar'];
		$QueryBusca = "select rc.id_cargo,rc.Valor, tr.nome_cargo, rc.id_TipoDesp,rc.id_financeiro,rc.data_de_inclusao from despesa rc inner join tipo_despesa tr on rc.id_TipoDesp= tr.id_TipoDesp where tr.nome_cargo like '%$pesquisar%'";
		echo $QueryBusca;
		$query=mysqli_query($link,$QueryBusca);
		?>
			
		<table border=1>
			<tr><th>Nome do Livro</th><th>Valor</th><th>Data De cadastramento</th></tr>
		<?
		
		while($linhaBusca=mysqli_fetch_assoc($query))
		{
			
			$nome_cargo=$linhaBusca['nome_cargo'];
			$desc_cargo=$linhaBusca['Valor'];
			$data_de_inclusao=$linhaBusca['data_de_inclusao'];
			?>
			<tr><td><?  echo $nome_cargo;?></td>
			<td><?  echo $desc_cargo;?></td>
			<td><?  echo $data_de_inclusao;?></td>
			
			</tr>
			
			<?
			
			
			}
			
		?>
		
		</table>
		
	<?
	
	}
	
	else if($operacao==0){
	
		VerTodos($link);
	}


	
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


function VerTodos($link){
	$queryGeral=mysqli_query($link,"SELECT cg.id_cargo id_cargo, cg.nome_cargo nome_cargo, cg.desc_cargo desc_cargo, us.nome nome	FROM cargos cg INNER JOIN usuarios us ON cg.id_usuario = us.id_usuario");
	
	echo "<table border=1>";
	echo "<tr><th>ID</th>";
	echo "<th>Cargo</th>";
	echo "<th>Descrição do cargo</th>";
	echo "<th> Titular</th>";
	echo "<th>Editar</th>";
	echo "<th>Excluir</th></tr>";
	while($linha=mysqli_fetch_assoc($queryGeral))
	  {
		$id_cargo = $linha['id_cargo'];
		$nome_cargo=$linha['nome_cargo'];
		$desc_cargo=$linha['desc_cargo'];
		 $nome =$linha['nome'];
   // $data_de_inclusao=$linha['data_de_inclusao'];
		
		

   
		   ?>
		   
		   <tr><td><?  echo "<a href=\"DadosDoCargo.php?id_cargo=".$id_cargo."\">".$id_cargo."</a>";?></td>
			
		   
		<td><?  echo $nome_cargo; ?></td>
		<td><?  echo $desc_cargo; ?></td>
		 <td><?  echo $nome; ?></td> 
			 
		 <td> <?  echo "<a href=\"EditarCargo.php?id_cargo=".$id_cargo."\"> Editar</a>"; ?></td>
		 <td> <?  echo "<a href=\"CrudCargos.php?id_cargo=".$id_cargo."& operacao=3\"> Apagar</a>"; ?></td></tr>
		 
		

		<?
	//$QtdDespesasCadastradas= $i++;
	//$QtdDespesasCadastradas+=1;		
		}
		echo " </table>"; 
        //echo "Quantidade de livros cadastrados: ".$QtdDespesasCadastradas;

}

	echo "<a href=\"InserirCargo.php\"> Criar Cargo</a>   ";

	echo "<a href=\"../administracao.php\" onclick='location.replace(\"administracao.php\")'>voltar</a>   ";
	echo "<a href=\"../../index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";
?>
</body>
</html>