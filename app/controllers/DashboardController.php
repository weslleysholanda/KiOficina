<?php

    class DashboardController extends Controller{

        public function index(){

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if(!isset($_SESSION['userId']) || !isset($_SESSION['userTipo'])){
                header('Location:'. BASE_URL);
                exit();
            }
            // var_dump($_SESSION['userNome']);
            

            

            $dados = array();
            $dados['titulo'] = 'Dashboard - Ki Oficina';
            $dados['nomeUser'] = $_SESSION['userNome'];
            $dados['idUser'] = $_SESSION['userId'];
            $dados['tipoUser'] = $_SESSION['userTipo'];

          



            $this->carregarViews('dash/dashboard', $dados);
        }

        public function usuario($nome){
            var_dump($nome);
            // $dados = array();

            $dashboardModel= new Dashboard();

            //pegar os dados do usuario Logado
            $usuario = $dashboardModel -> getUsuarioLogado($nome);

            $dados['usuario'] = $usuario;
            var_dump($usuario);

            $this->carregarViews('dash/dashboard', $dados);
        }

            
       
    }