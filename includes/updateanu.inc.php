<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $cpf = $_POST["cpf"];
    $ano = $_POST["ano"];
    try{
        require_once "dbh.inc.php";
        
        $query = "SELECT id FROM associados WHERE cpf = :cpf";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->execute();
        $id = $stmt->fetchColumn();

        if($ano ==""){
            $query = "UPDATE anuidades SET pago = 1 WHERE ass_id = :id";

            $stmt = $pdo->prepare($query);
    
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            
            $pdo = null;
            $stmt = null;
            header("Location:../index.php");

        }else{
            $query = "UPDATE anuidades SET pago = 1 WHERE ass_id = :id AND ano = :ano";

            $stmt = $pdo->prepare($query);
    
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":ano", $ano);
            $stmt->execute();
            
            $pdo = null;
            $stmt = null;
            header("Location:../index.php");
        }
        die();
    } catch(PDOException $e){
        die("Query falied: " . $e->getMessage());
    }
}else{
    header("Location:../index.php");
}