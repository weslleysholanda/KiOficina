<?php

class AreaController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Área Atuação - KiOficina';
        
        $this -> carregarViews('area',$dados);
    }
}