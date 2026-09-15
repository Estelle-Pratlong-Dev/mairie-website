<?php
/* =============================================================================
 * PAGE — ASSOCIATIONS — MAIRIE DE GAGNIÈRES
 * -----------------------------------------------------------------------------
 * Les associations sont décrites dans le tableau $assos ci-dessous, puis
 * affichées par une boucle. Pour AJOUTER OU MODIFIER une association, il suffit
 * de toucher au tableau — aucun HTML à recopier.
 *
 * Champs possibles (tous facultatifs sauf name/icon) :
 *   name       nom affiché
 *   icon       icône du badge (voir partials/icons.php)
 *   accent     true pour un badge de couleur accentuée
 *   desc       description (peut contenir un lien HTML)
 *   address    adresse postale
 *   phones     liste de numéros de téléphone
 *   email      adresse e-mail
 *   website    site internet
 *   facebook   lien Facebook
 *   instagram  lien Instagram
 * ========================================================================== */
$title       = 'Associations — Mairie de Gagnières';
$description  = 'Les associations de Gagnières : culture, théâtre, mémoire minière, chasse et solidarité. Une vie associative riche au cœur des Cévennes.';
$active      = 'associations';
$canonical   = 'associations.php';
$pageTitle   = 'Les associations';
$pageLead    = 'Culture, mémoire, théâtre, solidarité : la vie associative fait battre le cœur du village.';
$crumbs      = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'Associations']];
require_once __DIR__ . '/../partials/icons.php';

if (!function_exists('telHref')) {
    /* Transforme "06 21 94 58 88" en "+33621945888" pour les liens tel: */
    function telHref(string $num): string {
        return '+33' . substr(preg_replace('/\D/', '', $num), 1);
    }
}

$assos = [
    [
        'name' => 'Le petit théâtre de la Berthe', 'icon' => 'ticket', 'accent' => true,
        'image' => 'theatre-la-berthe.webp',
        'desc' => 'Théâtre et spectacles au cœur du village.',
        'address' => "41 rue de l'Industrie, 30160 Gagnières",
        'phones' => ['06 64 38 15 89'],
        'website' => 'https://www.lepetittheatredelaberthe.fr/',
        'facebook' => 'https://www.facebook.com/p/Le-petit-th%C3%A9%C3%A2tre-de-la-Berthe-61553950825973/?locale=fr_FR',
        'instagram' => 'https://www.instagram.com/lepetittheatredelaberthe/',
    ],
    [
        'name' => 'Centre Chrétien de Gagnières', 'icon' => 'heart', 'accent' => true,
        'image' => 'centre-chretien-de-gagnieres.jpg',
        'desc' => 'Association à caractère religieux.',
        'address' => '500 chemin du Moulin, 30160 Gagnières',
        'phones' => ['04 66 25 02 67'],
        'email' => 'info@ccgagnieres.info',
        'website' => 'https://ccgagnieres.com',
        'facebook' => 'https://www.facebook.com/ccgagnieres/?locale=fr_FR',
        'instagram' => 'https://www.instagram.com/ccgagnieres/',
    ],
    [
        'name' => "Gagnières du Temps des Mines à Aujourd'hui", 'icon' => 'museum',
        'image' => 'gagnieres-du-temps-des-mines-a-aujourdhui.jpg',
        'desc' => 'Histoire locale et patrimoine minier. L\'association anime le <a href="services.php#musee-de-la-mine">Musée de la Mine</a>.',
        'address' => "52 rue de l'Église, 30160 Gagnières",
        'phones' => ['07 82 13 15 21'],
        'email' => 'gtma@orange.fr',
        'website' => 'https://www.museeminegagnieres.fr',
        'facebook' => 'https://www.facebook.com/p/Mus%C3%A9e-de-la-Mine-de-Gagni%C3%A8res-100057043766037/?locale=fr_FR',
        'instagram' => 'https://www.instagram.com/museeminegagnieres/',
    ],
    [
        'name' => 'Les Arbousiers', 'icon' => 'users',
        'image' => 'association-Les-Arbousiers-gagnieres1.jpg',
        'desc' => 'Association locale de Gagnières.',
        'address' => 'Place de la Mairie, 30160 Gagnières',
        'phones' => ['06 21 94 58 88'],
        'email' => 'lesarbousiers.gagnieres30@gmail.com',
    ],
    [
        'name' => 'Société Communale des Chasseurs Gagniérois', 'icon' => 'target',
        'image' => 'association-societe-communale-des-chasseurs-gagnierois.jpg',
        'desc' => 'Société de chasse de la commune.',
        'address' => '151 chemin du Puits de la Vernède, 30160 Gagnières',
        'phones' => ['06 13 14 50 90'],
        'email' => 'ghyslain.chabal@orange.fr',
    ],
    [
        'name' => 'Société du Sou', 'icon' => 'coin', 'accent' => true,
        'image' => 'societe-du-sou-gagnieres.jpg',
        'desc' => "Association de soutien à l'école.",
        'address' => 'Rue des Écoles, 30160 Gagnières',
        'phones' => ['06 79 21 33 93'],
        'email' => 'societedusougagnieres@gmail.com',
        'facebook' => 'https://www.facebook.com/profile.php?id=100087394201856&locale=fr_FR',
    ],
];

