<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "xuitter_db";;

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_POST['id'];
$curtida = $_POST['curtida']; 

$sql = "UPDATE publicacoes SET curtida = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $curtida, $id);

if ($stmt->execute()) {
    echo "Publicação atualizada com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>