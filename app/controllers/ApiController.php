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

        echo json_encode($servico);
    }

    /** Api Cliente */ 

    //Retornar os dados do cliente

    public function cliente($id){

        $cliente = $this-> clienteModel->getClienteById($id);

        if(!$cliente){
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum cliente encontrado"]);
            exit;
        }

        echo json_encode($cliente);
    }

   

    public function veiculo($id){
        $veiculo = $this->veiculoModel->getVeiculoIdCliente($id);

        if(!$veiculo){
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
    
    public function servicoExecutadoPorCliente($id){

        $executado = $this->veiculoModel->servicoExecutadoPorIdCliente($id);

        if(!$executado){
            http_response_code(404);
            echo json_encode(["mensagem" => "Nenhum cliente encontrado"]);
            exit;
        }

        echo json_encode($executado);
    }
}
