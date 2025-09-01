<?php 
$msg = $bo['msg']; 
unset($bo['msg']); 
$articles = $bo['articles'];
$categories = $bo['categories'];
?>
<div class="alert"><?= $msg ?></div>

<form action="/backoffice" method="post">
    <input type="submit" name="changer" value="Changer de table">
</form>

<div class="formulaire">
    <form enctype="multipart/form-data" class="d-inline-block" method="POST" action="/backoffice/create">
        <fieldset>
            <legend>Créer un nouvel article</legend>
            <label for="Titre">Titre :</label>
            <input type="text" name="Titre" required />
            
            <label for="Texte">Texte :</label>
            <textarea name="Texte" required></textarea>

            <label for="Categorie">Categorie :</label>
            <select name="Categorie" required>
                <?php 
                $first = true; 
                foreach ($categories as $categorie): 
                ?>
                    <option value="<?= $categorie['idCategories'] ?>" 
                        <?php if ($first) { echo "selected"; $first = false; } ?>>
                        <?= $categorie['Titre'] ?>
                    </option>
                <?php endforeach ?>
            </select>

            <label for="Filtre">Filtre :</label>
            <select name="Filtre" required>
                <?php 
                $filtres = ['Aucun', 'Produit frais', 'Conserves', 'Surgelés', 'Plat cuisiné', 'Pâtes', 'Riz', 'T-shirt', 'Pantalon', 'Savon', 'Shampoing', 'Gel douche', 'Dentifrice', 'Crème hydratante', 'Crème solaire', 'Maquillage'];
                foreach ($filtres as $filtre):
                ?>
                    <option value="<?= $filtre ?>" 
                        <?php if ($filtre == 'Aucun') { echo "selected"; } ?>>
                        <?= $filtre ?>
                    </option>
                <?php endforeach ?>
            </select>
            
            <label for="Stock">Stock :</label>
            <input type="text" name="Stock" value="0" required />
            <br>
            <label for="Image">Image :</label>
            <input type="text" name="Image" />
            <br>
            <label for="Alt">Alt :</label>
            <input type="text" name="Alt" value="Lorem Ipsum"/>
            <br>
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
            <input id="idfile" name="userfile" type="file" />
            <br>
            <input type="submit" name="maj" value="Créer" />
        </fieldset>
    </form>
</div>

<?php foreach ($articles as $item): ?>
    <div class="formulaire">
        <form class="d-inline-block" method="POST" action="/backoffice/update/<?= $item['idArticles'] ?>">
            <fieldset>
                <legend>Modifier l'article "<?= $item['Titre'] ?>"</legend>
                <label for="Titre">Titre&nbsp;:</label>
                <input type="text" name="Titre" value="<?= $item['Titre'] ?>" />
                <label for="Texte">Texte&nbsp;:</label>
                <textarea name="Texte"><?= $item['Texte'] ?></textarea>
                <label for="Categorie">Categorie&nbsp;:</label>
                <select name="Categorie" required>
                    <?php foreach ($categories as $categorie): ?>
                        <option value="<?= $categorie['idCategories'] ?>" 
                            <?php if ($categorie['idCategories'] == $item['Categorie']) { echo "selected"; } ?>>
                            <?= $categorie['Titre'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
                <label for="Filtre">Filtre :</label>
                <select name="Filtre" required>
                    <?php 
                    $filtres = ['Aucun', 'Produit frais', 'Conserves', 'Surgelés', 'Plat cuisiné', 'Pâtes', 'Riz', 'T-shirt', 'Pantalon', 'Savon', 'Shampoing', 'Gel douche', 'Dentifrice', 'Crème hydratante', 'Crème solaire', 'Maquillage'];
                    foreach ($filtres as $filtre):
                    ?>
                        <option value="<?= $filtre ?>" 
                            <?php if ($filtre == $item['Filtre']) { echo "selected"; } ?>>
                            <?= $filtre ?>
                        </option>
                    <?php endforeach ?>
                </select>

                <label for="Stock">Stock&nbsp;:</label>
                <input type="text" name="Stock" value="<?= $item['Stock'] ?>" />

                <label for="Image">Image&nbsp;:</label>
                <input type="text" name="Image" value="<?= $item['Image'] ?>" />

                <label for="Alt">Alt&nbsp;:</label>
                <input type="text" name="Alt" value="<?= $item['Alt'] ?>" />

                <input type="submit" name="maj" value="Mettre à jour" />
            </fieldset>
        </form>
            
        <a href="/backoffice/delete/<?= $item['idArticles'] ?>">
            <button>Supprimer</button>
        </a><br/>
    </div>
<?php endforeach ?>