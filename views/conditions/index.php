<div class="container">
    <h2>Conditions Générales de Vente – Épise</h2>
    <div class="mentions">
      <button class="titre">
        Article 1 – Objet
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            Les présentes Conditions Générales de Vente (CGV) ont pour objet de définir les modalités d’inscription, 
            de paiement et d’accès aux services proposés par Épise, l’Épicerie Solidaire de l’Université de la Nouvelle-Calédonie (UNC).
        </p>
      </div>

      <button class="titre">
        Article 2 – Public concerné
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            Le service est exclusivement réservé aux étudiants inscrits à l’UNC, dans le cadre d’un projet de soutien à la vie étudiante.
        </p>
      </div>

      <button class="titre">
        Article 3 – Modalités d’adhésion
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            L’adhésion au service Épise est valable pour une année civile (de janvier à décembre).
            Elle devient effective après :
            <ul>
                <li>L’inscription via le site ou en personne ;</li>
                <li>Le paiement d’une contribution annuelle de 200 francs CFP.</li>
            </ul>
        </p>
      </div>

      <button class="titre">
        Article 4 – Fonctionnement du service
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            Les bénéficiaires peuvent, à partir de la validation de leur inscription, accéder à l’Épicerie Solidaire deux jours par semaine 
            (jours précisés sur le site ou par mail). Chaque visite permet de prendre jusqu’à 5 articles, selon les stocks disponibles.
        </p>
      </div>

      <button class="titre">
        Article 5 – Règlement intérieur
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            Les utilisateurs s’engagent à respecter les règles suivantes :
            <ul>
                <li>Ne pas dépasser la limite d’articles par visite ;</li>
                <li>Respecter les jours et horaires d’ouverture ;</li>
                <li>Se comporter de manière respectueuse avec les bénévoles et les autres usagers.</li>
            </ul>
            Tout comportement abusif ou non conforme peut entraîner une suspension temporaire ou définitive de l’accès au service.
        </p>
      </div>

      <button class="titre">
        Article 6 – Remboursement
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            La cotisation annuelle de 200 francs CFP n’est ni remboursable ni transférable, même en cas de non-utilisation du service.
        </p>
      </div>

      <button class="titre">
        Article 7 – Données personnelles
        <span class="fleche">▼</span>
      </button>
      <div class="texte">
        <p>
            Les données collectées lors de l’inscription sont utilisées uniquement à des fins de gestion du service Épise.
            Conformément au RGPD, chaque utilisateur dispose d’un droit d’accès, de rectification ou de suppression de ses données.
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

  