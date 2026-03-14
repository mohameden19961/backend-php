<?php
// backend/db.php
$host = getenv('MYSQLHOST');
$user = getenv('MYSQLUSER');
$pass = getenv('MYSQLPASSWORD');
$db   = getenv('MYSQLDATABASE'); // Récupère 'railway' configuré ici
$port = getenv('MYSQLPORT');

try {
    // AJOUT DE dbname=$db DANS LA CHAÎNE CI-DESSOUS
    $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode(["error" => "Erreur de connexion : " . $e->getMessage()]);
    exit;
}
