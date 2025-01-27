<?php

class Estado extends Model{

    public function getEstado(){
        $sql = "SELECT * FROM tbl_estado ORDER BY nome_uf ASC;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
}