<?php

use HaronMoreira\BebidasChabas\services\GerarRelatorioVendas;

require '../vendor/autoload.php';

if (GerarRelatorioVendas::Gerar()) {
    header("location: ../files/relatorio_vendas.csv");
    die();
} else {
    die("Erro ao baixar o relatório...");
}

