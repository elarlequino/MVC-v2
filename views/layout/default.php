<!DOCTYPE html>
<?php 
    // Récupération des variables POST
    foreach ( $_POST as $post => $val )  {            
        $$post = $val;
    }
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <script src="/javascript/jquery-3.7.1.min.js"></script>
        <script src="/slick-1.8.1/slick/slick.min.js"></script>
        <script src="/javascript/jquery.magnific-popup.min.js"></script>
        <script src="/javascript/caroussel.js"></script>
        <script src="/javascript/style_css.js"></script>
        <link rel="stylesheet" href="/css/default.css">
        <link rel="stylesheet" href="/css/magnific-popup.css">
        <link rel="stylesheet" href="/slick-1.8.1/slick/slick.css">
        <link rel="stylesheet" href="/slick-1.8.1/slick/slick-theme.css">
        <?php if($css!="") { ?>
            <link rel="stylesheet" href="<?= $css ?>">
        <?php } ?>
        <title>Boutique Epise</title>
    </head>

    <body>
        <header>
            <nav class="Menu">
                <div>
                    <a href="/"><img src="/img/Logo/epise_logo.png" alt="Logo Epise" class="Logo_Epise"></a>
                </div>
               
               
                <div class="MenuNav">
                    <?php if(isset($_SESSION["connecte"])):?>
                    <a href="articles" id="bouton_catalog"class="bouton_anim">Catalogue</a>
                    <a href="/compte"><img src="/img/Icon/PP.png" alt="Icone de profil par défaut" class="PP bouton_anim"></a>
                    <a href="/panier" class="Panier">
                        <?php 
                            $count = 0;
                            if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
                                foreach ($_SESSION['panier'] as $article) {
                                    if (isset($article['quantite'])) {
                                        $count += (int)$article['quantite'];
                                    }
                                }
                            }
                            if ($count > 0) {
                                echo '<span class="badge-panier">' . $count . '</span>';
                            }
                        ?>
                        <img src="/img/Icon/panier.png" alt="Logo Panier" class="Logo bouton_anim">
                    </a>
                    <?php else: ?>
                    <a href="/inscription" class="LienNav bouton_anim">S'inscrire</a>
                    <a href="/connexion" class="LienNav bouton_anim">Se connecter <img src="/img/Icon/PP.png" alt="Icone de profil par défaut" class="PP"></a>     
                    <?php endif; ?>
                </div>
            </nav>
        </header>
        <?= $content ?>
        <footer>
            <div class="MenuFooter"> 
                <div class="ColoneFooter">
                    <a href="/legales" class="LienNav bouton_anim">Mentions légales</a>
                    <a href="/politique" class="LienNav bouton_anim">Confidentialité</a>
                    <a href="/conditions" class="LienNav bouton_anim">Conditions générales de vente</a>
                </div>
                <div class="ColoneFooter truc">
                    <a href="/contact" class="LienNav bouton_anim">Contact</a>
                    <a href="Presentation" class="LienNav bouton_anim">Qui somme nous ?</a>
                </div>
                <div class="ColoneFooter truc">
                    <p class="LienNav">© Copyright 2025</p>
                </div>
            </div>
        </footer>
    </body>
</html>