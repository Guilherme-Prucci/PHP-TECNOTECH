<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $valor = $_POST["valor"];
    try{
        require_once "dbh.inc.php";

        $query = "ALTER TABLE anuidades MODIFY custo FLOAT DEFAULT :valor";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":valor", $valor);
        $stmt->execute();
        
        $query ="UPDATE anuidades SET custo = :valor WHERE ano = YEAR(CURRENT_TIMESTAMP()) AND pago = 0";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":valor", $valor);
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