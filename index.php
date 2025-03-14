<?php

/** ========================== Inclusion des fichiers principaux (fichiers de configuration et fonctions) ========================= */
require_once '_config/config.php';
require_once '_functions/functions.php';

// ============================== Définition de la page courante (sécurisée et validée) ===========================//
$page = 'home'; // Valeur par défaut
if (isset($_GET['page']) && !empty($_GET['page'])) {
    // ============================== Nettoyage de la variable GET pour éviter les failles de sécurité ================================ //
    $page = basename(trim(strtolower($_GET['page'])));
}

// ========================================= Tableau contenant toutes les pages disponibles =============================================== //
$allPages = scandir('controllers/');

// ===================================== Vérification de l'existence de la page (utilisation de basename pour plus de sécurité) =========================================== //
if (in_array($page . '_controller.php', $allPages)) {

    // ===================== Connexion à la base de données (si nécessaire ici, sinon gère cela via un autoloader ou un autre fichier) ================================= //
    require_once '_config/db.php';

    // ===================================== Inclusion des fichiers nécessaires (modèle, contrôleur, vue) =========================================== //
    require_once 'models/' . $page . '_model.php';
    require_once 'controllers/' . $page . '_controller.php';
    require_once 'views/' . $page . '_view.php';

} else {
    // ===================================== Page non trouvée, inclusion des fichiers d'erreur =========================================== //
    require_once 'models/error_model.php';
    require_once 'controllers/error_controller.php';
    require_once 'views/error_view.php';
}
