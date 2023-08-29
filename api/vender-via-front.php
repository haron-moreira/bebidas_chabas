<?php

use HaronMoreira\BebidasChabas\components\GetSearchItems;
use HaronMoreira\BebidasChabas\services\VenderViaFront;

require '../vendor/autoload.php';

header("Content-type: application/json");

echo json_encode(VenderViaFront::Vender($_POST['produtos']));