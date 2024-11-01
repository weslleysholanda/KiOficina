<?php

class ContatoController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = 'Contato - Ki Oficina';
        $this ->carregarViews('contato',$dados);
    }
}