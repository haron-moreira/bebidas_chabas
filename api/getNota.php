<?php

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="arquivo.pdf"');


use HaronMoreira\BebidasChabas\components\GeraPdfNotaVenda;

require '../vendor/autoload.php';

GeraPdfNotaVenda::reportaVenda(json_decode($_GET['compra'], 1));