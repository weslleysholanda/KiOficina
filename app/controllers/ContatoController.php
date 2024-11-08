<?php

use PHPMailer\PHPMailer\PHPMailer;

class ContatoController extends Controller{

    public function index(){
        $dados = array();
        $dados['titulo'] = 'Contato - Ki Oficina';
        $this ->carregarViews('contato',$dados);
    }

    public function enviarEmail(){
        // $_Server variavel global
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //filter_input obtem uma variavel externa

            //FILTER_SANITIZE_SPECIAL_CHARS filtra por caracter especial por exemplo(@#$%)
            $nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);
            // O filtro FILTER_SANITIZE_EMAIL remove todos os caracteres ilegais de um endereço de e-mail.
            $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
            //O filtro FILTER_SANITIZE_NUMBER_INT remove todos os caracteres ilegais de um número
            $tel = filter_input(INPUT_POST,'tel',FILTER_SANITIZE_NUMBER_INT);
            $mensagem =filter_input(INPUT_POST,'mensagem',FILTER_SANITIZE_SPECIAL_CHARS);
            $assunto = 'Contato Via Site';

            // var_dump($nome);
            // var_dump($email);
            // var_dump($tel);
            // var_dump($mensagem);    
            // var_dump($assunto);

            //Estrutura para envio de email

            if($nome && $email && $tel){
                require_once('vendors/phpmailer/src/PHPMailer.php');
                require_once('vendors/phpmailer/src/SMTP.php');
                require_once('vendors/phpmailer/src/Exception.php');
                
                $phpmail = new PHPMAILER();

                try{
                    $phpmail -> isSMTP();  //Envio por smtp
                    $phpmail -> SMTPDebug = 2;
                    $phpmail -> Host = HOST_EMAIL;
                    $phpmail -> Port = PORT_EMAIL;
                    $phpmail -> SMTPSecure = 'ssl'; //certificado / Autenticação SMTP
                    $phpmail -> SMTPAuth = true;    //Caso Necessite ser autenticado
                    
                    $phpmail -> Username = USER_EMAIL; // Email SMTP
                    $phpmail -> Password = PASS_EMAIL; //Senha SMTP

                    $phpmail -> isHTML(true);
                    $phpmail -> setFrom(USER_EMAIL, $nome); //Email do remetente
                    $phpmail -> addAddress('weslleyh98@gmail.com',$assunto); //email do destinatario

                    $phpmail -> Subject = $assunto; //Assunto enviado pelo método POST

                    //Estrutura do email
                    $phpmail -> msgHtml("Nome:  $nome <br>
                                        E-mail: $email <br> 
                                        Telefone: $tel <br> 
                                        Mensagem: $mensagem");

                    $phpmail -> AltBody= "Nome:  $nome \n
                                          E-mail: $email \n 
                                          Telefone: $tel \n 
                                          Mensagem: $mensagem";
            
                    $phpmail ->send();

                    $dados = array(
                        'menasagem' => 'Obrigado pelo seu contato, em breve responderemos.',
                        'status' => 'sucesso'
                    );

                    $this ->carregarViews('contato',$dados);

                    //Resposta do email
                    $phpmailResposta = new PHPMAILER;

                    $phpmailResposta -> isSMTP();
                    $phpmailResposta -> SMTPDebug = 0;
                    $phpmailResposta -> Host = HOST_EMAIL;
                    $phpmailResposta -> Port = PORT_EMAIL;
                    $phpmailResposta -> SMTPSecure = 'ssl';
                    $phpmailResposta -> SMTPAuth = true;
                    $phpmailResposta -> Username = USER_EMAIL;
                    $phpmailResposta -> Password = PASS_EMAIL;
                    $phpmailResposta -> isHTML(true);
                    $phpmailResposta -> setFrom(USER_EMAIL, 'KiOficina'); //Remetente
                    $phpmailResposta -> addAddress($email, $nome); // Destinatário
                    $phpmailResposta -> Subject = "Resposta - ". $assunto;

                    $phpmailResposta->msgHTML("$nome <br>
                                Em breve retornaremos seu contato. <br>
                                Mensagem: $mensagem <br>
                                Em caso de dúvidas entre em contato pelo número <br>
                               
                                (11)94002-8922");
                    $phpmailResposta->AltBody="$nome \n
                                Em breve retornaremos seu contato. \n
                                Mensagem: $mensagem \n
                                Em caso de dúvidas entre em contato pelo número \n
                               
                                (11)976848944";
                    $phpmailResposta->send(); 
                }catch(Exception $e){
                    $dados = array(
                        'mensagem' => 'Não foi possível enviar o e-mail. Por favor, tente mais tarde',
                        'status' => 'erro',
                        'nome' => $nome,
                        'email' => $email,
                        'telefone' => $tel,
                        'mensagem' => $mensagem
                    );

                    error_log('Erro ao enviar o e-mail'.$phpmail->ErrorInfo);
                    $this->carregarViews('contato',$dados);
                }

            }else{
                $dados = array();
                $this ->carregarViews('contato',$dados);
            }
        }
    }
}