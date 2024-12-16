<?php
// Inclure le fichier de connexion
require_once 'src/dbConfig.php';

try {
    // Vérifier si la table `contacts` existe
    $query = $pdo->query("SHOW TABLES LIKE 'contacts'");
    $tableExists = $query->rowCount() > 0;

    if (!$tableExists) {
        // Si la table n'existe pas, exécuter le script de setup
        require_once 'src/dbSetup.php'; // Inclure script de setup de DB
        // Rediriger automatiquement après setup
        header("Location: index.php");
        exit; // Terminer ici pour éviter de charger l'application avant le setup
    }
} catch (PDOException $e) {
    die("Erreur lors de la vérification de la base de données : " . $e->getMessage());
}

// Charger l'application normalement
include 'templates/index.html';
