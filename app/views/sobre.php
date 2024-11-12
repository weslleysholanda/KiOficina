<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon.svg">
    <meta name="author" content="Weslley Holanda Santos">
    <!-- shorthand ternario (?=if :=else) -->

    <title><?php echo isset($titulo)?$titulo: 'Sobre - Ki Oficina';?></title>
    <!-- Reset -->
    <link rel="stylesheet" href="vendors/css/reset.css">
    <!-- Slick -->
    <link rel="stylesheet" href="vendors/css/slick.css"/>
    <link rel="stylesheet" href="vendors/css/slick-theme.css" />
    <!-- litty -->
    <link href="vendors/css/lity.css" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- preloader -->
    <!-- <?php require_once('templates/preloader.php') ?> -->
    <!-- cabeçalho -->
    <?php require_once('templates/topo.php') ?>
    
    <!-- banner sobre nos -->
    <?php require_once('templates/banner-sobre.php') ?>

    <!-- missao/visao/valores -->
    <?php require_once('templates/sobre-nos.php') ?> 
    <!-- porque escolher -->
    <?php require_once('templates/escolher.php') ?>

    <!-- satisfacao -->
    <?php require_once('templates/satisfacao.php') ?>

    <!-- depoimento -->
    <?php require_once('templates/depoimento.php') ?>

    <!-- footer -->
    <?php require_once('templates/footer.php')?>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Animação banner -->
    <script src="vendors/js/slick.js"></script>
    <script src="vendors/js/lity.min.js"></script>
    <script src="assets/js/oficina.js"></script>
</body>
</html>  