<?php
include("../config.php");
include("../VerAcesso.php");
session_start();
$usuario=$_SESSION["usuario"];
$operacao=0;
$tempData="";
$tempDatamarca="";
$editora="";
$linhaBusca = 0;
$QtdLivrosCadastrados=0;
$i=1;
$Departamento= "Patrimonio";
$acao=1;
if(isset($usuario)){

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
	
	echo "Bens cadastrados";
	echo "<form action=\"livros.php?operacao=1\" method=\"post\">";
	echo "Livro: <input type=\"text\" name=\" pesquisar\">";
	echo "<input type=\"submit\" name=\" Ver\">";
	echo "  <button type=\"submit\" formaction=\"livros.php?operacao=0\">Ver Todos</button>";

	echo "</form>";

	
	RegistrarAcesso($usuario,$Departamento,$acao,$link);
	
	
	$pesquisar="";
	$operacao=0;
	
	if(isset($_GET['operacao'])){

		$operacao=$_GET['operacao'];

	}

	if(isset($_POST['pesquisar']) && $operacao==1)
	{
		$pesquisar = $_POST['pesquisar'];
		$QueryBusca = "SELECT id_patrimonio, nome_do_bem, marca, data_de_integracao FROM livros where nome_do_bem like '%$pesquisar%'";
		echo $QueryBusca;
		$query=mysqli_query($link,$QueryBusca);
		?>
			
		<table border=1>
			<tr><th>Nome do Livro</th><th>marca</th><th>Data De cadastramento</th></tr>
		<?
		
		while($linhaBusca=mysqli_fetch_assoc($query))
		{
			
			$nome_do_bem=$linhaBusca['nome_do_bem'];
			$editora=$linhaBusca['marca'];
			$tempData=$linhaBusca['data_de_integracao'];
			?>
			<tr><td><?  echo $nome_do_bem;?></td>
			<td><?  echo $editora;?></td>
			<td><?  echo $tempData;?></td>
			
			</tr>
			
			<?
			
			
			}
			
		?>
		
		</table>
		
	<?
	
	}
	//isset($_POST['pesquisar']) && $_POST['pesquisar'] == ""
	else if($operacao==0){
	
		VerTodos($link);
	}


	
	}
	else if (!isset($usuario))
      {

      if (headers_sent())
         {

          die("O redirecionamento falhou. Por favor, clique neste link: <a href=...>");
         }
  
     }
      if(isset($_REQUEST["saida"]))
     {
          session_unset();
          session_destroy();
          header("Location:../TDR/login.html");
          exit(header("Location:../TDR/login.htmll"));
      }

function VerTodos($link)
  {
	$queryGeral=mysqli_query($link,"SELECT id_patrimonio, nome_do_bem, marca, data_de_integracao FROM patrimonio order by data_de_integracao asc");
	
	echo "<table border=1>";
	echo "<tr><th>Nome do Bem</th>";
	echo "<th>Editar</th>";
	echo "<th>Excluir</th></tr>";
	while($linha=mysqli_fetch_assoc($queryGeral))
	  {
	 $id_Livro = $linha['id_patrimonio'];
	 $nome_do_bem=$linha['nome_do_bem'];
	 $editora=$linha['marca'];
	 $tempData=$linha['data_de_integracao'];
	

		?>
		<tr><td><?  echo "<a href=\"DadosPatrimonio.php?id_patrimonio=".$id_Livro."\">".$nome_do_bem."</a>";?></td>
		 <td> <?  echo "<a href=\"EditarPatrimonio.php?id_patrimonio=".$id_Livro."\"> Editar</a>"; ?></td>
	  <td> <?  echo "<a href=\"CrudPatrimonio.php?id_patrimonio=".$id_Livro."& operacao=3\"> Apagar</a>"; ?></td></tr>
		
		

		<?
	//$QtdLivrosCadastrados= $i++;
	//$QtdLivrosCadastrados+=1;		
		}
		echo " </table>"; 
        //echo "Quantidade de livros cadastrados: ".$QtdLivrosCadastrados;

}

	echo "<a href=\"InserirPatrimonio.php\"> Cadastrar Bem</a>   ";

	echo "<a href=\"../index.php\" onclick='location.replace(\"index.php\")'>voltar</a>   ";
	echo "<a href=\"index.php?saida=1\" onclick='location.replace(\"login.html\")'> Sair</a>";
?>
</body>
</html>