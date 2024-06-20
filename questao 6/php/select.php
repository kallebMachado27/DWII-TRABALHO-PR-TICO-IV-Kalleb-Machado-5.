<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "xuitter_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT * FROM publicacoes";
$result = $conn->query($sql);

$publicacoes = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $publicacoes[] = $row;
    }
    echo json_encode($publicacoes);
} else {
    echo json_encode(["mensagem" => "0 resultados"]);
}

$conn->close();
?>