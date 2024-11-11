<?php

class Contato extends Model{

   //Salvar o email na base de dados
   public function salvarEmail($nome, $email, $tel, $assunto, $mensagem){


    //PDOStatement::bindValue — Vincula um valor a um parâmetro
    $sql = "INSERT INTO tbl_contato(nome_contato,email_contato,telefone_contato,assunto_contato,mensagem_contato) VALUES(:nome_contato, :email_contato, :telefone_contato, :assunto_contato, :mensagem_contato)";

    //prepare() Prepara uma instrução para execução e retorna um objeto de instrução
    $stmt = $this ->db->prepare($sql);
    $stmt ->bindValue(':nome_contato', $nome);
    $stmt ->bindValue(':email_contato', $email);
    $stmt ->bindValue(':telefone_contato', $tel);
    $stmt ->bindValue(':assunto_contato', $assunto);
    $stmt ->bindValue(':mensagem_contato', $mensagem);

    return $stmt -> execute();
   }
}