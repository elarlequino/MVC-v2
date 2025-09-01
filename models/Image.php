<?php
namespace models;

class Image extends \app\Model{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "image";

        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

    public function getAll(int $idarticle=null): array{
        $sql = "SELECT * FROM `{$this->table}`".(is_null($idarticle)?"":"WHERE `NumArticle`='$idarticle'");
        $query = $this->_connexion->query($sql);
        return $query->fetch_all(MYSQLI_ASSOC);
    }


}
?>