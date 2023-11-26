<?php

use HaronMoreira\BebidasChabas\services\CadastraGasto;

require '../vendor/autoload.php';

if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $nomeArquivo = $_FILES['photo']['name'];
    $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR . $nomeArquivo;

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $caminhoArquivo)) {
        error_log("Upload bem-sucedido: " . $caminhoArquivo);
    } else {
        error_log("Erro ao mover o arquivo.");
    }
} else {
    echo "Erro no upload do arquivo.";
    $nomeArquivo = "";
}

$gasto = htmlspecialchars($_POST['gasto']);

if (str_contains($gasto, ",") || str_contains($gasto, ".")) {
    $gasto = str_replace([",","."], "", $gasto);
} else {
    $gasto .= "00";
}

if (CadastraGasto::Post(intval($gasto), $nomeArquivo, htmlspecialchars($_POST['descricao']))) {
    header("location: /relatorios.php");
} else {
    echo "<script>alert('Ops, infelizmente algo deu errado.'); location.href = '/relatorios.php'</script>";
}