<?php

class Equipe extends Model{
    
        //Método para listar a equipe
        public function getEquipe($limite = 3){
            $sql = "SELECT * FROM tbl_funcionario ORDER BY RAND() LIMIT :limite";
    
            $stmt = $this -> db -> prepare($sql);
            $stmt -> bindValue(':limite',(int)$limite,PDO::PARAM_INT);
            $stmt ->execute();
            return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }
    
}