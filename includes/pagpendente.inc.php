<?php

        require_once "dbh.inc.php";

        $query = "SELECT associados.nome, associados.cpf, anuidades.ano, anuidades.custo FROM associados INNER JOIN anuidades ON associados.id = anuidades.ass_id
        WHERE anuidades.pago = 0";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $resultados = $stmt->fetchAll();

        if ($resultados) {
            $map;
            echo "<tr>";
            echo "<td>" . "nome/"  . "</td>";
            echo "<td>" . "cpf/" . "</td>";
            echo "<td>" . "ano/" . "</td>";
            echo "<td>" . "custo" ."</td>";
            echo "</tr>";
            echo "<br>";
            foreach ($resultados as $associado) {
                echo "<tr>";
                echo "<td>" . $associado['nome'] . " / " . "</td>";
                echo "<td>" . $associado['cpf'] . " / ". "</td>";
                echo "<td>" . $associado['ano'] . " / ". "</td>";
                echo "<td>" . $associado['custo'] ."</td>";
                echo "</tr>";
                echo "<br>";
            }

            $query = "SELECT associados.nome, associados.cpf, SUM(anuidades.custo) FROM associados INNER JOIN anuidades ON associados.id = anuidades.ass_id
            WHERE anuidades.pago = 0 GROUP BY anuidades.ass_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "valores totais";
                echo "<br>";
            foreach ($resultados as $associado) {
                echo "<tr>";
                echo "<td>" . $associado['nome'] . " / " . "</td>";
                echo "<td>" . $associado['cpf'] . " / ". "</td>";
                echo "<td>" . $associado['custo'] ."</td>";
                echo "</tr>";
                echo "<br>";
            }

            /*foreach ($resultados as $associado) {
                echo "<tr>";
                echo "<td>" . $associado['nome'] . " / " . "</td>";
                echo "<td>" . $associado['cpf'] . " / ". "</td>";
                echo "<td>" . $associado['custo'] ."</td>";
                echo "</tr>";
                echo "<br>";
            }*/

         } else {
            echo "Nenhum associado com pendencias";
        }
        
        $pdo = null;
        $stmt = null;
?>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form action = "../index.php">
        <button>Voltar para menu</button>
        </form>

</body>
</html>
