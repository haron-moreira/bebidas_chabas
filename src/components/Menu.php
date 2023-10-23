<?php

namespace HaronMoreira\BebidasChabas\components;

class Menu
{
    public static function EchoMenu($nv_acesso): string
    {
        switch ($nv_acesso) {
            case 1:
                return '
                    <aside class="main-sidebar sidebar-dark-primary elevation-4">
                        <!-- Brand Logo -->
                        <a href="index.php" class="brand-link">
                            <img src="img/icons8-coquetel-100.png" alt="Chabas-logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                            <span class="brand-text font-weight-light">Bebidas Chabás</span>
                        </a>
                
                        <!-- Sidebar -->
                        <div class="sidebar os-host os-theme-light os-host-resize-disabled os-host-transition os-host-scrollbar-vertical-hidden os-host-scrollbar-horizontal-hidden"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 656px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style=""><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                                        <!-- Sidebar user panel (optional) -->
                                        <!-- Sidebar Menu -->
                                        <nav class="mt-2">
                                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                                <!-- Add icons to the links using the .nav-icon class
                                                     with font-awesome or any other icon font library -->
                
                                                <li class="nav-item">
                                                    <a href="index.php" class="nav-link">
                                                        <i class="nav-icon fas fa-home"></i>
                                                        <p>
                                                            Home
                                                        </p>
                                                    </a>
                                                </li>
                                                
                                                <li class="nav-item">
                                                    <a href="venda.php" class="nav-link">
                                                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                                                        <p>
                                                            Registrar Venda
                                                        </p>
                                                    </a>
                                                </li>
                
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="nav-icon fas fa-box"></i>
                                                        <p>
                                                            Estoque
                                                            <i class="right fas fa-angle-left"></i>
                                                        </p>
                                                    </a>
                                                    <ul class="nav nav-treeview">
                                                        <li class="nav-item">
                                                            <a href="produtos.php" class="nav-link">
                                                                <i class="nav-icon fas fa-wine-bottle"></i>
                                                                <p>Gerenciar Produtos</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </nav>
                                        <!-- /.sidebar-menu -->
                                    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
                        <!-- /.sidebar -->
                    </aside>';
                break;
            case 2:
                return '
                    <aside class="main-sidebar sidebar-dark-primary elevation-4">
                        <!-- Brand Logo -->
                        <a href="index.php" class="brand-link">
                            <img src="img/icons8-coquetel-100.png" alt="Chabas-logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                            <span class="brand-text font-weight-light">Bebidas Chabás</span>
                        </a>
                
                        <!-- Sidebar -->
                        <div class="sidebar os-host os-theme-light os-host-resize-disabled os-host-transition os-host-scrollbar-vertical-hidden os-host-scrollbar-horizontal-hidden"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 656px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style=""><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                                        <!-- Sidebar user panel (optional) -->
                                        <!-- Sidebar Menu -->
                                        <nav class="mt-2">
                                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                                <!-- Add icons to the links using the .nav-icon class
                                                     with font-awesome or any other icon font library -->
                
                                                <li class="nav-item">
                                                    <a href="index.php" class="nav-link">
                                                        <i class="nav-icon fas fa-home"></i>
                                                        <p>
                                                            Home
                                                        </p>
                                                    </a>
                                                </li>
                                                
                                                <li class="nav-item">
                                                    <a href="venda.php" class="nav-link">
                                                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                                                        <p>
                                                            Registrar Venda
                                                        </p>
                                                    </a>
                                                </li>
                
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="nav-icon fas fa-box"></i>
                                                        <p>
                                                            Estoque
                                                            <i class="right fas fa-angle-left"></i>
                                                        </p>
                                                    </a>
                                                    <ul class="nav nav-treeview">
                                                        <li class="nav-item">
                                                            <a href="produtos.php" class="nav-link">
                                                                <i class="nav-icon fas fa-wine-bottle"></i>
                                                                <p>Gerenciar Produtos</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <i class="nav-icon fas fa-user"></i>
                                                        <p>
                                                            Contas
                                                            <i class="right fas fa-angle-left"></i>
                                                        </p>
                                                    </a>
                                                    <ul class="nav nav-treeview">
                                                        <li class="nav-item">
                                                            <a href="user_manager.php" class="nav-link">
                                                                <i class="nav-icon fas fa-users"></i>
                                                                <p>Gerenciar Usuários</p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="relatorios.php" class="nav-link">
                                                        <i class="nav-icon fas fa-coins"></i>
                                                        <p>
                                                            Faturamento
                                                        </p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <!-- /.sidebar-menu -->
                                    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
                        <!-- /.sidebar -->
                    </aside>';
                break;
            default:
                return 'Erro ao carregar menu';
                break;
        }
    }
}