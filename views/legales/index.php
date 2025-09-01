<div class="container">
    <h2>Mentions légales</h1>
    <div class="mentions">
        <button class="titre">
            Épise — Épicerie Solidaire
            <span class="fleche">▼</span>
        </button>
        <div class="texte">
            <p>Projet solidaire de l’Université de la Nouvelle-Calédonie (UNC)<br />
            Adresse : Université de la Nouvelle-Calédonie, Nouméa, Nouvelle-Calédonie</p>
        </div>

        <button class="titre">
            Responsable de la publication
            <span class="fleche">▼</span>
        </button>
        <div class="texte">
            <p>Brigitte Gustin<br />
            Chargée de mission vie étudiante<br />
            Téléphone : 290 191<br />
            Email : <a href="mailto:brigitte.gustin@unc.nc">brigitte.gustin@unc.nc</a></p>
        </div>

        <button class="titre">
            Conditions d’utilisation
            <span class="fleche">▼</span>
        </button>
        <div class="texte">
            <p>L’utilisation du site Épise implique l’acceptation pleine et entière des présentes mentions légales. Les informations présentes sur ce site sont fournies à titre informatif et peuvent être modifiées sans préavis.</p>
        </div>

        <button class="titre">
            Propriété intellectuelle
            <span class="fleche">▼</span>
        </button>
        <div class="texte">
            <p>Tous les contenus présents sur ce site (textes, images, logos, vidéos…) sont la propriété exclusive de l’Épise ou des tiers ayant autorisé leur utilisation. Toute reproduction totale ou partielle est strictement interdite sans accord préalable.</p>
        </div>

        <button class="titre">
            Données personnelles
            <span class="fleche">▼</span>
        </button>
        <div class="texte">
            <p>Les données collectées via le site sont utilisées uniquement dans le cadre de la gestion des inscriptions et commandes liées à l’Épicerie Solidaire, conformément au Règlement Général sur la Protection des Données (RGPD). Pour plus d’informations, veuillez consulter notre politique de confidentialité.</p>
        </div>

        <button class="titre">
            Contact
            <span class="fleche">▼</span>
        </button>
        <div class="texte">
            <p>Contact : Épicerie solidaire des étudiants<br />
            Téléphone : 72 12 50<br />
            Email : <a href="mailto:brigitte.gustin@unc.nc">brigitte.gustin@unc.nc</a></p>
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