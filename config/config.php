<?php

//Definir URL base da aplicação
// define("BASE_URL","https://kioficina.smpsistema.com.br/"); //serve para criar uma constante de forma global
define("BASE_URL","http://localhost/kioficina/"); //serve para criar uma constante de forma global

// Confguração de acesso ao banco de dados(Data Base)
define("HOST_EMAIL", "smtp.hostinger.com"); //Host do sistema
define("PORT_EMAIL","465");   //Nome da data base
define("USER_EMAIL","worlddev@tipi02.smpsistema.com.br");       //Usuario data base
define("PASS_EMAIL","Senac@worlddev01");  //Senha data base 


// Sistema de autoload das classes
spl_autoload_register(function($classe){
    if(file_exists('../app/controllers/' . $classe . '.php')){
        require_once '../app/controllers/' . $classe . '.php';
    }

    if(file_exists('../app/models/'.$classe . '.php')){
        require_once '..app/models/'. $classe . '.php';

    };

    if(file_exists('../core/'.$classe. '.php')){
        require_once '../core/'. $classe . '.php';

    };
});