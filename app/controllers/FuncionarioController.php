<?php

class FuncionarioController Extends Controller{

    private $funcionarioModel;
    private $dashboardModel;
    public function __construct(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();           
        }

        $this->funcionarioModel = new Funcionario();
        $this->dashboardModel = new Dashboard();        
    }
    public function listar(){
        $dados = array();
        $dados['conteudo'] = 'dash/funcionario/listar';
        $dados['listarFuncionario']=$this->funcionarioModel->getListarFuncionario();

        //metodo dashboardcontroller
        //pegar os dados do usuario Logado
        $dados['usuario'] = $this->dashboardModel->getUsuarioLogado($_SESSION['userId']);
        //pegar dados do estoque
        $dados['estoque'] = $this->dashboardModel->getEstoque();
        //pegar dados do cliente
        $dados['cadastro'] = $this->dashboardModel->getCadastroUsuario();
        //pegar dados servico realizado
        $dados['servico'] =  $this->dashboardModel->getServicoRealizado();
        // pegar dados depoimento
        $dados['depoimento'] = $this->dashboardModel->getDepoimento();
        //pegar dados vendas
        $dados['total_vendas'] =  $this->dashboardModel->getVendas();
        //total receita
        $dados['total_receita'] = $this->dashboardModel->getReceitaTotal();

        $this->carregarViews('dash/dashboard',$dados);
    }
}