<div class="container">
    <h2>Politique de confidentialité</h1>
    <div class="mentions">
      <button class="titre">
        1. Collecte des données personnelles
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            Dans le cadre de ses activités, Épise collecte des données personnelles strictement nécessaires à la gestion des inscriptions, 
            des commandes et de la communication avec les bénéficiaires, donateurs et bénévoles. Ces données incluent notamment :

            <ul>
                <li>Nom et prénom</li>
                <li>Adresse électronique</li>
                <li>Numéro de téléphone</li>
                <li>Statut (étudiant, donateur, bénévole)</li>
                <li>Historique des commandes et réservations</li>
            </ul>
        </p>
      </div>

      <button class="titre">
        2. Finalités du traitement
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            Les données collectées sont utilisées exclusivement pour :

            <ul>
                <li>La création et la gestion des comptes utilisateurs</li>
                <li>Le traitement des commandes et la réservation des produits</li>
                <li>L’envoi d’informations relatives au fonctionnement de l’Épicerie Solidaire</li>
                <li>La gestion des dons et de la participation bénévole</li>
                <li>La communication des événements et actualités en lien avec le projet</li>
            </ul>
        </p>
      </div>

      <button class="titre">
        3. Durée de conservation
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            Les données personnelles sont conservées uniquement pendant la durée nécessaire 
            à la réalisation des finalités mentionnées ci-dessus, 
            soit la durée de l’année universitaire en cours. 
            À l’issue de cette période, elles sont supprimées ou anonymisées.
        </p>
      </div>

      <button class="titre">
        4. Sécurité et confidentialité
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            Épise met en œuvre des mesures techniques et organisationnelles appropriées 
            afin d’assurer la sécurité des données personnelles et de prévenir tout accès, 
            divulgation, modification ou destruction non autorisés.
        </p>
      </div>

      <button class="titre">
        5. Partage des données
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            Les données personnelles ne sont ni vendues ni communiquées à des tiers à des fins commerciales. 
            Elles peuvent être partagées avec des prestataires de services intervenant dans le cadre de la gestion de l’Épicerie 
            (hébergement, livraison) dans le respect strict des obligations de confidentialité.
        </p>
      </div>

      <button class="titre">
        6. Droits des personnes concernées
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            Conformément au Règlement Général sur la Protection des Données (RGPD), les personnes disposent des droits suivants sur leurs données personnelles :
        
            <ul>
                <li>Droit d’accès</li>
                <li>Droit de rectification</li>
                <li>Droit à l’effacement</li>
                <li>Droit à la limitation du traitement</li>
                <li>Droit d’opposition</li>
                <li>Droit à la portabilité</li>
            </ul>

            Ces droits peuvent être exercés en contactant :</br>
            Brigitte Gustin</br>
            Chargée de mission vie étudiante</br>
            Email : brigitte.gustin@unc.nc
        </p>
      </div>

      <button class="titre">
        7. Contact
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            Pour toute question relative à la protection des données personnelles, veuillez contacter :</br>
            Brigitte Gustin</br>
            Chargée de mission vie étudiante</br>
            Email : brigitte.gustin@unc.nc
        </p>
      </div>
    </div>
</div>
  <script>
    const items = document.querySelectorAll('.titre');
    items.forEach(item => {
      item.addEventListener('click', () => {
        item.classList.toggle('active');
        const content = item.nextElementSibling;
        const fleche = item.querySelector('.fleche');
        content.style.maxHeight = content.style.maxHeight ? null : content.scrollHeight + "px";
        if (fleche) fleche.classList.toggle('rotated');
      });
    });
  </script>