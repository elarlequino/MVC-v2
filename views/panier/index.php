<h2>Votre panier</h2>
<?php //var_dump($_SESSION['panier']); ?>
<?php //var_dump($_SESSION['panier'][1]); ?>
<?php //var_dump($_SESSION['panier'][1]['quantite']); ?>
<section class="conteneur_article" style="text-align: center;">
    <div class="panier-contenant">
        <?php if (!empty($_SESSION['message'])): ?>
            <h3><?= $_SESSION['message'] ?></h3>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <?php if(empty($_SESSION['panier'])): ?>
            <h3>Votre panier est vide.</h3>
        <?php else: ?>
            <h3>Voici les articles que vous avez ajoutés à votre panier :</h3>
        <?php foreach($articles as $article): ?>
            <?php //var_dump($_SESSION['panier'][$article['idArticles']]['quantite']); ?>
            <?php $quantite = $_SESSION['panier'][$article['idArticles']]['quantite']; ?>
            <div class="panier-liste">
                <article>
                    <div class="Gauche">
                        <img class="Image" src="/img/articles/<?= $article['Image']?>" alt="<?= $article['Alt']?>">
                    </div>
                    <div class="row">
                        <h2 class="left-right"><?= $article['Titre']?></h2>
                        <div class="controle-quantite row">
                            <form action="/panier/moinsUn" class="hid left-right" method="post">
                                <button type="submit" name="idArticles" value="<?= $article['idArticles']?>" class="Moins">-</button>
                            </form>
                            <input type="text" class="Quantite" value="<?= htmlspecialchars($quantite) ?>" readonly>
                            <form action="/panier/ajouterAuPanier" class="hid left-right" method="post">
                                <button type="submit" name="idArticles" value="<?= $article['idArticles']?>" class="Plus">+</button>
                            </form>
                            <form action="/panier/retirerDuPanier" class="hid left-right" method="post">
                                <button type="submit" name="idArticles" value="<?= $article['idArticles']?>" class="Supprimer">Retirer du Panier</button>
                            </form>
                        </div>
                </article>
            </div>
        <?php endforeach; ?>
        <?php endif; ?>
        <form action="/panier/valider" class="hid" method="post">
            <button type="submit" action="/panier/valider" class="valider-btn">Valider le panier</button>
        </form>
        <form action="/panier/vider" class="hid" method="post">
            <button type="submit" class="valider-btn">Supprimer le Panier</button>
        </form>
    </div>
        <h2>Merci d'amener 200 francs si vous n'êtes pas adhérent.</h2>
</section>

    
