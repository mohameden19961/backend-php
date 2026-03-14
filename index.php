<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
require_once 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($users);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
