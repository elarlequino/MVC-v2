<?php
namespace models;

class Compte extends \app\Model{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "client";

        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }
    
    /**
    * Méthode permettant d'obtenir tous les enregistrements de la table choisie
    * @return array
    */
    public function getAll(): array {
        $sql = "SELECT * FROM `{$this->table}`";
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return false;
        }
        if(!$stmt->execute()) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return false;
        }
        $result = $stmt->get_result();
        $res = array();
        while($row=$result->fetch_array(MYSQLI_ASSOC)) {
            $res["articles"][]=$row;
        }
        $sql = "SELECT * FROM `categories`";
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return false;
        }
        if(!$stmt->execute()) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return false;
        }
        $result = $stmt->get_result();
        while($row=$result->fetch_array(MYSQLI_ASSOC)) {
            $res["categories"][]=$row;
        }
        return $res;
    }
    
    /**
    * Méthode permettant d'obtenir un enregistrement de la table choisie en fonction d'un id
    *
    * @return void
    */
    public function findById(int $id): array {
        $sql = "SELECT * FROM `".$this->table."` WHERE `idArticles`=?";        
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt){
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return false;
        }
        $stmt->bind_param("i", $id);
        if(!$stmt->execute()){
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return false;
        }
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
        mysqli_stmt_close($this->stmt);
    }

    /**
    * Méthode permettant d'obtenir un enregistrement de la table choisie en fonction d'un mail client
    *
    * @return void
    */
    public function findByMail(string $mail): array{
        $sql = "SELECT * FROM `".$this->table."`WHERE `mail`=?";
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt){
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return false;
        }
        $stmt->bind_param("s", $mail);
        if(!$stmt->execute()){
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return false;
        }
        $result = $stmt->get_result();
        return $result->fetch_array(MYSQLI_ASSOC);
        mysqli_stmt_close($this->stmt);
    }
    
    /**
    * Met à jour un client en fonction de son mail
    *
    * @return string
    */
    public function update(): string {
        $mail = $_SESSION['connecte'];
        $_POST['Nom'] = $_POST['Nom'];
        $_POST['Prenom'] = $_POST['Prenom'];
        $sql = "UPDATE `{$this->table}` SET `nom` = ?, `prenom` = ? WHERE `{$this->table}`.`mail` = ?;";
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la mise à jour : $sql";
        }
        $stmt->bind_param("sss", $_POST['Nom'], $_POST['Prenom'], $mail);
        if(!$stmt->execute()) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la mise à jour : $sql";
        }
        return "Mise à jour réussie";
    }

    /**
    * Met à jour un client en fonction de son mail
    *
    * @return string
    */
    public function updateSecu(): string {
        $mail = $_SESSION['connecte'];
        $_POST['Mail'] = $_POST['Mail'];
        $_POST['AncienMdp'] = $_POST['AncienMdp'];
        if ($_POST['Mail'] !== $_SESSION['connecte']) {
            $msg = "Erreur : l'adresse mail ne correspond pas à l'utilisateur connecté.";
            exit;
        }
        
        $sql = "UPDATE `{$this->table}` SET `mdp` = ? WHERE `{$this->table}`.`mail` = ?;";
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la mise à jour : $sql";
        }
        $stmt->bind_param("sss", $_POST['Nom'], $_POST['Prenom'], $mail);
        if(!$stmt->execute()) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la mise à jour : $sql";
        }
        return "Mise à jour réussie";
    }

    public function delete(): string {
        $mail = $_SESSION['connecte'];
        $sql = "DELETE FROM `{$this->table}` WHERE `mail` = ?";
        $stmt = $this->_connexion->prepare($sql);
        if (!$stmt) {
            \app\Debug::debugDie(array($stmt->errno, $stmt->error));
            return "Echec de la suppression : $sql";
        }
        $stmt->bind_param("s", $mail);
        if (!$stmt->execute()) {
            \app\Debug::debugDie(array($stmt->errno, $stmt->error));
            return "Echec de la suppression : $sql";
        }
        session_unset();
        session_destroy();
        return "Suppression réussie";
    }
}
?>