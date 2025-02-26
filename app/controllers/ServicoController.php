<?php

class ServicoController extends Controller
{

    //atributo da classe
    private $servicoModel;
    private $dashboardModel;
    private $especialidadeModel;
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $this->servicoModel = new Servico();
        $this->dashboardModel = new Dashboard();
        $this->especialidadeModel = new Especialidade();
    }
    // Front - END: Carregar a lista de serviços
    public function index()
    {
        $dados = array();
        $dados['titulo'] = 'Serviços - KiOficina';

        $servicoAll = $this->servicoModel->getServicoAll();

        $dados['servicos'] =   $servicoAll;

        $this->carregarViews('servico', $dados);
    }

    // FRONT- END: Carregar o detalhe do serviços
    public function detalhe($link)
    {
        // var_dump($link);

        $dados = array();


        // intanciar o modelo servico
        $detalheServico = $this->servicoModel->getServicoLink($link);

        // var_dump($detalheServico);

        if ($detalheServico != "") {
            $dados['titulo'] = $detalheServico['nome_servico'];
            $dados['detalhe'] = $detalheServico;
            $this->carregarViews('detalhe-servico', $dados);
        } else {
            $this->carregarViews('404', $dados);
        }
    }


    // BACK- END - DASHBOARD

    // 1 - método para listar todos os serviços
    public function listar()
    {
        //iniciar sessão


        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'Funcionario') {

            header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();
        $dados['listaServico'] = $this->servicoModel->getServicoAll();
        // var_dump($dados['listaServico']);
        $dados['conteudo'] = 'dash/servico/listar';

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

    // 2 - método para adicionar serviços
    public function adicionar()
    {

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'Funcionario') {

            header('Location:' . BASE_URL);
            // header('Location:' . BASE_URL);
            exit;
        }

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //tbl_servico
            $nome_servico = filter_input(INPUT_POST, 'nome_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_servico = filter_input(INPUT_POST, 'descricao_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco_base_servico = filter_input(INPUT_POST, 'preco_base_servico', FILTER_SANITIZE_NUMBER_FLOAT);
            $tempo_estimado_servico = filter_input(INPUT_POST, 'tempo_estimado_servico');
            $alt_foto_servico = filter_input(INPUT_POST, 'alto_foto_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $id_especialidade = filter_input(INPUT_POST, 'id_especialidade', FILTER_SANITIZE_NUMBER_INT);
            $status_servico = filter_input(INPUT_POST, 'status_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $nova_especialidade = filter_input(INPUT_POST, 'nova_especialidade', FILTER_SANITIZE_SPECIAL_CHARS);
            // //tbl_galeria
            // $foto_galeria
            // $alt_galeria
            // $status_galeria
            // $id_servico

            // //tbl_especialidade
            // $nome_especialidade

            if ($nome_servico && $descricao_servico && $preco_base_servico !== false) {
                /** 1-Verificar a especialidade*/
                if (empty($id_especialidade) && !empty($nova_especialidade)) {
                    /** Criar e Obter a especialidade nova */
                    $id_especialidade = $this->servicoModel->obterOuCriarEspecialidade($nova_especialidade);
                }

                if (empty($id_especialidade)) {
                    $dados['mensagem'] = "É necessário escolher ou criar uma especialidade!";
                    $dados['tipo-msg'] = "erro";
                    $this->carregarViews('dash/servico/adicionar', $dados);
                    return;
                }

                /** 2- Link do servico*/
                $link_servico = $this->gerarLinkServico($nome_servico);

                /** 3- Preparar dados*/
                $dadosServico = array(
                    'nome_servico'              => $nome_servico,
                    'descricao_servico'         => $descricao_servico,
                    'preco_base_servico'        => $preco_base_servico,
                    'tempo_estimado_servico'    => $tempo_estimado_servico,
                    'alt_foto_servico'          => $nome_servico,
                    'id_especialidade'          => $id_especialidade,  //Esse id_especialidade pode vim da lista ou de uma nova.
                    'status_servico'            => $status_servico,
                    'link_servico'              => $link_servico,
                );

                /**4- Inserir o serviço e obter o ID*/
                $id_servico = $this->servicoModel->addServico($dadosServico);
                if ($id_servico) {
                    if (isset($_FILES['foto_galeria']) && $_FILES['foto_galeria']['error'] == 0) {
                        // var_dump('cheguei aqui');
                        $arquivo = $this->uploadFoto($_FILES['foto_galeria'],$link_servico);
                        if ($arquivo) {
                            // Inserir na Galeria
                            $this->servicoModel->addFotoGaleria($id_servico, $arquivo, $nome_servico);
                        } else {
                            //Definir uma mensagem informando que a foto não foi informado
                        }
                    }

                    /** Mensagem de Sucesso */
                    $_SESSION['mensagem'] = "Serviço adicionado com Sucesso!";
                    $_SESSION['tipo-msg'] = 'sucesso';
                    header('Location: http://localhost/kioficina/public/servico/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao adicionar o serviço";
                    $dados['tipo-msg'] = "erro-servico";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            }
        }

        $dados['conteudo'] = 'dash/servico/adicionar';

        /*Buscar as especialidades*/
        $dados['listarEspecialidade'] = $this->especialidadeModel->getEspecialidade();

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

    // 3 - método para editar serviços
    public function editar($id = null)
    {
        $dados = array();

        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'Funcionario') {

            header('Location:' . BASE_URL);
            exit;
        }



        /** Se não houve ID na URL, redirecionar para página de erro(Lista) */

        if ($id == null) {
            header('Location: http://localhost/kioficina/public/servico/listar');
            exit;
        }

        /** Caso seja Post, processar via FORM*/
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //tbl_servico
            $nome_servico = filter_input(INPUT_POST, 'nome_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao_servico = filter_input(INPUT_POST, 'descricao_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco_base_servico = filter_input(INPUT_POST, 'preco_base_servico', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $tempo_estimado_servico = filter_input(INPUT_POST, 'tempo_estimado_servico');
            $alt_foto_servico = $nome_servico;
            $id_especialidade = filter_input(INPUT_POST, 'id_especialidade', FILTER_SANITIZE_NUMBER_INT);
            $status_servico = filter_input(INPUT_POST, 'status_servico', FILTER_SANITIZE_SPECIAL_CHARS);
            $nova_especialidade = filter_input(INPUT_POST, 'nova_especialidade', FILTER_SANITIZE_SPECIAL_CHARS);
        
            if ($nome_servico && $descricao_servico && $preco_base_servico !== false) {
                /** 1-Verificar a especialidade */
                if (empty($id_especialidade) && !empty($nova_especialidade)) {
                    /** Criar e Obter a especialidade nova */
                    $id_especialidade = $this->servicoModel->obterOuCriarEspecialidade($nova_especialidade);
                }
        
                if (empty($id_especialidade)) {
                    $dados['mensagem'] = "É necessário escolher ou criar uma especialidade!";
                    $dados['tipo-msg'] = "erro";
                    header('Location: http://localhost/kioficina/public/servico/editar/'.$id); // Corrigido o erro no header
                    return;
                }
        
                /** 2- Link do servico */
                $link_servico = $this->gerarLinkServico($nome_servico);
        
                /** 3- Preparar dados */
                $dadosServico = array(
                    'nome_servico'              => $nome_servico,
                    'descricao_servico'         => $descricao_servico,
                    'preco_base_servico'        => $preco_base_servico,
                    'tempo_estimado_servico'    => $tempo_estimado_servico,
                    'alt_foto_servico'          => $nome_servico,
                    'id_especialidade'          => $id_especialidade,  //Esse id_especialidade pode vir da lista ou de uma nova.
                    'status_servico'            => $status_servico,
                    'link_servico'              => $link_servico,
                );
        
                /** 4- Atualizar o serviço */
                $id_servico = $this->servicoModel->atualizarServico($id, $dadosServico);
                if ($id_servico) {
                    if (isset($_FILES['foto_galeria']) && $_FILES['foto_galeria']['error'] == 0) {
                        $arquivo = $this->uploadFoto($_FILES['foto_galeria'], $link_servico);
                        if ($arquivo) {
                            // Inserir na Galeria
                            $this->servicoModel->atualizarFotoGaleria($id, $arquivo, $nome_servico);
                        } else {
                            $dados['mensagem'] = "Erro ao atualizar a foto do serviço";
                            $dados['tipo-msg'] = "erro";
                        }
                    }
                    

                
                    // Mensagem de Sucesso
                    $_SESSION['mensagem'] = "Serviço atualizado com Sucesso!";
                    $_SESSION['tipo-msg'] = 'sucesso';
                    header('Location: http://localhost/kioficina/public/servico/listar');
                    exit;
                } else {
                    $dados['mensagem'] = "Erro ao atualizar o serviço";
                    $dados['tipo-msg'] = "erro";
                }
            } else {
                $dados['mensagem'] = "Preencha todos os campos obrigatórios";
                $dados['tipo-msg'] = "erro";
            }
        }
        


        $servico = $this->servicoModel->getServicoById($id);
        $dados['servico'] = $servico;

        // var_dump($dados['servico']);

        $dados['conteudo'] = 'dash/servico/editar';
        $dados['listarEspecialidade'] = $this->especialidadeModel->getEspecialidade();



        //metodo dashboardcontroller
        $dados['usuario'] = $this->dashboardModel->getUsuarioLogado($_SESSION['userId']);
        //pegar dados do estoque
        $dados['estoque'] = $this->dashboardModel->getEstoque();
        //pegar dados do cliente
        $dados['cadastro'] = $this->dashboardModel->getCadastroUsuario();

        // pegar dados depoimento
        $dados['depoimento'] = $this->dashboardModel->getDepoimento();

        //pegar dados vendas
        $dados['total_vendas'] =  $this->dashboardModel->getVendas();

        //total receita
        $dados['total_receita'] = $this->dashboardModel->getReceitaTotal();


        $this->carregarViews('dash/dashboard', $dados);
    }

    // 4 - método para desativar serviços
    public function desativar($id = null)
    {
        if (!isset($_SESSION['userTipo']) || $_SESSION['userTipo'] !== 'Funcionario') {
            http_response_code(400);
            echo json_encode(["sucesso" => false, "mensagem" => "Acesso negado"]);
            header('Location: http//localhost/kioficina/public/');
            // header('Location:' . BASE_URL);
            exit;
        }

        if($id === null){
            http_response_code(400);
            echo json_encode(["sucesso" => false, "mensagem" => "ID inválido"]);
            exit;
        }

        $resultado = $this->servicoModel->desativarServico($id);
        header('Content-Type: application/json');

        if($resultado){
            $_SESSION['mensagem'] = 'Serviço desativado com sucesso!';
            $_SESSION['tipo-msg'] = 'sucesso';

            echo json_encode(['sucesso' => true]);
        }else{

            $_SESSION['mensagem'] = 'Falha ao desativar o serviço';
            $_SESSION['tipo-msg'] = 'erro';

            echo json_encode(['sucesso' => false, 'mensagem' => 'Falha ao desativar o serviço']);
        }
    }

    public function gerarLinkServico($nome_servico)
    {

        //remover os acentos
        $semAcento = iconv('UTF-8', 'ASCII//TRANSLIT', $nome_servico);

        /**Substituir qualquer caracter que não seja letra ou número por hífen */
        $link = strtolower(trim(preg_replace('/[^a-zA-Z0-9]/', '-', $semAcento)));

        // var_dump($link);

        /**Verificar se já existe no banco */
        $contador = 1;
        $link_original = $link;
        while ($this->servicoModel->existeEsseServico($link)) {
            $link = $link_original . '-' . $contador;
            $contador++;
        }

        // var_dump($link);
        return $link;
    }


    //** Método para upload da Foto */
    private function uploadFoto($file, $link_servico)
    {
 
        $dir = '../public/uploads/servico/';
 
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }
 
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $nome_arquivo = $link_servico . '.' . $ext;
 
 
        if (move_uploaded_file($file['tmp_name'], $dir . $nome_arquivo)) {
            return 'servico/' . $nome_arquivo;
        }
        return false;
    }
    // 0755 PERMISSAO PARA CRIAR O DIRETORIO
}
