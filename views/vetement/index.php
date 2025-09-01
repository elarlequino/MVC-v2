<h2>Vêtements</h2>
<?php //var_dump($_SESSION['panier']); ?>
<section class="conteneur_article">
    <?php foreach($articles as $article): ?>
        <div>
            <article class="article_with_description " >
                <div class="in_article ">
                    <h2><?= $article['Titre']?></h2>
                    <img class="Image" src="/img/articles/<?= $article['Image']?>" alt="<?= $article['Alt']?>">
                    <p>
                        Stock : 
                        <?php if(isset($article['Stock']) && $article['Stock'] <= 0): ?>
                            <span class="stock-indisponible">
                                Indisponible
                            </span>
                        <?php else: ?>
                            <span>
                                <?= $article['Stock'] ?>
                            </span>
                        <?php endif; ?>
                    </p>
                </div>

                <form action="/panier/ajouterAuPanier" class="hid" method="post">
                    <?=substr($article['Texte'],0,255) ?>
                    <!-- br nécéssaire -->
                    <br />
                    ...........................................................
                    <br />
                    <?php if(isset($article['Stock']) && $article['Stock'] <= 0): ?>
                        <span class="stock-indisponible">Stock Indisponible</span>
                    <?php else: ?>
                        <button type="submit" name="idArticles" value="<?= $article['idArticles']?>">Ajouter au panier</button>
                    <?php endif; ?>
                </form>
            </article>
        </div>

    <?php endforeach; ?>
</section>