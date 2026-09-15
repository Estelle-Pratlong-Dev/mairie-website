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
$pageTitle   = 'Oups, cette page n\'existe pas';
$pageLead    = 'La page que vous cherchez a peut-être été déplacée ou supprimée.';
$crumbs      = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'Page introuvable']];
require_once __DIR__ . '/../partials/icons.php';
ob_start();
?>

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

<?php $content = ob_get_clean(); include __DIR__ . '/../partials/layout.php'; ?>
