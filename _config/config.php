<?php

// --------------------------- //
//       ERRORS DISPLAY        //
// --------------------------- //

// Activer l'affichage des erreurs uniquement en mode développement
if (getenv('APP_ENV') === 'development') {
    error_reporting(E_ALL); // Afficher toutes les erreurs
    ini_set('display_errors', '1'); // Afficher les erreurs à l'écran
} else {
    error_reporting(E_ERROR | E_PARSE); // Afficher uniquement les erreurs critiques
    ini_set('display_errors', '0'); // Ne pas afficher les erreurs sur le site
}

// --------------------------- //
//          SESSIONS           //
// --------------------------- //

ini_set('session.cookie_lifetime', 86400); // Durée de vie du cookie de session (1 jour)
ini_set('session.gc_maxlifetime', 86400); // Durée de vie maximale de la session (1 jour)
session_start();

// Sécuriser la session
if (session_status() === PHP_SESSION_ACTIVE) {
    session_regenerate_id(true); // Générer un nouvel ID de session pour plus de sécurité
}

// --------------------------- //
//         CONSTANTS           //
// --------------------------- //

// Paths - Améliorer l'utilisation des chemins
define("PATH_REQUIRE", rtrim(dirname(__FILE__), '/\\') . '/'); // Path absolu pour les inclusions PHP
define("PATH", rtrim($_SERVER['PHP_SELF'], '/\\') . '/'); // Path pour les fichiers publics (images, CSS, JS, etc.)

// Website information - Il est préférable d'utiliser des variables d'environnement ou un fichier de config pour gérer ces valeurs
define("WEBSITE_TITLE", "Mon site");
define("WEBSITE_NAME", "Mon site");
define("WEBSITE_URL", "https://monsite.com");
define("WEBSITE_DESCRIPTION", "Description du site");
define("WEBSITE_KEYWORDS", "blog, php, développement");
define("WEBSITE_LANGUAGE", "fr");
define("WEBSITE_AUTHOR", "Nom de l'auteur");
define("WEBSITE_AUTHOR_MAIL", "contact@monsite.com");

// Facebook Open Graph tags - Idem, pour éviter de hardcoder, utiliser des variables d'environnement si nécessaire
define("WEBSITE_FACEBOOK_NAME", "Mon site");
define("WEBSITE_FACEBOOK_DESCRIPTION", "La meilleure plateforme de blogs.");
define("WEBSITE_FACEBOOK_URL", "https://monsite.com");
define("WEBSITE_FACEBOOK_IMAGE", "https://monsite.com/images/facebook-image.jpg");

// DataBase informations - Utilisation de variables d'environnement pour des raisons de sécurité (ne pas stocker en clair dans le code)
define("DATABASE_HOST", getenv('DATABASE_HOST') ?: 'localhost'); // Utiliser un fallback si la variable d'environnement n'est pas définie
define("DATABASE_NAME", getenv('DATABASE_NAME') ?: 'blog');
define("DATABASE_USER", getenv('DATABASE_USER') ?: 'root');
define("DATABASE_PASSWORD", getenv('DATABASE_PASSWORD') ?: '');
