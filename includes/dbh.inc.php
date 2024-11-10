<?php

$link = 'mysql:host=localhost;dbname= meu_database;charset=utf8';
$usuario = "root";
$senha = "";


try {
    $pdo = new PDO($link, $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: " . $e->getCode() . " - " . $e->getMessage();
}