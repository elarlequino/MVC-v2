<?php
namespace controllers;

class Panier extends \app\Controller{

    public function __construct() {
        $this->css = "/css/panier.css";
    }
    /**
    * Cette méthode affiche la liste des articles
    *
    * @return void
    */
    public function index(): void {

        $this->loadModel("Articles");
        
        $articles = [];
        if (!empty($_SESSION['panier'])) {
            foreach ($_SESSION['panier'] as $item) {
            $articles[] = $this->Articles->findById($item['id']);
            }
        //var_dump($_SESSION['panier']);
        }
        // TODO : optimiser la requête pour ne pas faire une requête par article (avec IN (str avec un ?))
        // where id IN (1,2,3,4)

        // On envoie les données à la vue index
        $this->render('index', compact('articles'));

    }

    public function ajouterAuPanier(): void {
        // On récupère les données du formulaire
        $articleId = $_POST['idArticles'];
        $_SESSION['panier'] = $_SESSION['panier'] ?? [];
        // On vérifie si l'article est déjà dans le panier
        if (isset($_SESSION['panier'][$articleId])) {
            // Si l'article est déjà dans le panier, on augmente la quantité de 1
            $_SESSION['panier'][$articleId]['quantite']++;
            //var_dump($_SESSION);

            // On vérifie qu'il reste du stock pour l'article
            $this->loadModel("Articles");
            $article = $this->Articles->findById($articleId);
            //var_dump($article);
            
            if ($_SESSION['panier'][$articleId]['quantite'] > $article['Stock']) {
                $_SESSION['panier'][$articleId]['quantite']--;
                $_SESSION['message'] = "Il n'y a pas asser de stock pour cet article.";
            }
            
        } 
        else {
            // Ajout de l'article avec une quantité de 1
            $_SESSION['panier'][$articleId] = [
                'id' => $articleId,
                'quantite' => 1,
            ];
        }
        //var_dump($_SESSION['panier']);
        //die();
        // Redirection vers la page ou est l'utilisateur quand il ajoute un article
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function moinsUn(): void {
        // On récupère l'ID de l'article à retirer
        $articleId = $_POST['idArticles'];
        
        // On vérifie si l'article est dans le panier
        if (isset($_SESSION['panier'][$articleId])) {
            // Si la quantité est supérieure à 1, on diminue la quantité de 1
            if ($_SESSION['panier'][$articleId]['quantite'] > 1) {
                $_SESSION['panier'][$articleId]['quantite']--;
            } 
            else {
                // Si la quantité est 1, on retire l'article du panier
                unset($_SESSION['panier'][$articleId]);
            }
        }
        // Redirection vers la page du panier
        header('Location: /panier');
    }

    public function retirerDuPanier(): void {
        // On récupère l'ID de l'article à retirer
        $articleId = $_POST['idArticles'];
        
        // On vérifie si l'article est dans le panier
        if (isset($_SESSION['panier'][$articleId])) {
            // On retire l'article du panier
            unset($_SESSION['panier'][$articleId]);
        }
        // Redirection vers la page du panier
        header('Location: /panier');
    }

    public function vider(): void {
        // On vide le panier
        unset($_SESSION['panier']);
        // Redirection vers la page du panier
        header('Location: /panier');
        $_SESSION['message'] = "Votre panier a été vidé avec succès.";
    }

    public function valider(): void {
        if (empty($_SESSION['panier'])) {
            header('Location: /panier');
            return;
        }
        $this->loadModel("Articles");
        $id = 0;
        $nbPris = 0;
        foreach ($_SESSION['panier'] as $item) {
            $id = $item['id'];
            $nbPris = $item['quantite'];
            $this->Articles->updateStock($id, $nbPris);
        }
        unset($_SESSION['panier']);
        header('Location: /panier');
        $_SESSION['message'] = "Votre commande a été validée avec succès.";
    }
}
?>