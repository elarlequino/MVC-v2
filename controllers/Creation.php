<?php
namespace controllers;

class Creation extends \app\Controller{

    public function __construct() {
        $this->css = "/css/creations.css";
    }

    /*Cette méthode affiche la liste des articles*/
    public function index(): void{
        // On instancie le modèle "Articles"
        $this->loadModel('Passions');

        // On stocke l'id de la passion dans $passions
        $idpassions = $this->Passions->getPassion("Création graphique");

        $this->loadModel("Articles");
        
        $articles = $this->Articles->getAllByPassion($idpassions);

        $this->loadModel("Image");

        foreach($articles as $key => $article) {
            $articles[$key]['images'] = $this->Image->getAll($article['idArticles']);
        }

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