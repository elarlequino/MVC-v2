<h2>Produit d'hygiène et de beauté</h2>

<section class="conteneur_article">
    <?php if (!empty($articles) && is_array($articles)): ?>
        <?php foreach($articles as $article): ?>
            <div>
            <article class="article_with_description ">
                <div class="in_article ">
                    <h2><?= $article['Titre']?></h2>
                    <img class="Image" src="/img/articles/<?= $article['Image']?>" alt="<?= $article['Alt']?>">
                    <p>Stock : <?= $article['Stock']?></p>
                </div>

                <p class="hid">
                    <?=substr($article['Texte'],0,255) ?>
                    <!-- br nécéssaire -->
                    <br />
                    ...........................................................
                    <br />
                    Bouton pour ajouter au panier <br> a relier au tunnel de vente
                </p>

            </article>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun article trouvé.</p>
    <?php endif; ?>
</section>