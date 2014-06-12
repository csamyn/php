<?php

/**
 * CONSTANTS
 */

// Database
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PWD", "");
define("DB_PORT", "3306");
define("DB_NAME", "petsitting");

// Types
define("TYPE_USER_PET_OWNER", 1);
define("TYPE_USER_PET_SITTER", 2);
define("TYPE_USER_BOTH", 3);

// Types d'animaux
define("TYPE_PET_CAT", 1);
define("TYPE_PET_DOG", 2);
define("TYPE_PET_BIRD", 3);
define("TYPE_PET_RODENT", 4);
define("TYPE_PET_FISH", 5);
define("TYPE_PET_OTHER", 6);

// Health
define("PET_HEALTH_GOOD", 1);
define("PET_HEALTH_BAD", 2);

// Habitat
define('ACCOMODATION_HOUSE', 1);
define('ACCOMODATION_APPARTEMENT', 2);
define('ACCOMODATION_OTHER', 3);

// Type d'age
define('TYPE_AGE_MONTH', 1);
define('TYPE_AGE_YEAR', 2);

try {
    $cnx = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME, DB_USER, DB_PWD);
} catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
    exit;
}

session_start();

require_once __DIR__ . "/functions.inc.php";

?>
