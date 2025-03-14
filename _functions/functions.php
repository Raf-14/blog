<?php

/**
 * Permet de sécuriser une chaine de caractères
 * @param $string
 * @return string
 */
function str_secur($string) {
    return trim(htmlspecialchars($string));
}

/**
 * Debug plus lisible des différentes variables
 * @param $var
 */
function debug($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

/**
 * Valide une adresse e-mail
 * @param string $email
 * @return bool
 */
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Hash un mot de passe de manière sécurisée
 * @param string $password
 * @return string
 */
function hash_password($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

/**
 * Vérifie un mot de passe par rapport au hash
 * @param string $password
 * @param string $hashedPassword
 * @return bool
 */
function verify_password($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}

/**
 * Valide un numéro de téléphone (format international)
 * @param string $phone
 * @return bool
 */
function is_valid_phone($phone) {
    return preg_match("/^\+?[0-9]{10,15}$/", $phone);
}

/**
 * Nettoie une entrée utilisateur pour prévenir les injections XSS
 * @param string $data
 * @return string
 */
function clean_input($data) {
    return trim(htmlspecialchars($data, ENT_QUOTES, 'UTF-8'));
}

/**
 * Génère une URL propre (convertit les espaces en tirets et rend les caractères minuscules)
 * @param string $string
 * @return string
 */
function create_slug($string) {
    $string = strtolower(trim($string));
    $string = preg_replace('/[^a-z0-9-]/', '-', $string);
    $string = preg_replace('/-+/', '-', $string); // Remplacer plusieurs tirets par un seul
    return $string;
}

/**
 * Vérifie si une chaîne de caractères est vide
 * @param string $string
 * @return bool
 */
function is_empty($string) {
    return empty(trim($string));
}

/**
 * Effectue une redirection HTTP vers une autre page
 * @param string $url
 */
function redirect_to($url) {
    header("Location: $url");
    exit();
}

/**
 * Formate une date selon un format donné
 * @param string $date
 * @param string $format
 * @return string
 */
function format_date($date, $format = 'd-m-Y H:i:s') {
    $timestamp = strtotime($date);
    return date($format, $timestamp);
}

/**
 * Génère un token CSRF et le stocke dans la session
 * @return string
 */
function generate_csrf_token() {
    $token = bin2hex(random_bytes(32)); // Générer un token sécurisé
    $_SESSION['csrf_token'] = $token;  // Stocker dans la session
    return $token;
}

/**
 * Vérifie si le token CSRF correspond à celui stocké en session
 * @param string $token
 * @return bool
 */
function verify_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $token;
}


/**
 * Calcule l'âge à partir de la date de naissance
 * @param string $dob Date de naissance (format Y-m-d)
 * @return int
 */
function calculate_age($dob) {
    $birthDate = new DateTime($dob);
    $currentDate = new DateTime();
    $interval = $birthDate->diff($currentDate);
    return $interval->y;
}
