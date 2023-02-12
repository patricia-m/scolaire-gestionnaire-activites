<?php
// Tableau associatif qui associe une route à une méthode du controller
// Structure: "nom de la route" => "nom de la méthode"

$routes = [
    "index" => "index",
    "compte-creation" => "creerCompte",
    "compte-creation-submit" => "creerCompteSubmit",
    "compte-connexion-submit" => "connecterSubmit",
    "administration" => "afficherActivites",
    "compte-deconnexion-submit" => "deconnecterCompte",
    "supression-submit" => "supprimerActiviteSubmit",
    "ajout-activite" => "ajouterActivite",
    "ajout-activite-submit" => "ajouterActiviteSubmit",
];