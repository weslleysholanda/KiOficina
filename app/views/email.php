<?php
    //reconhecer estrutura PHPMAILER
    require_once("vendors/phpmailer/src/PHPMailer.php");
    require_once("vendors/phpmailer/src/SMTP.php");
    $ok = 0;

    try{
        if(isset($_POST["email"])){

            $nome = $_POST["nome"];
            $telefone = $_POST["tel"];
            $email  = $_POST["email"];
            $mensagem = $_POST["mensagem"];
            $assunto = "CONTATO VIA SITE";

            $phpmail = new PHPMailer\PHPMailer\PHPMailer();
            $phpmail -> isSMTP(); //envio por SMTP
            $phpmail -> SMTPDebug = 0;
            $phpmail -> Host = "smtp.hostinger.com"; //SMTP Servidor de Email
            $phpmail -> Port = 465; //Porta do Servidor SMTP

            $phpmail -> SMTPSecure = 'ssl'; //Certificado / Autenticação SMTP
            $phpmail -> SMTPAuth = true; //Caso necessite ser autenticado

            $phpmail -> Username = "senacria@tipi02.smpsistema.com.br"; //Email SMTP
            $phpmail -> Password = "Senac@senacria01"; //Senha SMTP

            $phpmail -> isHTML(true); //Trabalhar com estrtura HTML
            $phpmail -> setFrom("senacria@tipi02.smpsistema.com.br", $nome); //Email do remetente
            $phpmail -> addAddress("senacria@tipi02.smpsistema.com.br", $assunto); //Email do destinatario

            $phpmail -> Subject = $assunto; //Assunto enviado pelo método POST

            //Estrutura do Email
            $phpmail -> msgHtml("Nome:  $nome <br>
                                E-mail: $email <br> 
                                Telefone: $telefone <br> 
                                Mensagem: $mensagem");

            $phpmail -> AltBody= "Nome:  $nome \n
                                E-mail: $email \n 
                                Telefone: $telefone \n 
                                Mensagem: $mensagem";
            
            if($phpmail ->send()){
                $ok=1;
                echo "Mensagem enviada com sucesso!";
                require_once("home.php");
            }else{
                $ok=2;
                echo "Não foi possível enviar a mensagem. Erro: " .$phpmail->ErrorInfo;
                require_once("contato.php");
            }
        } 

    //****************E-MAIL DE RESPOSTA***************** */

    $phpmailResposta = new PHPMailer\PHPMailer\PHPMailer();
   
    $phpmailResposta->isSMTP();
    $phpmailResposta->SMTPDebug = 0;
    $phpmailResposta->Host = "smtp.hostinger.com";
    $phpmailResposta->Port = 465;
    $phpmailResposta->SMTPSecure = 'ssl';
    $phpmailResposta->SMTPAuth = true;
    $phpmailResposta->Username = "senacria@tipi02.smpsistema.com.br";  //Email SMTP
    $phpmailResposta-> Password = "Senac@senacria01"; //Senha SMTP
    $phpmailResposta->isHTML(true);
    $phpmailResposta->setFrom("senacria@tipi02.smpsistema.com.br", "Innova Click");  //Remetemte
    $phpmailResposta->addAddress($email, $nome);  //Destinatário
    $phpmailResposta->Subject = "Resposta - ".$assunto;
 
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
    //caso dê erro ao enviar o email
        require_once("contato.php");
    }
?>