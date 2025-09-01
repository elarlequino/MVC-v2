<?php
namespace controllers;

class Connexion extends \app\Controller{


    public function __construct() {
        $this->css = "/css/connexion.css";
    }

    /**
     * Cette méthode appelle la vue adéquate en fonction de l'état de connexion de l'utilisateur
     *
     * @return void
     */
    public function TestConnexion(): void {
        // Vérifie si l'utilisateur est connecté
        if (isset($_SESSION["connecte"])) {
            // Vérifie si l'utilisateur veut se déconnecter
            if (isset($_POST['decoClient'])) {
                unset($_SESSION['connecte']);
                $bo['msg'] = "Déconnexion réussie !";
                $this->render('index');
            } 
        }
        else {
            // Si l'utilisateur n'est pas connecté, on affiche la vue de connexion
            $bo = array();
            $render = "index";
            // Vérifie si le formulaire de connexion a été soumis
            if (isset($_POST['valide'])) {
                // Vérifie si les champs sont remplis et non vides (required mis mais piratage possible)
                if (isset($_POST['mail']) && isset($_POST['mdp'])) {
                    $mail = $_POST['mail'];
                    $mdp = $_POST['mdp'];
                    // On instancie le modèle "administrateur" qui contient les informations de connexion
                    $this->loadModel('administrateur');
                    // Vérifie les informations de connexion
                    if ($this->administrateur->connexion($mail, $mdp)) {
                        $_SESSION['connecte'] = $mail;
                        $bo['msg'] = "Bienvenue $mail !";
                        // On passe à l'étape suivante, confirmation de la connexion
                        $render = "confirm";
                    } else {
                        $bo['msg'] = "Erreur de connexion !";
                    }
                } else {
                    $bo['msg'] = "Problème de formulaire";
                }
            }
            // On envoie les données à la vue de connexion
            $this->render($render, compact('bo'));
        }
    }

    /*Cette méthode affiche la page principale*/
    public function index(): void{
        // On garde la structure avec une variable $main pour anticiper un éventuel besoin
        $main = array();

        // On envoie les données à la vue index
        $this->render('index', compact('main'));
        
    }

    public function connexion(): void{
        // On prend les données du formulaire
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];

        $this->loadModel("client");
        $resultat = $this->client->ConnexionClient($mail, $mdp);

        if ($this->client->ConnexionClient($mail, $mdp)) {
                        $_SESSION['connecte'] = $mail;
                        $this->render('confirm', compact('mail'));
        }
        else{
            $bo['msg'] = "Erreur de connexion !";
            $this->render('index');
        }
    }
}
?>