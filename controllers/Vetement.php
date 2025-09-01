<?php
namespace controllers;

class Vetement extends \app\Controller{

    public function __construct() {
        $this->css = "/css/vetement.css";
    }

    /*Cette méthode affiche la liste des articles*/
    public function index(): void{
        // On instancie le modèle "Articles"
        $this->loadModel('Categories');

        // On stocke l'id de la Categorie dans $Categories
        $idcategories = $this->Categories->getCategories("Vêtement");

        $this->loadModel("Articles");
        
        $articles = $this->Articles->getAllByCategorie($idcategories);

        // On envoie les données à la vue index
        $this->render('index', compact('articles'));
    }
    
    /*Méthode permettant d'afficher un article à partir de son slug*/
    public function lire(int $id): void{
        // On instancie le modèle "Article"
        $this->loadModel('Articles');

        // On stocke l'article dans $article
        $articles = $this->Articles->findById($id);

        // On envoie les données à la vue lire
        $this->render('lire', compact('articles'));
    }
}
?>