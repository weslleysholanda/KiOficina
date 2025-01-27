<?php

class ClienteController extends Controller
{
    private $clienteModel;
    private $dashboardModel;
    private $estadoModel;
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->clienteModel = new Cliente();
        $this->dashboardModel = new Dashboard();
        $this->estadoModel = new Estado();
    }
    public function listar(){
        $dados = array();
        $dados['conteudo'] = 'dash/cliente/listar';
        $dados['listarCliente'] = $this->clienteModel->getListarCliente();

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
        $this->carregarViews('dash/dashboard', $dados);
    }

    public function adicionar(){
        $dados = array();
        $dados['conteudo'] = 'dash/cliente/adicionar';
        //estado
        $dados['listarEstado'] = $this->estadoModel->getEstado();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome_cliente = filter_input(INPUT_POST, 'nome_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $tipo_cliente = filter_input(INPUT_POST, 'tipo_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $cpf_cnpj_cliente = filter_input(INPUT_POST, 'cpf_cnpj_cliente', FILTER_SANITIZE_NUMBER_FLOAT);
            $data_nasc_cliente = filter_input(INPUT_POST, 'data_nasc_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $email_cliente = filter_input(INPUT_POST, 'email_cliente', FILTER_SANITIZE_EMAIL);
            $senha_cliente = filter_input(INPUT_POST, 'senha_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $foto_cliente = filter_input(INPUT_POST, 'foto_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $alt_foto_cliente = filter_input(INPUT_POST, 'alt_foto_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $telefone_cliente = filter_input(INPUT_POST, 'telefone_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $endereco_cliente = filter_input(INPUT_POST, 'endereco_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $bairro_cliente = filter_input(INPUT_POST, 'bairro_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $cidade_cliente = filter_input(INPUT_POST, 'cidade_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_uf = filter_input(INPUT_POST, 'id_uf', FILTER_SANITIZE_SPECIAL_CHARS);
            $status_cliente = filter_input(INPUT_POST, 'status_cliente', FILTER_SANITIZE_SPECIAL_CHARS);
        
            // Verificar se uma foto foi enviada
            if (isset($_FILES['foto_cliente']) && $_FILES['foto_cliente']['error'] == 0) {
                $foto_cliente = $this->uploadFoto($_FILES['foto_cliente']);
            }
        
            // Montando o array de dados do cliente
            $dadosCliente = [
                'nome_cliente' => $nome_cliente,
                'tipo_cliente' => $tipo_cliente,
                'cpf_cnpj_cliente' => $cpf_cnpj_cliente,
                'data_nasc_cliente' => $data_nasc_cliente,
                'email_cliente' => $email_cliente,
                // password_hash Criptografar a senha
                'senha_cliente' => password_hash($senha_cliente, PASSWORD_DEFAULT),
                'foto_cliente' => $foto_cliente,
                'alt_foto_cliente' => $nome_cliente,
                'telefone_cliente' => $telefone_cliente,
                'endereco_cliente' => $endereco_cliente,
                'bairro_cliente' => $bairro_cliente,
                'cidade_cliente' => $cidade_cliente,
                'id_uf' => $id_uf,
                'status_cliente' => $status_cliente,
            ];
        
            // Inserir dados no banco
            $id_cliente = $this->clienteModel->addCliente($dadosCliente);
        
            if ($id_cliente) {
                echo "Cliente adicionado com sucesso!";
            } else {
                echo "Erro ao adicionar cliente.";
            }
        }
        
        

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
        $this->carregarViews('dash/dashboard', $dados);
    }

    private function uploadFoto($file){
        $dir = '../public/uploads/';
        if(!file_exists($dir)){
            mkdir($dir, 0755, true);
        }

        $ext = pathinfo($file['name'],PATHINFO_EXTENSION);
        $nome_arquivo = 'cliente/' .uniqid() . '.' . $ext;

        if(move_uploaded_file($file['tmp_name'], $dir . $nome_arquivo)){
            return $nome_arquivo;
        }

        return false;
    }
}
