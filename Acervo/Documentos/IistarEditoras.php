<?
//$dado_da_editora="Boitempo";	

//$consulta="SELECT nome_do_livro, Editora, data_do_email FROM ebooks_kobo where Editora like '%$dado_da_editora%' and data_do_email and nome_do_livro";
$link=mysqli_connect("localhost","root","784512");
$banco=mysqli_select_db($link,"ebooks_alterados");
$query=mysqli_query($link,"SELECT nome_do_livro, Editora, data_do_email FROM ebooks_kobo order by data_do_email asc");
$count=0;
$count2=0;
$tempData="";
$tempDataEditora="";
$editora="";
$tempEditora="";
$tempEditora2="";
$countEditora=0;

?>
<html><head></head><body>
	
<table border=1>
	<tr><th>Nome do Livro</th><th>Editora</th><th>Data Do Email</th></tr>
<?

while($linha=mysqli_fetch_assoc($query))
{
	
 $nome_do_livro=$linha['nome_do_livro'];
 $editora=$linha['Editora'];
 $tempData=$linha['data_do_email'];
	?>
	<tr><td><?  echo $nome_do_livro;?></td>
	<td><?  echo $editora;?></td>
	<td><?  echo $tempData;?></td>
	
	</tr>
	
	<?
	
	
	}

?>
</table>	
</body>
</html>
