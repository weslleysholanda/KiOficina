<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php BASE_URL?>assets/img/favicon.svg">
    <meta name="author" content="Weslley Holanda Santos">
    <!-- shorthand ternario (?=if :=else) -->

    <title><?php echo isset($titulo)?$titulo: 'Sobre - Ki Oficina'; ?></title>
    <!-- Reset -->
    <link rel="stylesheet" href="<?php BASE_URL?>vendors/css/reset.css">
    <!-- Slick -->
    <link rel="stylesheet" href="<?php BASE_URL?>vendors/css/slick.css" />
    <link rel="stylesheet" href="<?php BASE_URL?>vendors/css/slick-theme.css" />
    <!-- litty -->
    <link href="<?php BASE_URL?>vendors/css/lity.css" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" href="<?php BASE_URL?>assets/css/style.css">
</head>

<body>
    <!-- cabeçalho -->
    <?php require_once('templates/topo.php') ?>
    <!-- footer -->
    <?php require_once('templates/footer.php')?>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Animação banner -->
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lity.min.js"></script>
    <script src="assets/js/oficina.js"></script>
</body>
</html>  