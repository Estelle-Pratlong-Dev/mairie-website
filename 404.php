<?php
/* =============================================================================
 * PAGE — ERREUR 404 (page introuvable)
 * Affichée automatiquement par le serveur (voir .htaccess) quand une adresse
 * n'existe pas.
 * ========================================================================== */
$title       = 'Page introuvable — Mairie de Gagnières';
$description  = "La page demandée n'existe pas ou a été déplacée.";
$robots      = 'noindex, nofollow';
$canonical   = '404.php';
require_once __DIR__ . '/partials/icons.php';
ob_start();
?>

    <section class="page-hero">
      <div class="container">
        <p class="crumbs"><a href="index.php">Accueil</a> › Page introuvable</p>
        <h1>Oups, cette page n'existe pas</h1>
        <p class="lead">La page que vous cherchez a peut-être été déplacée ou supprimée.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <p>Voici quelques liens utiles pour retrouver votre chemin :</p>
        <div class="hero-actions">
          <a class="btn btn-primary" href="index.php">Retour à l'accueil</a>
          <a class="btn btn-outline" href="services.php">Vie pratique</a>
          <a class="btn btn-outline" href="contact.php">Contacter la mairie</a>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include 'partials/layout.php'; ?>
