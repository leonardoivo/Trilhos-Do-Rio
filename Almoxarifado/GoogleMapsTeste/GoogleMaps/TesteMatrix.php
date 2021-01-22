<!DOCTYPE html>
<html>
<body>

<?php
$cars = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );
    
    $a=count($cars);
    
    
    
for ($row = 0; $row < $a; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  $b=count($cars[$row]);
  
  for ($col = 0; $col < $b; $col++) {
    echo "<li>".$cars[$row][$col]."</li>";
  }
  echo "</ul>";
}
//Eis um exemplo de um matriz 3x3 (três linhas por três colunas)
 
    $Matriz = array(array(59,56,47),
                 array(85,57,73),
                 array(15,23,32));
 
    // A linha abaixo imprime 23 na tela
 
    //veja a referência, terceira coluna e linha 2
 
    //Lembrando que a contagem do índice começa do zero!
 
    // Neste formato o primeiro colchete define a coluna
    // e o segundo colchete define a linha
//    echo $Matriz[2][1];

$matrizTotal=count($Matriz);
echo '<table>';
for($i=0;$matrizTotal>$i;$i++){
	$matrizParcial=count($Matriz[$i]);

	for($j=0;$matrizParcial>$j;$j++){
		
		echo '<tr><td>'.$Matriz[$i][$j].'</td></tr>';
		
		
		}
	
	
	}

echo '</table>';










?>

</body>
</html>
