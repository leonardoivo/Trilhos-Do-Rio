<?php
function curlExec($url, $post = NULL, array $header = array()){
 
    //Inicia o cURL
    $ch = curl_init($url);
 
    //Pede o que retorne o resultado como string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
    //Envia cabeçalhos (Caso tenha)
    if(count($header) > 0) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }
 
    //Envia post (Caso tenha)
    if($post !== null) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
 
    //Ignora certificado SSL
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
    //Manda executar a requisição
    $data = curl_exec($ch);
 
    //Fecha a conexão para economizar recursos do servidor
    curl_close($ch);
 
    //Retorna o resultado da requisição
 
    return $data;
}

$cnpj = "01432667000126";

$teste = curlExec("http://www.jucerja.rj.gov.br/wsrfbreginprod/ServiceReginRFB.asmx?WSDL".$cnpj);


$obj = json_decode($teste);

//busca a atividade principal
$atividade_principal = $obj->atividade_principal;
foreach ($atividade_principal as $a) {
   echo "atividade: $a->text  -  $a->code </br>"; 
}

//busca a data da situaçao
$data_situacao = $obj->data_situacao;
echo "Data de situação: $data_situacao </br>";

//busca o tipo = Matriz/filial
$tipo = $obj->tipo;
echo "Tipo: $tipo </br>";

//busca o nome
$nome = $obj->nome;
echo "Nome: $nome </br>";

//busca as atividades secundárias
$atividades_secundarias = $obj->atividades_secundarias;
echo "Atividades secundárias: </br>";

foreach ($atividades_secundarias as $a){
   echo "$a->text : $a->code </br>";
}
?>
