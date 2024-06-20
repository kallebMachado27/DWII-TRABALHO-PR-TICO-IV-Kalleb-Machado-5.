<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Par ou Ímpar</title>
</head>
<body>
    <form action="" method="post">
        <label for="numero">Digite um número:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit">Verificar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST['numero'];
        if ($numero % 2 == 0) {
            echo "O número $numero é PAR.";
        } else {
            echo "O número $numero é ÍMPAR.";
        }
    }
   ?>
</body>
</html>
