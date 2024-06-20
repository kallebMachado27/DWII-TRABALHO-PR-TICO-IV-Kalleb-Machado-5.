<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Contagem de Caracteres</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <label for="texto">Digite algo:</label>
        <input type="text" id="texto" name="texto" required>
        <button type="submit">Contar Caracteres</button>
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texto = $_POST['texto'];
    preg_match_all('/[a-zA-Z0-9]/', $texto, $matches);
    $quantidadeCaracteres = count($matches[0]);
    echo "<div class='result'><strong>Quantidade de Caracteres :</strong> $quantidadeCaracteres</div>";
}
?>
</body>
</html>
