<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') exit;

$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['nom']) && !empty($data['class_id'])) {
    $stmt = $pdo->prepare("INSERT INTO students (nom, prenom, email, class_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$data['nom'], $data['prenom'], $data['email'], $data['class_id']]);
    echo json_encode(["status" => "success"]);
}
?>
