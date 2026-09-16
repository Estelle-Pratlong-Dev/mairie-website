<?php
/* =============================================================================
 * PAGE — PLAN DU SITE — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Plan du site — Mairie de Gagnières';
$description  = 'Plan du site de la mairie de Gagnières : accès direct à toutes les pages.';
$active      = '';
$canonical   = 'plan-du-site.php';
$pageTitle   = 'Plan du site';
$crumbs      = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'Plan du site']];
require_once __DIR__ . '/../partials/icons.php';
ob_start();
?>

    <section class="section">
      <div class="container">
        <nav class="prose" aria-label="Plan du site">

          <h2>Pages principales</h2>
          <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="services.php">Vie pratique</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>

          <h2>La Mairie</h2>
          <ul>
            <li><a href="mot-du-maire.php">Le mot du Maire</a></li>
            <li><a href="conseil-municipal.php">Le Conseil municipal</a></li>
            <li><a href="services-municipaux.php">Les services municipaux</a></li>
          </ul>

          <h2>Annuaires</h2>
          <ul>
            <li><a href="professionnels.php">Les professionnels</a></li>
            <li><a href="associations.php">Les associations</a></li>
          </ul>

          <h2>Informations légales</h2>
          <ul>
            <li><a href="mentions-legales.php">Mentions légales</a></li>
            <li><a href="confidentialite.php">Politique de confidentialité</a></li>
            <li><a href="accessibilite.php">Déclaration d'accessibilité</a></li>
            <li><a href="plan-du-site.php">Plan du site</a></li>
          </ul>

        </nav>
      </div>
    </section>

<?php $content = ob_get_clean(); include __DIR__ . '/../partials/layout.php'; ?>
