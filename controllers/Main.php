<?php
namespace controllers;

class Main extends \app\Controller{

    public function __construct() {
        $this->css = "/css/index.css";
    }
    /*Cette méthode affiche la page principale*/
    /* Au cas ou
    public function index(): void{
        // On garde la structure avec une variable $main pour anticiper un éventuel besoin
        $main = array();

        // On envoie les données à la vue index
        $this->render('index', compact('main'));
    }
    */

    /*Cette méthode affiche la liste des articles*/
    public function index(): void{
        // On instancie le modèle "Articles"
        $this->loadModel('Categories');

        // On stocke l'id de la Categorie dans $Categories
        $idcategories = $this->Categories->getCategories("Annonces");
        
        $this->loadModel("Articles");
        
        $articles = $this->Articles->getAllByCategorie($idcategories);

        // On envoie les données à la vue index
        $this->render('index', compact('articles'));
    }
}
?>