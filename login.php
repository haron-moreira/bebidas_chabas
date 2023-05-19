<!doctype html>
<html lang="pt-br">
<head>
    <title>Login | Indicadores Surf</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="shortcut icon" href="img/icons8-champanhe-100.png" type="image/x-icon">
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/login.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

</head>

<body class="text-center">
<form id="form" action="lib/validaLogin.php" method="POST" class="form-signin">
    <img class="mb-4" src="img/icons8-coquetel-100.png" alt="BebidasChabás" width="100" height="100">
    <h1 class="h3 mb-3 font-weight-normal">Faça Login</h1>
    <label for="inputEmail" class="sr-only">Login</label>
    <input type="text" name='inputUser' id="inputEmail" class="form-control" placeholder="Usuário" required autofocus>
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" name='inputPassword' id="inputPassword" class="form-control" placeholder="Senha" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <p class="mt-5 mb-3 text-muted">&copy; Bebidas Chabás 2023</p>
</form>
</body>


<script src="js/login.js"></script>
<!-- <script src="js/jquery/jquery-3.5.1.min.js"></script> -->
</html>
