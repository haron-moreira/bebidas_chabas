<?php

use HaronMoreira\BebidasChabas\components\GeraPdfNotaVenda;

require 'vendor/autoload.php';

$json = json_decode('{"soma":3546,"produtos":{"32":{"name":"Suco de laranja","quantidade":"2","valor_unitario":"1773"}}}',1);

GeraPdfNotaVenda::reportaVenda($json);