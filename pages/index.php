<?php
/* =============================================================================
 * PAGE — ACCUEIL
 * ========================================================================== */
$title       = 'Mairie de Gagnières — Site officiel de la commune (Gard, Occitanie)';
$description  = "Site officiel de la mairie de Gagnières, commune du Gard en Occitanie, à la limite de l'Ardèche. Démarches, services, associations et vie locale.";
$active      = 'accueil';
$canonical   = '';   // accueil = racine du site (https://…/) et non /index.php
require_once __DIR__ . '/../partials/icons.php';
require_once __DIR__ . '/../partials/annonces.php';
$annoncesActives = annonces_actives();   // annonces « Flash info » gérées dans /admin, affichées en carrousel
ob_start();
?>

    <!-- ============================ Bandeau d'accueil ======================= -->
    <section class="hero">
      <div class="container">
        <div class="hero-inner">
          <span class="kicker">Site officiel de la commune</span>
          <h1>Bienvenue à Gagnières</h1>
          <p class="lead">Commune du département du Gard en Occitanie, à la limite de l'Ardèche, le village de Gagnières est principalement tourné vers le tourisme vert.</p>
          <div class="hero-actions">
            <a class="btn btn-primary" href="#demarches">Vos démarches</a>
            <a class="btn btn-light" href="contact.php">Contacter la mairie</a>
          </div>
          <div class="hero-stats">
            <div class="stat"><strong>1 121</strong> habitants</div>
            <div class="stat"><strong>11,22 km²</strong> de superficie</div>
            <div class="stat"><strong>516 m</strong> d'altitude max.</div>
          </div>
        </div>
      </div>
      <div class="hero-hills" aria-hidden="true">
        <svg viewBox="0 0 1440 220" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 120 C240 60 420 150 720 110 C1020 70 1200 140 1440 90 V220 H0 Z" fill="rgba(255,255,255,0.10)"/>
          <path d="M0 160 C260 110 480 190 760 150 C1040 110 1240 180 1440 140 V220 H0 Z" fill="rgba(255,255,255,0.16)"/>
          <path d="M0 200 C300 150 560 215 860 185 C1120 160 1300 205 1440 180 V220 H0 Z" fill="#f7f8fa"/>
        </svg>
      </div>
    </section>

    <!-- ============================ Actualités & agenda =====================
         Le carrousel affiche les annonces « Flash info » gérées dans /admin.
         Chaque annonce disparaît d'elle-même passée sa date de fin ; quand il
         n'en reste aucune, le carrousel n'apparaît pas du tout (seul l'encadré
         « Suivez l'actualité » reste, sous le titre). -->
    <section class="section">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Vie locale</span>
          <h2>Actualités &amp; agenda</h2>
        </div>

<?php if ($annoncesActives): $defilable = count($annoncesActives) > 3; ?>
        <div class="carousel <?= $defilable ? 'is-scroll' : 'is-static' ?>" data-carousel aria-label="Actualités de la commune">
<?php if ($defilable): ?>
          <button type="button" class="carousel-arrow carousel-prev" aria-label="Faire défiler vers la gauche"><?= icon('chevron-down', 'icon') ?></button>
<?php endif; ?>
          <ul class="carousel-track">
<?php foreach ($annoncesActives as $a): ?>
            <li class="carousel-slide">
              <article class="actu-card">
                <div class="actu-body">
<?php if (!empty($a['quand'])): ?>
                  <time datetime="<?= htmlspecialchars($a['date_fin'] ?? '') ?>"><?= icon('calendar', 'icon') ?> <?= htmlspecialchars($a['quand']) ?></time>
<?php endif; ?>
                  <h3><?= htmlspecialchars($a['titre']) ?></h3>
<?php if (!empty($a['texte'])): ?>
                  <p><?= htmlspecialchars($a['texte']) ?></p>
<?php endif; ?>
                </div>
<?php if (!empty($a['affiche'])): ?>
                <a class="actu-media js-lightbox" href="assets/img/event/<?= htmlspecialchars($a['affiche']) ?>" data-alt="<?= htmlspecialchars($a['titre']) ?>" target="_blank" rel="noopener">
                  <img src="assets/img/event/<?= htmlspecialchars($a['affiche']) ?>" alt="<?= htmlspecialchars($a['titre']) ?>" loading="lazy">
                </a>
<?php endif; ?>
              </article>
            </li>
<?php endforeach; ?>
          </ul>
<?php if ($defilable): ?>
          <button type="button" class="carousel-arrow carousel-next" aria-label="Faire défiler vers la droite"><?= icon('chevron-down', 'icon') ?></button>
<?php endif; ?>
        </div>
<?php endif; ?>

        <!-- Encadré « Suivez l'actualité » — invite à suivre l'actu (et prend le
             relais quand il n'y a aucune annonce en cours). -->
        <div class="card follow-card">
          <span class="icon-badge" aria-hidden="true"><?= icon('facebook') ?></span>
          <div>
            <h3>Suivez l'actualité au quotidien</h3>
            <p>L'actualité de la commune se vit aussi sur Facebook : annonces de la mairie, alertes, photos et vie du village.</p>
            <ul class="info-list follow-links">
              <li><?= icon('arrow-right', 'icon') ?> <a href="<?= $mairie['facebook'] ?>" target="_blank" rel="noopener">Page officielle de la mairie</a></li>
              <li><?= icon('arrow-right', 'icon') ?> <a href="<?= $mairie['facebook_groupe'] ?>" target="_blank" rel="noopener">Groupe des habitants du village</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================ La commune ============================== -->
    <section class="section tint">
      <div class="container">
        <div class="grid cols-2" style="align-items: center; gap: 3rem;">
          <div>
            <div class="section-head" style="margin-bottom: 1.2rem;">
              <span class="kicker">La commune</span>
              <h2>Un village au cœur des Cévennes</h2>
            </div>
            <p>Niché entre le Gard et l'Ardèche, Gagnières cultive le bien et bon vivre cévenol : nature préservée, patrimoine minier, vie associative dynamique et commerces de proximité.</p>
            <p>Découvrez l'équipe municipale, les services de la commune et toutes les informations pratiques pour les habitants comme pour les visiteurs.</p>
            <div class="hero-actions" style="margin-top: 1.4rem;">
              <a class="btn btn-outline" href="mot-du-maire.php">Le mot du Maire</a>
              <a class="btn btn-outline" href="conseil-municipal.php">Le Conseil municipal</a>
            </div>
            <img class="img-rounded" src="assets/img/village/mairie.jpg" alt="La mairie de Gagnières, place de la Mairie" loading="lazy" style="margin-top: 1.6rem;">
          </div>
          <div class="grid" style="gap: 1rem;">
            <a class="card" href="services.php#musee-de-la-mine">
              <img class="card-img" src="assets/img/village/musee-mine.jpeg" alt="Galerie du Musée de la Mine de Gagnières" loading="lazy">
              <h3>Musée de la Mine</h3>
              <p>« Gagnières du Temps des Mines à Aujourd'hui » — la mémoire minière du village. Entrée gratuite.</p>
            </a>
            <a class="card" href="services.php#bibliotheque">
              <span class="icon-badge" aria-hidden="true"><?= icon('book') ?></span>
              <h3>Bibliothèque &amp; pôle informatique</h3>
              <p>Lecture, ressources documentaires et accès informatique pour tous, rue de l'Église.</p>
            </a>
            <a class="card" href="https://www.tourisme-ceze-cevennes.com/" target="_blank" rel="noopener">
              <img class="card-img" src="assets/img/village/voie-verte.jpeg" alt="La voie verte ombragée de Gagnières" loading="lazy">
              <h3>Tourisme vert</h3>
              <p>Randonnées, rivières et patrimoine avec l'Office de Tourisme Cèze Cévennes.</p>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- ============================ Démarches rapides ======================= -->
    <section class="section" id="demarches">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Accès rapide</span>
          <h2>Vos démarches administratives</h2>
          <p>Réalisez vos démarches en ligne ou trouvez le bon interlocuteur en quelques clics.</p>
        </div>
        <div class="grid cols-3">
          <a class="card" href="https://www.service-public.gouv.fr/particuliers/vosdroits/N359" target="_blank" rel="noopener">
            <span class="icon-badge" aria-hidden="true"><?= icon('file-text') ?></span>
            <h3>État civil</h3>
            <p>Demande d'acte de naissance, de mariage ou de décès.</p>
            <span class="card-link">Faire ma demande <?= icon('arrow-right', 'icon') ?></span>
          </a>
          <a class="card" href="https://www.service-public.gouv.fr/particuliers/vosdroits/N358" target="_blank" rel="noopener">
            <span class="icon-badge" aria-hidden="true"><?= icon('id-card') ?></span>
            <h3>Carte d'identité &amp; passeport</h3>
            <p>Préparez votre dossier et prenez rendez-vous.</p>
            <span class="card-link">Prendre RDV <?= icon('arrow-right', 'icon') ?></span>
          </a>
          <a class="card" href="https://www.service-public.gouv.fr/particuliers/vosdroits" target="_blank" rel="noopener">
            <span class="icon-badge" aria-hidden="true"><?= icon('help') ?></span>
            <h3>Moments de vie</h3>
            <p>Comment faire si… ? Naissance, déménagement, retraite…</p>
            <span class="card-link">Consulter <?= icon('arrow-right', 'icon') ?></span>
          </a>
          <a class="card" href="https://www.service-public.gouv.fr/" target="_blank" rel="noopener">
            <span class="icon-badge" aria-hidden="true"><?= icon('landmark') ?></span>
            <h3>Droits et démarches</h3>
            <p>Toute l'information officielle sur Service-Public.fr.</p>
            <span class="card-link">Accéder au site <?= icon('arrow-right', 'icon') ?></span>
          </a>
          <a class="card" href="https://www.service-public.gouv.fr/particuliers/vosdroits/R16396" target="_blank" rel="noopener">
            <span class="icon-badge" aria-hidden="true"><?= icon('vote') ?></span>
            <h3>Liste électorale</h3>
            <p>Inscrivez-vous en ligne pour pouvoir voter à Gagnières.</p>
            <span class="card-link">M'inscrire <?= icon('arrow-right', 'icon') ?></span>
          </a>
          <a class="card accent" href="contact.php">
            <span class="icon-badge" aria-hidden="true"><?= icon('alert') ?></span>
            <h3>Demande d'intervention</h3>
            <p>Signalez un problème technique dans la commune. Urgences : <?= $mairie['tel_urgence'] ?>.</p>
            <span class="card-link">Nous signaler <?= icon('arrow-right', 'icon') ?></span>
          </a>
        </div>
      </div>
    </section>

    <!-- ============================ Le village en images ==================== -->
    <section class="section tint photo-section">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Découvrir</span>
          <h2>Le village en images</h2>
        </div>
        <div class="photo-grid">
          <figure>
            <img src="assets/img/village/pont.jpeg" alt="Un des ponts sur la Ganière, aux couleurs d'automne" loading="lazy">
            <figcaption>Un pont sur la Ganière</figcaption>
          </figure>
          <figure>
            <img src="assets/img/village/riviere.jpeg" alt="La Ganière au cœur de la verdure" loading="lazy">
            <figcaption>La Ganière</figcaption>
          </figure>
          <figure>
            <img src="assets/img/village/voie-verte2.jpeg" alt="La voie verte sous les arbres" loading="lazy">
            <figcaption>La voie verte</figcaption>
          </figure>
          <figure>
            <img src="assets/img/village/rue.jpeg" alt="Une rue du village" loading="lazy">
            <figcaption>Au cœur du village</figcaption>
          </figure>
          <figure>
            <img src="assets/img/village/entree-village.jpeg" alt="L'entrée du village" loading="lazy">
            <figcaption>L'entrée du village</figcaption>
          </figure>
          <figure>
            <img src="assets/img/village/vue.jpeg" alt="Vue panoramique sur Gagnières et les Cévennes" loading="lazy">
            <figcaption>Gagnières au creux des Cévennes</figcaption>
          </figure>
        </div>
      </div>
    </section>

    <!-- ============================ Bandeau contact ========================= -->
    <section class="section" style="padding-top: 2rem;">
      <div class="container">
        <div class="cta-band">
          <div>
            <h2>Une question, un signalement ?</h2>
            <p>L'équipe municipale est à votre écoute du lundi au vendredi.</p>
          </div>
          <a class="btn btn-primary" href="contact.php">Contacter la mairie</a>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include __DIR__ . '/../partials/layout.php'; ?>
