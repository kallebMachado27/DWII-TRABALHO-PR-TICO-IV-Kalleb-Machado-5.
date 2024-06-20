<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <label for="num1">Número 1:</label>
        <input type="number" id="num1" name="num1" required>
        
        <label for="operacao">Operação:</label>
        <select id="operacao" name="operacao">
            <option value="">Escolha uma operação</option>
            <option value="soma">Soma</option>
            <option value="subtracao">Subtração</option>
            <option value="multiplicacao">Multiplicação</option>
            <option value="divisao">Divisão</option>
            <option value="raizQuadrada">Raiz Quadrada</option>
        </select>
        
        <label for="num2">Número 2:</label>
        <input type="number" id="num2" name="num2" required>
        
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = floatval($_POST['num1']);
        $num2 = floatval($_POST['num2']);
        $operacao = $_POST['operacao'];

        switch ($operacao) {
            case 'soma':
                $resultado = $num1 + $num2;
                break;
            case 'subtracao':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicacao':
                $resultado = $num1 * $num2;
                break;
            case 'divisao':
                if ($num2!= 0) {
                    $resultado = $num1 / $num2;
                } else {
                    $resultado = "Erro Divisão por zero.";
                }
                break;
            case 'raizQuadrada':
                if ($num1 >= 0) {
                    $resultado = sqrt($num1);
                } else {
                    $resultado = "Erro Raiz quadrada de números negativos não é possível.";
                }
                break;
            default:
                $resultado = "Por favor, selecione uma operação.";
                break;
        }

        echo "<div class='result'><strong>Resultado:</strong> $resultado</div>";
    }
 ?>
</body>
</html>
