<?php

/**
 * Front controller
 * 
 * Tout le traffic du site passe par ce fichier
 */

// Affichage de toutes les erreurs pendant le développement
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "controllers/SiteController.php";
require_once("config/routes.php");

session_start();

$controller = new SiteController();

// Sélection de la route demandée
$chemin = $_GET["path"] ?? "index";

// Méthode à appeler dans le controller
$methode = $routes[$chemin] ?? "erreur404";

// Appel dynamique de la méthode
$controller->{$methode}();