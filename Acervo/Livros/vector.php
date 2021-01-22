<html>
<head></head>
<body>
<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
$lista = array('um','dois','tres','quatro'=>array(5=>"cinco",6=>"seis"));

foreach($lista as $a){
	
	echo $a."<br/>";
	if(is_array($a)){
		foreach($a as $b)
		{
		echo "<table border=1> ";
		echo "<tr><td>".$b."</td></tr>";
		echo "</table>";
		}
		
		
		}
		//else{
		//	echo $a."<br/>";
			
			//}
	
	
	}

?>

</body>
</html>
