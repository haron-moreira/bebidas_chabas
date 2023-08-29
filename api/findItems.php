<?php


use HaronMoreira\BebidasChabas\components\GetSearchItems;

require '../vendor/autoload.php';

header("Content-type: application/json");

echo json_encode(GetSearchItems::GetSearchItems($_GET['search']));