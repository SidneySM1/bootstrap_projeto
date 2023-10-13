<?php
require_once('../backend/conn.php');

// Consulta SQL para obter o contador de curtidas.
$sql = "SELECT COUNT(*) AS contador_likes FROM likes";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $contadorLikes = $row["contador_likes"];
} else {
    $contadorLikes = 0; // Se não houver registros na tabela
}

// Feche a conexão com o banco de dados
$conn->close();

// Retorne o contador de curtidas como resposta
echo $contadorLikes;
?>
