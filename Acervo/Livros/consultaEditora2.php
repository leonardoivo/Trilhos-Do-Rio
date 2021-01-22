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

//$data_do_email=$linha['data_do_email'];




if($count2==0){
	$tempDataEditora=$linha['data_do_email'];
	
	$count2=$count2+1;
	
	}



if($count2==0||$count2>0){
if($countEditora%2==0)
{
	$tempEditora=$linha['Editora'];
	
	
	}
	
	if($countEditora%2!=0){
		
		$tempEditora2=$linha['Editora'];
		}
       
       if($tempDataEditora==$linha['data_do_email'])
       {
          if($tempEditora==$tempEditora2){
			
			$editora="";
			
			
			}
			else{
				
				$editora=$linha['Editora'];
				
				}
                }
                $tempDataEditora=$linha['data_do_email'];
              }



if($count==0)
{$tempData=$linha['data_do_email'];
$count=$count+1;
	
}
if($count>0){
	if($tempData==$linha['data_do_email']){
		
		$tempEditora=$linha['Editora'];
		$editora=$tempEditora;
		//$count=$count+1;
	   // $tempData=$linha['data_do_email'];
		}
		else{
			?>
			<tr><td>Total</td><td>1</td><td><? echo $tempData;?></td></tr>
			<?
			
			 $tempData=$linha['data_do_email'];
			
			 $count=1;
			
			  }
	
	}


	?>
	<tr><td><?  echo $nome_do_livro;?></td>
	<td><?  echo $editora;?></td>
	<td><?  echo $tempData;?></td>
	
	</tr>
	
	<?
	$countEditora=$countEditora+1;
	
	}

?>
</table>	
</body>
</html>
