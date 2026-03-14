<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
require_once 'db.php';

try {
    // On lie la table students et classes
    $sql = "SELECT s.*, c.nom_classe 
            FROM students s 
            LEFT JOIN classes c ON s.class_id = c.id 
            ORDER BY s.nom ASC";
    $stmt = $pdo->query($sql);
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
