    <?php //var_dump($client); ?>
    <div class="container">

        <div id="info" class="section">
            <h2>Informations Personnelles</h2>
            <form action="/Compte/update" method="post" onsubmit="return alert('Vos informations ont été enregistrée.');">                
                <h3><label for="name">Nom :</label></h3>
                <input type="text" name="Nom" value="<?= $client['nom'] ?>" required />
                <h3><label for="name">Prénom :</label></h3>
                <input type="text" name="Prenom" value="<?= $client['prenom'] ?>" required />
                <br><br>
                <input type="submit" value="Mettre à jour">
            </form>
        </div>

        <div id="infosup" class="section">
            <h2>Mon Compte</h2>
            <?php if ($client['adherent'] === 1): ?>
                <p>Vous êtes adhérent.</p>
            <?php else : ?>
                <p>Vous n'êtes pas adhérent.</p>
            <?php endif; ?>   
        </div>

        <!-- Petit bug 
        <div id="security" class="section">
            <h2>Sécurité</h2>
            <form action="/Compte/updateSecu" method="post">
                <h3><label for="email">Confirmation Email :</label></h3>
                <input type="text" name="Mail" value="" required />
                <h3><label for="AncienMdp">Ancien Mot de passe :</label></h3>
                <input type="text" name="AncienMdp" value="" required />
                <h3><label for="password">Nouveau Mot de Passe:</label></h3>
                <input type="password" id="password" name="password" required>
                <h3><label for="confirm-password">Confirmer le Mot de Passe:</label></h3>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <input type="submit" value="Changer le Mot de Passe">
            </form>
        </div>
        -->

        <form method="post" action="/Connexion/TestConnexion">
            <input type="submit" value="Se déconnecter" name="decoClient">
        </form>

        <div id="delete-account" class="section">
            <h2>Suppression du Compte</h2>
            <form action="/Compte/delete" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.');">
                <input type="submit" value="Supprimer mon compte" class="danger">
            </form>
        </div>
    </div>