<?php


class Funcionario extends Model{
    
    public function buscarFuncionario($email){
        $sql =  "SELECT * FROM tbl_funcionario WHERE email_funcionario = :email AND status_funcionario = 'Ativo'  ";
        $stmt = $this -> db->prepare($sql);
        $stmt->bindValue(':email',$email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}