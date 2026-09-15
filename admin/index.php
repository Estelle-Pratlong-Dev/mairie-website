<?php
/* =============================================================================
 * ADMINISTRATION — TABLEAU DE BORD (liste des annonces)
 * ========================================================================== */
require_once __DIR__ . '/_bootstrap.php';
admin_exiger_connexion();

$annonces = annonces_toutes();
// Les plus récentes (date de fin la plus tardive) en premier.
usort($annonces, fn(array $a, array $b): int => strcmp($b['date_fin'] ?? '', $a['date_fin'] ?? ''));
$today = date('Y-m-d');

admin_header('Annonces Flash info');
?>
      <div class="admin-head">
        <h1>Annonces « Flash info »</h1>
        <a href="editer.php" class="btn btn-primary"><?= icon('plus') ?> Nouvelle annonce</a>
      </div>
      <p class="admin-intro">Les annonces s'affichent dans le <strong>carrousel</strong> de la page d'accueil jusqu'à leur <strong>date de fin</strong>, puis disparaissent automatiquement.</p>

<?php if (!$annonces): ?>
      <div class="admin-vide">
        <?= icon('megaphone') ?>
        <p>Aucune annonce pour le moment.</p>
        <a href="editer.php" class="btn btn-primary"><?= icon('plus') ?> Créer la première annonce</a>
      </div>
<?php else: ?>
      <ul class="admin-liste">
<?php foreach ($annonces as $a):
          $active = ($a['date_fin'] ?? '') >= $today; ?>
        <li class="admin-item<?= $active ? '' : ' est-expiree' ?>">
<?php if (!empty($a['affiche'])): ?>
          <img class="admin-vignette" src="../assets/img/event/<?= htmlspecialchars($a['affiche']) ?>" alt="" loading="lazy">
<?php else: ?>
          <span class="admin-vignette admin-vignette-vide" aria-hidden="true"><?= icon('megaphone') ?></span>
<?php endif; ?>
          <div class="admin-item-corps">
            <span class="admin-badge <?= $active ? 'badge-active' : 'badge-expiree' ?>"><?= $active ? 'En ligne' : 'Expirée' ?></span>
            <h2><?= htmlspecialchars($a['titre']) ?></h2>
            <p class="admin-meta"><?= icon('calendar') ?> Jusqu'au <?= htmlspecialchars(date_fr($a['date_fin'] ?? '')) ?><?php if (!empty($a['quand'])): ?> · <?= htmlspecialchars($a['quand']) ?><?php endif; ?></p>
          </div>
          <div class="admin-item-actions">
            <a href="editer.php?id=<?= urlencode($a['id'] ?? '') ?>" class="btn btn-light"><?= icon('edit') ?> Modifier</a>
            <form method="post" action="supprimer.php" onsubmit="return confirm('Supprimer définitivement cette annonce ?');">
              <?= csrf_champ() ?>
              <input type="hidden" name="id" value="<?= htmlspecialchars($a['id'] ?? '') ?>">
              <button type="submit" class="btn btn-danger"><?= icon('trash') ?> Supprimer</button>
            </form>
          </div>
        </li>
<?php endforeach; ?>
      </ul>
<?php endif; ?>
<?php admin_footer();
