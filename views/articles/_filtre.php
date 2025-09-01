
<div>
    <form action="/articles/lire/" method="post" class="row">
        <label class="left-right" for="filtre">Filtre :</label>
        <select name="filtre" id="filtre" class="left-right">
            <?php 
                $filtres = ['Aucun', 'Produit frais', 'Conserves', 'Surgelés', 'Plat cuisiné', 'Pâtes', 'Riz', 'T-shirt', 'Pantalon', 'Savon', 'Shampoing', 'Gel douche', 'Dentifrice', 'Crème hydratante', 'Crème solaire', 'Maquillage'];
                foreach ($filtres as $filtre):
                ?>
                    <option value="<?= $filtre ?>" 
                        <?php 
                            if (isset($_POST['filtre']) && $filtre == $_POST['filtre']) { 
                                echo "selected"; 
                            } elseif (!isset($_POST['filtre']) && $filtre == 'Aucun') { 
                                echo "selected"; 
                            } 
                        ?>>
                        <?= $filtre ?>
                    </option>
                <?php endforeach ?>
        </select><br>
        <button type="submit" class="left-right">Filtrer</button>

    </form>
</div>