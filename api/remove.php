<?php

use HaronMoreira\BebidasChabas\services\RemoveGasto;

require '../vendor/autoload.php';

if (RemoveGasto::Delete($_GET['id'])) {
    header("location: /relatorios.php");
} else {
    echo "<script>alert('Ops, infelizmente algo deu errado.'); location.href = '/relatorios.php'</script>";
}