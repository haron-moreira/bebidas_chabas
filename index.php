<?php

require_once 'vendor/autoload.php';

use HaronMoreira\BebidasChabas\components\TableEstoque;

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estoque</title>

    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
</head>
<body>



<div class="container">

    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <img src="img/icons8-champanhe-100.png" width="40" height="40" alt="Logo">
            </a>
        </div>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Inicio</a></li>
            <li><a href="#" class="nav-link px-2">Consultar Estoque</a></li>
            <li><a href="#" class="nav-link px-2">Ver Usuários</a></li>
        </ul>
        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">Novo Pedido</button>
            <button type="button" class="btn btn-primary">Sair</button>
        </div>
    </header>
    <h1>Bebidas Chabás</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome do Produto</th>
            <th scope="col">Fabricante</th>
            <th scope="col">Quantidade em Estoque</th>
        </tr>
        </thead>
        <tbody>
        <?php TableEstoque::EchoTable();  ?>
        </tbody>
    </table>

</div>

</body>
</html>