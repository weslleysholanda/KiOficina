<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://localhost/kioficina/public/assets/img/favicon.svg">
    <meta name="author" content="Weslley Holanda Santos">
    <title>KiOficina - Seu carro em boas mãos</title>
    <!-- Reset -->
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/css/reset.css" />
    <!-- Slick -->
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/css/slick.css" />
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/css/slick-theme.css" />
    <!-- litty -->
    <link href="http://localhost/kioficina/public/vendors/css/lity.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- preloader -->
    <?php require_once('templates/preloader.php') ?>
    <!-- cabeçalho -->
    <?php require_once('../app/views/templates/topo.php') ?>

    <!--banner -->
    <?php require_once('../app/views/templates/banner.php') ?>

    <!-- sessão destaque -->
    <?php require_once('../app/views/templates/destaque.php') ?>

    <!-- sessão escolher -->
    <?php require_once('../app/views/templates/escolher.php') ?>


    <!-- sessão Serviços -->
    <?php require_once('../app/views/templates/servicos.php') ?>


    <!-- sessão video -->
    <?php require_once('../app/views/templates/video.php') ?>

    <!-- sessão satisfacao -->
    <?php require_once('../app/views/templates/satisfacao.php') ?>

    <!-- sessão marcas -->
    <?php require_once('../app/views/templates/marcas.php') ?>

    <!-- back to top -->
    <span class="scrollup-trigger scrollup-trigger-show">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 10L1.7625 11.7625L8.75 4.7875V20H11.25V4.7875L18.225 11.775L20 10L10 0L0 10Z"
                fill="currentColor"></path>
        </svg>
    </span>

    <!-- sessão depoimento -->
    <?php require_once('../app/views/templates/depoimento.php') ?>

    <!-- sessão equipe -->
    <?php require_once('../app/views/templates/equipe.php') ?>

    <!-- Blog -->
    <?php require_once('../app/views/templates/blog.php') ?>

    <!-- footer -->
    <?php require_once('../app/views/templates/footer.php') ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Animação banner -->
    <script src="vendors/js/slick.js"></script>
    <script src="vendors/js/lity.min.js"></script>
    <script src="https://kit.fontawesome.com/25f4259441.js" crossorigin="anonymous"></script>
    <script src="assets/js/oficina.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



    <?php 
        if(isset($msg) && $tipo_msg == 'erro-tipo_usuario'):?>
    <?php endif; ?>    
</body>

</html>