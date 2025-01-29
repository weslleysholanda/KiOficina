//pre-inicialização
$(window).on("load", function () {
  preloader();
});

$.exists = function (selector) {
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
    if ($("#preloader").hasClass("loaded")) {
      $("#preloader")
        //método delay() define um temporizador para atrasar a execução do próximo item na fila.
        .delay(850)
        //O método queue() mostra a fila de funções a serem executadas nos elementos selecionados.
        .queue(function () {
          // O remove()método jQuery remove o(s) elemento(s) selecionado(s) e seus elementos filhos.
          $(this).remove();
        })
        //O método fadeOut() altera gradualmente a opacidade dos elementos selecionados, de visível para oculto (efeito de esmaecimento)
        .fadeOut();
    }
  }, 200);
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
  slidesToShow: 4,
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

if ($.exists("guia-empresa")) {
  var $guiaAtiva = $(".guia-ativa");
  var $guiaConteudo = $(".guia-conteudo .guia-lista");
  var $guiaLista = $(".guias li");
  var activeIndex = $guiaAtiva.index();
  $guiaConteudo.eq(activeIndex).show();

  $(".guias").on("click", "li", function (e) {
    var $guiaAtual = $(e.currentTarget);
    var index = $guiaAtual.index();

    $guiaLista.removeClass("guia-ativa");
    $guiaAtual.addClass("guia-ativa");

    $guiaConteudo.hide().eq(index).show();

  });
}

// mostrar senha 
function togglePasswordVisibility() {
  const passwordInput = document.getElementById('password');
  const toggleIcon = document.getElementById('toggleIcon');

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    toggleIcon.classList.remove('bi-eye');
    toggleIcon.classList.add('bi-eye-slash');
  } else {
    passwordInput.type = 'password';
    toggleIcon.classList.remove('bi-eye-slash');
    toggleIcon.classList.add('bi-eye');
  }
}


document.addEventListener('DOMContentLoaded', function () {
  // Inicialize o Tempus Dominus no campo de tempo
  const picker = new tempusDominus.TempusDominus(document.getElementById('tempoEstimado'), {
    display: {
      viewMode: 'clock',
      components: {
        calendar: false, // Remove o calendário
        hours: true,
        minutes: true,
        seconds: true,
      },
    },
    localization: {
      locale: 'pt-BR', // Define o idioma para português
      hourCycle: 'h23', // Define o ciclo de 24 horas (h23)
      format: 'HH:mm:ss', // Formato para exibição
    },
  });
});

// Funcionario / Fornecedor
const picker = new tempusDominus.TempusDominus(document.getElementById('dataCadastroPicker'), {
  display: {
    components: {
      calendar: true,
      date: true,
      month: true,
      year: true,
      decades: true,
      clock: false,
    },
    buttons: {
      today: false,
      clear: true,
      close: true,
    },
  },
  localization: {
    locale: 'pt-BR',
    format: 'dd/MM/yyyy',
  }
});


//Depoimento
document.addEventListener('DOMContentLoaded', function () {
  const picker = new tempusDominus.TempusDominus(document.getElementById('datetimepicker'), {
    display: {
      components: {
        calendar: true,
        date: true,
        month: true,
        year: true,
        decades: true,
        clock: true,
        hours: true,
        minutes: true,
        seconds: true,
      },
      buttons: {
        today: true,
        clear: true,
        close: true,
      },
    },
    localization: {
      locale: 'pt-BR',
      hourCycle: 'h23',
      format: 'dd/MM/yyyy HH:mm:ss',
    },
  });
});
