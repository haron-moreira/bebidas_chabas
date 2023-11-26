<?php


use HaronMoreira\BebidasChabas\services\UpdateGasto;

require '../vendor/autoload.php';

$gasto = htmlspecialchars($_POST['qtd']);

if (str_contains($gasto, ",") || str_contains($gasto, ".")) {
    $gasto = str_replace([",", "."], "", $gasto);
} else {
    $gasto .= "00";
}

if (UpdateGasto::Update(htmlspecialchars($_POST['id']), intval($gasto), htmlspecialchars($_POST['desc']))) {
    header("location: /relatorios.php");
} else {
    echo "<script>alert('Ops, infelizmente algo deu errado.'); location.href = '/relatorios.php'</script>";
}