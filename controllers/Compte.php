<?php
namespace controllers;

class Compte extends \app\Controller{


    public function __construct() {
        $this->css = "/css/compte.css";
    }

    /**
     * Cette méthode appelle la vue adéquate en fonction de l'état de connexion de l'utilisateur
     *
     * @return void
     */
    public function TestConnexion(): void {
        // Vérifie si l'utilisateur est connecté
        if (isset($_SESSION["connecte"])) {
            var_dump($_SESSION);
            // Vérifie si l'utilisateur veut se déconnecter
            if (isset($_POST['decoClient'])) {
                unset($_SESSION['connecte']);
                $bo['msg'] = "Déconnexion réussie !";
                $this->render('connexion', compact('bo'));
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
                    //$token = bin2hex(random_bytes(32)); // ++
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

    /**
    * Cette méthode affiche la liste des articles
    *
    * @return void
    */
    public function index(): void {

        $this->loadModel("Compte");
        
        $client = $this->Compte->findByMail($_SESSION['connecte']);

        // On envoie les données à la vue index
        $this->render('index', compact('client'));

    }

    public function connexion(): void{
        // On prend les données du formulaire
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
        //var_dump($_SESSION);
        //var_dump($_POST);

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

    /**
     * Met à jour un élément
     *
     * @return void
     */
    public function update(): void {
        // On instancie le modèle choisi
        $this->loadModel("compte");
        $msg = $this->compte->update();
        // On stocke les éléments dans $bo
        $bo['msg'] = $msg;
        // On envoie les données à la vue index
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    /**
     * Met à jour un élément
     *
     * @return void
     */
    public function updateSecu(): void {
        // On instancie le modèle choisi
        $this->loadModel("compte");
        $msg = $this->compte->updateSecu();
        // On stocke les éléments dans $bo
        $bo['msg'] = $msg;
        // On envoie les données à la vue index
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    /**
     * Met à jour un élément
     *
     * @return void
     */
    public function delete(): void {
        // On instancie le modèle choisi
        $this->loadModel("compte");
        $msg = $this->compte->delete();
        // On stocke les éléments dans $bo
        $bo['msg'] = $msg;
        // On envoie les données à la vue inscription
        header('Location: /inscription');
    }
}
?>