ob_start();
?>

    <section class="section">
      <div class="container">
        <div class="grid cols-3">
<?php foreach ($assos as $a): ?>
          <div class="card">
            <span class="icon-badge<?= !empty($a['accent']) ? ' accent' : '' ?>" aria-hidden="true"><?= icon($a['icon']) ?></span>
            <h3><?= htmlspecialchars($a['name']) ?></h3>
            <p><?= $a['desc'] ?></p>
<?php if (!empty($a['address']) || !empty($a['phones']) || !empty($a['email'])): ?>
            <ul class="info-list">
<?php if (!empty($a['address'])): ?>              <li><?= icon('map-pin', 'icon') ?> <?= htmlspecialchars($a['address']) ?></li>
<?php endif; ?>
<?php if (!empty($a['phones'])): ?>              <li><?= icon('phone', 'icon') ?> <?= implode(' · ', array_map(fn($n) => '<a href="tel:' . telHref($n) . '">' . $n . '</a>', $a['phones'])) ?></li>
<?php endif; ?>
<?php if (!empty($a['email'])): ?>              <li><?= icon('mail', 'icon') ?> <a href="mailto:<?= $a['email'] ?>"><?= $a['email'] ?></a></li>
<?php endif; ?>
            </ul>
<?php endif; ?>
<?php if (!empty($a['image'])): ?>
            <a class="pro-doc js-lightbox" href="assets/img/asso/<?= $a['image'] ?>" data-alt="<?= htmlspecialchars($a['name']) ?>" target="_blank" rel="noopener">Voir l'image</a>
<?php endif; ?>
<?php if (!empty($a['website']) || !empty($a['facebook']) || !empty($a['instagram'])): ?>
            <div class="pro-links">
<?php if (!empty($a['website'])): ?>              <a href="<?= htmlspecialchars($a['website']) ?>" target="_blank" rel="noopener" aria-label="<?= htmlspecialchars($a['name']) ?> — site internet"><?= icon('globe') ?></a>
<?php endif; ?>
<?php if (!empty($a['facebook'])): ?>              <a href="<?= htmlspecialchars($a['facebook']) ?>" target="_blank" rel="noopener" aria-label="<?= htmlspecialchars($a['name']) ?> sur Facebook"><?= icon('facebook') ?></a>
<?php endif; ?>
<?php if (!empty($a['instagram'])): ?>              <a href="<?= htmlspecialchars($a['instagram']) ?>" target="_blank" rel="noopener" aria-label="<?= htmlspecialchars($a['name']) ?> sur Instagram"><?= icon('instagram') ?></a>
<?php endif; ?>
            </div>
<?php endif; ?>
          </div>
<?php endforeach; ?>
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

<?php $content = ob_get_clean(); include __DIR__ . '/../partials/layout.php'; ?>
