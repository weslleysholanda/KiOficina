<?php

class ServicoController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Serviços - KiOficina';
        $this ->carregarViews('servico',$dados);
    }
}