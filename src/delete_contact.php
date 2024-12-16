<?php
include 'dbConfig.php';

$id = $_POST['id'] ?? 0;
$stmt = $pdo->prepare("DELETE FROM contacts WHERE id = :id");
$stmt->execute(['id' => $id]);
echo "Contact supprimé avec succès.";
