<?php
session_start();


echo"<!DOCTYPE html>";
echo"<html>";
echo"<head>";
echo"<link href=\"../../Estilos/css/bootstrap.css\" rel=\"stylesheet\">"; 
echo "<link href=\" ../../Estilos/css/bootstrap-responsive.css\" rel=\"stylesheet\">" ;  
echo  "<link href=\" ../../Estilos/css/bootstrap-min.css\" rel=\"stylesheet\">" ;
echo "<!--Javascript -->";
echo  "<script src=\"../../Estilos/js/bootstrap.js\"</script>" ; 

echo   "<script src=\"../../ Estilos/js/bootstrap-min.js\" ></script>" ;
echo "</head>";
echo "<body>";

include("../../config.php");
$operacao=0;
$data_de_inclusao="";
$valor_arrecadado="";
$linhaBusca = 0;
$QtdReceitasCadastradas=0;  
$i=1;
$usuario=$_SESSION["usuario"];


  if(isset($usuario))
      {
    	echo "Receitas em geral";
	    echo "<form action=\"receita.php?operacao=1\" method=\"post\">";
	    echo "Receita: <input type=\"text\" name=\" pesquisar\">";
	    echo "<input type=\"submit\" name=\" Ver\">";
	    echo "  <button type=\"submit\" form action=\"receita.php?operacao=0\">Ver Todas</button>";
	    echo "</form>";
	    $pesquisar="";
	    $operacao=0;
 
		if(isset($_GET['operacao']))
	  {

	    	$operacao=$_GET['operacao'];

	   }

	if(isset($_POST['pesquisar']) && $operacao==1)
	{
		$pesquisar = $_POST['pesquisar'];
		$QueryBusca = "select rc.id_receita,rc.Valor, tr.nome_receita, rc.id_tipoRec,rc.id_financeiro,rc.data_de_inclusao from receita rc inner join tipo_receita tr on rc.id_tipoRec= tr.id_tipoRec where tr.nome_receita like '%$pesquisar%'";
		echo $QueryBusca;
		$query=mysqli_query($link,$QueryBusca);
		?>
			
		<table border=1>
			<tr><th>Nome do Livro</th><th>Valor</th><th>Data De cadastramento</th></tr>
		<?
		
		while($linhaBusca=mysqli_fetch_assoc($query))
		{
			
			$nome_receita=$linhaBusca['nome_receita'];
			$valor_arrecadado=$linhaBusca['Valor'];
			$data_de_inclusao=$linhaBusca['data_de_inclusao'];
			?>
			<tr><td><?  echo $nome_receita;?></td>
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

function VerTodos($link)
 {
	$queryGeral=mysqli_query($link,"select rc.id_receita,rc.Valor, tr.nome_receita, rc.id_tipoRec,rc.id_financeiro,rc.data_de_inclusao from receita rc inner join tipo_receita tr on rc.id_tipoRec= tr.id_tipoRec order by rc.data_de_inclusao desc");
	
	echo "<table border=1>";
	echo "<tr><th>ID</th>";
	echo "<th>Tipo de Receita</th>";
	echo "<th>Valor arrecadado</th>";
	echo "<th>Pertencente ao balanço</th>";
	echo "<th>Data de inclusão</th>";
	echo "<th>Editar</th>";
	echo "<th>Excluir</th></tr>";
	while($linha=mysqli_fetch_assoc($queryGeral))
	  {
	 $id_receita = $linha['id_receita'];
	 $nome_receita=$linha['nome_receita'];
	 $valor_arrecadado=$linha['Valor'];
	 $data_de_inclusao=$linha['data_de_inclusao'];
	 $id_financeiro =$linha['id_financeiro'];
	 


		?>
		
		<tr><td><?  echo "<a href=\"DadosReceita.php?id_receita=".$id_receita."\">".$id_receita."</a>";?></td>
		 
		
	 <td><?  echo $nome_receita; ?></td>
	 <td><?  echo $valor_arrecadado; ?></td>
	 <td><?  echo $id_financeiro; ?></td>
	 <td><?  echo $data_de_inclusao; ?></td>	 
		 
		 <td> <?  echo "<a href=\"EditarReceita.php?id_receita=".$id_receita."\"> Editar</a>"; ?></td>
	  <td> <?  echo "<a href=\"CrudReceita.php?id_receita=".$id_receita."& operacao=3\"> Apagar</a>"; ?></td></tr>
		
		

		<?
	//$QtdReceitasCadastradas= $i++;
	//$QtdReceitasCadastradas+=1;		
		}
		echo " </table>"; 
        //echo "Quantidade de livros cadastrados: ".$QtdReceitasCadastradas;

}

	echo "<a href=\"InserirReceita.php\"> Cadastrar Receita</a>   ";

	echo "<a href=\"../financeiro.php\" onclick='location.replace(\"financeiro.php\")'>voltar</a>   ";
	echo "<a href=\"../../index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";
?>
</body>
</html>