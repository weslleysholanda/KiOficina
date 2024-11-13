<?php

class Servico extends Model{

    //Método para pegar somente 3 servicos de forma aleatória
    public function getServicoAleatorio($limite = 3){
       
        $sql = "SELECT * FROM tbl_servico where status_servico = 'Ativo' ORDER BY RAND() LIMIT :limite";
        // prepare() Prepara uma instrução SQL para ser executada pelo método PDOStatement::execute().
        $stmt = $this -> db -> prepare($sql);

        $stmt -> bindValue(':limite',(int)$limite, PDO::PARAM_INT);
        $stmt -> execute();
        //fetchALL
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
    }


    //Método para listar todos os serviços ativos por ordem alfabetica
    public function getServicoAll(){
        $sql = "SELECT * FROM tbl_servico where status_servico = 'Ativo' ORDER BY nome_servico ASC";

        $stmt = $this -> db -> prepare($sql);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
}