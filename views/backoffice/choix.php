<form method="post" action="<?= $_SERVER['REQUEST_URI']?>">
    <input type="submit" value="Se déconnecter" name="deco"></td>
</form>
<form method="post" action='<?= $_SERVER['REQUEST_URI']?>'>
    <input type="radio" name='modele' value='Categories' checked>Categories<br/>
    <input type="radio" name='modele' value='Articles'>Articles<br/>
    <input type="radio" name='modele' value='Client'>Client<br/>
    <input type="submit" name='choisir' value="Choisir cette table">
</form>