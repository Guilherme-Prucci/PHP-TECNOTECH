<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $associado = $_POST[":associado"];
    $cpf = $_POST[":cpf"];
    $email = $_POST[":email"];
    try{
        require_once "dbh.inc.php";

        $query = "DELETE FROM associados WHERE nome = :associado AND cpf = :cpf AND email = :email";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":associado", $associado);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":email", $email);

        $stmt->execute();
        
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