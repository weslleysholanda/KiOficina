<?php

class ServicoController extends Controller{

    //atributo da classe
    private $servicoModel;
    public function __construct(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->servicoModel = new Servico();
    }
    // Front - END: Carregar a lista de serviços
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Serviços - KiOficina';

        $servicoAll = $this->servicoModel->getServicoAll();

        $dados['servicos'] =   $servicoAll;

        $this ->carregarViews('servico',$dados);
    }

    // FRONT- END: Carregar o detalhe do serviços
    public function detalhe($link){
        // var_dump($link);

        $dados = array();


        // intanciar o modelo servico
        $detalheServico = $this->servicoModel->getServicoLink($link);
        
        // var_dump($detalheServico);

        if($detalheServico != ""){
            $dados['titulo'] = $detalheServico['nome_servico'];
            $dados['detalhe'] = $detalheServico;
            $this ->carregarViews('detalhe-servico',$dados);
        }else{
            $this ->carregarViews('404',$dados);
        }
    }


    // BACK- END - DASHBOARD
    
    // 1 - método para listar todos os serviços
    public function listar(){
        //iniciar sessão
       

        if(!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'Funcionario'){

            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();
        $dados['listaServico'] = $this ->servicoModel->getServicoAll();
        var_dump($dados['listaServico']);
        $dados['conteudo'] = 'dash/servico/listar';

        $this -> carregarViews('dash/dashboard',$dados);

    }

    // 2 - método para adicionar serviços
    public function adicionar(){

        $dados = array();
        $dados['conteudo'] = 'dash/servico/adicionar';

        $this -> carregarViews('dash/dashboard',$dados);

    }

    // 3 - método para editar serviços
    public function editar(){

        $dados = array();
        $dados['conteudo'] = 'dash/servico/editar';

        $this -> carregarViews('dash/dashboard',$dados);

    }

    // 4 - método para desativar serviços
    public function desativar(){

        $dados = array();
        $dados['conteudo'] = 'dash/servico/desativar';

        $this -> carregarViews('dash/dashboard',$dados);

    }
}