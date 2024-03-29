<?php

use HaronMoreira\BebidasChabas\components\TableCaderneta;
use HaronMoreira\BebidasChabas\components\TableEstoque;
use HaronMoreira\BebidasChabas\services\SessionValidate;
use HaronMoreira\BebidasChabas\components\Menu;

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
    <title>Bebidas Chabás | Produtos</title>

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
            <!-- Navbar Search -->




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
                        <h1 class="m-0">Ver Produtos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-block btn-primary float-sm-right" style="width: fit-content">Cadastrar novo</button>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">


            <div class="modal fade" id="modal-default_2" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Desativar estoque de produto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">Tem certeza que deseja desativar?</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="form-remove" action="lib/desativa_produto.php" method="post">
                                    <div class="card-body">
                                        <input type="hidden" value="" id="id_produto_remove" name="id_produto_remove">
                                        <div class="form-group">
                                            <label for="nome_produto_remove">Nome do Produto</label>
                                            <input type="text" class="form-control" readonly id="nome_produto_remove" name="nome_produto_remove" placeholder="Vodka Absolut">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-danger" form="form-remove">Desativar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


            <div class="modal fade" id="modal-default_4" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Ativar estoque de produto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Tem certeza que deseja ativar?</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="form-ativa" action="lib/ativa_produto.php" method="post">
                                    <div class="card-body">
                                        <input type="hidden" value="" id="id_produto_ativa" name="id_produto_ativa">
                                        <div class="form-group">
                                            <label for="nome_produto_ativa">Nome do Produto</label>
                                            <input type="text" class="form-control" readonly id="nome_produto_ativa" name="nome_produto_ativa" placeholder="Vodka Absolut">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success" form="form-ativa">Ativar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


            <div class="modal fade" id="modal-default_3" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Atualizar estoque de produto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Deseja mesmo alterar o produto?</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="form-atualiza" action="lib/atualizar_estoque.php" method="post">
                                    <div class="card-body">
                                        <input type="hidden" value="" id="id_produto_atualiza" name="id_produto_atualiza">
                                        <div class="form-group">
                                            <label for="nome_produto_atualiza">Nome do Produto</label>
                                            <input type="text" class="form-control" readonly id="nome_produto_atualiza" name="nome_produto_atualiza" placeholder="Vodka Absolut">
                                        </div>
                                        <div class="form-group">
                                            <label for="qtd_atual">Quantidade Atual</label>
                                            <input type="text" class="form-control" readonly id="qtd_atual" name="qtd_atual" placeholder="1">
                                        </div>
                                        <div class="form-group">
                                            <label for="qtd_recebida">Quantidade Para Adicionar</label>
                                            <input type="number" min="0" class="form-control" id="qtd_recebida" name="qtd_recebida" placeholder="100">
                                        </div>
                                        <div class="form-group">
                                            <label for="valor_unitario">Valor</label>
                                            <input type="text" class="form-control" id="valor_unitario" name="valor_unitario">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" form="form-atualiza">Renovar Estoque</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>



            <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Cadastrar novo produto</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Insira os dados</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form id="form-cadastro" action="lib/cadastra_produto.php" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nome_produto">Nome do Produto</label>
                                            <input type="text" class="form-control" id="nome_produto" name="nome_produto" placeholder="Vodka Absolut">
                                        </div>
                                        <div class="form-group">
                                            <label for="nome_fabricante">Nome do Fabricante</label>
                                            <input type="text" class="form-control" id="nome_fabricante" name="nome_fabricante" placeholder="Absolut Company">
                                        </div>
                                        <div class="form-group">
                                            <label for="qtd">Quantidade em Estoque</label>
                                            <input type="text" class="form-control" id="qtd" name="qtd" placeholder="1000">
                                        </div>
                                        <div class="form-group">
                                            <label for="tipo_volume">Tipo de Volume</label>
                                            <select class="form-control" name="tipo_volume" id="tipo_volume">
                                                <option value="">Selecione</option>
                                                <option value="ML">ML</option>
                                                <option value="Unidades">Unidade</option>
                                                <option value="Gramas">Gramas</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="qtd_volume">Quantidade de Volume (cada unidade do produto)</label>
                                            <input type="number" class="form-control" id="qtd_volume" name="qtd_volume" placeholder="1000 ML / 1000 Unidade / 1000 Gramas">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" form="form-cadastro">Salvar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Abaixo estão todos os produtos com cadastro na loja</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body overflow-auto">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Valor da Compra</th>
                                        <th>Quantidade de Produtos</th>
                                        <th>Data de Compra</th>
                                        <th>Pago?</th>
                                        <th>Responsável</th>
                                        <th>Telefone</th>
                                        <th>E-mail</th>
                                        <th>Registrar Pagamento</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php TableCaderneta::EchoTable();?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Valor da Compra</th>
                                        <th>Quantidade de Produtos</th>
                                        <th>Data de Compra</th>
                                        <th>Pago?</th>
                                        <th>Responsável</th>
                                        <th>Telefone</th>
                                        <th>E-mail</th>
                                        <th>Registrar Pagamento</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
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
<script src="js/gerenciar_produto.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": false, "lengthChange": false, "autoWidth": false, "ordering": false,
            "language": {
                "lengthMenu": " _MENU_ resultados por página",
                "zeroRecords": "Nada encontrado para a busca",
                "info": "Mostrando página _PAGE_ de _PAGES_ | (_MAX_ registros totais)",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(Filtrado de _MAX_ registros totais)",
                "search": "Filtrar:"

            }
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    function pagar(id) {
        const retorno = fetch(`/api/pagar/${id}`);

        retorno.then(() => {

        })

        $.ajax({
            url: `/api/pagar.php?id=${id}`,
            method: 'PUT',
            dataType: 'json'
        })
            .always(function(result) {

                switch (result.status) {
                    case 200:
                        alert("Pagamento cadastrado.");
                        location.reload();
                        break;

                    default:
                        alert("Erro interno");
                        break;
                }
            });
    }
</script>
</body>
</html>
