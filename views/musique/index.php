<section>
    <article class="Image"> 
        <?php foreach($articles as $article): ?>

            <?php foreach($article["images"] as $img): ?>
                <img class="Poster" src="<?= $img['Lien'] ?>" alt="<?= $img['Alt'] ?>">
            <?php endforeach ?>
        <?php endforeach ?>
	<h2>Photo de profil de Kikuo</h2>
    </article>
    <article class="ArtFav"> 
        <?php foreach($articles as $article): ?>

            <h2><a href="/musique/lire/<?=$article['idArticles'] ?>"><?= $article['Titre']?></a></h2>

        <?=substr($article['Texte'],0,60)."<p>...</p>" ?>

        <?php endforeach ?>
    </article>
</section>