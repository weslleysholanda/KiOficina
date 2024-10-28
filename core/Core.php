<?php

class Core{


    //Método inicializar o processo de ROTAS
    public function executar(){
        $url = '/';
       

        //Verificar se a variavel URL esta definida na $_GET
        if(isset($_GET['url'])){
            $url .= $_GET['url'];
           
        }

        // var_dump($url); 
        
        // Definindo um array para armazenar os parametros da URL
        // $parametro = array();

        // //Verifica se a URL não está vazia e não é apenas uma /
        if(!empty($url) && $url != '/'){
            // servicos/especialidade/nomeServico
            // controller/ação/parametro
            $url = explode('/', $url);
            var_dump($url);
            
            // servicos[0]
            // especialidade[1]
            // nomeServico[2]
            
            array_shift($url);
            // var_dump($url);

            //Obter o controller atual
            //ucfirst serve para a primeira letra do php do array $url ser maiuscula
            // . foi utilizado como Contatenação com o 'Controller' ao nome para seguir o padrão
            $controladorAtual = ucfirst($url[0]) . 'Controller'; 

            array_shift($url);
            // var_dump($url);

            // isset — Determina se uma variável está declarada e é diferente de null
            // empty - Determina se uma variável está vazia
            if(isset($url[0]) && !empty($url[0])){
                $acaoAtual = $url[0];
                // var_dump("Nome da ação atual: ".$acaoAtual);
                array_shift($url);
            }else{
                $acaoAtual = 'index';  
                // var_dump($acaoAtual);     
            }

            // count— Conta todos os elementos em uma matriz ou em um objeto
            if(count($url) > 0){
                $parametro = $url;
            }else{
                $controladorAtual = 'HomeController';
                $acaoAtual = 'index';
            }

            //Verificando se o arquivo do CONTROLLER existe e se o método existe na class

            //file_exists - Verifica se um arquivo ou diretório existe
            //method_exists- Verifica se o método de classe existe
            if(!file_exists('../app/controllers/' . $controladorAtual . '.php') ||!method_exists($controladorAtual, $acaoAtual)){

                //Se não existir defina o controller como ErroController
                
                $acaoAtual = 'index';
            }
        }

        // // Instancia do controller atual
        // $controller = new $controladorAtual();

        // // call_user_func_array - Chama um retorno de chamada com uma matriz de parâmetros
        // call_user_func_array(array($controller, $acaoAtual), $parametro);
    }
}