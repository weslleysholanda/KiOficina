<?php

class Cliente extends Model{
    

    public function buscarCliente($email){
        $sql =  "SELECT * FROM tbl_cliente WHERE email_cliente = :email AND status_cliente = 'Ativo'  ";
    }
}