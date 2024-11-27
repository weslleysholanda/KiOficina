<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}


//Definir URL base da aplicação
// define("BASE_URL","https://kioficina.smpsistema.com.br/"); //serve para criar uma constante de forma global
define('BASE_URL','http://localhost/kioficina/public/'); //serve para criar uma constante de forma global

//configuração de acesso banco 
define("DB_HOST", "smpsistema.com.br"); //Host do sistema
define("DB_NAME","u283879542_weslley");   //Nome da data base
define("DB_USER","u283879542_weslley");       //Usuario data base
define("DB_PASS","Weslley@tipi02");          //Senha data base 

// Confguração de envio email
define("HOST_EMAIL", "smtp.gmail.com"); //Host do sistema
define("PORT_EMAIL","465");   //Nome da data base
define("USER_EMAIL","weslleyh98@gmail.com");  //Usuario data base
define("PASS_EMAIL","spjf oxdp pcwv mnvn");  //Senha data base 

// envio por "HOST_EMAIL", "smtp.gmail.com"
// define("USER_EMAIL","weslleyh98@gmail.com");       //Usuario data base
// define("PASS_EMAIL","spjf oxdp pcwv mnvn"); 


// Sistema de autoload das classes
spl_autoload_register(function($classe){
    if(file_exists('../app/controllers/' . $classe . '.php')){
        require_once '../app/controllers/' . $classe . '.php';
    }

    if(file_exists('../app/models/'. $classe . '.php')){
        require_once '../app/models/'. $classe . '.php';

    };

    if(file_exists('../core/'.$classe. '.php')){
        require_once '../core/'. $classe . '.php';

    };
});