<?php

class Depoimento extends Model{

    //Método para listar depoimentos
    public function getDepoimentoCliente(){
        $sql="SELECT * FROM tbl_depoimento INNER JOIN tbl_cliente ON tbl_depoimento.id_cliente = tbl_cliente.id_cliente INNER JOIN tbl_estado ON tbl_cliente.id_uf = tbl_estado.id_uf Where status_depoimento = 'Aprovado' ";
        $stmt = $this -> db -> query($sql);
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    
}