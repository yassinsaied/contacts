<?php
require 'vendor/phpQuery/phpQuery.php';
include 'dbConfig.php';

$template = file_get_contents('../templates/base_template.html');
$doc = phpQuery::newDocument($template);

$stmt = $pdo->query("SELECT id, name, email, phone FROM contacts ORDER BY name ASC");
$contacts = $stmt->fetchAll();

foreach ($contacts as $contact) {
    $li = "<li data-id='{$contact['id']}'>
            <span class='contact-name'>{$contact['name']}</span>
            <div class='actions'>
                <button class='view-details'>Détails</button>
                <button class='delete'>Supprimer</button>
            </div>
           </li>";
    $doc->find('.contact-list')->append($li);
}

echo $doc->html();
