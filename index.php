<?php
header("Content-Type: application/json");
require "db.php";

$conn->query("CREATE TABLE IF NOT EXISTS visits (
  id INT AUTO_INCREMENT PRIMARY KEY,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$conn->query("INSERT INTO visits () VALUES ()");

$result = $conn->query("SELECT COUNT(*) as total FROM visits");
$row = $result->fetch_assoc();

echo json_encode([
  "message" => "Connected to MySQL ✅",
  "visits" => $row["total"]
]);
?>
