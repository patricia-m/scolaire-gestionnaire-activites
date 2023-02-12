<?php

require_once("bases/Controller.php");
require_once("models/Utilisateurs.php");
require_once("models/Activites.php");
require_once("models/Categories.php");
require_once("utils/Upload.php");

class SiteController extends Controller {

    /**
     * Affiche la page d'accueil et le formulaire de connexion
     *
     * @return void
     */
    public function index() {
        $this->vue("index", ["titre" => "Accueil | Connexion"]);
    }

    /**
     * Affiche le formulaire de création de compte
     *
     * @return void
     */
    public function creerCompte(){
        $this->vue("compte_creation", ["titre" => "Créer un compte"]);
    }

    /**
     * Traite les informations soumises lors de la création de compte
     *
     * @return void
     */
    public function creerCompteSubmit(){
        $this->validerReceptionFormulaire("compte-creation");

        if(! $this->validerChamps(["prenom", "nom", "courriel", "mot_de_passe"])){
            $this->rediriger("compte-creation", ["erreur_vide" => 1]);            
        }

        // Création de l'utilisateur
        $succes = (new Utilisateurs())->creer($_POST["prenom"], $_POST["nom"], $_POST["courriel"], $_POST["mot_de_passe"]);      
        
        // Redirection en cas de succes
        if($succes){
            $this->rediriger("index", ["compte_succes" => 1]); 
        }

        // Redirection en cas d'erreur
        $this->rediriger("compte-creation", ["erreur" => 1]);
    }

    /**
     * Traite les informations de connexion
     *
     * @return void
     */
    public function connecterSubmit(){
        $this->validerReceptionFormulaire("index");

        if(! $this->validerChamps(["courriel", "mot_de_passe"])) {
            $this->rediriger("index", ["erreur" => 1]);            
        }

        // Récupération des information de l'utilisateur
        $utilisateur = (new Utilisateurs())->parCourriel($_POST["courriel"]);

        // Vérification que l'utilisateur existe
        // Vérification du mot de passe
        // Redirection en cas d'erreur
        if(!$utilisateur || !password_verify($_POST["mot_de_passe"], $utilisateur["mot_de_passe"])) {
            $this->rediriger("index", ["erreur" => 1]);
        }

        // Redirection si la connexion est réussie
        $_SESSION["utilisateur_id"] = $utilisateur["id"];
        $this->rediriger("administration");
    }

    /**
     * Affiche l'administration et les activités de l'utilisateur connecté
     * 
     * @return void
     */
    public function afficherActivites() {
        if( ! $this->validerConnexion("utilisateur_id")) {
            $this->rediriger("index");
        }

        // Inclusion de la vue et envoi des données
        $this->vue("administration", [
            "titre" => "Administration",
            "activites" => (new Activites())->toutParUtilisateur($_SESSION["utilisateur_id"]),
            "utilisateur" => (new Utilisateurs())->parId($_SESSION["utilisateur_id"]),
        ]);
    }

    /**
     * Déconnecte l'utilisateur
     *
     * @return void
     */
    public function deconnecterCompte() {
        if( ! $this->validerConnexion("utilisateur_id")) {
            $this->rediriger("index");
        }

        $_SESSION["utilisateur_id"] = null;

        $this->rediriger("index", ["deconnexion" => 1]);
    }

    /**
     * Supprime une activité
     *
     * @return void
     */
    public function supprimerActiviteSubmit() {
        if( ! $this->validerConnexion("utilisateur_id")) {
            $this->rediriger("index");
        }

        // Validation qu'on a bien reçu un id d'activité
        if(!$_GET["id"]){
            $this->rediriger("index", ["erreur" => 1]);
        }

        $activite_id = $_GET["id"];
        $modele = new Activites();

        // Validation que l'activité appartient bien à l'utilisateur connecté
        $activite = $modele->parId($activite_id);
        if($activite["utilisateur_id"] != $_SESSION["utilisateur_id"]) {
            $this->rediriger("administration", ["erreur" => 1]);
        }

        // Supression de l'activité
        $modele->supprimerActivite($activite_id);
        
        // Redirection si l'activité a bien été supprimé
        if($modele){
            $this->rediriger("administration", ["supression" => 1]);
        }

        // Redirection si erreur
        $this->rediriger("administration", ["erreur" => 1]);
    }

    /**
     * Affiche le formulaire d'ajout d'une activité
     *
     * @return void
     */
    public function ajouterActivite() {
        if( ! $this->validerConnexion("utilisateur_id")) {
            $this->rediriger("index");
        }

        // Inclusion de la vue et envoi des données
        $this->vue("ajout_activite", [
            "titre" => "Ajouter une activité",
            "categories" => (new Categories())->tout(),
        ]);
    }

    /**
     * Traite les informations d'ajout d'une activité
     *
     * @return void
     */
    public function ajouterActiviteSubmit() {
        $this->validerReceptionFormulaire("ajout-activite");
    
        if(! $this->validerChamps(["nom", "categorie"])){
            $this->rediriger("ajout-activite", ["erreur_vide" => 1]);            
        }
    
        // Téléversement de la photo
        $photo = $this->televerser("photo", ["jpg", "jpeg", "png", "webp"]);
    
        $succes = (new Activites())->creer($_POST["nom"],$_POST["categorie"], $_SESSION["utilisateur_id"], $photo);
    
        // Redirection si erreur
        if(!$succes){
            $this->rediriger("administration", ["erreur" => 1]); 
        }
    
        $this->rediriger("administration", ["succes" => 1]); 
    }
}