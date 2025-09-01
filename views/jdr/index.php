<section>
<h2>Mes aventures dans les JDR</h2>
<?php foreach($articles as $article): ?>
    <article class="Art">
        <?php foreach($article["images"] as $img): ?>
            <img class="Poster" src="<?= $img['Lien'] ?>" alt="<?= $img['Alt'] ?>">
        <?php endforeach ?>

        <h2><a href="/jdr/lire/<?=$article['idArticles'] ?>"><?= $article['Titre']?></a></h2>

        <?=substr($article['Texte'],0,30)."<p>...</p>" ?>
    </article>
<?php endforeach ?>
</section>