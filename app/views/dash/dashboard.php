<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>KiOficina - Dashboard</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://localhost/kioficina/public/assets/img/favicon.svg">
    <meta name="author" content="ColorlibHQ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
    <!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
        integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
        integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
    <div class="app-wrapper"> <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i
                                class="bi bi-list"></i> </a> </li>
                    <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Site Ki Oficina</a></li>
                </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
                    <li class="nav-item"> <a class="nav-link" data-widget="navbar-search" href="#" role="button"> </a> </li> <!--end::Navbar Search-->
                    <!--begin::Messages Dropdown Menu--> <!--end::Notifications Dropdown Menu--> <!--begin::Fullscreen Toggle-->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <?php foreach ($usuario as $usuarioLogado): ?>
                                <img src="<?php
                                            $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $usuarioLogado['foto_funcionario'];
                                            if ($usuarioLogado['foto_funcionario'] != "") {
                                                if (file_exists($caminhoArquivo)) {
                                                    echo ("http://localhost/kioficina/public/uploads/" . htmlspecialchars($usuarioLogado['foto_funcionario'], ENT_QUOTES, 'UTF-8'));
                                                } else {
                                                    echo ("http://localhost/kioficina/public/uploads/funcionario/sem-foto-funcionario.png");
                                                }
                                            } else {
                                                echo ("http://localhost/kioficina/public/uploads/funcionario/sem-foto-funcionario.png");
                                            } ?>" class="user-image rounded-circle shadow" alt="User Image">
                                </span>
                            <?php endforeach ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <?php foreach ($usuario as $usuarioLogado): ?>
                                <li class="user-header text-bg-primary">
                                    <img src="<?php
                                                $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $usuarioLogado['foto_funcionario'];
                                                if ($usuarioLogado['foto_funcionario'] != "") {
                                                    if (file_exists($caminhoArquivo)) {
                                                        echo ("http://localhost/kioficina/public/uploads/" . htmlspecialchars($usuarioLogado['foto_funcionario'], ENT_QUOTES, 'UTF-8'));
                                                    } else {
                                                        echo ("http://localhost/kioficina/public/uploads/funcionario/sem-foto-funcionario.png");
                                                    }
                                                } else {
                                                    echo ("http://localhost/kioficina/public/uploads/funcionario/sem-foto-funcionario.png");
                                                } ?>" class="rounded-circle shadow" alt="User Image">
                                    <p>
                                        <?php echo htmlspecialchars($usuarioLogado['nome_funcionario'], ENT_QUOTES, 'UTF-8'); ?> -
                                        <?php echo htmlspecialchars($usuarioLogado['cargo_funcionario'], ENT_QUOTES, 'UTF-8'); ?>
                                        <small>
                                            <?php $data = new DateTime($usuarioLogado['data_adm_funcionario']);
                                            echo htmlspecialchars('Membro desde ' . $data->format('M. Y'), ENT_QUOTES, 'UTF-8');
                                            ?>
                                        </small>
                                    </p>
                                </li>
                            <?php endforeach ?>
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="http://localhost/kioficina/public/auth/sair" class="btn btn-default btn-flat float-end">Logoff</a>
                            </li>
                        </ul>
                    </li>

                    <!--end::User Menu Dropdown-->
                </ul> <!--end::End Navbar Links-->
            </div> <!--end::Container-->
        </nav> <!--end::Header--> <!--begin::Sidebar-->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <a href="./index.html" class="brand-link">
                    <img src="http://localhost/kioficina/public/assets/img/Kioficina_Logo.svg" alt="Logo KiOficina" class="brand-image opacity-75 shadow"> <!--end::Brand Text-->
                </a> <!--end::Brand Link-->
            </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
                        <div class="sidebar-wrapper">
                            <nav class="mt-2"> <!--begin::Sidebar Menu-->
                                <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                                    <li class="nav-item menu-open"> <a href="#" class="nav-link active"> <i class="nav-icon bi bi-speedometer"></i>
                                            <p>
                                                Dashboard

                                            </p>
                                        </a>

                                    </li>


                                    </a> </li>
                                    <li class="nav-item"> <a href="#" class="nav-link">
                                            <i class="bi bi-gear"></i>
                                            <p>
                                                Gestão de Serviços
                                                <i class="nav-arrow bi bi-chevron-right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="./widgets/small-box.html" class="nav-link">
                                                    <p>Agendamento de Serviços</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="./widgets/info-box.html" class="nav-link">
                                                    <p>Serviços</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="./widgets/cards.html" class="nav-link">
                                                    <p>Especialidade</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item"> <a href="#" class="nav-link"> <ion-icon name="people-outline"></ion-icon>
                                            <p>
                                                Gestão de Clientes
                                                <i class="nav-arrow bi bi-chevron-right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="./layout/unfixed-sidebar.html" class="nav-link">
                                                    <p>Clientes</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="./layout/fixed-sidebar.html" class="nav-link">
                                                    <p>Veículos</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="bi bi-briefcase"></i>
                                            <p>
                                                Recursos Humanos
                                                <i class="nav-arrow bi bi-chevron-right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="./UI/general.html" class="nav-link">
                                                    <p>Funcionários</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>


                                    <li class="nav-item"> <a href="#" class="nav-link">
                                            <i class="bi bi-truck"></i>
                                            <p>
                                                Fornecedores
                                                <i class="nav-arrow bi bi-chevron-right"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="./forms/general.html" class="nav-link">
                                                    <p>Fornecedores</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="./forms/general.html" class="nav-link">
                                                    <p>Peças</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>






                                    <li class="nav-header">SITE</li>

                                    <li class="nav-item">
                                        <a href="./docs/introduction.html" class="nav-link">
                                            <i class="bi bi-chat-left-text"></i>
                                            <p>Depoimentos</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="./docs/layout.html" class="nav-link">
                                            <i class="bi bi-card-image"></i>
                                            <p>Banners</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./docs/color-mode.html" class="nav-link">
                                            <i class="bi bi-envelope"></i>
                                            <p>Contato</p>
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a href="./docs/browser-support.html" class="nav-link">
                                            <i class="bi bi-images"></i>
                                            <p>Galeria</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./docs/how-to-contribute.html" class="nav-link">
                                            <i class="bi bi-tags"></i>
                                            <p>Marcas</p>
                                        </a>
                                    </li>
                                </ul> <!--end::Sidebar Menu-->
                            </nav>
                        </div> <!--end::Sidebar Wrapper-->
                    </aside> <!--end::Sidebar--> <!--begin::App Main-->

                    <!--end::Sidebar Menu-->
                </nav>
            </div> <!--end::Sidebar Wrapper-->
        </aside> <!--end::Sidebar--> <!--begin::App Main-->
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">KiOficina Dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard KiOficina
                                </li>
                            </ol>
                        </div>
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div>
            <div class="app-content"> <!--begin::Container-->
                <div class="container-fluid"> <!-- Info boxes -->
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-success shadow-sm">
                                    <i class="bi bi-cart-fill"></i>
                                </span>
                                <div class="info-box-content"> <span class="info-box-text">Vendas</span> <span
                                        class="info-box-number">760</span> </div> <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-danger shadow-sm container-comentarios-fundo"> <i
                                        class="bi bi-hand-thumbs-up-fill"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Comentários</span> <span
                                        class="info-box-number">41,410</span> </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box -->
                        </div> <!-- /.col --> <!-- fix for small devices only -->
                        <!-- <div class="clearfix hidden-md-up"></div> -->

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-success shadow-sm" id="cor">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Usuarios Registrados</span>
                                    <span class="info-box-number">44</span>
                                </div> <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-success shadow-sm" id="cor-primary-nav"> <ion-icon name="pie-chart-outline"></ion-icon>
                                </span>
                                <div class="info-box-content"> <span class="info-box-text">Visitantes Unicos</span> <span
                                        class="info-box-number">65</span> </div> <!-- /.info-box-content -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title">Relatório Mensal</h5>
                                    <div class="card-tools"> <button type="button" class="btn btn-tool"
                                            data-lte-toggle="card-collapse"> <i data-lte-icon="expand"
                                                class="bi bi-plus-lg"></i> <i data-lte-icon="collapse"
                                                class="bi bi-dash-lg"></i> </button>
                                        <div class="btn-group"> <button type="button"
                                                class="btn btn-tool dropdown-toggle" data-bs-toggle="dropdown"> <i
                                                    class="bi bi-wrench"></i> </button>
                                            <div class="dropdown-menu dropdown-menu-end" role="menu"> <a href="#"
                                                    class="dropdown-item">Action</a> <a href="#"
                                                    class="dropdown-item">Another action</a> <a href="#"
                                                    class="dropdown-item">
                                                    Something else here
                                                </a> <a class="dropdown-divider"></a> <a href="#"
                                                    class="dropdown-item">Separated link</a> </div>
                                        </div> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove">
                                            <i class="bi bi-x-lg"></i> </button>
                                    </div>
                                </div> <!-- /.card-header -->
                                <div class="card-body"> <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-md-8">
                                            <p class="text-center"> <strong>Compras 1 Jan, 2023 - 30 Jul, 2023</strong>
                                            </p>
                                            <div id="sales-chart"></div>
                                        </div> <!-- /.col -->
                                        <div class="col-md-4">
                                            <p class="text-center"> <strong>Estatísticas</strong> </p>
                                            <div class="progress-group">
                                                Compras Finalizadas
                                                <span class="float-end"><b>310</b>/400</span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar text-bg-danger" style="width: 75%"></div>
                                                </div>
                                            </div> <!-- /.progress-group -->
                                            <div class="progress-group"> <span class="progress-text">Visitas ao Site</span> <span class="float-end"><b>480</b>/800</span>
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar text-bg-success" style="width: 60%"></div>
                                                </div>
                                            </div> <!-- /.progress-group -->
                                        </div> <!-- /.col -->
                                    </div> <!--end::Row-->
                                </div> <!-- ./card-body -->
                                <div class="card-footer"> <!--begin::Row-->
                                    <div class="row">
                                        <div class="col-md-3 col-6">
                                            <div class="text-center border-end"> <span class="text-success"> <i
                                                        class="bi bi-caret-up-fill"></i> 17%
                                                </span>
                                                <h5 class="fw-bold mb-0">$35,210.43</h5> <span
                                                    class="text-uppercase">Receita Total</span>
                                            </div>
                                        </div> <!-- /.col -->
                                        <div class="col-md-3 col-6">
                                            <div class="text-center border-end"> <span class="text-info"> <i
                                                        class="bi bi-caret-left-fill"></i> 0%
                                                </span>
                                                <h5 class="fw-bold mb-0">$10,390.90</h5> <span
                                                    class="text-uppercase">Custo Total</span>
                                            </div>
                                        </div> <!-- /.col -->
                                        <div class="col-md-3 col-6">
                                            <div class="text-center border-end"> <span class="text-success"> <i
                                                        class="bi bi-caret-up-fill"></i> 20%
                                                </span>
                                                <h5 class="fw-bold mb-0">$24,813.53</h5> <span
                                                    class="text-uppercase">Lucro Total</span>
                                            </div>
                                        </div> <!-- /.col -->
                                        <div class="col-md-3 col-6">
                                            <div class="text-center"> <span class="text-danger"> <i
                                                        class="bi bi-caret-down-fill"></i> 18%
                                                </span>
                                                <h5 class="fw-bold mb-0">1200</h5> <span class="text-uppercase">metas</span>
                                            </div>
                                        </div>
                                    </div> <!--end::Row-->
                                </div> <!-- /.card-footer -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!--end::Row--> <!--begin::Row-->
                    <div class="row"> <!-- Start col -->
                        <div class="col-md-8"> <!--begin::Row-->

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Últimos pedidos</h3>
                                    <div class="card-tools"> <button type="button" class="btn btn-tool"
                                            data-lte-toggle="card-collapse"> <i data-lte-icon="expand"
                                                class="bi bi-plus-lg"></i> <i data-lte-icon="collapse"
                                                class="bi bi-dash-lg"></i> </button> <button type="button"
                                            class="btn btn-tool" data-lte-toggle="card-remove"> <i
                                                class="bi bi-x-lg"></i> </button> </div>
                                </div> <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>ID do pedido</th>
                                                    <th>Item</th>
                                                    <th>Status</th>
                                                    <th> Popularidade</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> <a href="pages/examples/invoice.html"
                                                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">OR9842</a>
                                                    </td>
                                                    <td>Call of Duty IV</td>
                                                    <td> <span class="badge text-bg-success">
                                                            Enviado
                                                        </span> </td>
                                                    <td>
                                                        <div id="table-sparkline-1"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <a href="pages/examples/invoice.html"
                                                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">OR1848</a>
                                                    </td>
                                                    <td>Samsung Smart TV</td>
                                                    <td> <span class="badge text-bg-warning">Pendente</span> </td>
                                                    <td>
                                                        <div id="table-sparkline-2"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <a href="pages/examples/invoice.html"
                                                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">OR7429</a>
                                                    </td>
                                                    <td>iPhone 6 Plus</td>
                                                    <td> <span class="badge text-bg-danger">
                                                            Entregue
                                                        </span> </td>
                                                    <td>
                                                        <div id="table-sparkline-3"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <a href="pages/examples/invoice.html"
                                                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">OR7429</a>
                                                    </td>
                                                    <td>Samsung Smart TV</td>
                                                    <td> <span class="badge text-bg-info">Processamento</span> </td>
                                                    <td>
                                                        <div id="table-sparkline-4"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <a href="pages/examples/invoice.html"
                                                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">OR1848</a>
                                                    </td>
                                                    <td>Samsung Smart TV</td>
                                                    <td> <span class="badge text-bg-warning">Pendente</span> </td>
                                                    <td>
                                                        <div id="table-sparkline-5"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <a href="pages/examples/invoice.html"
                                                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">OR7429</a>
                                                    </td>
                                                    <td>iPhone 6 Plus</td>
                                                    <td> <span class="badge text-bg-danger">
                                                            Entregue
                                                        </span> </td>
                                                    <td>
                                                        <div id="table-sparkline-6"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> <a href="pages/examples/invoice.html"
                                                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">OR9842</a>
                                                    </td>
                                                    <td>Call of Duty IV</td>
                                                    <td> <span class="badge text-bg-success">Enviado</span> </td>
                                                    <td>
                                                        <div id="table-sparkline-7"></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-responsive -->
                                </div> <!-- /.card-body -->
                                <div class="card-footer clearfix"> <a href="javascript:void(0)"
                                        class="btn btn-sm btn-primary float-start">
                                        Fazer novo pedido
                                    </a> <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-end">
                                        Ver todos os pedidos
                                    </a> </div> <!-- /.card-footer -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                        <div class="col-md-4"> <!-- Info Boxes Style 2 -->
                            <div class="info-box mb-3 text-bg-warning container-cor-warning">
                                <span class="info-box-icon">
                                    <i class="bi bi-tag-fill"></i>
                                </span>
                                <?php foreach ($estoque as $totalEstoque): ?>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Estoque</span>
                                        <!-- Provavelmente, o erro está no loop; ou seja, eu posso tratá-lo como um valor simples. -->
                                        <span class="info-box-number"><?php echo htmlspecialchars($totalEstoque['qtde_estoque_peca'],ENT_QUOTES,'UTF-8'); ?></span>
                                    </div>
                                <?php endforeach ?>

                            </div> <!-- /.info-box -->
                            <!-- /.info-box -->
                            <div class="info-box mb-3 text-bg-danger" id="container-informacao">
                                <span class="info-box-icon"> <i class="bi bi-cart-fill"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Compras Realizadas</span>
                                    <span class="info-box-number">114,381</span>
                                </div> <!-- /.info-box-content -->
                            </div> <!-- /.info-box --> <!-- /.info-box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Produtos Adicionados recentemente</h3>
                                    <div class="card-tools"> <button type="button" class="btn btn-tool"
                                            data-lte-toggle="card-collapse"> <i data-lte-icon="expand"
                                                class="bi bi-plus-lg"></i> <i data-lte-icon="collapse"
                                                class="bi bi-dash-lg"></i> </button> <button type="button"
                                            class="btn btn-tool" data-lte-toggle="card-remove"> <i
                                                class="bi bi-x-lg"></i> </button> </div>
                                </div> <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="px-2">
                                        <div class="d-flex border-top py-2 px-1">
                                            <div class="col-2"> <img src="http://localhost/kioficina/public/vendors/img/default-150x150.png"
                                                    alt="Product Image" class="img-size-50"> </div>
                                            <div class="col-10"> <a href="javascript:void(0)" class="fw-bold">
                                                    Samsung TV
                                                    <span class="badge text-bg-warning float-end">
                                                        $1800
                                                    </span> </a>
                                                <div class="text-truncate">
                                                    Samsung 32" 1080p 60Hz LED Smart HDTV.
                                                </div>
                                            </div>
                                        </div> <!-- /.item -->
                                        <div class="d-flex border-top py-2 px-1">
                                            <div class="col-2"> <img src="http://localhost/kioficina/public/vendors/img/default-150x150.png"
                                                    alt="Product Image" class="img-size-50"> </div>
                                            <div class="col-10"> <a href="javascript:void(0)" class="fw-bold">
                                                    Bicycle
                                                    <span class="badge text-bg-info float-end">
                                                        $700
                                                    </span> </a>
                                                <div class="text-truncate">
                                                    26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                                                </div>
                                            </div>
                                        </div> <!-- /.item -->
                                        <div class="d-flex border-top py-2 px-1">
                                            <div class="col-2"> <img src="http://localhost/kioficina/public/vendors/img/default-150x150.png"
                                                    alt="Product Image" class="img-size-50"> </div>
                                            <div class="col-10"> <a href="javascript:void(0)" class="fw-bold">
                                                    Xbox One
                                                    <span class="badge text-bg-danger float-end">
                                                        $350
                                                    </span> </a>
                                                <div class="text-truncate">
                                                    Xbox One Console Bundle with Halo Master Chief
                                                    Collection.
                                                </div>
                                            </div>
                                        </div> <!-- /.item -->
                                        <div class="d-flex border-top py-2 px-1">
                                            <div class="col-2"> <img src="http://localhost/kioficina/public/vendors/img/default-150x150.png"
                                                    alt="Product Image" class="img-size-50"> </div>
                                            <div class="col-10"> <a href="javascript:void(0)" class="fw-bold">
                                                    PlayStation 4
                                                    <span class="badge text-bg-success float-end">
                                                        $399
                                                    </span> </a>
                                                <div class="text-truncate">
                                                    PlayStation 4 500GB Console (PS4)
                                                </div>
                                            </div>
                                        </div> <!-- /.item -->
                                    </div>
                                </div> <!-- /.card-body -->
                                <div class="card-footer text-center"> <a href="javascript:void(0)" class="uppercase">
                                        Ver todos os pedidos
                                    </a> </div> <!-- /.card-footer -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                    </div> <!--end::Row-->
                </div> <!--end::Container-->
            </div> <!--end::App Content-->
        </main> <!--end::App Main--> <!--begin::Footer-->
        <footer class="app-footer"> <!--begin::To the end-->
            <strong>
                Copyright &copy; 2014-2024&nbsp;
                <a href="https://adminlte.io" class="text-decoration-none">KiOficina</a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer> <!--end::Footer-->
    </div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/25f4259441.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="http://localhost/kioficina/public/vendors/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!-- OPTIONAL SCRIPTS --> <!-- apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
    <script>
        // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
        // IT'S ALL JUST JUNK FOR DEMO
        // ++++++++++++++++++++++++++++++++++++++++++

        /* apexcharts
         * -------
         * Here we will create a few charts using apexcharts
         */

        //-----------------------
        // - MONTHLY SALES CHART -
        //-----------------------

        const sales_chart_options = {
            series: [{
                    name: "Digital Goods",
                    data: [28, 48, 40, 19, 86, 27, 90],
                },
                {
                    name: "Electronics",
                    data: [65, 59, 80, 81, 56, 55, 40],
                },
            ],
            chart: {
                height: 180,
                type: "area",
                toolbar: {
                    show: false,
                },
            },
            legend: {
                show: false,
            },
            colors: ["#0d6efd", "#20c997"],
            dataLabels: {
                enabled: false,
            },
            stroke: {
                curve: "smooth",
            },
            xaxis: {
                type: "datetime",
                categories: [
                    "2023-01-01",
                    "2023-02-01",
                    "2023-03-01",
                    "2023-04-01",
                    "2023-05-01",
                    "2023-06-01",
                    "2023-07-01",
                ],
            },
            tooltip: {
                x: {
                    format: "MMMM yyyy",
                },
            },
        };

        const sales_chart = new ApexCharts(
            document.querySelector("#sales-chart"),
            sales_chart_options,
        );
        sales_chart.render();

        //---------------------------
        // - END MONTHLY SALES CHART -
        //---------------------------

        function createSparklineChart(selector, data) {
            const options = {
                series: [{
                    data
                }],
                chart: {
                    type: "line",
                    width: 150,
                    height: 30,
                    sparkline: {
                        enabled: true,
                    },
                },
                colors: ["var(--bs-primary)"],
                stroke: {
                    width: 2,
                },
                tooltip: {
                    fixed: {
                        enabled: false,
                    },
                    x: {
                        show: false,
                    },
                    y: {
                        title: {
                            formatter: function(seriesName) {
                                return "";
                            },
                        },
                    },
                    marker: {
                        show: false,
                    },
                },
            };

            const chart = new ApexCharts(document.querySelector(selector), options);
            chart.render();
        }

        const table_sparkline_1_data = [
            25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54,
        ];
        const table_sparkline_2_data = [
            12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 44,
        ];
        const table_sparkline_3_data = [
            15, 46, 21, 59, 33, 15, 34, 42, 56, 19, 64,
        ];
        const table_sparkline_4_data = [
            30, 56, 31, 69, 43, 35, 24, 32, 46, 29, 64,
        ];
        const table_sparkline_5_data = [
            20, 76, 51, 79, 53, 35, 54, 22, 36, 49, 64,
        ];
        const table_sparkline_6_data = [
            5, 36, 11, 69, 23, 15, 14, 42, 26, 19, 44,
        ];
        const table_sparkline_7_data = [
            12, 56, 21, 39, 73, 45, 64, 52, 36, 59, 74,
        ];

        createSparklineChart("#table-sparkline-1", table_sparkline_1_data);
        createSparklineChart("#table-sparkline-2", table_sparkline_2_data);
        createSparklineChart("#table-sparkline-3", table_sparkline_3_data);
        createSparklineChart("#table-sparkline-4", table_sparkline_4_data);
        createSparklineChart("#table-sparkline-5", table_sparkline_5_data);
        createSparklineChart("#table-sparkline-6", table_sparkline_6_data);
        createSparklineChart("#table-sparkline-7", table_sparkline_7_data);

        //-------------
        // - PIE CHART -
        //-------------

        const pie_chart_options = {
            series: [700, 500, 400, 600, 300, 100],
            chart: {
                type: "donut",
            },
            labels: ["Chrome", "Edge", "FireFox", "Safari", "Opera", "IE"],
            dataLabels: {
                enabled: false,
            },
            colors: [
                "#0d6efd",
                "#20c997",
                "#ffc107",
                "#d63384",
                "#6f42c1",
                "#adb5bd",
            ],
        };

        const pie_chart = new ApexCharts(
            document.querySelector("#pie-chart"),
            pie_chart_options,
        );
        pie_chart.render();

        //-----------------
        // - END PIE CHART -
        //-----------------
    </script> <!--end::Script-->
</body><!--end::Body-->

</html>