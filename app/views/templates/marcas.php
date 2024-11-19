<div class="of-height-125"></div>
<section class="marcas-confiaveis">
    <div class="site">
        <h4>Marcas Confiáveis</h4>
        <div>
            <?php foreach($marcasLogo as $marcaLogo):?>
                <img src="<?php
                            $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $marcaLogo['logo_marca'];
                                        if ($marcaLogo['logo_marca'] != "") {
                                            if (file_exists($caminhoArquivo)){
                                                echo ("http://localhost/kioficina/public/uploads/" .htmlspecialchars($marcaLogo['logo_marca'], ENT_QUOTES, 'UTF-8'));
                                            } else {
                                                echo ("http://localhost/kioficina/public/uploads/marca/sem-foto-marca.png");
                                            }
                                        } else {
                                            echo ("http://localhost/kioficina/public/uploads/marca/sem-foto-marca.png");
                                        }
                            ?>" alt="">
            <?php endforeach ?>

            <!--  <img src="uploads/marca/chevrolet.png" alt="">
            <img src="uploads/marca/toyota.png" alt="">
            <img src="uploads/marca/honda.png" alt="">
            <img src="uploads/marca/fiat.png" alt="">
            <img src="uploads/marca/volkswagen.png" alt="">
            <img src="uploads/marca/hyundai.png" alt="">
            <img src="uploads/marca/nissan.png" alt="">
            <img src="uploads/marca/renault.png" alt="">
            <img src="uploads/marca/mitsubishi.png" alt="">
            <img src="uploads/marca/bmw.png" alt="">
            <img src="uploads/marca/ford.png" alt="">
            <img src="uploads/marca/chevrolet.png" alt="">
            <img src="uploads/marca/toyota.png" alt="">
            <img src="uploads/marca/honda.png" alt="">
            <img src="uploads/marca/fiat.png" alt="">
            <img src="uploads/marca/volkswagen.png" alt="">
            <img src="uploads/marca/hyundai.png" alt="">
            <img src="uploads/marca/nissan.png" alt="">
            <img src="uploads/marca/renault.png" alt="">
            <img src="uploads/marca/mitsubishi.png" alt="">
            <img src="uploads/marca/bmw.png" alt=""> -->
        </div>
    </div>
</section>