<h1 >Bienvenue chez Epise !</h1>
    <section>
        <h2>Annonces</h2>
        <div class='autoplay conteneur_article' style="text-align: center;">
            <?php foreach($articles as $article): ?>
                <div>
                    <article class="article_with_description ">
                        <div class="in_article ">
                            <h2><?= $article['Titre']?></h2>
                            <img class="Image" src="/img/articles/<?= $article['Image']?>" alt="<?= $article['Alt']?>">
                        </div>

                        <p class="hid">
                            <?=substr($article['Texte'],0,255) ?>
                        </p>
                    </article>
                </div>
            <?php endforeach; ?>
    </section>
    <h2 class="Titre">Catégories d'articles</h2>
    <section>
        <ul>
            <li><h3><a href="manger">Nourriture</a></h3></li>
            <li><h3><a href="vetement">Vêtements</a></h3></li>
            <li><h3><a href="hygiene">Produit d'hygiène</a></h3></li>
            <!--<li><h3><a href="backoffice">Admin Test</a></h3></li>-->
        </ul>
    </section>

<script>
    $('.autoplay').slick({
        slidesToShow: 3,
        
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        dots: true,
          arrows: false,
    });
</script>