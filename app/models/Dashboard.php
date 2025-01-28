<?php

class Dashboard extends Model
{

    public function getUsuarioLogado($idFuncionario){
        $sql = "SELECT * FROM tbl_funcionario INNER JOIN tbl_especialidade ON tbl_funcionario.id_especialidade = tbl_especialidade.id_especialidade WHERE tbl_funcionario.id_funcionario = :id AND status_funcionario = 'Ativo';";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $idFuncionario, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($resultado){
            //DateTime manipula a data
            // format('M.Y') transforma a data no formato desejado
            $datAdm = new DateTime($resultado['data_adm_funcionario']);
            $resultado['membro_desde'] = 'Membro Desde' .$datAdm ->format('M.Y');
        }

        return $resultado;
    }

    public function getEstoque(){
        $sql = "SELECT SUM(qtde_estoque_peca) AS total_estoque FROM tbl_peca WHERE status_peca='Ativo'";
        $stmt = $this -> db -> query($sql);
        $resultado = $stmt ->fetch(PDO::FETCH_ASSOC);
        // var_dump($resultado);
        return $resultado['total_estoque'];
        
    }


    public function getCadastroUsuario(){
        $sql = "SELECT (SELECT COUNT(*) FROM tbl_cliente WHERE status_cliente = 'Ativo') + (SELECT COUNT(*) FROM tbl_funcionario WHERE status_funcionario = 'Ativo') AS total_cadastro;";
        $stmt = $this->db->query($sql); 
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($resultado);
        return $resultado['total_cadastro'];
    }


    public function getServicoRealizado(){
        $sql = "SELECT COUNT(*) AS Servico_Realizado FROM tbl_servico_executado";
        $stmt = $this -> db ->query($sql);
        $resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
        // var_dump($resultado);
        return $resultado['Servico_Realizado'];

    }

    public function getDepoimento(){
        $sql = "SELECT COUNT(*) AS total_depoimentos FROM tbl_depoimento WHERE status_depoimento = 'Aprovado';";
        $stmt = $this -> db -> query($sql);
        $resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $resultado['total_depoimentos'];
    }

    public function getVendas(){
        $sql = "SELECT COUNT(*) AS total_vendas FROM tbl_ordem_servico;";
        $stmt = $this -> db -> query($sql);
        $resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $resultado['total_vendas'];
    }

    public function getReceitaTotal(){
        $sql = "SELECT CONCAT('$', FORMAT(SUM(tbl_ordem_servico.valor_total_ordem), 2)) AS total_receita FROM tbl_ordem_servico";
        $stmt = $this -> db -> query($sql);
        $resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $resultado['total_receita'];
    }
}
