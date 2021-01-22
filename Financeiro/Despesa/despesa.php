<!DOCTYPE html>

<html>
<head>
<link href="../../Estilos/css/bootstrap.css" rel="stylesheet">
    <link href="../../Estilos/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../../Estilos/css/bootstrap-min.css" rel="stylesheet">
    <!--Javascript -->
     <script src="../../Estilos/js/bootstrap.js"></script>
      <script src="../../Estilos/js/bootstrap-min.js"></script>


</head>
<body>



<?php
include("../../config.php");

	
	$operacao=0;
	$data_de_inclusao="";
	$valor_arrecadado="";
	$linhaBusca = 0;
	$QtdDespesasCadastradas=0;
    
	$i=1;
session_start();
$usuario=$_SESSION["usuario"];
if(isset($usuario)){
	echo "Despesas em geral";
	echo "<form action=\"despesa.php?operacao=1\" method=\"post\">";
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
		$QueryBusca = "select rc.id_despesa,rc.Valor, tr.nome_despesa, rc.id_TipoDesp,rc.id_financeiro,rc.data_de_inclusao from despesa rc inner join tipo_despesa tr on rc.id_TipoDesp= tr.id_TipoDesp where tr.nome_despesa like '%$pesquisar%'";
		echo $QueryBusca;
		$query=mysqli_query($link,$QueryBusca);
		?>
			
		<table border=1>
			<tr><th>Nome do Livro</th><th>Valor</th><th>Data De cadastramento</th></tr>
		<?
		
		while($linhaBusca=mysqli_fetch_assoc($query))
		{
			
			$nome_despesa=$linhaBusca['nome_despesa'];
			$valor_arrecadado=$linhaBusca['Valor'];
			$data_de_inclusao=$linhaBusca['data_de_inclusao'];
			?>
			<tr><td><?  echo $nome_despesa;?></td>
			<td><?  echo $valor_arrecadado;?></td>
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
	else{
		
		header("Location:../login.html");
		
		}
		if(isset($_REQUEST["saida"])){

			//session_unset();
			// session_destroy();
		//	if (headers_sent()) {
		  //  die("O redirecionamento falhou. Por favor, clique neste link: <a href=...>");
		  //   }
		  //  else{
			session_unset();
			session_destroy();
			header("Location:../ login.html");
			 //exit(header("Location: login.html"));
		   //}
	
	
		}

function VerTodos($link){
	$queryGeral=mysqli_query($link,"select rc.id_despesa,rc.Valor,tr.nome_despesa, rc.id_TipoDesp,rc.id_financeiro,rc.data_de_inclusao from despesa rc inner join tipo_despesa tr on rc.id_TipoDesp= tr.id_TipoDesp order by rc.data_de_inclusao desc");
	
	echo "<table border=1>";
	echo "<tr><th>ID</th>";
	echo "<th>Tipo de Despesa</th>";
	echo "<th>Valor descontado</th>";
	echo "<th>Pertencente ao balanço</th>";
	echo "<th>Data de inclusão</th>";
	echo "<th>Editar</th>";
	echo "<th>Excluir</th></tr>";
	while($linha=mysqli_fetch_assoc($queryGeral))
	  {
		$id_despesa = $linha['id_despesa'];
		$nome_despesa=$linha['nome_despesa'];
		$valor_arrecadado=$linha['Valor'];
		$data_de_inclusao=$linha['data_de_inclusao'];
		$id_financeiro =$linha['id_financeiro'];
		

   
		   ?>
		   
		   <tr><td><?  echo "<a href=\"DadosDespesa.php?id_despesa=".$id_despesa."\">".$id_despesa."</a>";?></td>
			
		   
		<td><?  echo $nome_despesa; ?></td>
		<td><?  echo $valor_arrecadado; ?></td>
		<td><?  echo $id_financeiro; ?></td>
		<td><?  echo $data_de_inclusao; ?></td>	 
		 <td> <?  echo "<a href=\"EditarDespesa.php?id_despesa=".$id_despesa."\"> Editar</a>"; ?></td>
		 <td> <?  echo "<a href=\"CrudDespesa.php?id_despesa=".$id_despesa."& operacao=3\"> Apagar</a>"; ?></td></tr>
		 
		

		<?
	//$QtdDespesasCadastradas= $i++;
	//$QtdDespesasCadastradas+=1;		
		}
		echo " </table>"; 
        //echo "Quantidade de livros cadastrados: ".$QtdDespesasCadastradas;

}

	echo "<a href=\"InserirDespesa.php\"> Cadastrar Despesa</a>   ";

	echo "<a href=\"../financeiro.php\" onclick='location.replace(\"financeiro.php\")'>voltar</a>   ";
	echo "<a href=\"../../index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";
?>
</body>
</html>