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


    //Método para pegar somente 4 servicos de forma aleatória
    public function getServicoNome($limite = 4){
        $sql = "SELECT * FROM tbl_especialidade ORDER BY RAND() LIMIT :limite ";

        $stmt = $this -> db -> prepare($sql);
        $stmt -> bindValue(':limite',(int)$limite,PDO::PARAM_INT);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);

    }   
    


    //Método para listar todos os serviços ativos por ordem alfabetica
    public function getServicoAll(){
        $sql = "SELECT * FROM tbl_servico where status_servico = 'Ativo' ORDER BY nome_servico ASC";
        // query Executa uma consulta no banco de dados
        $stmt = $this -> db -> query($sql);
        // $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    //Método para listar as fotos marcas
    public function getLogoNome(){
        $sql = "SELECT * FROM tbl_marca";
        $stmt = $this -> db -> query($sql);
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    //Método para listar depoimentos
    public function getDepoimentoCliente(){
        $sql="SELECT * FROM tbl_cliente INNER JOIN tbl_depoimento ON tbl_cliente.id_cliente = tbl_depoimento.id_cliente WHERE status_depoimento = 'Aprovado' ";
        $stmt = $this -> db -> query($sql);
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    //Método para carregar serviço especifico pelo link
    public function getServicoLink($link){
        $sql = " SELECT * from tbl_servico INNER JOIN tbl_galeria ON tbl_servico.id_servico = tbl_galeria.id_galeria where status_servico='Ativo' AND link_servico = :link ";

        $stmt = $this -> db -> prepare($sql);
        $stmt -> bindValue(':link',$link);
        $stmt -> execute();
        // fetch encontra somente a linha q precisamos
        return $stmt -> fetch(PDO::FETCH_ASSOC);
    }


}