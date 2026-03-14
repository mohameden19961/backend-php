<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require_once 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') exit;
$data = json_decode(file_get_contents("php://input"), true);
if (!empty($data['nom_classe'])) {
    $stmt = $pdo->prepare("INSERT INTO classes (nom_classe, niveau) VALUES (?, ?)");
    $stmt->execute([$data['nom_classe'], $data['niveau'] ?? 'Standard']);
    echo json_encode(["status" => "success"]);
}
?>
