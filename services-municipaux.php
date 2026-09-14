<?php
/* =============================================================================
 * PAGE — LES SERVICES MUNICIPAUX — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Les services municipaux — Mairie de Gagnières';
$description  = 'Les équipes des services municipaux de Gagnières : administration, social, scolaire, technique, bibliothèque et sécurité.';
$active      = 'services-mun';
$canonical   = 'services-municipaux.php';
require_once __DIR__ . '/partials/icons.php';
ob_start();
?>


    <section class="page-hero">
      <div class="container">
        <p class="crumbs"><a href="index.php">Accueil</a> › La Mairie › Les services municipaux</p>
        <h1>Les services municipaux</h1>
        <p class="lead">Les agents de la commune œuvrent chaque jour au service des Gagnièroises et des Gagnièrois.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="grid cols-2">
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('landmark') ?></span>
            <h3>Services administratifs</h3>
            <p>Accueil, état civil, élections, secrétariat de mairie.</p>
            <ul class="info-list">
              <li><?= icon('users', 'icon') ?>
              Sandrine Milési, Doris Bellinasso, Chantal Roux, Justine Charbonnier, Chloé Mallefroy</li>
            </ul>
          </div>
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('heart') ?></span>
            <h3>Pôle d'actions sociales</h3>
            <p>Accompagnement social et actions en direction des aînés. Permanence le mercredi matin de 10h à 12h en mairie.</p>
            <ul class="info-list">
              <li><?= icon('users', 'icon') ?>
              Marie Gargano, Ingrid Mura</li>
            </ul>
          </div>
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('school') ?></span>
            <h3>Services scolaires</h3>
            <p>Cantine, garderie et accompagnement des enfants de l'école de Gagnières.</p>
            <ul class="info-list">
              <li><?= icon('users', 'icon') ?>
              Christiane Coste, Laurence Gimenez, Virginie Vaissière, Léna Fournier, Jennyfer Chaniol</li>
            </ul>
          </div>
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('tool') ?></span>
            <h3>Services techniques</h3>
            <p>Entretien des bâtiments, de la voirie et des espaces publics de la commune.</p>
            <ul class="info-list">
              <li><?= icon('users', 'icon') ?>
              Bernard Roblès, Ghislain Durieux, Xavier Julien, Jean-Michel Vialle, Jean-Luc Dusoulié, Rémi Caron</li>
            </ul>
          </div>
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('book') ?></span>
            <h3>Bibliothèque municipale</h3>
            <p>Bibliothèque et pôle informatique, 9 rue de l'Église.</p>
            <ul class="info-list">
              <li><?= icon('users', 'icon') ?>
              Élodie Verdet</li>
            </ul>
          </div>
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('shield') ?></span>
            <h3>Service sécurité</h3>
            <p>Prévention et sécurité sur la commune.</p>
            <ul class="info-list">
              <li><?= icon('users', 'icon') ?>
              David Vincent</li>
            </ul>
          </div>
        </div>

        <hr class="divider">

        <div class="cta-band">
          <div>
            <h2>Joindre les services</h2>
            <p>Un seul numéro : 04 66 25 02 02, du lundi au vendredi aux horaires d'ouverture.</p>
          </div>
          <a class="btn btn-primary" href="contact.php">Nous contacter</a>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include 'partials/layout.php'; ?>
