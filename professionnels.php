<?php
/* =============================================================================
 * PAGE — LES PROFESSIONNELS — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Les professionnels — Mairie de Gagnières';
$description  = 'Commerçants, artisans et professionnels de Gagnières : restauration, artisanat, bâtiment, beauté, services.';
$active      = 'professionnels';
$canonical   = 'professionnels.php';
require_once __DIR__ . '/partials/icons.php';
ob_start();
?>


    <section class="page-hero">
      <div class="container">
        <p class="crumbs"><a href="index.php">Accueil</a> › Les professionnels</p>
        <h1>Les professionnels</h1>
        <p class="lead">Commerçants, artisans et entreprises font vivre Gagnières au quotidien. Faites-leur confiance !</p>
      </div>
    </section>

    <section class="section">
      <div class="container">

        <div class="section-head">
          <span class="kicker">Restauration</span>
          <h2>Se restaurer</h2>
        </div>
        <div class="grid cols-3" style="margin-bottom: 3rem;">
          <div class="card">
            <span class="tag ochre">Bar &amp; brasserie</span>
            <h3>Le Virage</h3>
            <p>Bar &amp; brasserie.</p>
          </div>
          <div class="card">
            <span class="tag ochre">Restaurant</span>
            <h3>Le Clairval</h3>
            <p>Restaurant.</p>
          </div>
          <div class="card">
            <span class="tag ochre">Café-restaurant</span>
            <h3>La Guinguette du Midi</h3>
            <p>Café-restaurant.</p>
          </div>
        </div>

        <div class="section-head">
          <span class="kicker">Artisanat &amp; terroir</span>
          <h2>L'artisanat local</h2>
        </div>
        <div class="grid cols-3" style="margin-bottom: 3rem;">
          <div class="card">
            <span class="tag">Ferronnerie</span>
            <h3>Flo le Petit Ferronnier</h3>
            <p>Fabrication et pose : portes, portails, portillons, pergolas, fenêtres.</p>
          </div>
          <div class="card">
            <span class="tag">Ferme &amp; fromagerie</span>
            <h3>Ferme d'Agnès Combes</h3>
            <p>Ferme et fromagerie.</p>
          </div>
          <div class="card">
            <span class="tag">Porcelaine</span>
            <h3>Atelier Florcelaine</h3>
            <p>Peinture à la main sur porcelaine et faïence.</p>
          </div>
        </div>

        <div class="section-head">
          <span class="kicker">Bâtiment</span>
          <h2>Construire &amp; rénover</h2>
        </div>
        <div class="grid cols-3" style="margin-bottom: 3rem;">
          <div class="card">
            <span class="tag">Gros œuvre</span>
            <h3>A&amp;R Rénovation</h3>
            <p>Construction et rénovation.</p>
          </div>
          <div class="card">
            <span class="tag">Gros œuvre</span>
            <h3>Maçonnerie Générale – Toitures</h3>
            <p>Maçonnerie générale, toitures.</p>
          </div>
          <div class="card">
            <span class="tag">Terrassement</span>
            <h3>EURL AJTP</h3>
            <p>Terrassement et petite maçonnerie.</p>
          </div>
          <div class="card">
            <span class="tag">Électricité</span>
            <h3>ASV-ELEC</h3>
            <p>Électricien.</p>
          </div>
          <div class="card">
            <span class="tag">Menuiserie</span>
            <h3>Cevenn Menuiserie</h3>
            <p>Menuiserie neuf et rénovation.</p>
          </div>
          <div class="card">
            <span class="tag">Menuiserie</span>
            <h3>CJ Menuiseries</h3>
            <p>Menuiseries.</p>
          </div>
          <div class="card">
            <span class="tag">Enduits</span>
            <h3>EIRL Nino Déco</h3>
            <p>Enduits chaux, chanvre.</p>
          </div>
        </div>

        <div class="section-head">
          <span class="kicker">Services &amp; bien-être</span>
          <h2>Au service des habitants</h2>
        </div>
        <div class="grid cols-3">
          <div class="card">
            <span class="tag">Beauté</span>
            <h3>Coiffure Marjorie</h3>
            <p>Salon de coiffure.</p>
          </div>
          <div class="card">
            <span class="tag">Puériculture</span>
            <h3>Assistante maternelle agréée</h3>
            <p>Garde d'enfants à domicile par une assistante maternelle agréée.</p>
          </div>
          <div class="card">
            <span class="tag">Son &amp; image</span>
            <h3>Sonoton</h3>
            <p>Animateur, sonorisateur, vidéaste.</p>
          </div>
        </div>

        <hr class="divider">

        <div class="cta-band">
          <div>
            <h2>Vous êtes professionnel à Gagnières ?</h2>
            <p>Contactez la mairie pour figurer dans cet annuaire ou mettre à jour vos informations.</p>
          </div>
          <a class="btn btn-primary" href="contact.php">Me faire référencer</a>
        </div>

      </div>
    </section>

<?php $content = ob_get_clean(); include 'partials/layout.php'; ?>
