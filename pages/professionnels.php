<?php
/* =============================================================================
 * PAGE — LES PROFESSIONNELS — MAIRIE DE GAGNIÈRES
 * -----------------------------------------------------------------------------
 * Les professionnels sont décrits dans le tableau $sections ci-dessous, puis
 * affichés par une boucle. Pour AJOUTER OU MODIFIER un professionnel, il suffit
 * de toucher au tableau — aucun HTML à recopier.
 *
 * Champs possibles pour chaque professionnel (tous facultatifs sauf name/tag) :
 *   name       nom affiché
 *   tag        étiquette de catégorie
 *   ochre      true pour l'étiquette colorée (restauration)
 *   desc       courte description
 *   address    adresse postale
 *   phones     liste de numéros de téléphone
 *   email      adresse e-mail
 *   facebook   lien Facebook
 *   instagram  lien Instagram
 *   logo       image de logo affichée EN TÊTE de la fiche (dans img/pro/)
 *   card       carte de visite ouverte via un lien « Voir la carte de visite »
 * ========================================================================== */
$title       = 'Les professionnels — Mairie de Gagnières';
$description  = 'Commerçants, artisans et professionnels de Gagnières : restauration, artisanat, bâtiment, beauté, services.';
$active      = 'professionnels';
$canonical   = 'professionnels.php';
$pageTitle   = 'Les professionnels';
$pageLead    = 'Commerçants, artisans et entreprises font vivre Gagnières au quotidien. Faites-leur confiance !';
$crumbs      = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'Les professionnels']];
require_once __DIR__ . '/../partials/icons.php';

$sections = [
    [
        'kicker' => 'Restauration',
        'titre'  => 'Se restaurer',
        'pros'   => [
            [
                'name' => 'Le Joye', 'tag' => 'Bar & restaurant', 'ochre' => true,
                'desc' => 'Fait maison · Produits frais · Cuisine généreuse.',
                'address' => '70 rue de la Mairie, 30160 Gagnières',
                'phones' => ['06 77 67 47 75'],
                'facebook' => 'https://www.facebook.com/profile.php?id=61588857879567',
                'instagram' => 'https://www.instagram.com/lejoye.bar.snack.restaurant/',
                'logo' => 'joye.JPG',
            ],
            [
                'name' => 'Le Clairval', 'tag' => 'Restaurant', 'ochre' => true,
                'desc' => 'Restaurant.',
                'address' => '345 chemin des Houlettes, 30160 Gagnières',
                'phones' => ['06 11 05 99 57'],
                'card' => 'clairval.jpg',
            ],
        ],
    ],
    [
        'kicker' => 'Artisanat & terroir',
        'titre'  => "L'artisanat local",
        'pros'   => [
            [
                'name' => 'Flo le Petit Ferronnier', 'tag' => 'Ferronnerie',
                'desc' => 'Fabrication et pose : portes, portails, portillons, pergolas, fenêtres.',
                'address' => '146 avenue de la Gare, 30160 Gagnières',
                'phones' => ['06 86 74 41 18'],
                'facebook' => 'https://www.facebook.com/p/Flo-Le-Petit-Ferronnier-100031192607201/',
                'instagram' => 'https://www.instagram.com/flolepetitferronnier/',
                'card' => 'flo-le-petit-ferronier1.jpg',
            ],
            [
                'name' => 'Atelier Florcelaine', 'tag' => 'Porcelaine',
                'desc' => 'Peinture à la main sur porcelaine et faïence.',
                'address' => '408 avenue des Plaines, 30160 Gagnières',
                'phones' => ['06 32 29 02 77'],
                'facebook' => 'https://www.facebook.com/florcelaine.durand/',
                'instagram' => 'https://www.instagram.com/florcelaine/',
                'card' => 'atelier-florcelaine-florence-durand-gagnieres.jpg',
            ],
        ],
    ],
    [
        'kicker' => 'Bâtiment',
        'titre'  => 'Construire & rénover',
        'pros'   => [
            [
                'name' => 'Maçonnerie Générale Vendeville', 'tag' => 'Gros œuvre',
                'desc' => 'Maçonnerie générale et toitures.',
                'address' => '315 chemin des Chassis, 30160 Gagnières',
                'phones' => ['06 84 12 33 64'],
                'email' => 'mgv.nicolas@yahoo.fr',
                'card' => 'Maconnerie-Generale-toiture-nicolas-vendeville-gagnieres.jpg',
            ],
            [
                'name' => 'EURL AJTP', 'tag' => 'Terrassement',
                'desc' => 'Terrassement et petite maçonnerie.',
                'address' => 'Les Fours, 30160 Gagnières',
                'phones' => ['06 62 03 97 39'],
                'card' => 'eurl-ajtp-gagnieres1.jpg',
            ],
            [
                'name' => 'ASV-ELEC', 'tag' => 'Électricité',
                'desc' => 'Électricien.',
                'phones' => ['06 87 84 08 37'],
                'email' => 'asv-elec-gagnieres@orange.fr',
                'card' => 'asv-elec1.jpg',
            ],
            [
                'name' => 'Cevenn Menuiserie', 'tag' => 'Menuiserie',
                'desc' => 'Menuiserie neuf et rénovation.',
                'address' => '96 Les Pigeirolles, 30160 Gagnières',
                'phones' => ['06 07 51 39 37'],
                'email' => 'cevenn-menuiserie@orange.fr',
                'card' => 'cevenn-menuiserie-gagnieres.jpg',
            ],
        ],
    ],
    [
        'kicker' => 'Services & bien-être',
        'titre'  => 'Au service des habitants',
        'pros'   => [
            [
                'name' => 'Coiffure Marjorie', 'tag' => 'Beauté',
                'desc' => 'Salon de coiffure.',
                'address' => '8 rue du 8 Mai 1948, 30160 Gagnières',
                'phones' => ['04 66 54 42 91'],
                'card' => 'coiffure-marjorie-gagnieres.jpg',
            ],
            [
                'name' => 'Kelly Chatelet', 'tag' => 'Puériculture',
                'desc' => "Assistante maternelle agréée — garde d'enfants à domicile.",
                'address' => '53 rue de la Poste, 30160 Gagnières',
                'phones' => ['07 86 71 01 49'],
                'email' => 'ptitkiloo@hotmail.fr',
                'card' => 'kelly-chatelet-assistante-maternelle-gagnieres.jpg',
            ],
            [
                'name' => 'Sonoton', 'tag' => 'Son & image',
                'desc' => 'Animateur, sonorisateur, vidéaste.',
                'address' => '409 chemin de la Vigière, 30160 Gagnières',
                'phones' => ['06 64 38 15 89'],
                'card' => 'sonoton1.jpg',
            ],
        ],
    ],
];

