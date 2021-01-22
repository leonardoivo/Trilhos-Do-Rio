<?php
$lat_inicial=$_POST['latInicial'];
$long_inicial=$_POST['longInicial'];
$lat_final=$_POST['latFinal'];
$long_final=$_POST['longFinal'];

function calcDistancia($lat_inicial, $long_inicial, $lat_final, $long_final)
{
    $d2r = 0.017453292519943295769236;

    $dlong = ($long_final - $long_inicial) * $d2r;
    $dlat = ($lat_final - $lat_inicial) * $d2r;

    $temp_sin = sin($dlat/2.0);
    $temp_cos = cos($lat_inicial * $d2r);
    $temp_sin2 = sin($dlong/2.0);

    $a = ($temp_sin * $temp_sin) + ($temp_cos * $temp_cos) * ($temp_sin2 * $temp_sin2);
    $c = 2.0 * atan2(sqrt($a), sqrt(1.0 - $a));

    return 6368.1 * $c;
}
$Kmtemp= calcDistancia($lat_inicial, $long_inicial, $lat_final, $long_final);
//$Kmtemp2=$Kmtemp;
//$Kmtemp = calcDistancia($lat_inicial, $long_inicial, $lat_final, $long_final);
//$Kmtemp2+=$Kmtemp;
//$Kmtemp3+=$Kmtemp;
$KilometragemFinal+=$Kmtemp;




 



?>

<!DOCTYPE  html>
<html>
<head>
</head>
<body>
<form action="CalCularDistancia.php" method="POST">
Latitude inicial:<input type="text" name="latInicial" > <br/>
Longitude inicial:<input type="text" name="longInicial"> <br/>
Latitude final:<input type="text" name="latFinal"> <br/>
Longitude final:<input type="text" name="longFinal">  <br/>
<input type="submit" value="calcular">

</form>
<?php 
 echo "Kilometragem: ".$KilometragemFinal;

?>
</body>
</html>
