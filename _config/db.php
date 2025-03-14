<?php

// Configuration de la connexion à la base de données
try {
    $db = new PDO(
        'mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_NAME . ';charset=utf8',
        DATABASE_USER,
        DATABASE_PASSWORD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Gérer les erreurs avec des exceptions
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Retourner les résultats sous forme de tableau associatif
            PDO::ATTR_EMULATE_PREPARES => false, // Désactiver l'émulation des requêtes préparées pour utiliser les vraies requêtes préparées
        ]
    );
} catch (PDOException $e) {
    // Gestion des erreurs de connexion à la base de données
    die('Échec de la connexion à la base de données : ' . $e->getMessage());
}
