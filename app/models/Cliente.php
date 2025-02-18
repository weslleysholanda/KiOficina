<?php

class Cliente extends Model
{

    public function buscarCliente($email)
    {
        $sql =  "SELECT * FROM tbl_cliente WHERE email_cliente = :email AND status_cliente = 'Ativo'  ";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getListarCliente()
    {
        $sql = "SELECT * FROM tbl_cliente;";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCliente($dados)
    {
        $sql = "INSERT INTO tbl_cliente (
                    nome_cliente,
                    tipo_cliente,
                    cpf_cnpj_cliente,
                    data_nasc_cliente,
                    email_cliente,
                    senha_cliente,
                    foto_cliente,
                    alt_foto_cliente,
                    telefone_cliente,
                    endereco_cliente,
                    bairro_cliente,
                    cidade_cliente,
                    id_uf,
                    status_cliente
                ) VALUES (
                    :nome_cliente,
                    :tipo_cliente,
                    :cpf_cnpj_cliente,
                    :data_nasc_cliente,
                    :email_cliente,
                    :senha_cliente,
                    :foto_cliente,
                    :alt_foto_cliente,
                    :telefone_cliente,
                    :endereco_cliente,
                    :bairro_cliente,
                    :cidade_cliente,
                    :id_uf,
                    :status_cliente
                )";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome_cliente', $dados['nome_cliente']);
        $stmt->bindValue(':tipo_cliente', $dados['tipo_cliente']);
        $stmt->bindValue(':cpf_cnpj_cliente', $dados['cpf_cnpj_cliente']);
        $stmt->bindValue(':data_nasc_cliente', $dados['data_nasc_cliente']);
        $stmt->bindValue(':email_cliente', $dados['email_cliente']);
        $stmt->bindValue(':senha_cliente', $dados['senha_cliente']);
        $stmt->bindValue(':foto_cliente', $dados['foto_cliente']);
        $stmt->bindValue(':alt_foto_cliente', $dados['alt_foto_cliente']);
        $stmt->bindValue(':telefone_cliente', $dados['telefone_cliente']);
        $stmt->bindValue(':endereco_cliente', $dados['endereco_cliente']);
        $stmt->bindValue(':bairro_cliente', $dados['bairro_cliente']);
        $stmt->bindValue(':cidade_cliente', $dados['cidade_cliente']);
        $stmt->bindValue(':id_uf', $dados['id_uf']);
        $stmt->bindValue(':status_cliente', $dados['status_cliente']);

        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getClienteById($id)
    {
        $sql = "SELECT * FROM tbl_cliente WHERE id_cliente = :id_cliente LIMIT 1;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue('id_cliente', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarCliente($id, $dados)
    {
        $sql = "UPDATE tbl_cliente SET
                    nome_cliente        = :nome_cliente,
                    tipo_cliente        = :tipo_cliente,
                    cpf_cnpj_cliente    = :cpf_cnpj_cliente,
                    data_nasc_cliente   = :data_nasc_cliente,
                    email_cliente       = :email_cliente,
                    telefone_cliente    = :telefone_cliente,
                    endereco_cliente    = :endereco_cliente,
                    bairro_cliente      = :bairro_cliente,
                    cidade_cliente      = :cidade_cliente,
                    id_uf               = :id_uf,
                    status_cliente      = :status_cliente,
                    foto_cliente        = :foto_cliente,
                    alt_foto_cliente    = :alt_foto_cliente";

        // Atualiza a senha apenas se estiver no array
        if (!empty($dados['senha_cliente'])) {
            $sql .= ", senha_cliente = :senha_cliente";
        }

        $sql .= " WHERE id_cliente = :id_cliente";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome_cliente', $dados['nome_cliente']);
        $stmt->bindValue(':tipo_cliente', $dados['tipo_cliente']);
        $stmt->bindValue(':cpf_cnpj_cliente', $dados['cpf_cnpj_cliente']);
        $stmt->bindValue(':data_nasc_cliente', $dados['data_nasc_cliente']);
        $stmt->bindValue(':email_cliente', $dados['email_cliente']);
        $stmt->bindValue(':telefone_cliente', $dados['telefone_cliente']);
        $stmt->bindValue(':endereco_cliente', $dados['endereco_cliente']);
        $stmt->bindValue(':bairro_cliente', $dados['bairro_cliente']);
        $stmt->bindValue(':cidade_cliente', $dados['cidade_cliente']);
        $stmt->bindValue(':id_uf', $dados['id_uf'], PDO::PARAM_INT);
        $stmt->bindValue(':status_cliente', $dados['status_cliente']);
        $stmt->bindValue(':foto_cliente', $dados['foto_cliente']);
        $stmt->bindValue(':alt_foto_cliente', $dados['alt_foto_cliente']);
        $stmt->bindValue(':id_cliente', $id, PDO::PARAM_INT);

        if (!empty($dados['senha_cliente'])) {
            $stmt->bindValue(':senha_cliente', $dados['senha_cliente']);
        }

        return $stmt->execute();
    }

    public function servicoExecutadoPorIdCliente($id)
    {
        $sql = "SELECT 
                s.id_servico,
                s.nome_servico,
                s.descricao_servico,
                se.valor_serv_executado,
                se.tempo_serv_executado,
                os.id_ordem,
                os.data_abertura_ordem,
                os.data_fechamento_ordem
                FROM tbl_servico_executado se
                INNER JOIN tbl_ordem_servico os ON se.id_ordem = os.id_ordem
                INNER JOIN tbl_veiculo v ON os.id_veiculo = v.id_veiculo
                INNER JOIN tbl_cliente c ON v.id_cliente = c.id_cliente
                INNER JOIN tbl_servico s ON se.id_servico = s.id_servico
                WHERE c.id_cliente = :id_cliente;";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cliente', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
