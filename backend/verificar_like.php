<?php
// Conecte-se ao banco de dados (substitua com suas configurações)
$servername = "sql9.freesqldatabase.com";
$username = "sql9653017";
$password = "PFyMmwV2PK";
$dbname = "sql9653017";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Obtenha o endereço IP do usuário
$ip = $_SERVER['REMOTE_ADDR'];

// Verifique se o IP já deu like
$result = $conn->query("SELECT * FROM likes WHERE ip = '$ip'");

if ($result->num_rows > 0) {
    echo 'true';
} else {
    echo 'false';
}

$conn->close();
?>
