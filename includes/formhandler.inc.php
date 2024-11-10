<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $associado = $_POST["associado"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    try{
        require_once "dbh.inc.php";

        $query = "INSERT INTO associados (nome, cpf, email) VALUES (?,?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$associado, $cpf, $email]);


        $ass_id = $pdo->lastInsertId();

        $query = "INSERT INTO anuidades (ass_id) VALUES (?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$ass_id]);
        
        $pdo = null;
        $stmt = null;

        header("Location:../index.php");
        die();

    } catch(PDOException $e){
        die("Query falied: " . $e->getMessage());
    }
}else{
    header("Location:../index.php");
}