<?php
include("../config.php");





function data() {
    $out['a'] = "abc";
    $out['b'] = "def";
    $out['c'] = "ghi";
    return $out;
}

$data = data();
echo $data['a'];
echo $data['b'];
echo $data['c'];





while($linha=data()){
    echo $data;



}




?>