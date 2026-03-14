<?php
// 1. Autoriser le Frontend (Next.js) à lire ces données (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// 2. Inclure la connexion à la base
require_once 'db.php';

try {
    // 3. Récupérer les utilisateurs
    $query = "SELECT id, name, email FROM users";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 4. Envoyer les données au format JSON
    echo json_encode($users);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur de base de données : " . $e->getMessage()]);
}
