<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'student_ws';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}


$stmt = $pdo->prepare('SELECT id, name, email, phone FROM students');
$stmt->execute();
$students = $stmt->fetchAll();

header('Content-Type: application/json');
echo json_encode($students);
