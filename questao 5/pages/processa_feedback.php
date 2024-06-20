<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $motivo = htmlspecialchars($_POST['motivo']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    echo "<h2>Dados Recebidos</h2>";
    echo "Nome: ". $nome. "<br>";
    echo "Email: ". $email. "<br>";
    echo "Motivo do Contato: ". $motivo. "<br>";
    echo "Mensagem: ". $mensagem. "<br>";
    echo '<p><a href="../index.html" class="button">Voltar ao Início</a></p>';


} else {
    header("Location:../index.html");
}
