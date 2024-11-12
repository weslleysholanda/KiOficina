<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="http://localhost/kioficina/public/assets/img/favicon.svg">
    <meta name="author" content="Weslley Holanda Santos">
    <!-- shorthand ternario (?=if :=else) -->

    <title><?php echo isset($titulo)?$titulo: 'Contato - Ki Oficina'; ?></title>
    <!-- Reset -->
    <link rel="stylesheet" href="http://localhost/kioficina/public/vendors/css/reset.css">
    <!-- Style -->
    <link rel="stylesheet" href="http://localhost/kioficina/public/assets/css/style.css">
</head>

<body>
    <!-- preloader -->
    <?php require_once('templates/preloader.php') ?>

    <!-- cabeçalho -->
    <?php require_once('templates/topo.php') ?>
    <!-- final cabeçalho -->

    <!-- contato -->
    <?php require_once('templates/contato.php') ?>

    <?php require_once('templates/footer.php')?>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Animação banner -->
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lity.min.js"></script>
    
    <script src="assets/js/oficina.js"></script>
</body>
</html>      