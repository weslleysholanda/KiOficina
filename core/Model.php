<?php

class Model{

    // toda variavel criado dentro de uma classe passa a se chamar atributo da classe 
    // toda função criada na classe é chamada de metodo, para ser acessado a classe deve ser estanciada // metodo  __construct construtor ele constrói sempre q a classe for chamada
    // public =  podem ser acessados de qualquer lugar
    // private = pode ser acessados na própria classe ou de classes referenciadas por herança acima
    // protected = só podem ser acessados por classes que definem esse membro.

    protected $db;

    public function __construct()
    {
        
        try{
            // criando conexão com o banco de dados
            //$this é usado dentro da classe para acessar propriedades/métodos do objeto
                            //$this ->db = new PDO('mysql:dbname=test;host=localhost', 'root', '');
            $this ->db = new PDO('mysql:dbname='.DB_NAME.';host='. DB_HOST, DB_USER,DB_PASS);
                    //setAttribute define um atributo no identificador do banco de dados
                    //PDO::ATT_ERRORMODE = Modo de relatório de erro do PDO. Pode assumir um dos seguintes valores
                    //PDO::ERRMODE_EXCEPTION = Representa um erro levantado pelo PDO
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            //getMessage() Obtém a mensagem da exceção
            echo 'Falha de conexão' . $e->getMessage();
        }

    }


}