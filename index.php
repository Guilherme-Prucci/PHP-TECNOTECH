
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Adicionar Associado</h3>
    
    <form action = "includes/formhandler.inc.php" method = "post">
        <input type = "text" name = "associado" placeholder = "Associado">
        <input type = "text" name = "email" placeholder = "E-Mail">
        <input type = "text" name = "cpf" placeholder = "CPF sem ponto ou traço">
        <button>Adicionar</button>
    </form>

        <h3>Remover Associado</h3>

        <form action = "includes/userdelete.inc.php" method = "post">
        <input type = "text" name = ":associado" placeholder = "Associado">
        <input type = "text" name = ":email" placeholder = "E-Mail">
        <input type = "text" name = ":cpf" placeholder = "CPF sem ponto ou traço">
        <button>Deletar</button>
        </form>

        <h3>Pagamento Associado</h3>

        <form action = "includes/updateanu.inc.php" method = "post">
        <input type = "text" name = "cpf" placeholder = "CPF sem ponto ou traço">
        <input type = "year" name = "ano" placeholder = "Ano Pago (branco = todos)">
        <button>Marcar Pago</button>
        </form>

        <h3> Atualizar Custo Anuidade  </h3>

        <form action = "includes/newanu.inc.php" method = "post">
        <input type = "float" name = "valor" placeholder = "Novo valor da anuidade">
        <button>Atualizar Valor Anuidade</button>
        </form>

        <h3> Verificar Pagamentos Pendentes </h3>

        <form action = "includes/pagpendente.inc.php">
        <button>Verrificar</button>
        </form>

        <h3> Enviar todas novas anuidades </h3>

        <form action = "includes/addanuidade.inc.php">
        <button>ENVIAR</button>

</form>
</body>
</html>
