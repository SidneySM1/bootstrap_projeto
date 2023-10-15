<?php
require_once('../backend/conn.php');

$ip = $_SERVER['REMOTE_ADDR'];

// Verifique o valor enviado pela solicitação AJAX
$isLiked = $_POST['isLiked'];

if ($isLiked == 'true') {
    // Adicione o like
    $conn->query("INSERT INTO likes (ip) VALUES ('$ip')");
} else {
    // Remova o like
    $conn->query("DELETE FROM likes WHERE ip = '$ip'");
}

$conn->close();
?>
