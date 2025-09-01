<?php
namespace models;

class Client extends \app\Model{
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
    
    public function create_account(): string {
        try {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $mail = $_POST['mail'];
            $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO client (nom, prenom, mail, mdp) VALUES (?, ?, ?, ?)";
            //echo $sql;
            $stmt = $this->_connexion->prepare($sql);
            if(!$stmt) {
                \app\Debug::debugDie(array($stmt->errno,$stmt->error));
                return "Echec de la création : $sql";
            }
            $stmt->bind_param("ssss", $_POST['nom'], $_POST['prenom'], $_POST['mail'], $mdp);
            if(!$stmt->execute()) {
                \app\Debug::debugDie(array($stmt->errno,$stmt->error));
                return "Echec de la création : $sql";
            }
            return "Création réussie";
        } catch (\Exception $e) {
            \app\Debug::debugDie(array($e->getMessage(), $e->getCode()));
            if ($e->getCode() == 1062) {
                return "1062";
            }
            return "Echec de la création : " . $e->getMessage();

        }
    }

    public function delete(int $id): string {
        $sql = "DELETE FROM `{$this->table}` WHERE `{$this->table}`.`id_client` = ?;";
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

    public function ConnexionClient(string $mail, string $mdp): bool {
        $sql = "SELECT * FROM `{$this->table}` WHERE `mail`=?";
        $stmt = $this->_connexion->prepare($sql);
        $stmt->bind_param("s", $mail ); // +
        $token = bin2hex(random_bytes(32)); // +
        if (!$stmt) {
            \app\Debug::debugDie(array($stmt->errno, $stmt->error));
            return false;
        }
        
        if (!$stmt->execute()) {
            \app\Debug::debugDie(array($stmt->errno, $stmt->error));
            return false;
        }
        $result = $stmt->get_result();
        $client = $result->fetch_assoc();
        if ($client && password_verify($mdp, $client['mdp'])){
            $sql = "UPDATE `{$this->table}` SET `token` = ? WHERE `mail` = ?;"; // +
            $stmt = $this->_connexion->prepare($sql);
            $stmt->bind_param("ss", $token, $mail ); // +
            if (!$stmt) {
                \app\Debug::debugDie(array($stmt->errno, $stmt->error));
                return false;
            }
            
            if (!$stmt->execute()) {
                \app\Debug::debugDie(array($stmt->errno, $stmt->error));
                return false;
            }
            setcookie("token", $token, time() + 3600); // cookie marche pas ++
            return true; // + 
        };
        return false;
    }
    
    /**
    * Met à jour l'adhesion d'un client en fonction de son id
    *
    * @return string
    */
    public function updateAdhesion(int $id): string {
        $_POST['adherent'] = $_POST['adherent'];
        $sql = "UPDATE `{$this->table}` SET `adherent` = ? WHERE `id_client` = ?;";
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la mise à jour : $sql";
        }
        $stmt->bind_param("ii", $_POST['adherent'], $id);
        if(!$stmt->execute()) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la mise à jour : $sql";
        }
        return "Mise à jour réussie";
    }
}
?>