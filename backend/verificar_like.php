<?php
require_once('../backend/conn.php');

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
