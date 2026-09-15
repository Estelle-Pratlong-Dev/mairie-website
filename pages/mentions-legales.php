<?php
/* =============================================================================
 * PAGE — MENTIONS LÉGALES — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Mentions légales — Mairie de Gagnières';
$description  = 'Mentions légales et politique de confidentialité du site de la mairie de Gagnières.';
$active      = '';
$canonical   = 'mentions-legales.php';
$pageTitle   = 'Mentions légales';
$crumbs      = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'Mentions légales']];
$robots      = 'noindex, follow';
require_once __DIR__ . '/../partials/icons.php';
ob_start();
?>

    <section class="section">
      <div class="container">
        <div class="prose">
          <h2>Éditeur du site</h2>
          <p><?= $mairie['commune'] ?><br>
          <?= $mairie['adresse'] ?>, <?= $mairie['code_postal'] ?> <?= $mairie['ville'] ?><br>
          SIRET : <?= $mairie['siret'] ?><br>
          Téléphone : <?= $mairie['tel'] ?><br>
          E-mail : <?= $mairie['email'] ?></p>

          <h2>Directeur de la publication</h2>
          <p>Monsieur <?= $mairie['maire'] ?>, Maire de Gagnières.</p>

          <h2>Hébergement</h2>
          <p>Ce site est hébergé par Amen — Agence des Médias Numériques (SASU)<br>
          200 rue de la Croix Nivert, 75015 Paris<br>
          Téléphone : 01 70 99 53 41 — <a href="https://www.amen.fr" target="_blank" rel="noopener">amen.fr</a></p>

          <h2>Propriété intellectuelle</h2>
          <p>L'ensemble des contenus de ce site (textes, images, logo, mise en forme) est, sauf mention contraire, la propriété de la commune de Gagnières ou de leurs auteurs respectifs. Toute reproduction ou réutilisation, totale ou partielle, sans autorisation écrite préalable est interdite et pourrait constituer une contrefaçon.</p>

          <h2>Droit applicable</h2>
          <p>Le présent site et ses mentions légales sont soumis au droit français. En cas de litige, et à défaut de résolution amiable, les tribunaux français sont seuls compétents.</p>

          <h2 id="confidentialite">Protection des données personnelles</h2>
          <p>Le traitement des données personnelles recueillies via le formulaire de contact (responsable de traitement, finalités, durée de conservation, vos droits, réclamation CNIL…) est détaillé dans notre <a href="confidentialite.php">politique de confidentialité</a>.</p>

          <h2>Accessibilité</h2>
          <p>La commune de Gagnières est attentive à l'accessibilité de son site à tous les publics. Le site a été conçu en visant les critères du Référentiel général d'amélioration de l'accessibilité (RGAA) ; la déclaration d'accessibilité complète sera publiée à l'issue de l'audit de conformité.</p>

          <h2>Crédits</h2>
          <p>Conception et réalisation : <a href="https://estelle-pratlong.fr/" target="_blank" rel="noopener">Estelle Pratlong</a> pour la commune de Gagnières. Cartographie : contributeurs <a href="https://www.openstreetmap.org/copyright" target="_blank" rel="noopener">OpenStreetMap</a>.</p>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include __DIR__ . '/../partials/layout.php'; ?>
