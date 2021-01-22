<?php
$secao = $_GET[secao];
if ($page=="principal") {
include "principal.html";
} elseif ($page=="contato") {
include "contato.html";
} elseif (!$page) {
echo "Você deve escolher uma seção";
}
?>
