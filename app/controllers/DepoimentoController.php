<?php

class DepoimentoController extends Controller{
    private $dashboardModel;
    private $depoimentoModel;
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE){
            session_start();

        }

        $this->dashboardModel= new Dashboard();
        $this->depoimentoModel = new Depoimento();
    }
    public function listar(){
        $dados = array();
        $dados['conteudo']='dash/depoimento/listar';
        $dados['listarDepoimento'] =$this->depoimentoModel->getListarDepoimento();

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

    public function adicionar(){
        $dados = array();
        $dados['conteudo'] = 'dash/depoimento/adicionar';
        $dados['listarCliente'] = $this->depoimentoModel->getCliente();
        

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id_cliente = filter_input(INPUT_POST, 'id_cliente',FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_depoimento = filter_input(INPUT_POST, 'descricao_depoimento',FILTER_SANITIZE_SPECIAL_CHARS);
            $nota_depoimento = filter_input(INPUT_POST, 'nota_depoimento',FILTER_SANITIZE_SPECIAL_CHARS);
            $datahora_depoimento = filter_input(INPUT_POST, 'datahora_depoimento',FILTER_SANITIZE_SPECIAL_CHARS);
            $status_depoimento = filter_input(INPUT_POST, 'status_depoimento',FILTER_SANITIZE_SPECIAL_CHARS);
            

            $dadosDepoimento = [
                'id_cliente' => $id_cliente,
                'descricao_depoimento' => $descricao_depoimento,
                'nota_depoimento' => $nota_depoimento,
                'datahora_depoimento' => $datahora_depoimento,
                'status_depoimento' => $status_depoimento,

            ];

            // inserir dados no banco 

            $id_depoimento = $this->depoimentoModel->addDepoimento($dadosDepoimento);

            if($id_depoimento){
                $_SESSION['mensagem'] = 'Depoimento Adicionado com Sucesso!';
                $_SESSION['tipo-msg'] = 'sucesso';
                header('Location: http://localhost/kioficina/public/depoimento/listar ');
                exit;
            }else{
                $_SESSION['mensagem'] = "Erro ao adicionar o depoimento";
                $_SESSION['tipo-msg'] = 'erro';
                header('Location: http://localhost/kioficina/public/depoimento/adicionar');
                exit;
            }
        }
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
        $this->carregarViews('dash/dashboard',$dados);
    }
}