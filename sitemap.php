<?php
/* =============================================================================
 * PLAN DU SITE (sitemap) — généré à partir de config.php
 * L'adresse du site n'est donc écrite qu'à UN seul endroit (config.php).
 * La page « mentions-legales » est volontairement absente (non indexée).
 * ========================================================================== */
require __DIR__ . '/config.php';
header('Content-Type: application/xml; charset=UTF-8');

$pages = [
    ''                        => '1.0',
    'services.php'            => '0.8',
    'contact.php'            => '0.8',
    'professionnels.php'     => '0.7',
    'associations.php'       => '0.7',
    'mot-du-maire.php'       => '0.6',
    'conseil-municipal.php'  => '0.6',
    'services-municipaux.php' => '0.6',
    'plan-du-site.php'        => '0.3',
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($pages as $page => $priority): ?>
  <url><loc><?= $baseUrl ?>/<?= $page ?></loc><priority><?= $priority ?></priority></url>
<?php endforeach; ?>
</urlset>
