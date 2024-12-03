<?php

class DashboardController extends Controller
{

    public function index()
    {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

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


        $dashboardModel = new Dashboard();

        //pegar os dados do usuario Logado
        $usuario = $dashboardModel->getUsuarioLogado($_SESSION['userId']);
        //pegar dados do estoque
        $estoque = $dashboardModel->getEstoque();
        //pegar dados do cliente
        $cadastro = $dashboardModel->getCadastroUsuario();

        //pegar dados servico realizado
        $servico = $dashboardModel->getServicoRealizado();
        

        $dados['usuario'] =  $usuario;
        $dados['estoque'] =  $estoque;
        $dados['cadastro'] = $cadastro;
        $dados['servico'] = $servico;
        // var_dump($usuario);

        $this->carregarViews('dash/dashboard', $dados);
    }
}
