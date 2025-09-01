<?php
namespace controllers;

class Articles extends \app\Controller{

    public string $css;

    public function __construct() {
        $this->css = "/css/articles.css";
    }

    /**
    * Cette méthode affiche la liste des articles
    *
    * @return void
    */
    public function index(): void {

        $this->loadModel("Articles");
        
        $articles = $this->Articles->getAll();

        // On envoie les données à la vue index
        $this->render('index', compact('articles'));

    }
    /*Méthode permettant d'afficher un article à partir de son slug*/
    public function lire(string $filtre): void{
        // On instancie le modèle "Article"
        $this->loadModel('Articles');

        // On stocke l'article dans $article
        //var_dump($_POST);
        $filtreArticle = $_POST['filtre'] ?? 'Aucun';
        if ($filtreArticle !== 'Aucun') {
            $articles = $this->Articles->getAllByFiltre($filtreArticle);
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