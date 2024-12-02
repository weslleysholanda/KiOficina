<?php

class Dashboard extends Model
{

    public function getUsuarioLogado($idFuncionario){
        $sql = "SELECT 
                tbl_funcionario.id_funcionario,
                tbl_funcionario.nome_funcionario,
                tbl_funcionario.cargo_funcionario,
                tbl_funcionario.data_adm_funcionario,
                tbl_funcionario.foto_funcionario,
                tbl_especialidade.nome_especialidade 
            FROM tbl_funcionario 
            INNER JOIN tbl_especialidade 
            ON tbl_funcionario.id_especialidade = tbl_especialidade.id_especialidade 
            WHERE tbl_funcionario.id_funcionario = :id 
            AND status_funcionario = 'Ativo';";

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
        var_dump($resultado);
        return $resultado['total_estoque'];
        
    }
}
