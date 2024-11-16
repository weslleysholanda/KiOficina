<?php

class ServicoController extends Controller{
    public function index(){
        $dados = array();
        $dados['titulo'] = 'Serviços - KiOficina';

        $servicoModel = new Servico();
        $servicoAll = $servicoModel->getServicoAll();

        $dados['servicos'] =   $servicoAll;

        $this ->carregarViews('servico',$dados);
    }
}