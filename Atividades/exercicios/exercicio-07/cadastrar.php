<?php

require_once "./db/connection.php";

try {
    $nome = $_POST['nome'];
    $um = $_POST['um'];

    $produtos = $connection->prepare('INSERT INTO produtos (nome, um) VALUES (?, ?)');
    $produtos->execute(array($nome, $um));

    require_once "index.php";
} catch (\Throwable $th) {
    throw $th;
}
