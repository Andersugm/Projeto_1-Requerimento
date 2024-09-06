<?php

$dbHost = 'Localhost:3306';
$dbUsername = 'root';
$dbName = 'sre';
$dbPassword = 'root';
//ajustar os dados acima com base na sua config de acesso ao MySQL (dbPassword e dbUsername)
try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
}

?>