<?php

// Carregar as configurações Iniciais
require_once('../config/config.php');


//Núcleo da Aplicação
$nucleo = new Core();
$nucleo -> executar();
?>

<img src="<?php echo BASE_URL;?> public/assets/img/about-page-title.jpg" alt="">