<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>KiOficina - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://localhost/kioficina/public/assets/img/favicon.svg">
    <meta name="author" content="ColorlibHQ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <!-- Semantic UI -->
    <link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/css/adminlte.css">
    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/dash.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous">
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
                                <span><?php echo htmlspecialchars($usuarioLogado['nome_funcionario'], ENT_QUOTES, 'UTF-8'); ?></span>
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
                                                <a href="http://localhost/kioficina/public/agendamento/listar" class="nav-link">
                                                    <p>Agendamento de Serviços</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="http://localhost/kioficina/public/servico/listar" class="nav-link">
                                                    <p>Serviços</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="http://localhost/kioficina/public/especialidade/listar" class="nav-link">
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
                                                <a href="http://localhost/kioficina/public/cliente/listar" class="nav-link">
                                                    <p>Clientes</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="" class="nav-link">
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
                                                <a href="http://localhost/kioficina/public/funcionario/listar" class="nav-link">
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
                                        <a href="http://localhost/kioficina/public/depoimento/listar" class="nav-link">
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


                </nav>
            </div>
        </aside>
        <main class="app-main">
            <div class="app-content-header">
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
                                        class="info-box-number"><?php echo htmlspecialchars($total_vendas, ENT_QUOTES, 'UTF-8'); ?></span> </div> <!-- /.info-box-content -->
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box"> <span class="info-box-icon text-bg-danger shadow-sm container-comentarios-fundo"> <i
                                        class="bi bi-hand-thumbs-up-fill"></i> </span>
                                <div class="info-box-content"> <span class="info-box-text">Depoimentos</span> <span
                                        class="info-box-number"><?php echo htmlspecialchars($depoimento, ENT_QUOTES, 'UTF-8') ?></span> </div> <!-- /.info-box-content -->
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
                                    <span class="info-box-number"><?php echo htmlspecialchars($cadastro, ENT_QUOTES, 'UTF-8'); ?></span>
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
                        <?php
                        if (isset($conteudo)) {
                            $this->carregarViews($conteudo, $dados);
                        } else {
                            echo '<h2> Bem Vindo ao Dashboard! </h2>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>

    </div>
    <footer class="app-footer">
        <strong>
            Copyright &copy; 2014-2024&nbsp;
            <a href="https://adminlte.io" class="text-decoration-none">KiOficina</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/25f4259441.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
    <script src=" https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.js"></script>
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

        function abrirModalDesativar(idServico) {

            if ($('#modalDesativar').hasClass('show')) {
                return;
            }

            document.getElementById('idServicoDesativar').value = idServico;

            $('#modalDesativar').modal('show');
        }

        function abrirModalPerfil(idCliente) {
            let modal = document.querySelector('.ui.longer.modal');

            if (!modal) {
                console.error("Modal não encontrado: .ui.longer.modal");
                return;
            }

            // Inicia e mostra o modal do Semantic UI
            $('.ui.longer.modal').modal('toggle');
        }

        document.getElementById('btnConfirmar').addEventListener('click', function() {
            const idServico = document.getElementById('idServicoDesativar').value;
            console.log(idServico);

            if (idServico) {
                desativarServico(idServico);
            }
        });

        function desativarServico(idServico) {

            fetch(`http://localhost/kioficina/public/servico/desativar/${idServico}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    // Se o código de resposta NÃO for ok, lança um erro
                    if (!response.ok) {
                        throw new Error(`Erro HTTP: ${response.status}`);
                        console.log("ERRO -");
                    }
                    return response.json();
                })
                .then(data => {
                    // Se a resposta do servidor for OK, fecha o modal e carrega e atualiza a lista
                    if (data.sucesso) {
                        console.log("Serviço desativado com sucesso");
                        $('#modalDesativar').modal('hide')
                        setTimeout(() => {
                            location.reload();
                        }), 500;

                    } else {
                        alert(data.mensagem || "Ocorreu um erro ao desativar o serviço");
                    }

                })
                .catch(erro => {
                    console.error('Erro', erro);
                    alert("Erro na requisição.");
                })

        }

        // Modal Semantic
        $(document).ready(function() {
            // Delegação para abrir o modal
            $(document).on('click', '#preview-img', function() {
                $('.ui.longer.modal').modal('show'); // Abre o modal
            });

            // Delegação para fechar o modal
            $(document).on('click', '#fechar-modal, .close', function() {
                $('.ui.longer.modal').modal('hide'); // Fecha o modal
            });
        });
    </script>
</body>

</html>