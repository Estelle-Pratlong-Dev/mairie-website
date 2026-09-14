<?php
/* =============================================================================
 * PAGE — MENTIONS LÉGALES — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Mentions légales — Mairie de Gagnières';
$description  = 'Mentions légales et politique de confidentialité du site de la mairie de Gagnières.';
$active      = '';
$canonical   = 'mentions-legales.php';
$robots      = 'noindex, follow';
require_once __DIR__ . '/partials/icons.php';
ob_start();
?>


    <section class="page-hero">
      <div class="container">
        <p class="crumbs"><a href="index.php">Accueil</a> › Mentions légales</p>
        <h1>Mentions légales</h1>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="prose">
          <h2>Éditeur du site</h2>
          <p>Mairie de Gagnières<br>
          Place de la Mairie, 30160 Gagnières<br>
          Téléphone : 04 66 25 02 02<br>
          E-mail : mairie.gagnieres@laposte.net</p>

          <h2>Directeur de la publication</h2>
          <p>Le Maire de Gagnières.</p>

          <h2>Hébergement</h2>
          <!-- À compléter avec les coordonnées de l'hébergeur choisi -->
          <p>Les informations relatives à l'hébergeur seront précisées lors de la mise en ligne du site.</p>

          <h2 id="confidentialite">Politique de confidentialité (RGPD)</h2>
          <p>Les informations recueillies via le formulaire de contact sont destinées exclusivement aux services de la mairie de Gagnières, afin de répondre à votre demande. Elles ne sont ni cédées ni transmises à des tiers.</p>
          <p>Conformément au Règlement général sur la protection des données (RGPD) et à la loi « Informatique et Libertés », vous disposez d'un droit d'accès, de rectification et de suppression des données vous concernant. Pour l'exercer, adressez-vous à la mairie : mairie.gagnieres@laposte.net ou par courrier à l'adresse ci-dessus.</p>

          <h2>Cookies</h2>
          <p>Ce site n'utilise pas de cookies de suivi ni d'outils de mesure d'audience. Seules les polices de caractères sont chargées depuis un service tiers (Google Fonts).</p>

          <h2>Crédits</h2>
          <p>Conception et réalisation : Mairie de Gagnières. Cartographie : contributeurs <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a>.</p>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include 'partials/layout.php'; ?>