/* Transforme "06 77 67 47 75" en "+33677674775" pour les liens tel: */
function telHref(string $num): string {
    return '+33' . substr(preg_replace('/\D/', '', $num), 1);
}

ob_start();
?>

    <section class="section">
      <div class="container">

<?php foreach ($sections as $i => $sec): ?>
        <div class="section-head"<?= $i > 0 ? ' style="margin-top: 3rem;"' : '' ?>>
          <span class="kicker"><?= htmlspecialchars($sec['kicker']) ?></span>
          <h2><?= htmlspecialchars($sec['titre']) ?></h2>
        </div>
        <div class="grid cols-3">
<?php foreach ($sec['pros'] as $p): ?>
          <div class="card">
<?php $img = $p['logo'] ?? $p['card'] ?? null; ?>
            <span class="tag<?= !empty($p['ochre']) ? ' ochre' : '' ?>"><?= htmlspecialchars($p['tag']) ?></span>
            <h3><?= htmlspecialchars($p['name']) ?></h3>
            <p><?= htmlspecialchars($p['desc']) ?></p>
<?php if (!empty($p['address']) || !empty($p['phones']) || !empty($p['email'])): ?>
            <ul class="info-list">
<?php if (!empty($p['address'])): ?>              <li><?= icon('map-pin', 'icon') ?> <?= htmlspecialchars($p['address']) ?></li>
<?php endif; ?>
<?php if (!empty($p['phones'])): ?>              <li><?= icon('phone', 'icon') ?> <?= implode(' · ', array_map(fn($n) => '<a href="tel:' . telHref($n) . '">' . $n . '</a>', $p['phones'])) ?></li>
<?php endif; ?>
<?php if (!empty($p['email'])): ?>              <li><?= icon('mail', 'icon') ?> <a href="mailto:<?= $p['email'] ?>"><?= $p['email'] ?></a></li>
<?php endif; ?>
            </ul>
<?php endif; ?>
<?php if ($img): ?>
            <a class="pro-doc js-lightbox" href="assets/img/pro/<?= $img ?>" data-alt="<?= htmlspecialchars($p['name']) ?>" target="_blank" rel="noopener">Voir l'image</a>
<?php endif; ?>
<?php if (!empty($p['facebook']) || !empty($p['instagram'])): ?>
            <div class="pro-links">
<?php if (!empty($p['facebook'])): ?>              <a href="<?= htmlspecialchars($p['facebook']) ?>" target="_blank" rel="noopener" aria-label="<?= htmlspecialchars($p['name']) ?> sur Facebook"><?= icon('facebook') ?></a>
<?php endif; ?>
<?php if (!empty($p['instagram'])): ?>              <a href="<?= htmlspecialchars($p['instagram']) ?>" target="_blank" rel="noopener" aria-label="<?= htmlspecialchars($p['name']) ?> sur Instagram"><?= icon('instagram') ?></a>
<?php endif; ?>
            </div>
<?php endif; ?>
          </div>
<?php endforeach; ?>
        </div>
<?php endforeach; ?>

        <hr class="divider">

        <div class="cta-band">
          <div>
            <h2>Vous êtes professionnel à Gagnières ?</h2>
            <p>Contactez la mairie pour figurer dans cet annuaire ou mettre à jour vos informations.</p>
          </div>
          <a class="btn btn-primary" href="contact.php">Me faire référencer</a>
        </div>

      </div>
    </section>

<?php $content = ob_get_clean(); include __DIR__ . '/../partials/layout.php'; ?>
