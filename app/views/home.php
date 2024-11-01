<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php BASE_URL?>assets/img/favicon.svg">
    <meta name="author" content="Weslley Holanda Santos">
    <title>KiOficina - Seu carro em boas mãos</title>
    <!-- Reset -->
    <link rel="stylesheet" href="<?php BASE_URL?>assets/css/reset.css">
    <!-- Slick -->
    <link rel="stylesheet" href="<?php BASE_URL?>assets/css/slick.css" />
    <link rel="stylesheet" href="<?php BASE_URL?>assets/css/slick-theme.css" />
    <!-- litty -->
    <link href="<?php BASE_URL?>assets/css/lity.css" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" href="<?php BASE_URL?>assets/css/style.css">
</head>

<body>
    <!-- cabeçalho -->
    <?php require_once('../app/views/templates/topo.php') ?>

    <!--banner -->
    <?php require_once('../app/views/templates/banner.php') ?>

    <!-- sessão destaque -->
    <?php require_once('../app/views/templates/destaque.php')?>

    <!-- sessão escolher -->
    <?php require_once('../app/views/templates/escolher.php')?>
   

    <!-- sessão Serviços -->
    <?php require_once('../app/views/templates/servicos.php')?>
    

    <!-- sessão video -->
    <?php require_once('../app/views/templates/video.php')?>

    <!-- sessão satisfacao -->
    <?php require_once('../app/views/templates/satisfacao.php')?>

    <!-- sessão marcas -->
    <?php require_once('../app/views/templates/marcas.php')?>

    <!-- back to top -->
    <span class="scrollup-trigger scrollup-trigger-show">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 10L1.7625 11.7625L8.75 4.7875V20H11.25V4.7875L18.225 11.775L20 10L10 0L0 10Z"
                fill="currentColor"></path>
        </svg>
    </span>

    <!-- sessão depoimento -->
    <?php require_once('../app/views/templates/depoimento.php')?>

    <!-- sessão equipe -->
    <?php require_once('../app/views/templates/equipe.php')?>

    <!-- Blog -->
    <?php require_once('../app/views/templates/blog.php')?>

    <!-- footer -->
    <?php require_once('../app/views/templates/footer.php')?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Animação banner -->
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lity.min.js"></script>
    <script src="assets/js/oficina.js"></script>
</body>

</html>