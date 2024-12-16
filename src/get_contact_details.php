<?php
require __DIR__ . '/../vendor/phpQuery/phpQuery.php';
include 'dbConfig.php';

$template = file_get_contents('../templates/detail_template.html');
$doc = phpQuery::newDocument($template);

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT name, email, phone, notes FROM contacts WHERE id = :id");
$stmt->execute(['id' => $id]);
$contact = $stmt->fetch();

if ($contact) {
    $doc->find('h2')->text($contact['name']);
    $doc->find('.email')->text("Email : {$contact['email']}");
    $doc->find('.phone')->text("Téléphone : {$contact['phone']}");
    $doc->find('.notes')->text("Notes : {$contact['notes']}");
}

echo $doc->html();
