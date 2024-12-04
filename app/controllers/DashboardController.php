<?php

class DashboardController extends Controller
{   
    private $dashboardModel;
    public function __construct(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->dashboardModel = new Dashboard();
    }
    public function index()
    {

        if (!isset($_SESSION['userId']) || !isset($_SESSION['userTipo'])) {
            header('Location:' . BASE_URL);
            exit();
        }
        // var_dump($_SESSION['userNome']);

        $dados = array();
        $dados['titulo'] = 'Dashboard - Ki Oficina';
        $dados['nomeUser'] = $_SESSION['userNome'];
        $dados['idUser'] = $_SESSION['userId'];
        $dados['tipoUser'] = $_SESSION['userTipo'];


        

        //pegar os dados do usuario Logado
        $dados['usuario'] = $this->dashboardModel->getUsuarioLogado($_SESSION['userId']);
        //pegar dados do estoque
        $dados['estoque'] = $this->dashboardModel->getEstoque();
        //pegar dados do cliente
        $dados['cadastro'] = $this->dashboardModel->getCadastroUsuario();

        //pegar dados servico realizado
        $dados['servico'] =  $this->dashboardModel->getServicoRealizado();

        // pegar dados depoimento
        $dados['depoimento'] = $this->dashboardModel ->getDepoimento();

        //pegar dados vendas
        $dados['total_vendas'] =  $this->dashboardModel ->getVendas();

        //total receita
        $dados['total_receita'] = $this->dashboardModel ->getReceitaTotal();

        //porcentagem
        $dados['totalPorcentagem'] =$this->dashboardModel ->getPorcentagem();

        // var_dump($usuario);

        $this->carregarViews('dash/dashboard', $dados);
    }
}
