<?php

class erroController extends Controller{
    
    public function index(){
        $dados = array();

        $dados['titulo'] = 'Erro 404 - KiOficina';
        $this -> carregarViews("404",$dados);
    }
}