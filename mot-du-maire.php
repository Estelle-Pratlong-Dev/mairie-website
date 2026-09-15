<?php
/* =============================================================================
 * PAGE — LE MOT DU MAIRE — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Le mot du Maire — Mairie de Gagnières';
$description  = 'Le mot de bienvenue du Maire de Gagnières, commune du Gard en Occitanie.';
$active      = 'mot-du-maire';
$canonical   = 'mot-du-maire.php';
$pageTitle   = 'Le mot du Maire';
$crumbs      = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'La Mairie'], ['label' => 'Le mot du Maire']];
require_once __DIR__ . '/partials/icons.php';
ob_start();
?>

    <section class="section">
      <div class="container">
        <div class="prose">
          <!-- NOTE : texte repris du site précédent, signé par M. Olivier Martin.
               À faire actualiser et signer par le maire actuel avant mise en ligne. -->
          <p>Chers administrés,</p>
          <p>Je suis heureux au nom des élus du conseil municipal de Gagnières de vous présenter le nouveau site officiel de la Mairie de Gagnières.</p>
          <blockquote class="pull">Un site qui se veut modeste mais plein de ressources et d'informations sur les services publics, les commerçants, artisans, professionnels et associations de notre commune.</blockquote>
          <p>À travers ce site, nous souhaitons, en plus des traditionnelles publications que vous appréciez et que nous continuerons à éditer, mettre en avant le dynamisme des différents acteurs de la vie Gagnièroise ainsi que les atouts naturels, patrimoniaux, le bien et bon vivre de Gagnières.</p>
          <p>S'inscrire dans les nouveaux supports de communication est nécessaire et doit être considéré comme un moyen supplémentaire de faire connaître notre village et de conforter le lien entre ceux qui habitent à l'année ou pour ceux qui viennent y séjourner.</p>
          <p>Bonne découverte et n'hésitez pas à nous faire part de vos suggestions.</p>
          <p>Avec mon attention toujours renouvelée pour tous.</p>
          <p class="signature">Le Maire,<br>Olivier Martin</p>
        </div>

        <hr class="divider">

        <div class="grid cols-2">
          <a class="card" href="conseil-municipal.php">
            <span class="icon-badge" aria-hidden="true"><?= icon('users') ?></span>
            <h3>Le Conseil municipal</h3>
            <p>Découvrez l'équipe des élus et leurs délégations.</p>
            <span class="card-link">Voir la page <?= icon('arrow-right', 'icon') ?></span>
          </a>
          <a class="card" href="services-municipaux.php">
            <span class="icon-badge" aria-hidden="true"><?= icon('landmark') ?></span>
            <h3>Les services municipaux</h3>
            <p>Les équipes au service des habitants au quotidien.</p>
            <span class="card-link">Voir la page <?= icon('arrow-right', 'icon') ?></span>
          </a>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include 'partials/layout.php'; ?>
