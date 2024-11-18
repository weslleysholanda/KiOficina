<div class="of-height-125"></div>
<section class="servicos">
    <div class="site">
        <div class="servicos-primary">
            <div class="servico-fundo">Serviços</div>
            <h2> <span> Ki </span><br> Serviços</h2>
            <p>Oferecemos uma gama completa de serviços automotivos, voltados para
                garantir o desempenho, a segurança e a durabilidade do seu veículo. Desde manutenções preventivas
                até reparos especializados, nossa equipe de profissionais qualificados utiliza tecnologia de ponta
                para entregar resultados rápidos e eficientes.</p>
            <a href="#" class="servico-linha">Ver Todos os Serviços</a>
        </div>
        <div class="servicos-secundary">
            <div class="container">
 
                <?php foreach ($servicos as $servico): ?>
                    <div class="servicos-card">
                        <a href="#">
                        <img src="<?php
                            $caminhoArquivo = $_SERVER['DOCUMENT_ROOT'] . "/kioficina/public/uploads/" . $servico['link_servico'];
                                        if ($servico['link_servico'] != "") {
                                            if (file_exists($caminhoArquivo)){
                                                echo ("http://localhost/kioficina/public/uploads/" .htmlspecialchars($servico['link_servico'], ENT_QUOTES, 'UTF-8'));
                                            } else {
                                                echo ("http://localhost/kioficina/public/uploads/servico/sem-foto-servico.png");
                                            }
                                        } else {
                                            echo ("http://localhost/kioficina/public/uploads/servico/sem-foto-servico.png");
                                        }
                                        ?>" alt="...">
                        </a>
                        <div class="servico-card-conteudo">
                            <a href="#" class="card-titulo"><?php echo htmlspecialchars($servico['nome_servico'], ENT_QUOTES,'UTF-8'); ?></a>
                            <p class="card-desc"><?php echo htmlspecialchars( $servico['descricao_servico'], ENT_QUOTES,'UTF-8'); ?></p>
                            <a href="#">ver mais</a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>