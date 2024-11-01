<?php

class SobreController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = 'Sobre Nós - Ki Oficina';
        $this ->carregarViews('sobre',$dados);
    }
}