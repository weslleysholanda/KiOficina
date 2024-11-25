<?php

//Extends usado pra usar o recurso q esteja em outra classe 
class HomeController extends Controller{

    public function index(){

        $dados = array();

       

        //arrays com duas posições. cada vez q abro uma [] adiciono uma posição a mais
        $dados['mensagem'] = 'Bem-vindo a KiOficina';

        //Instanciando o metodo servico
        $servicoModel = new Servico();
        $marcaModel = new Marcas();
        $equipeModel = new Equipe();
        $depoimentoModel = new Depoimento();

        //Obter os 3 serviços
        $servicoAleatorio = $servicoModel->getServicoAleatorio(3);

        // obter 4 servicos nas letras da home 
        $servicoNome = $servicoModel ->getServicoNome(4);

        // obter marcas logo
        $marcaLogo = $marcaModel->getLogoNome();

        //obter depoimento cliente
        $depoimentoCliente = $depoimentoModel -> getDepoimentoCliente();

        //obter nome funcionario(equipe)
        $equipe = $equipeModel ->getEquipe(3);

       

        $dados['servicos'] = $servicoAleatorio;
        $dados['servicosNome'] = $servicoNome;
        $dados['marcasLogo'] = $marcaLogo;
        $dados['depoimentoCliente'] =  $depoimentoCliente;
        $dados['equipe'] = $equipe;
        // var_dump($dados);
        // $this palavra-chave permite que você acesse as propriedades e métodos do objeto atual dentro da classe usando o operador de objeto ( ->):
        $this->carregarViews('home',$dados);
    }
}