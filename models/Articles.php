<?php
namespace models;

class Articles extends \app\Model{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "articles";
        
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }
    
    /**
    * Méthode permettant d'obtenir tous les enregistrements de la table choisie
    *
    * @return void
    */    
    public function getAllByCategorie(int $idp=null): array{
        $sql = "SELECT * FROM `{$this->table}`".(is_null($idp)?"":" WHERE `Categorie`=?");
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt){
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return false;
        }
        if (!is_null($idp)) {
            $stmt->bind_param("i", $idp);
        }
        if(!$stmt->execute()){
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return false;
        }
        $result = $stmt->get_result();
        $tabResultat = array();
        while($row=$result->fetch_array(MYSQLI_ASSOC)) {
            $tabResultat[]=$row;
        }
        mysqli_stmt_close($stmt);
        return $tabResultat;
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
    * Méthode permettant d'obtenir tous les enregistrements de la table choisie ayant un filtre spécifique
    *
    * @return void
    */    
    public function getAllByFiltre(string $filtre=null): array{
        $sql = "SELECT * FROM `{$this->table}`".(is_null($filtre)?"":" WHERE `Filtre`=?");
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt){
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return false;
        }
        if (!is_null($filtre)) {
            $stmt->bind_param("s", $filtre);
        }
        if(!$stmt->execute()){
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return false;
        }
        $result = $stmt->get_result();
        $tabResultat = array();
        while($row=$result->fetch_array(MYSQLI_ASSOC)) {
            $tabResultat[]=$row;
        }
        mysqli_stmt_close($stmt);
        return $tabResultat;
    }
    
    /**
    * Met a jour le stock d'un article en fonction de son ID
    *
    * @param int $id
    * @param int $nbPris
    * @return string
    */
    public function updateStock(int $id, int $nbPris): string {
        $sql = "UPDATE `{$this->table}` SET `Stock` = ? WHERE `{$this->table}`.`idArticles` = ?";
        $stmt = $this->_connexion->prepare($sql);
        /*/foreach $id $nouveauStock . $id = $nbPris
        for ($i = 0; $i < count($id); $i++) {
            $articleId = $id[$i];
            $stockMoins = $nbPris[$i];
            ${'nouveauStock' . $articleId} = $this->findById($articleId)['Stock'] - $stockMoins;
            if (${'nouveauStock' . $articleId} < 0) {
                $Titre = $this->findById($articleId)['Titre'];
                $_SESSION['message'] = 
                    "Stock insuffisant pour l'article $Titre. <br>
                    Nombre d'articles demandés : $stockMoins. Stock disponible : " . $this->findById($articleId)['Stock'] . ". <br>
                    Veuillez réessayer.";
                header('Location: /panier');
                exit;
            }
         /*/
        $nouveauStock = $this->findById($id)['Stock'] - $nbPris;
        if ($nouveauStock < 0) {
                $Titre = $this->findById($id)['Titre'];
                $_SESSION['message'] = 
                    "Stock insuffisant pour l'article $Titre. <br>
                    Nombre d'articles demandés : $nbPris. Stock disponible : " . $this->findById($id)['Stock'] . ". <br>
                    Veuillez réessayer.";
                header('Location: /panier');
                exit;
            }
        else {
            if(!$stmt) {
                \app\Debug::debugDie(array($stmt->errno,$stmt->error));
                return "Echec de la mise à jour : $sql";
            }
            $stmt->bind_param("ii", $nouveauStock, $id);
            if(!$stmt->execute()) {
                \app\Debug::debugDie(array($stmt->errno,$stmt->error));
                return "Echec de la mise à jour : $sql";
            }
            return "Mise à jour réussie";
        }
    }

    // Partie BackOffice 
    /**
    * Met à jour un article en fonction de son ID
    *
    * @param int $id
    * @return string
    */
    public function update(int $id): string {
        //var_dump($_POST);
        //die();
        $_POST['Titre'] = $_POST['Titre'];
        $_POST['Texte'] = $_POST['Texte'];
        $sql = "UPDATE `{$this->table}` SET `Titre` = ?, `Texte` = ?, `Categorie` = ?, `Filtre` = ?, `Stock` = ?, `Image` = ?, `Alt` = ? WHERE `{$this->table}`.`idArticles` = ?;";
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la mise à jour : $sql";
        }
        $stmt->bind_param("ssssissi", $_POST['Titre'], $_POST['Texte'], $_POST['Categorie'], $_POST['Filtre'], $_POST['Stock'], $_POST['Image'], $_POST['Alt'], $id);
        if(!$stmt->execute()) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la mise à jour : $sql";
        }
        return "Mise à jour réussie";
    }
    
    public function create(): string {
        $_POST['Titre'] = $_POST['Titre'];
        $_POST['Texte'] = $_POST['Texte'];
        $sql = "INSERT INTO `articles` (`Titre`, `Texte`, `Categorie`, `Filtre`, `Stock`, `Image`, `Alt`) VALUES (?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->_connexion->prepare($sql);
        if(!$stmt) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la création : $sql";
        }
        $stmt->bind_param("ssssiss", $_POST['Titre'], $_POST['Texte'], $_POST['Categorie'], $_POST['Filtre'], $_POST['Stock'], $_POST['Image'], $_POST['Alt']);
        if(!$stmt->execute()) {
            \app\Debug::debugDie(array($stmt->errno,$stmt->error));
            return "Echec de la création : $sql";
        }

        $uploaddir = 'img/articles/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            // Renomme le fichier uploadé avec le nom fourni dans $_POST['Image'], en gardant l'extension d'origine
            $extension = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
            $newFileName = $uploaddir . $_POST['Image'] . '.' . $extension;
            rename($uploadfile, $newFileName);
            return "Le fichier est valide, et a été téléchargé avec succès.\n";
        } 
        else {
            return "Attaque potentielle par téléchargement de fichiers.\n";
        }
        return "Création réussie";
    }
    
    public function delete(int $id): string {
        
        $sql = "DELETE FROM `{$this->table}` WHERE `{$this->table}`.`idArticles` = ?;";
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