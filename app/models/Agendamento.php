<?php

class Agendamento extends Model{

    public function getListarAgendamento(){
        $sql = "SELECT  nome_cliente,foto_cliente,alt_foto_cliente,nome_modelo,nome_funcionario,data_agendamento,status_agendamento FROM tbl_agendamento INNER JOIN tbl_veiculo ON tbl_agendamento.id_veiculo = tbl_veiculo.id_veiculo
                INNER JOIN tbl_funcionario ON tbl_agendamento.id_funcionario = tbl_funcionario.id_funcionario
                INNER JOIN tbl_modelo ON tbl_veiculo.id_modelo = tbl_modelo.id_modelo
                INNER JOIN tbl_cliente ON tbl_veiculo.id_cliente = tbl_cliente.id_cliente;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);        
    }
}