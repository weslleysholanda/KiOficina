<?php

class ApiController extends Controller
{

    private $servicoModel;
    private $clienteModel;
    private $veiculoModel;
    private $agendamentoModel;

    public function __construct()
    {
        $this->servicoModel = new Servico();
        $this->clienteModel = new Cliente();
        $this->veiculoModel = new Veiculo();
        $this->agendamentoModel = new Agendamento();
    }

    // listar serviços 
    public function ListarServico()
    {

        $servico = $this->servicoModel->getServicoAll();

        if (empty($servico)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum registro encontrado"]);
            exit;
        }

        echo json_encode($servico, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }


    /** Api Cliente */


    /**Login */
    public function login()
    {

        $email = $_GET['email_cliente'] ?? null;
        $senha = $_GET['senha_cliente'] ?? null;

        // var_dump($email);
        // var_dump($senha);

        if (!$email || !$senha) {
            http_response_code(400);
            echo json_encode(['erro' => 'Email ou senha são obrigatorios'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }


        $cliente = $this->clienteModel->buscarCliente($email);

        // var_dump($cliente);

        if (!$cliente || $senha != $cliente["senha_cliente"]) {
            http_response_code(401);
            echo json_encode(['erro' => 'E-mail ou senha inválido'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }


        //token 
        $token = base64_encode(json_encode(['id' => $cliente['id_cliente'], 'email' => $cliente['email_cliente']]));

        // var_dump($token);

        echo json_encode([
            'mensagem' => 'Login realizado com sucesso',
            'token' => $token
        ]);
    }

    //Retornar os dados do cliente

    public function cliente($id)
    {

        $cliente = $this->clienteModel->getClienteById($id);

        if (!$cliente) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum cliente encontrado"]);
            exit;
        }

        echo json_encode($cliente);
    }


    //Atualizar dados do Cliente
    // Atualizar dados do Cliente
    public function atualizarCliente($id)
    {
        // Obtém os dados enviados no corpo da requisição (JSON)
        $dados = json_decode(file_get_contents('php://input'), true);

        // Verifica se os dados foram decodificados corretamente
        if (!is_array($dados)) {
            http_response_code(400);
            echo json_encode(["erro" => "Formato JSON inválido"]);
            return;
        }

        /** Obter e sanitizar os dados do cliente */
        $nome_cliente       = filter_var($dados['nome_cliente'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $tipo_cliente       = filter_var($dados['tipo_cliente'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $cpf_cnpj_cliente   = filter_var($dados['cpf_cnpj_cliente'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $data_nasc_cliente  = filter_var($dados['data_nasc_cliente'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $email_cliente      = filter_var($dados['email_cliente'] ?? '', FILTER_SANITIZE_EMAIL);
        $senha_cliente      = filter_var($dados['senha_cliente'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $foto_cliente       = filter_var($dados['foto_cliente'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $alt_foto_cliente   = $nome_cliente;
        $telefone_cliente   = filter_var($dados['telefone_cliente'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $endereco_cliente   = filter_var($dados['endereco_cliente'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $bairro_cliente     = filter_var($dados['bairro_cliente'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $cidade_cliente     = filter_var($dados['cidade_cliente'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
        $id_uf              = filter_var($dados['id_uf'] ?? 0, FILTER_VALIDATE_INT);
        $status_cliente     = filter_var($dados['status_cliente'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);



        //Validação dos dados
        if (!$nome_cliente || !$email_cliente || !$cpf_cnpj_cliente) {
            http_response_code(400);
            echo json_encode(["erro" => "Todos os campos são obrigatórios"], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            exit;
        }

        // Preperar os dados
        $dados = [
            'nome_cliente'          => $nome_cliente,
            'tipo_cliente'          => $tipo_cliente,
            'cpf_cnpj_cliente'      => $cpf_cnpj_cliente,
            'data_nasc_cliente'     => $data_nasc_cliente,
            'email_cliente'         => $email_cliente,
            'senha_cliente '        => $senha_cliente,
            'foto_cliente'          => $foto_cliente,
            'alt_foto_cliente'      => $nome_cliente,
            'telefone_cliente'      => $telefone_cliente,
            'endereco_cliente'      => $endereco_cliente,
            'bairro_cliente'        => $bairro_cliente,
            'cidade_cliente'        => $cidade_cliente,
            'id_uf'                 => $id_uf,
            'status_cliente'        => $status_cliente
        ];

        $cliente = $this->clienteModel->atualizarCliente($id, $dados);

        //var_dump($cliente);

        if ($cliente) {
            echo json_encode(['mensagem' => 'Cliente atualizado com sucesso.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(['erro' => 'Erro ao atualizar os dado.'], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
    }

    public function veiculo($id)
    {
        $veiculo = $this->veiculoModel->getVeiculoIdCliente($id);

        if (!$veiculo) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum Veiculo vinculado a um Cliente encontrado"]);
            exit;
        }

        echo json_encode($veiculo);
    }

    public function ListarAgendamento()
    {
        $agendamento = $this->agendamentoModel->getListarAgendamento();

        if (empty($agendamento)) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum registro encontrado"]);
            exit;
        }
        echo json_encode($agendamento);
    }

    public function servicoExecutadoPorCliente($id)
    {

        $executado = $this->clienteModel->servicoExecutadoPorIdCliente($id);

        if (!$executado) {
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum cliente encontrado"]);
            exit;
        }

        echo json_encode($executado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
}
