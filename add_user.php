<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require_once 'db.php';

// Gérer la requête OPTIONS (CORS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit;
}

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['name']) && !empty($data['email'])) {
    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute([$data['name'], $data['email']]);
        echo json_encode(["status" => "success", "message" => "Utilisateur ajouté !"]);
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Données incomplètes"]);
}
?>
