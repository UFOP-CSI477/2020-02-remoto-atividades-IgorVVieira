<?php

class User {
    public $nome, $idade, $cpf, $genero, $estado, $cidade, $email;

    public function  __construct($nome, $idade, $cpf, $genero, $estado, $cidade, $email)
    {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
        $this->genero = $genero;
        $this->estado = $estado;
        $this->cidade = $cidade;
        $this->email = $email;        
    }
}

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$cpf = $_POST['cpf'];
$genero = $_POST['genero'];
$estado = $_POST['estado'];
$cidade = $_POST['celular'];
$email = $_POST['email'];

$user = new User($nome, $idade, $cpf, $genero, $estado, $cidade, $email);

require_once "resultado.php";
