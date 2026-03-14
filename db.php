<?php
// backend/db.php
$host = getenv('MYSQLHOST');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD');
$db = "railway"; // Cette variable contient 'railway'

$port = getenv('MYSQLPORT');

try {
    // IL EST CRUCIAL D'AJOUTER 'dbname=$db' ICI :
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Erreur de connexion : " . $e->getMessage()]);
    exit;
}
