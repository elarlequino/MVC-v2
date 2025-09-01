<?php
namespace controllers;

class Inscription extends \app\Controller{


    public function __construct() {
        $this->css = "/css/inscription.css";
    }


    /*Cette méthode affiche la page principale*/
    public function index(): void{
        // On garde la structure avec une variable $main pour anticiper un éventuel besoin
        $main = array();

        // On envoie les données à la vue index
        $this->render('index', compact('main'));
        
    }

    public function confirm(): void{
        // On prend les données du formulaire
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        if ($_POST['Confirm_mail'] == $mail && $_POST['Confirm_mdp'] == $mdp) {
            // On enregistre les données dans la base de données
            $this->loadModel("client");
            $resultat = $this->client->create_account();
        }
        if ($resultat == "1062") {
            // Si l'email est déjà utilisé, on affiche un message d'erreur
            $this->render('index');
        }
        else {
            $this->render('confirm', compact('mail', 'mdp'));
        }
    }
}
?>