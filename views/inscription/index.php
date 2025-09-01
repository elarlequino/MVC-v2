    <h2 class="Titre">Inscription</h2>
    <section>
        <h3>Formulaire</h3>
        <p>Veuillez remplir le formulaire suivant pour vous inscrire.</p>

        <form method="post" action="Inscription/confirm">
            <label for="nom">Votre nom :</label>
            <input type="text" name="nom" id="nom" required> <br>

            <label for="prenom">Votre prénom :</label>
            <input type="text" name="prenom" id="prenom" required> <br>

            <label for="mail">Votre adresse mail</label>
            <input type="email" name="mail" id="mail"> <br>

            <label for="Confirm_mail">Confirmation de votre adresse mail</label>
            <input type="email" name="Confirm_mail" id="Confirm_mail" required> <br>

            <label for="mdp">Votre mot de passe :</label>
            <input type="password" name="mdp" id="mdp" required> <br>

            <label for="Confirm_mdp">Confirmation de votre mot de passe :</label>
            <input type="password" name="Confirm_mdp" id="Confirm_mdp" required> <br><br>

            <input type="submit" id="bouton" value="Valider">
        </form>
    </section>