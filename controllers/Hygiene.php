<?php
namespace controllers;

class Hygiene extends \app\Controller{

    public function __construct() {
        $this->css = "/css/hygiene.css";
    }

    /*Cette méthode affiche la liste des articles*/
    public function index(): void{
        // On instancie le modèle "Articles"
        $this->loadModel('Categories');

        // On stocke l'id de la Categorie dans $Categories
        $idcategories = $this->Categories->getCategories("Produits d’hygiène");
        
        $this->loadModel("Articles");
        
        $articles = $this->Articles->getAllByCategorie($idcategories);

        // On envoie les données à la vue index
        $this->render('index', compact('articles'));
    }
    /*Méthode permettant d'afficher un article à partir de son slug*/
    public function lire(string $filtre): void{
        // On instancie le modèle "Article"
        $this->loadModel('Articles');

        // On stocke l'article dans $article
        $filtre = $_GET['filtre'] ?? null;
        if ($filtre && $filtre !== 'Aucun') {
            $articles = $this->Articles->getAllByFiltre($filtre);
        } 
        else {
            $articles = $this->Articles->getAll();
            $articles = $articles['articles'] ?? $articles; // selon ton getAll()
        }
        if (!is_array($articles)) $articles = [];

        // On envoie les données à la vue lire
        $this->render('lire', compact('articles'));
    }
}
?>