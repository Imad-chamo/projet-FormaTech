<?php
$dsn = 'mysql:host=localhost;dbname=Formatech;charset=utf8mb4';
$username = 'root';
$password = '';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

$pdo = new PDO($dsn, $username, $password, $options);

?>

