<?php

use HaronMoreira\BebidasChabas\services\GenerateXlsx;
use HaronMoreira\BebidasChabas\services\GetRelatorioGasto;
use HaronMoreira\BebidasChabas\services\GetRelatorioVendas;

require '../vendor/autoload.php';

if (GenerateXlsx::Gen(GetRelatorioGasto::Get(), GetRelatorioVendas::Get())) {
    header("location: ../files/faturamento.xlsx");
    die();
} else {
    die("Erro ao baixar o relatório...");
}

