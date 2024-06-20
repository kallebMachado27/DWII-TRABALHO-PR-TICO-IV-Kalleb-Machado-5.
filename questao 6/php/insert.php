<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "xuitter_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$texto = $_POST['texto'];

$sql = "INSERT INTO publicacoes (texto) VALUES (?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $texto);

if ($stmt->execute()) {
    echo "Publicação inserida com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>