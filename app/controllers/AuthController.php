<?php

class AuthController extends Controller
{

    public function login()
    {

        // var_dump("Teste de Login");

        $dados = array();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha');

            $tipo_usuario = filter_input(INPUT_POST, 'tipo_usuario');

            // var_dump($email);
            // var_dump($senha);
            // var_dump($tipo_usuario);

            if ($email && $senha && $tipo_usuario) {
                if($tipo_usuario === 'cliente'){
                   $usuarioModel = new Cliente();
                }elseif($tipo_usuario ==='funcionario'){
                    
                }
            } else {
                // Credenciais invalidas
                if ($tipo_usuario === '') {
                    $dados['msg'] = 'Email e senha incorretas';
                    $dados['tipo-msg'] = 'erro-tipo_usuario';
                } else {
                    $dados['msg'] = 'Email e senha incorretas';
                    $dados['tipo-msg'] = 'erro';
                }
            }
        }

        $this->carregarViews('home',$dados);
    }
}
