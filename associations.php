<?php
/* =============================================================================
 * PAGE — ASSOCIATIONS — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Associations — Mairie de Gagnières';
$description  = 'Les associations de Gagnières : culture, musique, mémoire, solidarité. Une vie associative riche au cœur des Cévennes.';
$active      = 'associations';
$canonical   = 'associations.php';
require_once __DIR__ . '/partials/icons.php';
ob_start();
?>


    <section class="page-hero">
      <div class="container">
        <p class="crumbs"><a href="index.php">Accueil</a> › Associations</p>
        <h1>Les associations</h1>
        <p class="lead">Culture, mémoire, musique, solidarité : la vie associative fait battre le cœur du village.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="grid cols-3">
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('users') ?></span>
            <h3>Les Arbousiers</h3>
            <p>Association locale de Gagnières.</p>
          </div>
          <div class="card">
            <span class="icon-badge accent" aria-hidden="true"><?= icon('coffee') ?></span>
            <h3>Le Café Gadilhe, mémoire vive</h3>
            <p>Mémoire et convivialité autour du café Gadilhe. Retrouvez l'association sur Facebook.</p>
          </div>
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('heart') ?></span>
            <h3>Centre Chrétien de Gagnières</h3>
            <p>Association à caractère religieux.</p>
          </div>
          <div class="card">
            <span class="icon-badge accent" aria-hidden="true"><?= icon('museum') ?></span>
            <h3>Gagnières du Temps des Mines à Aujourd'hui</h3>
            <p>Histoire locale et patrimoine minier. L'association anime le <a href="services.php#musee-de-la-mine">Musée de la Mine</a>.</p>
          </div>
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('music') ?></span>
            <h3>MusicAgagnières</h3>
            <p>Association musicale du village. Retrouvez l'association sur Facebook.</p>
          </div>
          <div class="card">
            <span class="icon-badge accent" aria-hidden="true"><?= icon('coin') ?></span>
            <h3>Société du Sou</h3>
            <p>Association locale de Gagnières.</p>
          </div>
        </div>

        <hr class="divider">

        <div class="cta-band">
          <div>
            <h2>Votre association n'apparaît pas ?</h2>
            <p>Contactez la mairie pour être référencée ou mettre à jour vos informations.</p>
          </div>
          <a class="btn btn-primary" href="contact.php">Contacter la mairie</a>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include 'partials/layout.php'; ?>
