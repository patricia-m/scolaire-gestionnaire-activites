<?php

abstract class Controller {
    
    /**
     * Constructeur
     */
    public function __construct(){}

    /**
     * Affiche la page erreur 404
     *
     * @return void
     */
    public function erreur404(){
       include("views/erreur404.view.php");
    }

    /**
     * Téléverse un fichier dans le dossier public/uploads
     *
     * @param string $nom L'attribut name de la balise input de type file
     * @param array|null $type_valides (facultatif) Une tableau contenant la liste des extensions possibles
     * 
     * @return string|null
     */
    protected function televerser(string $nom, ?array $type_valides = null){
        // Traitement du fichier
        $upload = new Upload($nom, $type_valides);

        // Déplacement du fichier et récupération du chemin (ou null) 
        return $upload->estValide() ? $upload->placerDans("public/uploads") : null;
    }

     /**
     * Redirige à une route
     *
     * @param string $route
     * @param array|null $parametres (facultatif) Tableau associatif du nom du paramètre (clé) et de la valeur du paramètre
     * 
     * @return void
     */
    protected function rediriger($route, $parametres = null){
        $chemin = $route;

        if($parametres){
            $chemin .= "?";
            $compteur = 0;
            $taille = count($parametres);

            foreach($parametres as $nom => $valeur){
                $chemin .= $nom . "=" . $valeur;
                if($compteur < $taille - 1){
                    $chemin .= "&";
                }
                $compteur++;
            }            
        }

        header("location:" . $chemin);
        exit();
    }

    /**
     * Valide la réception d'un formulaire sur la route et redirige si ce n'est pas le cas
     *
     * @param string $route
     * @return void
     */
    protected function validerReceptionFormulaire($route){
        if (empty($_POST)) {
            $this->rediriger($route);
        }
    }

    /**
     * Valide les champs d'un formulaire
     *
     * @param array $champs Tableau indexé contenant le nom des champs 
     * @return bool
     */
    protected function validerChamps($champs){
        foreach($champs as $champ){
            if(empty($_POST[$champ])){
                return false;
            }
        }
        return true;
    }

    /**
     * Valide la connexion de l'utilisateur
     *
     * @param string $cle
     * @return bool
     */
    protected function validerConnexion($cle){
        return ! empty($_SESSION[$cle]);
    }

    /**
     * Affiche une vue
     *
     * @param [type] $nom
     * @param [type] $donnees
     * @return void
     */
    protected function vue($nom, $donnees = null){
        if($donnees) extract($donnees);
        include("views/" . $nom . ".view.php");
    }
}