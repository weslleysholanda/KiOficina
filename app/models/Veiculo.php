<?php

class Veiculo extends Model{

    public function getListarVeiculo(){

        $sql = "SELECT * FROM tbl_veiculo INNER JOIN tbl_cliente ON tbl_veiculo.id_cliente = tbl_cliente.id_cliente
                INNER JOIN tbl_modelo ON tbl_veiculo.id_modelo = tbl_modelo.id_modelo;";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
}