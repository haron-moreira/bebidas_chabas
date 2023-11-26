<?php

use HaronMoreira\BebidasChabas\components\Menu;
use HaronMoreira\BebidasChabas\components\TableGastos;
use HaronMoreira\BebidasChabas\services\GetGastoMesCash;
use HaronMoreira\BebidasChabas\services\GetLucroSomaMesCash;
use HaronMoreira\BebidasChabas\services\GetVendasHojeCash;
use HaronMoreira\BebidasChabas\services\GetVendasMesCash;
use HaronMoreira\BebidasChabas\services\SessionValidate;

require 'vendor/autoload.php';

if (!SessionValidate::Validar()) {
    header('location: login.php');
}

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
                        <h1 class="m-0">Faturamento Mensal</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <a href="api/getFaturamento.php"><button class="btn btn-info float-sm-right"><i class="fa fa-download"></i>  Baixar relatório detalhado</button></a>
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
                                <h2><?php echo "R$ " . number_format(GetVendasHojeCash::Get(), 2, ",",".");?></h2>

                                <p>Vendas Hoje (R$)</p>
                            </div>
                            <!-- <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h2><?php echo "R$ " . number_format(GetVendasMesCash::Get(), 2, ",",".");?></h2>

                                <p>Vendas este mês (R$)</p>
                            </div>
                            <!-- <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h2><?php echo "R$ " . number_format(GetGastoMesCash::Get(), 2, ",",".");?></h2>

                                <p>Gasto este mês (R$)</p>
                            </div>
                            <!-- <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h2><?php echo "R$ " . number_format(GetLucroSomaMesCash::Get(), 2, ",",".");?></h2>

                                <p>Balanço do mês (R$)</p>
                            </div>
                            <!-- <a href="#" class="small-box-footer">Detalhes <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">

                    <div class="modal fade" id="modal-default_3" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Ajustar Gasto</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Atenção para os dados de ajuste</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form id="form-atualiza" action="api/atualizar_gasto.php" method="post">
                                            <div class="card-body">
                                                <input type="hidden" value="" id="id_faturamento" name="id">
                                                <div class="form-group">
                                                    <label for="qtd">Valor R$</label>
                                                    <input type="text" class="form-control" id="qtd" name="qtd" placeholder="Exemplo: 1200,00 ou 1200.00">
                                                </div>
                                                <div class="form-group">
                                                    <label for="desc">Descrição</label>
                                                    <input type="text" class="form-control" id="desc" name="desc" placeholder="Exemplo: Reposição de Vinho">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" form="form-atualiza">Ajustar Gasto</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    <div class="col-md-8 offset-md-2 mt-3">
                        <form method="POST" action="api/cadastrar_gasto.php" enctype="multipart/form-data">
                            <div class="d-flex flex-column w-100 align-content-center-center">
                                <div class="d-flex w-100 justify-content-center">
                                    <h3>Cadastrar novo gasto para este mês:</h3>
                                </div>
                                <div class="d-flex flex-column">
                                    <label class="mt-3" for="photo">Insira a foto da nota fiscal do gasto:</label>
                                    <input type="file" id="photo" name="photo" accept="image/*">

                                    <label class="mt-3" for="descricao">Descreva o motivo deste gasto:</label>
                                    <input class="form-control" id="descricao" type="text" name="descricao" placeholder="Exemplo: Reposição de Vinho">

                                    <label class="mt-3" for="gasto">Valor:</label>
                                    <input type="text" min="0" name="gasto" required id="gasto" class="form-control" placeholder="Exemplo: 1200,00 ou 1200.00">
                                    <button type="submit" class="btn btn-lg btn-info mt-3">
                                        <i class="fa fa-check-circle"></i> Registrar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8 offset-md-2 mt-5 overflow-auto">
                        <div class="d-flex justify-content-center">
                            <h3>Registro de Gastos</h3>
                        </div>
                        <table id="example1" class="table table-bordered table-striped overflow-auto">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Data de Registro</th>
                                <th>Motivo/Descrição</th>
                                <th>Valor Registrado</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php TableGastos::Table();?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Data de Registro</th>
                                <th>Motivo/Descrição</th>
                                <th>Valor Registrado</th>
                                <th>Ação</th>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
                <!-- /.row (main row) -->
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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": false, "lengthChange": false, "autoWidth": false,
            "language": {
                "lengthMenu": " _MENU_ resultados por página",
                "zeroRecords": "Nada encontrado para a busca",
                "info": "Mostrando página _PAGE_ de _PAGES_ | (_MAX_ registros totais)",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(Filtrado de _MAX_ registros totais)",
                "search": "Filtrar:"

            }, "ordering": false
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    function formdata(id) {
        document.getElementById("id_faturamento").value = id
    }
</script>
</body>
</html>
