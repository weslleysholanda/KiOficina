<?php

class Veiculo extends Model{

    public function getListarVeiculo(){

        $sql = "SELECT * FROM tbl_veiculo INNER JOIN tbl_cliente ON tbl_veiculo.id_cliente = tbl_cliente.id_cliente
                INNER JOIN tbl_modelo ON tbl_veiculo.id_modelo = tbl_modelo.id_modelo;";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVeiculoIdCliente($id){
        $sql = "SELECT v.*,m.* FROM tbl_veiculo v INNER JOIN tbl_modelo m on v.id_modelo = m.id_modelo WHERE v.id_cliente = :id_cliente;";

        $stmt = $this->db->prepare($sql);
        $stmt -> bindValue(':id_cliente',$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}