<?php


require __DIR__ . '/../vendor/phpQuery/phpQuery.php';
require __DIR__ . '/dbConfig.php';

// Charger le template HTML de base
$template = file_get_contents(__DIR__ . '/../templates/base_template.html');
$doc = phpQuery::newDocument($template);

// Récupérer les données depuis la base de données
$search = $_GET['search'] ?? ''; // Récupérer la recherche depuis les paramètres GET
$stmt = $pdo->prepare("SELECT id, name, email, phone FROM contacts 
                       WHERE name LIKE :search OR email LIKE :search 
                       ORDER BY name ASC");
$stmt->execute(['search' => "%$search%"]); // Exécuter avec le paramètre de recherche
$contacts = $stmt->fetchAll();

// Insérer les contacts dans le template HTML
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

// Afficher le résultat final
echo $doc->html();
