<?php

class Dashboard extends Model{

    public function getUsuarioLogado(){
        $sql = "SELECT * FROM tbl_funcionario INNER JOIN tbl_especialidade ON tbl_funcionario.id_especialidade = tbl_especialidade.id_especialidade WHERE status_funcionario = 'Ativo'; ";
        $stmt= $this -> db -> query($sql);  
        //PDO::FETCH_ASSOC: retorna um array indexado pelo nome da coluna como retornada no resultado
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
}