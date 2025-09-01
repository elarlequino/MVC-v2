<div class="contact-contenant">

    <div class="contact">
        <h1>Une question ?</h1>
        <p>
            Nous sommes là pour vous aider ! Remplissez le formulaire ou contactez-nous par email ou téléphone. Notre équipe vous répondra dans les plus brefs délais.
        </p>
        <p>
            📍145, Avenue James Cook - BP R4, Nouméa, New Caledonia <br>
            📞 72.12.50
        </p>
    </div>

    <form class="contact-droite" method="post">
        <div class="form">
            <input type="text" name="Nom" id="Nom" placeholder="Nom *"/>
            <input type="text" name="Prenom" id="Prenom" placeholder="Prénom *"/>
        </div>

        <input type="email" name="adresse" id="adresse" placeholder="Adresse mail *" required/>

        <select id="categorie" name="categorie" required>
            <option value="">Vous êtes ? *</option>
            <option value="etudiant">Étudiant</option>
            <option value="donneur">Donneur</option>
            <option value="benevole">Bénévole</option>
            <option value="autre">Autre</option>
        </select>

        <input type="text" name="objet" id="objet" placeholder="Objet *" required/>

        <textarea name="message" id="message" placeholder="Votre message *" required></textarea>

        <div class="rgpd">
            <input type="checkbox" id="rgpd" name="rgpd" required>
            <label for="rgpd">
                J'accepte que mes données soient traitées par Épise dans le cadre de ma demande, conformément à la <a href="#">politique de confidentialité</a>.
            </label>
        </div>

        <input class="bouton" type="submit" value="Envoyer la demande"/>
    </form>

</div>