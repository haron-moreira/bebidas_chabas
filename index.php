<?php

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
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Home</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo Contador::getVendasHoje();?></h3>

                                <p>Vendas Hoje</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-cash"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo Contador::getQtdTotalProdutos(); ?></h3>

                                <p>Produtos Cadastrados</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo Contador::getPoucoEstoque(); ?></h3>

                                <p>Poucos Produtos (menos de 20)</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-arrow-down-a"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo Contador::getSemEstoque(); ?></h3>

                                <p>Sem estoque</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-remove-circle"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <!-- AREA CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Quantidade de produtos por compra</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 394px;" width="492" height="312" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col (LEFT) -->
                    <div class="col-md-6">
                        <!-- DONUT CHART -->
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Top 6 com menos estoque (ainda não zerado)</h3>
                            </div>
                            <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 394px;" width="492" height="312" class="chartjs-render-monitor"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col (RIGHT) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
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
    $(function () {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        let produto_compra = `<?php echo $produtos_por_compra ;?>`;
        console.log(JSON.parse(produto_compra));

        let json_produto_compra = JSON.parse(produto_compra);

        var areaChartData = {
            labels  : [json_produto_compra[0].id_venda, json_produto_compra[1].id_venda, json_produto_compra[2].id_venda, json_produto_compra[3].id_venda, json_produto_compra[4].id_venda, json_produto_compra[5].id_venda, json_produto_compra[6].id_venda, json_produto_compra[7].id_venda, json_produto_compra[8].id_venda, json_produto_compra[9].id_venda],
            datasets: [
                {
                    label               : 'Produtos Comprados',
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : [json_produto_compra[0].qtd_produto, json_produto_compra[1].qtd_produto, json_produto_compra[2].qtd_produto, json_produto_compra[3].qtd_produto, json_produto_compra[4].qtd_produto, json_produto_compra[5].qtd_produto, json_produto_compra[6].qtd_produto, json_produto_compra[7].qtd_produto, json_produto_compra[8].qtd_produto, json_produto_compra[9].qtd_produto]
                },
            ]
        }

        var areaChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines : {
                        display : true,
                    }
                }],
                yAxes: [{
                    gridLines : {
                        display : true,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(areaChartCanvas, {
            type: 'line',
            data: areaChartData,
            options: areaChartOptions
        })

        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        let product = `<?php echo $low_products ;?>`;
        console.log(JSON.parse(product));

        let json_produtos = JSON.parse(product);

        var donutData        = {
            labels: [
                json_produtos[0].nome_produto,
                json_produtos[1].nome_produto,
                json_produtos[2].nome_produto,
                json_produtos[3].nome_produto,
                json_produtos[4].nome_produto,
                json_produtos[5].nome_produto,
            ],
            datasets: [
                {
                    data: [json_produtos[0].qtd_estoque,json_produtos[1].qtd_estoque,json_produtos[2].qtd_estoque,json_produtos[3].qtd_estoque,json_produtos[4].qtd_estoque,json_produtos[5].qtd_estoque],
                    /*data: [1,2,3,4,5,6],*/
                    backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }
            ]
        }
        var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

    })
</script>
</body>
</html>
