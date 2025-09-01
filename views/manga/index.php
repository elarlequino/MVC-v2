<section>
	<h2>Mes manga favoris</h2>
    <?php foreach($articles as $article): ?>
        <article class="ArtFav">
            <?php foreach($article["images"] as $img): ?>
                <img src="<?= $img['Lien'] ?>" alt="<?= $img['Alt'] ?>" class="Poster">
            <?php endforeach ?>
            <h2><a href="/manga/lire/<?=$article['idArticles'] ?>"><?= $article['Titre']?></a></h2>
        <?=substr($article['Texte'],0,35)."<p>...</p>" ?>
        </article>
    <?php endforeach ?>
</section>
