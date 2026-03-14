<?php
$conn = new mysqli("localhost", "appuser", "password", "appdb");

if ($conn->connect_error) {
  die("DB Error");
}
?>
