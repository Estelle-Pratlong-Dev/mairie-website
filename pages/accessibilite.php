<?php
/* =============================================================================
 * PAGE — DÉCLARATION D'ACCESSIBILITÉ — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Déclaration d\'accessibilité — Mairie de Gagnières';
$description  = 'Déclaration d\'accessibilité du site de la mairie de Gagnières (RGAA).';
$active      = '';
$canonical   = 'accessibilite.php';
$pageTitle   = 'Déclaration d\'accessibilité';
$crumbs      = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'Accessibilité']];
$robots      = 'noindex, follow';
require_once __DIR__ . '/../partials/icons.php';
ob_start();
?>

    <section class="section">
      <div class="container">
        <div class="prose">
          <p>La commune de Gagnières s'engage à rendre son site internet accessible conformément à l'article 47 de la loi n° 2005-102 du 11 février 2005.</p>

          <h2>État de conformité</h2>
          <p>Le site de la commune de Gagnières est actuellement <strong>non conforme</strong> au RGAA (Référentiel général d'amélioration de l'accessibilité), aucun audit de conformité complet n'ayant encore été réalisé.</p>
          <p>Un audit d'accessibilité est prévu afin d'évaluer le niveau de conformité du site et d'identifier les éventuelles améliorations nécessaires.</p>

          <h2>Signaler un problème d'accessibilité</h2>
          <p>Si vous rencontrez une difficulté pour accéder à un contenu ou à une fonctionnalité du site, vous pouvez contacter la mairie :</p>
          <p><a href="mailto:<?= $mairie['email'] ?>"><?= $mairie['email'] ?></a><br>
          <?= $mairie['nom'] ?> — <?= $mairie['adresse'] ?>, <?= $mairie['code_postal'] ?> <?= $mairie['ville'] ?><br>
          Téléphone : <a href="tel:<?= telHref($mairie['tel']) ?>"><?= $mairie['tel'] ?></a></p>
          <p>Nous nous efforcerons de vous proposer une solution accessible ou une alternative.</p>

          <h2>Voies de recours</h2>
          <p>Si vous constatez un défaut d'accessibilité vous empêchant d'accéder à un contenu ou à une fonctionnalité du site, que vous nous le signalez et que vous ne parvenez pas à obtenir de réponse satisfaisante, vous pouvez saisir le <a href="https://www.defenseurdesdroits.fr/" target="_blank" rel="noopener">Défenseur des droits</a>.</p>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include __DIR__ . '/../partials/layout.php'; ?>
