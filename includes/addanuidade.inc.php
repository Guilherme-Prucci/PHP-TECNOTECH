    <?php
    try{
        require_once "dbh.inc.php";

        $query = "INSERT INTO anuidades (ass_id) SELECT u.id FROM associados u WHERE NOT EXISTS ( SELECT 1 FROM anuidades a WHERE a.ass_id = u.id AND a.ano = YEAR(CURRENT_TIMESTAMP()));";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        
        $pdo = null;
        $stmt = null;

        header("Location:../index.php");
        die();

    } catch(PDOException $e){
        die("Query falied: " . $e->getMessage());
    }