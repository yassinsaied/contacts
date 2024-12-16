<?php
$host = 'localhost';
$dbname = 'gestion_contact';
$username = 'root';
$password = '';

try {
    // Connexion sans DB
    $pdo = new PDO("mysql:host=$host", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    // Créer la base si inexistante
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8 COLLATE utf8_general_ci");
    $pdo->exec("USE $dbname");

    // Créer la table contacts
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS contacts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL UNIQUE,
            email VARCHAR(255),
            phone VARCHAR(15),
            notes TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )CHARACTER SET utf8 COLLATE utf8_general_ci;
    ");

    // Données initiales
    $contacts = [
        ['name' => 'Alice Dupont', 'email' => 'alice.dupont@example.com', 'phone' => '0612345678', 'notes' => 'Amie du lycée.'],
        ['name' => 'Bob Martin', 'email' => 'bob.martin@example.com', 'phone' => '0712345678', 'notes' => 'Collègue de travail.'],
        ['name' => 'Caroline Morel', 'email' => 'caroline.morel@example.com', 'phone' => '0812345678', 'notes' => 'Partenaire de projet.'],
        ['name' => 'Daniel Perrot', 'email' => 'daniel.perrot@example.com', 'phone' => '0912345678', 'notes' => 'Contact professionnel.'],
        ['name' => 'Elisa Bernard', 'email' => 'elisa.bernard@example.com', 'phone' => '0611122233', 'notes' => 'Ancienne colocataire.'],
        ['name' => 'François Laurent', 'email' => 'francois.laurent@example.com', 'phone' => '0722233344', 'notes' => 'Amateur de littérature.'],
        ['name' => 'Gisèle Lefevre', 'email' => 'gisele.lefevre@example.com', 'phone' => '0823344455', 'notes' => 'Voisine aimable.'],
        ['name' => 'Hugo Lambert', 'email' => 'hugo.lambert@example.com', 'phone' => '0924455566', 'notes' => 'Amateur de voyages.'],
        ['name' => 'Isabelle Girard', 'email' => 'isabelle.girard@example.com', 'phone' => '0625566677', 'notes' => 'Organisatrice d’événements.'],
        ['name' => 'Jacques Renault', 'email' => 'jacques.renault@example.com', 'phone' => '0736677788', 'notes' => 'Ancien professeur.'],
        ['name' => 'Katia Duval', 'email' => 'katia.duval@example.com', 'phone' => '0837788899', 'notes' => 'Contact réseau social.'],
        ['name' => 'Louis Petit', 'email' => 'louis.petit@example.com', 'phone' => '0938899900', 'notes' => 'Artiste freelance.'],
        ['name' => 'Marie Roche', 'email' => 'marie.roche@example.com', 'phone' => '0649911223', 'notes' => 'Amie d’enfance.'],
        ['name' => 'Nicolas Durand', 'email' => 'nicolas.durand@example.com', 'phone' => '0750022334', 'notes' => 'Musicien amateur.'],
        ['name' => 'Océane Blanchard', 'email' => 'oceane.blanchard@example.com', 'phone' => '0851133445', 'notes' => 'Connaissance de club.'],
        ['name' => 'Pauline Fournier', 'email' => 'pauline.fournier@example.com', 'phone' => '0952244556', 'notes' => 'Amatrice de cinéma.'],
        ['name' => 'Quentin Mercier', 'email' => 'quentin.mercier@example.com', 'phone' => '0653355667', 'notes' => 'Collaborateur technique.'],
        ['name' => 'Roxane Millet', 'email' => 'roxane.millet@example.com', 'phone' => '0764466778', 'notes' => 'Sportive passionnée.'],
        ['name' => 'Simon Moreau', 'email' => 'simon.moreau@example.com', 'phone' => '0865577889', 'notes' => 'Photographe freelance.'],
        ['name' => 'Théo Garnier', 'email' => 'theo.garnier@example.com', 'phone' => '0966688990', 'notes' => 'Fan de nouvelles technologies.'],
    ];


    foreach ($contacts as $contact) {
        $stmt = $pdo->prepare("
            INSERT INTO contacts (name, email, phone, notes)
            VALUES (:name, :email, :phone, :notes)
            ON DUPLICATE KEY UPDATE email = :email, phone = :phone, notes = :notes
        ");
        $stmt->execute($contact);
    }

    echo "Base de données et table 'contacts' initialisées et peuplées avec succès.\n";
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
