<?php

class Marcas extends Model{

    //Método para listar as fotos marcas
    public function getLogoNome(){
        $sql = "SELECT * FROM tbl_marca";
        $stmt = $this -> db -> query($sql);
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
}