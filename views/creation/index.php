<section>
<h2>Mes productions graphique</h2>
    <?php foreach($articles as $article): ?>

        <article class="Creations">

            <h2><a href="/creation/lire/<?=$article['idArticles'] ?>"><?= $article['Titre']?></a></h2>

        <div class="caroussel">
            <?php foreach($article["images"] as $img): ?>
                <img src="<?= $img['Lien'] ?>" alt="<?= $img['Alt'] ?>">
            <?php endforeach ?>
        </div>

        <?=substr($article['Texte'],0,36)."<p>...</p>" ?>

        </article>

    <?php endforeach ?>

</section>