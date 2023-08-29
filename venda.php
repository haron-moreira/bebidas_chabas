<?php

use HaronMoreira\BebidasChabas\components\DualListItems;
use HaronMoreira\BebidasChabas\components\Menu;
use HaronMoreira\BebidasChabas\services\Contador;
use HaronMoreira\BebidasChabas\services\GetLowProducts;
use HaronMoreira\BebidasChabas\services\GetProdutosCompra;
use HaronMoreira\BebidasChabas\services\SessionValidate;

require 'vendor/autoload.php';

if (!SessionValidate::Validar()) {
    header('location: login.php');
}

$low_products = GetLowProducts::GetLow();
$produtos_por_compra = GetProdutosCompra::GetProduct();
$nv_acesso = $_SESSION['nv_acesso'];
$nm_usuario = $_SESSION['nomeUsuario'];

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bebidas Chabás | Home</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="img/icons8-champanhe-100.png" alt="Bebidas Chabás" height="100" width="100">
    </div>

    <!-- Navbar -->

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>


        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fas fa-cog"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                    <span class="dropdown-item dropdown-header"><?php echo $nm_usuario; ?></span>
                    <div class="dropdown-divider"></div>
                    <a href="my_account.php" class="dropdown-item">
                        <i class="fas fa-user-circle mr-2"></i> Minha Conta
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="lib/logOut.php" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> Sair
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php echo Menu::EchoMenu($nv_acesso)?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <h2 class="text-center display-4">Nova Venda</h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div id="form1">
                            <div class="input-group">
                                <input id="produto" type="search" class="form-control form-control-lg" placeholder="Procure por um produto para iniciar a venda">
                                <div class="input-group-append">
                                    <button id="submitBtn" type="button" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <ul style="list-style-type: none" class="mt-2" id="autocompleteList">
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 offset-md-2 mt-4">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Itens para venda</h3>

                                <div class="card-tools">
                                    <button onclick="removeall()" type="button" class="btn btn-tool">
                                        <i class="fas fa-times"></i> Reset
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div style="overflow: auto" class="col-12">
                                        <table style="overflow: auto" id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nome do Produto</th>
                                                <th>Valor Unitário (R$)</th>
                                                <th>Quantidade Selecionada</th>
                                            </tr>
                                            </thead>
                                            <tbody id="tbody">

                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer card-header">
                                <b id="footer"></b>
                                    <div class="card-tools">
                                        <button onclick="concluir()" type="button" class="btn btn-success">
                                            <i class="fas fa-check-circle"></i> Concluir
                                        </button>
                                    </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Venda -->
<script src="js/venda.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<script>

</script>
</body>
</html>
