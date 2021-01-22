<?php
$link=mysqli_connect("localhost","root","784512");


$db_selected = mysqli_select_db($link,"tim_sag_cake");
$query=mysqli_query($link,"select * from usuarios");
$linha=mysqli_fetch_assoc($query);
?>
<html>
<head>
</head>
<body>
<table border=1>
	<tr><td>ID:</td><td>Cargo:</td><td>Nome:</td></tr>
<?
$b=0;
$count=0;
$temp="";
$ind=0;

while($linha=mysqli_fetch_assoc($query)){
	
	
	
			//echo $linha['id'];

	
	if($count==0){
		$id=$linha['id'];
		
		$count=$count+1;
		}

	if($count>0){
		     
		     if($id==$linha['id'])
		     {
			
			   $cargo =$linha['cargo_id'];
			   $temp=$cargo+1;
			   $nome=$linha['username'];
			   $nome=count($nome);
			   $id=$linha['id'];
			   $count=$count+1;
			           

			 }
		
		else{?>
		   <tr><td><strong>SomaParcial:</strong><?echo $id; ?></td>
			<td>Parcial Cargo:<?echo $temp; ?></td>
			<td>Nome Parcial:<?echo $nome; ?></td>
			</tr>

            <?	
             $temp=0;
             $cargo =$linha['cargo_id'];
			 $temp=$cargo+1;
			 $count=1;
             $id=$linha['id'];
             
             }
		
		   }
		
	?>
		   <tr><td><?echo $id; ?></td>
		   <td><?echo $linha['cargo_id']; ?></td>
           <td><?echo $linha['username']; ?></td></tr>
           <td><? echo $linha['created']?></td>
            <?	
			$ind++;

	}
	
?>

<tr><td><?echo "Fim: ".$id; ?></td>
			<td><?echo $temp; ?></td></tr>

</table>
<?$date = new DateTime('2000-01-01 00:00:00 ');
echo $date->format('Y-m-d ');?>
</body>
</html>
