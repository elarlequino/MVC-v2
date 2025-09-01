<?php 
$msg = $bo['msg']; 
unset($bo['msg']); 
$articles = $bo['articles'];
//var_dump($bo);
?>
<div class="alert"><?= $msg ?></div>

<form action="/backoffice" method="post">
    <input type="submit" name="changer" value="Changer de table">
</form>

<?php foreach ($articles as $client): ?>
    <div class="formulaire">
        <form class="d-inline-block" method="POST" action="/backoffice/updateAdhesion/<?= $client['id_client'] ?>">
            <fieldset>
                <legend>Modifier l'adhésion du client : "<?= htmlspecialchars($client['prenom']) . " " . htmlspecialchars($client['nom']) ?>"</legend>
                <label for="adherent">Adhérent :</label>
                <select name="adherent" required>
                    <option value="0" <?= $client['adherent'] == 0 ? 'selected' : '' ?>>Non Adhérent</option>
                    <option value="1" <?= $client['adherent'] == 1 ? 'selected' : '' ?>>Adhérent</option>
                </select>
                <input type="submit" name="maj" value="Mettre à jour" class="bouton_anim" />
            </fieldset>
        </form>
    </div>
<?php endforeach ?>