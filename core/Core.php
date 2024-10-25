<?php

class Core{


    //Método inicializar o processo de ROTAS
    public function executar(){
        $url = '/';
        // var_dump($url); 

        //Verificar se a variavel URL esta definida na $_GET
        if(isset($_GET['url'])){
            $url .= $_GET['url'];
           
        }
        
        // Definindo um array para armazenar os parametros da URL
        $parametro = array();

        //Verifica se a URL não está vazia e não é apenas uma /
        if(!empty($url) && $url != '/'){
            // servicos/especialidade/nomeServico
            // controller/ação/parametro
            $url = explode('/', $url);
            
            // servicos[0]
            // especialidade[1]
            // nomeServico[2]
            
            array_shift($url);

            // var_dump($url);

            //Obter o controller atual
            //ucfirst serve para a primeira letra do php do array $url ser maiuscula
            // . foi utilizado como Contatenação com o 'Controller' ao nome para seguir o padrão
            $controladorAtual = ucfirst($url[0]) . 'Controller'; 

            // isset — Determina se uma variável está declarada e é diferente de null
            // empty - Determina se uma variável está vazia
            if(isset($url[0]) && !empty($url[0])){
                $acaoAtual = $url[0];
            }else{
                $acaoAtual = 'index';            
            }

            // count— Conta todos os elementos em uma matriz ou em um objeto
            if(count($url) > 0){

            }
        }
    }
}