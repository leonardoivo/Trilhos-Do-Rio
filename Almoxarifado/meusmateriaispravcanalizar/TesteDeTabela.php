<?php
$link=mysqli_connect("localhost","root","");


$db_selected = mysqli_select_db($link,"northwind");
$query=mysqli_query($link,"select * from customers");
$linha=mysqli_fetch_assoc($query);
?>
<html>
<head>
</head>
<body>
<table border=1>
	<tr><td>ID:</td><td>Cargo:</td></tr>
<?
$b=0;
$count=0;
$temp="";
$ind=1;

while($linha=mysqli_fetch_assoc($query)){
	
	
	
			echo $linha['CustomerID'];

	
	if($count==0){
		$id=$linha['CustomerID'];
		
		$count=$count+1;
		}

	if($count>0){
		     
		     if($id==$linha['CustomerID'])
		     {
			
			   $cargo =$linha['CompanyName'];
			   $temp=$cargo+1;
			   $nome=$linha['ContactName'];
			    $nome=count($nome);
			           $count=$count+1;
			           

			 }
		
		else{?>
		   <tr><td>h<?echo $id; ?></td> <!--Aqui só é impresso quando if($count==0) não for zero. -->
			<td><?echo $temp; ?></td>
			<td><?echo $nome; ?></td>
			</tr>

            <?	
             $temp=0;
             $cargo =$linha['CompanyName'];
			 $temp=$cargo+1;
			 $count=1;
             $id=$linha['CustomerID'];
             
             }
		
		   }
		
	?>
		   <tr><td><?echo $id; ?></td>
			<td><?echo $linha['CompanyName']; ?></td></tr>
<td><?echo $linha['ContactName']; ?></td></tr>
            <?	
			$ind++;

	}
	
?>

<tr><td><?echo "Fim: ".$id; ?></td>
			<td><?echo $temp; ?></td></tr>

</table>
</body>
</html>
