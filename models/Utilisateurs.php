<?php

require_once("bases/Model.php");

class Utilisateurs extends Model {
    protected $table = "utilisateurs";   

    /**
     * Création d'un nouvel utilisateur
     *
     * @param string $prenom
     * @param string $nom
     * @param string $courriel   
     * @param string $mot_de_passe  Mot de passe non encrypté
     * 
     * @return bool Retourne false si erreur d'insertion
     */
    public function creer(string $prenom, string $nom, string $courriel, string $mot_de_passe) :bool {
        $sql = "INSERT INTO $this->table (prenom, nom, courriel, mot_de_passe) VALUES (:prenom, :nom, :courriel, :mot_de_passe)";

        $stmt = $this->pdo()->prepare($sql);

        return $stmt->execute([
            ":prenom" => $prenom,
            ":nom" => $nom,
            ":courriel" => $courriel,
            ":mot_de_passe" => password_hash($mot_de_passe, PASSWORD_DEFAULT),
        ]);
    }

    /**
     * Retourne les informations d'un utilisateur selon un courriel spécifique
     * 
     * @param string $courriel
     * @return array|false Retourne les informations de l'utilisateur ou faux si l'utilisateur n'existe pas
     */
    public function parCourriel(string $courriel) {
        $sql = "SELECT *
                FROM $this->table
                WHERE courriel = :courriel";

        $stmt = $this->pdo()->prepare($sql);

        $stmt->execute([
            ":courriel" => $courriel
        ]);

        return $stmt->fetch();
    }
}

