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

    public function detalhe($link){
        // var_dump($link);

        $dados = array();


        // intanciar o modelo servico
        $servicoModel = new Servico();
        $detalheServico = $servicoModel->getServicoLink($link);
        
        var_dump($detalheServico);

        if($detalheServico != ""){
            $dados['titulo'] = $detalheServico['nome_servico'];
            $dados['detalhe'] = $detalheServico;
            $this ->carregarViews('detalhe-servico',$dados);
        }else{
            $this ->carregarViews('404',$dados);
        }
    }
}