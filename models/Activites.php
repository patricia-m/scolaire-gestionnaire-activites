<?php

require_once("bases/Model.php");

class Activites extends Model {
    protected $table = "activites";

    /**
     * Retourne toutes les activités associées à un utilisateur spécifique
     *
     * @param int $utilisateur_id
     * @return array|false Tableau associatif contenant toutes les activités ou false si erreur
     */    
    public function toutParUtilisateur(int $utilisateur_id) {
        $sql = "SELECT 
                    $this->table.*, categories.nom as categorie_nom
                FROM $this->table
                JOIN categories
                    ON $this->table.categorie_id = categories.id
                WHERE $this->table.utilisateur_id = :utilisateur_id";

        $stmt = $this->pdo()->prepare($sql);
        $stmt->execute([
            ":utilisateur_id" => $utilisateur_id
        ]);

        return $stmt->fetchAll();
    }

    /**
     * Supprime une activité de la base de données
     *
     * @param int $id
     * @return boolean
     */
    public function supprimerActivite(int $id) :bool {
        $sql = "DELETE FROM $this->table
                WHERE id = :id";

        $stmt = $this->pdo()->prepare($sql); 
        return $stmt->execute([
            ":id" => $id
        ]);
    }

    /**
     * Ajoute une nouvelle activité
     *
     * @param string $titre
     * @param string $categorie
     * @param int $utilisateur_id
     * @param string|null $photo Le chemin vers la photo ou null
     * 
     * @return bool
     */
    public function creer(string $nom, string $categorie, int $utilisateur_id, ?string $photo = null) :bool {
        $sql = "INSERT INTO $this->table (nom, categorie_id, utilisateur_id, photo) VALUES (:nom, :categorie, :utilisateur_id, :photo)";

        $stmt = $this->pdo()->prepare($sql);

        return $stmt->execute([
            ":nom" => $nom,
            ":categorie" => $categorie,
            ":utilisateur_id" => $utilisateur_id,            
            ":photo" => $photo,
        ]);
    }
}