<?php 
$msg = $bo['msg']; 
unset($bo['msg']); 
$passions = $bo;
?>

<div class="alert"><?= $msg ?></div>
<form action="/backoffice" method="post">
    <input type="submit" name="changer" value="Changer de table">
</form>
<form class="d-inline-block" method="POST" action="/backoffice/create">
    <fieldset>
        <legend>Créer une nouvelle passion</legend>
        <label for="Titre">Titre :</label>
        <input type="text" name="Titre" required />

        <label for="Informations">Informations :</label>
        <textarea name="Informations" required></textarea>

        <input type="submit" name="maj" value="Créer" />
    </fieldset>
</form>

<?php foreach ($passions as $item): ?>
    <div>
        <form class="d-inline-block" method="POST" action="/backoffice/update/<?= $item['idPassions'] ?>">
            <fieldset>
                <legend>Modifier l'article "<?= $item['Titre'] ?>"</legend>
                <label for="Titre">Titre&nbsp;:</label>
                <input type="text" name="Titre" value="<?= $item['Titre'] ?>" />
                <label for="Informations">Informations&nbsp;:</label>
                <textarea name="Informations"><?= $item['Informations'] ?></textarea>
                <input type="submit" name="maj" value="Mettre à jour" />
            </fieldset>
        </form>
        <a href="/backoffice/delete/<?= $item['idPassions'] ?>">
            <button>Supprimer</button>
        </a><br />
    </div>
<?php endforeach ?>