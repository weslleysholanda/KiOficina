<?php

class Depoimento extends Model{

    //Método para listar depoimentos
    public function getDepoimentoCliente(){
        $sql="SELECT * FROM tbl_depoimento INNER JOIN tbl_cliente ON tbl_depoimento.id_cliente = tbl_cliente.id_cliente INNER JOIN tbl_estado ON tbl_cliente.id_uf = tbl_estado.id_uf Where status_depoimento = 'Ativo' ";
        $stmt = $this -> db -> query($sql);
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
    

    public function getListarDepoimento(){
        $sql = "SELECT * FROM tbl_depoimento INNER JOIN tbl_cliente ON tbl_depoimento.id_cliente = tbl_cliente.id_cliente INNER JOIN tbl_estado ON tbl_cliente.id_uf = tbl_estado.id_uf Where status_depoimento = 'Ativo'";
        $stmt = $this->db -> query($sql);
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCliente(){
        $sql = "SELECT * FROM tbl_cliente";
        $stmt = $this-> db -> query($sql);
        return $stmt-> fetchAll(PDO::FETCH_ASSOC);
    }


    public function addDepoimento($dados){
        $sql = "INSERT INTO tbl_depoimento(
        id_cliente,
        descricao_depoimento,
        nota_depoimento,
        datahora_depoimento,
        status_depoimento
        )VALUES(
        :id_cliente,
        :descricao_depoimento,
        :nota_depoimento,
        :datahora_depoimento,
        :status_depoimento)";


        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':id_cliente',$dados['id_cliente']);
        $stmt->bindValue(':descricao_depoimento',$dados['descricao_depoimento']);
        $stmt->bindValue(':nota_depoimento',$dados['nota_depoimento']);
        $stmt->bindValue(':datahora_depoimento',$dados['datahora_depoimento']);
        $stmt->bindValue(':status_depoimento',$dados['status_depoimento']);
        
        $stmt -> execute();

        return $this->db->lastInsertId();


    }
}