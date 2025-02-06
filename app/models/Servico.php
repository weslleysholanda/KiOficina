<?php

class Servico extends Model
{

    //Método para pegar somente 3 servicos de forma aleatória
    public function getServicoAleatorio($limite = 3)
    {

        $sql = "SELECT * FROM tbl_servico where status_servico = 'Ativo' ORDER BY RAND() LIMIT :limite";
        // prepare() Prepara uma instrução SQL para ser executada pelo método PDOStatement::execute().
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        //fetchALL
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //Método para pegar somente 4 servicos de forma aleatória
    public function getServicoNome($limite = 4)
    {
        $sql = "SELECT * FROM tbl_especialidade ORDER BY RAND() LIMIT :limite ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    //Método para listar todos os serviços ativos por ordem alfabetica
    public function getServicoAll()
    {
        $sql = "SELECT * FROM tbl_servico where status_servico = 'Ativo' ORDER BY nome_servico ASC";
        // query Executa uma consulta no banco de dados
        $stmt = $this->db->query($sql);
        // $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Método para carregar serviço especifico pelo link
    public function getServicoLink($link)
    {
        $sql = " SELECT * from tbl_servico INNER JOIN tbl_galeria ON tbl_servico.id_servico = tbl_galeria.id_galeria where status_servico='Ativo' AND link_servico = :link ";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':link', $link);
        $stmt->execute();
        // fetch encontra somente a linha q precisamos
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para o DASHBOARD - Adicionar Serviço
    public function addServico($dados)
    {

        $sql = "INSERT INTO tbl_servico (
            nome_servico,
            descricao_servico,
            preco_base_servico,
            tempo_estimado_servico,
            alt_foto_servico,
            id_especialidade,
            status_servico,
            link_servico
        ) VALUES (
            :nome_servico,
            :descricao_servico,
            :preco_base_servico,
            :tempo_estimado_servico,
            :alt_foto_servico,
            :id_especialidade,
            :status_servico,
            :link_servico
        )";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':nome_servico', $dados['nome_servico']);
        $stmt->bindValue(':descricao_servico', $dados['descricao_servico']);
        $stmt->bindValue(':preco_base_servico', $dados['preco_base_servico']);
        $stmt->bindValue(':tempo_estimado_servico', $dados['tempo_estimado_servico']);
        $stmt->bindValue(':alt_foto_servico', $dados['alt_foto_servico']);
        $stmt->bindValue(':id_especialidade', $dados['id_especialidade']);
        $stmt->bindValue(':status_servico', $dados['status_servico']);
        $stmt->bindValue(':link_servico', $dados['link_servico']);

        $stmt->execute();

        return $this->db->lastInsertId();

        // vincular os parametro


    }

    public function atualizarServico($id, $dados)
    {
        // Construir a query SQL
        $sql = "UPDATE tbl_servico
                SET nome_servico = :nome_servico,
                    descricao_servico = :descricao_servico,
                    preco_base_servico = :preco_base_servico,
                    tempo_estimado_servico = :tempo_estimado_servico,
                    alt_foto_servico = :alt_foto_servico,
                    id_especialidade = :id_especialidade,
                    status_servico = :status_servico,
                    link_servico = :link_servico
                WHERE id_servico = :id_servico";


        // Preparar a query
        $stmt = $this->db->prepare($sql);

        // Vincular os valores
        $stmt->bindValue(':nome_servico', $dados['nome_servico']);
        $stmt->bindValue(':descricao_servico', $dados['descricao_servico']);
        $stmt->bindValue(':preco_base_servico', $dados['preco_base_servico']);
        $stmt->bindValue(':tempo_estimado_servico', $dados['tempo_estimado_servico']);
        $stmt->bindValue(':alt_foto_servico', $dados['alt_foto_servico']);
        $stmt->bindValue(':id_especialidade', $dados['id_especialidade']);
        $stmt->bindValue(':status_servico', $dados['status_servico']);
        $stmt->bindValue(':link_servico', $dados['link_servico']);
        $stmt->bindValue(':id_servico', $id, PDO::PARAM_INT);

        // Executar a query
        $resultado = $stmt->execute();


        return $resultado;
    }

    /** Método para buscar os dados de Serviço de acordo com o ID */
    public function getServicoById($id)
    {
        $sql = "SELECT s.*, g.foto_galeria, e.nome_especialidade FROM tbl_servico s
                LEFT JOIN tbl_galeria g on s.id_servico = g.id_servico 
                inner join tbl_especialidade e on s.id_especialidade = e.id_especialidade  
                where s.id_servico  = :id_servico 
                limit 1;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_servico', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addFotoGaleria($id_servico, $arquivo, $nome_servico)
    {
        $sql = "INSERT INTO tbl_galeria(foto_galeria,alt_galeria,status_galeria,id_servico) 
                VALUES (:foto_galeria, :alt_galeria, :status_galeria, :id_servico)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':foto_galeria', $arquivo);
        $stmt->bindValue(':alt_galeria', $nome_servico);
        $stmt->bindValue(':status_galeria', 'Ativo');
        $stmt->bindValue(':id_servico', $id_servico);
        return $stmt->execute();
    }

    public function atualizarFotoGaleria($id, $arquivo, $alt_servico)
    {

        /**Verificar se existe */
        $sqlVerificar = "SELECT id_galeria from tbl_galeria WHERE id_servico = :id_servico;";
        $stmtVerificar = $this->db->prepare($sqlVerificar);
        $stmtVerificar->bindValue(':id_servico', $id, PDO::PARAM_INT);
        $stmtVerificar->execute();
        $galeria = $stmtVerificar->fetch(PDO::FETCH_ASSOC);

        if ($galeria) {
            //ja existe a foto.. faça um UPDATE

            $sql = "UPDATE tbl_galeria SET foto_galeria = :foto_galeria,
                    alt_galeria = :alt_galeria,
                    status_galeria = :status_galeria 
                    WHERE id_galeria = :id_galeria";

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':foto_galeria', $arquivo);
            $stmt->bindValue(':alt_galeria', $alt_servico);
            $stmt->bindValue(':status_galeria', 'Ativo');
            $stmt->bindValue(':id_galeria', $galeria['id_galeria']);
            return $stmt->execute();
        } else {
            $sql = "INSERT INTO tbl_galeria(foto_galeria,alt_galeria,status_galeria,id_servico) 
                VALUES (:foto_galeria, :alt_galeria, :status_galeria, :id_servico)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':foto_galeria', $arquivo);
            $stmt->bindValue(':alt_galeria', $alt_servico);
            $stmt->bindValue(':status_galeria', 'Ativo');
            $stmt->bindValue(':id_servico', $id);
            return $stmt->execute();
        }
    }

    // Verificar se o link existe
    public function existeEsseServico($link)
    {
        $sql = "SELECT COUNT(*) as total from tbl_servico WHERE link_servico= :link;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':link', $link);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado['total'] > 0;
    }

    /** Criar ou Obter Especialidade */
    public function obterOuCriarEspecialidade($nome)
    {
        $sql = "INSERT INTO tbl_especialidade(nome_especialidade) VALUES (:nome)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        if ($stmt->execute()) {
            return $this->db->lastInsertId();
        }
        return false;
    }

    /**Desativar Servico */
    public function desativarServico($id){
        $sql = "UPDATE tbl_servico SET status_servico = 'Inativo' WHERE id_servico = :id_servico";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_servico', $id ,PDO::PARAM_INT);
        return $stmt->execute();
    }
}
