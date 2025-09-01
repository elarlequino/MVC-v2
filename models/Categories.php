<?php
namespace models;

class Categories extends \app\Model{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "categories";

        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

        // Partie BackOffice 
    /**
    * Met à jour une catégorie en fonction de son ID
    *
    * @param int $id
    * @return string
    */
    public function update(int $id): string {
        $_POST['Titre'] = $_POST['Titre'];
        $_POST['Informations'] = $_POST['Informations'];
        $sql = "UPDATE `{$this->table}` SET `Titre` = ?, `Informations` = ? WHERE `{$this->table}`.`idCategories` = ?;";
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la mise à jour : $sql";
        }
        $stmt->bind_param("ssi", $_POST['Titre'], $_POST['Informations'], $id);
        if(!$stmt->execute()) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la mise à jour : $sql";
        }
        return "Mise à jour réussie";
    }
    
    public function create(): string {
        $_POST['Titre'] = $_POST['Titre'];
        $_POST['Informations'] = $_POST['Informations'];
        $sql = "INSERT INTO `categories` (`Titre`, `Informations`) VALUES (?, ?);";
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la création : $sql";
        }
        $stmt->bind_param("ss", $_POST['Titre'], $_POST['Informations']);
        if(!$stmt->execute()) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la création : $sql";
        }
        return "Création réussie";
    }
    
    public function delete(int $id): string {
        
        $sql = "DELETE FROM `{$this->table}` WHERE `{$this->table}`.`idCategories` = ?;";
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la suppression : $sql";
        }
        $stmt->bind_param("i", $id);
        if(!$stmt->execute()) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la suppression : $sql";
        }
        return "Suppression réussie";
    }

}


?>