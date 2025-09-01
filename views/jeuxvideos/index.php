<section>
<h2>Mes types de Jeux</h2>
<?php foreach($articles as $article): ?>
    <article class="Jeux">
        <?php foreach($article["images"] as $img): ?>
            <img class="Poster" src="<?= $img['Lien'] ?>" alt="<?= $img['Alt'] ?>">
        <?php endforeach ?>

        <h2><a href="/jeuxvideos/lire/<?=$article['idArticles'] ?>"><?= $article['Titre']?></a></h2>

        <?=substr($article['Texte'],0,36)."<p>...</p>" ?>
    </article>
<?php endforeach ?>
</section>