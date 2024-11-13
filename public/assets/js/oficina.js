//pre-inicialização
  $(window).on("load", function () {
    preloader();
  });

  $.exists = function(selector) {
    return $(selector).length > 0;
};
//preloader
function preloader() {
    // setTimeout()método chama uma função após um número de milissegundos
    setTimeout(function () {
        // $()seletor de elementos do jQuery seleciona elementos com base no nome do elemento
        //método do jQuery O método addClass() adiciona um ou mais nomes de classe aos elementos selecionados. 
        // Este método não remove atributos de classe existentes, ele apenas adiciona um ou mais nomes de classe ao atributo de classe.
        //O método hasClass() verifica se algum dos elementos selecionados tem um nome de classe especificado.
            $("#preloader").addClass("loaded");
            if($("#preloader").hasClass("loaded")){
             $("#preloader")
             //método delay() define um temporizador para atrasar a execução do próximo item na fila.
             .delay(850)
             //O método queue() mostra a fila de funções a serem executadas nos elementos selecionados.
             .queue(function (){
                // O remove()método jQuery remove o(s) elemento(s) selecionado(s) e seus elementos filhos.
                $(this).remove();
             })
             //O método fadeOut() altera gradualmente a opacidade dos elementos selecionados, de visível para oculto (efeito de esmaecimento)
             .fadeOut(); 
            }
    },200);
}

// BANNER
$('.slide-banner').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    autoplaySpeed: 2000,
});

// Marcas

$('.marcas-confiaveis .site div').slick({
    slidesToShow: 7,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
    dots: false,
    autoplaySpeed: 2000,
});

// DEPO - SLIDE
$('.depoimento-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    fade: true,
    autoplaySpeed: 2000,
});


// back to top 
function scrollFunction() {
    var btn = document.querySelector(".scrollup-trigger");
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        btn.classList.add("show");
    } else {
        btn.classList.remove("show");
    }
}

document.querySelector(".scrollup-trigger").onclick = function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
};

window.onscroll = function () {
    scrollFunction();
};


// guias empresa (missão/visão/valores)

if($.exists("guia-empresa")){
    var $guiaAtiva = $(".guia-ativa");
    var $guiaConteudo = $(".guia-conteudo .guia-lista");
    var $guiaLista = $(".guias li");
    var activeIndex = $guiaAtiva.index();
    $guiaConteudo.eq(activeIndex).show();
    
    $(".guias").on("click","li", function(e){
        var $guiaAtual = $(e.currentTarget);
        var index = $guiaAtual.index();

        $guiaLista.removeClass("guia-ativa");
        $guiaAtual.addClass("guia-ativa");

        $guiaConteudo.hide().eq(index).show();

    });
}