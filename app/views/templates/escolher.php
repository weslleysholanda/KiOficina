<div class="of-height-125"></div>
<section class="escolher">
    <div class="site">
        <div class="escolher-conteudo">
            <div class="escolher-head">
                <div class="escolher-fundo">KiOficina</div>
                <h2>PORQUE NOS ESCOLHER?</h2>
                <p>
                    Na KiOficina, oferecemos um serviço automotivo de excelência, com
                    profissionais qualificados, atendimento personalizado e soluções eficientes para garantir sua
                    segurança e satisfação.
                </p>
               
                    <div class="escolher-hover">
                        <?php foreach ($servicosNome as $servico); ?>
                            <h3><?php echo htmlspecialchars($servico['nome_especialidade'], ENT_QUOTES, 'UTF-8'); ?></h3>
                        <?php ?>
                    </div>
                   
                
                <a href="#" class="escolher-btn">saiba mais</a>
            </div>
        </div>
        <div class="escolher-imagem">
            <img src="assets/img/choose-us.png" alt="">
            <img src="assets/img/Circle.png" alt="">
        </div>
    </div>
</section>