<?php

class EmailController extends Controller{
    
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Contato - InnovaClick';
        $this ->carregarViews('email',$dados);
    }

}