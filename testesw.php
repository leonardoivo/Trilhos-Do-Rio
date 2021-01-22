<?php



$url_data = "http://www.jucerja.rj.gov.br/wsrfbreginprod/ServiceReginRFB.asmx?op=ServiceWs09";
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
curl_setopt( $ch, CURLOPT_URL, $url_data);
curl_setopt ($ch, CURLOPT_POST, true);

$parametros = array(
    //  "idUnidade" => '3',
    //  "intervaloDuracao" => '10',
    //  "dataInicio" => "02/08/2016",
    //  "dataFim" => "04/08/2016",
    //  "horaInicio" => "08:00",
    //  "horaFim" => "22:00"
    "numCPF"=> "05248801745"
);

$data_Post = http_build_query($parametros); 

curl_setopt ($ch, CURLOPT_POSTFIELDS, $data_Post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
echo($result);
curl_close($ch);
//curl_close($ch);



?>