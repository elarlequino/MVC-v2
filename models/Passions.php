<?php
namespace models;

class Passions extends \app\Model{
    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "passions";

        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

}
?>