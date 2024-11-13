<?php

//Extends usado pra usar o recurso q esteja em outra classe 
class HomeController extends Controller{

    public function index(){

        $dados = array();

       

        //arrays com duas posições. cada vez q abro uma [] adiciono uma posição a mais
        $dados['mensagem'] = 'Bem-vindo a KiOficina';

        //Instanciando o metodo servico
        $servicoModel = new Servico();

        //Obter os 3 serviços
        $servicoAleatorio = $servicoModel->getServicoAleatorio(3);

        // var_dump($servicoAleatorio);

        $dados['servicos'] = $servicoAleatorio;
        // var_dump($dados);
        // $this palavra-chave permite que você acesse as propriedades e métodos do objeto atual dentro da classe usando o operador de objeto ( ->):
        $this->carregarViews('home',$dados);
    }
}