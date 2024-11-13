<?php

class ServicoController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Serviços - KiOficina';
        $this ->carregarViews('servico',$dados);


        $servicoModel = new Servico();
        $servicoAll = $servicoModel->getServicoAll();

        $dados['servicos'] =   $servicoAll;
    }
}