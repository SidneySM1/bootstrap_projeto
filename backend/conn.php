<?php

//banco de dados hospedado na freesqldb
$servername = "sql9.freesqldatabase.com";
$username = "sql9653017";
$password = "PFyMmwV2PK";
$dbname = "sql9653017";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

?>