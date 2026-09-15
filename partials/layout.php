<?php
/* =============================================================================
 * GABARIT UNIQUE DU SITE  (squelette HTML commun à toutes les pages)
 * -----------------------------------------------------------------------------
 * TOUTES les balises de structure (html, head, body, header, main, footer)
 * s'ouvrent ET se ferment DANS CE SEUL FICHIER — rien n'est coupé en deux.
 *
 * Chaque page prépare son contenu puis inclut ce gabarit :
 *
 *     <?php
 *     $title = '...'; $description = '...'; $active = '...'; $canonical = '...';
 *     ob_start();                       // on capture le contenu de la page
 *     ?>
 *       ... sections de la page ...
 *     <?php
 *     $content = ob_get_clean();        // le contenu est rangé dans $content
 *     include 'partials/layout.php';    // le gabarit l'insère dans <main>
 *
 * Variables attendues (toutes facultatives, valeurs par défaut ci-dessous) :
 *   $title, $description, $active, $canonical, $robots, $includeAnnonces
 * ========================================================================== */

$title           = $title           ?? 'Mairie de Gagnières';
$description      = $description     ?? 'Site officiel de la mairie de Gagnières, commune du Gard en Occitanie.';
$active          = $active          ?? '';
$canonical       = $canonical       ?? '';
$robots          = $robots          ?? 'index, follow';
$content         = $content         ?? '';
$includeAnnonces = $includeAnnonces ?? false;
$pageTitle       = $pageTitle       ?? '';   // titre du bandeau interne (H1) — vide sur l'accueil
$pageLead        = $pageLead        ?? '';   // sous-titre facultatif du bandeau
$crumbs          = $crumbs          ?? [];   // fil d'Ariane, voir breadcrumb()

/* Réglages globaux (adresse du site…) : centralisés dans config.php */
require __DIR__ . '/../config.php';
require_once __DIR__ . '/icons.php';
$baseUrl = $baseUrl ?? 'https://www.mairie-gagnieres.fr'; // sécurité si config absente

/* Aide : attribut class (+ aria-current) d'un lien de menu, avec "active"
   quand on se trouve sur la page correspondante. */
function navClass(string $key, string $active, string $base = ''): string {
    $isActive = ($key === $active);
    $classes  = trim($base . ($isActive ? ' active' : ''));
    $attr     = $classes !== '' ? ' class="' . $classes . '"' : '';
    if ($isActive) { $attr .= ' aria-current="page"'; }
    return $attr;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- ---------- Référencement (SEO) ---------- -->
  <title><?= htmlspecialchars($title) ?></title>
  <meta name="description" content="<?= htmlspecialchars($description) ?>">
  <meta name="robots" content="<?= htmlspecialchars($robots) ?>">
  <link rel="canonical" href="<?= $baseUrl . '/' . htmlspecialchars($canonical) ?>">
  <meta name="theme-color" content="#1d6aab">

  <!-- ---------- Partage réseaux sociaux (Open Graph) ---------- -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Mairie de Gagnières">
  <meta property="og:locale" content="fr_FR">
  <meta property="og:title" content="<?= htmlspecialchars($title) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($description) ?>">
  <meta property="og:url" content="<?= $baseUrl . '/' . htmlspecialchars($canonical) ?>">
  <meta property="og:image" content="<?= $baseUrl ?>/img/village/ville-de-gagnieres.jpg">
  <meta name="twitter:card" content="summary_large_image">

  <!-- ---------- Icône du site ---------- -->
  <link rel="icon" href="favicon.svg" type="image/svg+xml">

  <!-- ---------- Polices ---------- -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">

  <!-- ---------- Feuille de styles ---------- -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- ---------- Données structurées (fiche mairie pour Google) ---------- -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "GovernmentOffice",
    "name": "Mairie de Gagnières",
    "url": "<?= $baseUrl ?>",
    "telephone": "+33466250202",
    "email": "mairie.gagnieres@laposte.net",
    "image": "<?= $baseUrl ?>/img/village/mairie.jpg",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Place de la Mairie",
      "postalCode": "30160",
      "addressLocality": "Gagnières",
      "addressRegion": "Gard",
      "addressCountry": "FR"
    },
    "geo": { "@type": "GeoCoordinates", "latitude": 44.307526, "longitude": 4.129337 },
    "areaServed": "Gagnières",
    "openingHoursSpecification": [
      { "@type": "OpeningHoursSpecification", "dayOfWeek": "Monday",    "opens": "08:00", "closes": "12:00" },
      { "@type": "OpeningHoursSpecification", "dayOfWeek": "Monday",    "opens": "13:30", "closes": "17:30" },
      { "@type": "OpeningHoursSpecification", "dayOfWeek": "Tuesday",   "opens": "08:00", "closes": "12:00" },
      { "@type": "OpeningHoursSpecification", "dayOfWeek": "Wednesday", "opens": "09:00", "closes": "12:00" },
      { "@type": "OpeningHoursSpecification", "dayOfWeek": "Wednesday", "opens": "13:30", "closes": "17:30" },
      { "@type": "OpeningHoursSpecification", "dayOfWeek": "Thursday",  "opens": "08:00", "closes": "12:00" },
      { "@type": "OpeningHoursSpecification", "dayOfWeek": "Friday",    "opens": "08:00", "closes": "12:00" }
    ]
  }
  </script>
</head>

<body>
  <a class="skip-link" href="#contenu">Aller au contenu principal</a>

  <!-- ============================ Barre de contact ========================= -->
  <div class="topbar">
    <div class="container topbar-inner">
      <a href="tel:+33466250202">
        <?= icon('phone', 'icon') ?>
        04 66 25 02 02
      </a>
      <a href="mailto:mairie.gagnieres@laposte.net">
        <?= icon('mail', 'icon') ?>
        mairie.gagnieres@laposte.net
      </a>
      <a href="contact.php">
        <?= icon('map-pin', 'icon') ?>
        Place de la Mairie, 30160 Gagnières
      </a>
    </div>
  </div>

  <!-- ============================ En-tête & menu =========================== -->
  <header class="site-header">
    <div class="container header-inner">
      <a class="brand" href="index.php">
        <img class="brand-logo" src="img/logo.png" alt="" width="240" height="192" aria-hidden="true">
        <span class="brand-text">
          <span class="brand-name">Gagnières</span>
          <span class="brand-sub">Mairie · Gard</span>
        </span>
      </a>
      <button class="nav-toggle" aria-expanded="false" aria-controls="menu-principal" aria-label="Ouvrir le menu">
        <?= icon('menu') ?>
      </button>
      <nav class="site-nav" id="menu-principal" aria-label="Navigation principale">
        <ul>
          <li><a href="index.php"<?= navClass('accueil', $active) ?>>Accueil</a></li>
          <li class="nav-drop">
            <button type="button" aria-expanded="false">
              La Mairie
              <?= icon('chevron-down', 'caret') ?>
            </button>
            <div class="dropdown">
              <a href="mot-du-maire.php"<?= navClass('mot-du-maire', $active) ?>>Le mot du Maire</a>
              <a href="conseil-municipal.php"<?= navClass('conseil', $active) ?>>Le Conseil municipal</a>
              <a href="services-municipaux.php"<?= navClass('services-mun', $active) ?>>Les services municipaux</a>
              <a href="https://drive.google.com/drive/folders/19Y5Da9ezNCFlj3hNcusNGuAgSgHSnmNR" target="_blank" rel="noopener">Publications</a>
              <a href="https://drive.google.com/drive/folders/18SUGSpaC9eZtOapdygvoQU-Awm1MV4at" target="_blank" rel="noopener">Bulletin municipal</a>
              <a href="https://drive.google.com/drive/folders/1ZCCwGFGB4mOFakg4UJP83ixNdLljqL6E" target="_blank" rel="noopener">Comptes rendus du Conseil</a>
            </div>
          </li>
          <li><a href="services.php"<?= navClass('services', $active) ?>>Vie pratique</a></li>
          <li><a href="professionnels.php"<?= navClass('professionnels', $active) ?>>Les professionnels</a></li>
          <li><a href="associations.php"<?= navClass('associations', $active) ?>>Associations</a></li>
          <li><a href="contact.php"<?= navClass('contact', $active, 'nav-cta') ?>>Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- ============================ Contenu de la page ======================= -->
  <main id="contenu">
<?php if ($pageTitle !== ''): ?>
    <!-- Bandeau de titre commun (fil d'Ariane + titre + sous-titre) -->
    <section class="page-hero">
      <div class="container">
<?php if (!empty($crumbs)): ?>        <?= breadcrumb($crumbs) ?>
<?php endif; ?>
        <h1><?= htmlspecialchars($pageTitle) ?></h1>
<?php if ($pageLead !== ''): ?>        <p class="lead"><?= $pageLead ?></p>
<?php endif; ?>
      </div>
    </section>
<?php endif; ?>
<?= $content ?>
  </main>

  <!-- ============================== Pied de page =========================== -->
  <footer class="site-footer">
    <div class="container footer-main">
      <div>
        <div class="footer-brand">
          <img class="brand-logo" src="img/logo.png" alt="" width="240" height="192">
          <span class="brand-name">Mairie de Gagnières</span>
        </div>
        <p>Place de la Mairie<br>30160 Gagnières</p>
        <ul>
          <li><a href="tel:+33466250202">04 66 25 02 02</a></li>
          <li>Urgences mairie : <a href="tel:+33658242030">06 58 24 20 30</a></li>
          <li><a href="mailto:mairie.gagnieres@laposte.net">mairie.gagnieres@laposte.net</a></li>
          <li><a href="https://www.facebook.com/MairieGagnieres" target="_blank" rel="noopener">Facebook — page de la mairie</a></li>
          <li><a href="https://www.facebook.com/groups/509135176230743" target="_blank" rel="noopener">Facebook — groupe du village</a></li>
        </ul>
      </div>
      <div>
        <h3>Horaires d'ouverture</h3>
        <dl class="footer-hours">
          <div><dt>Lundi</dt><dd>8h–12h · 13h30–17h30</dd></div>
          <div><dt>Mardi</dt><dd>8h–12h</dd></div>
          <div><dt>Mercredi</dt><dd>9h–12h · 13h30–17h30</dd></div>
          <div><dt>Jeudi</dt><dd>8h–12h</dd></div>
          <div><dt>Vendredi</dt><dd>8h–12h</dd></div>
        </dl>
      </div>
      <div>
        <h3>La commune</h3>
        <ul>
          <li><a href="mot-du-maire.php">Le mot du Maire</a></li>
          <li><a href="conseil-municipal.php">Le Conseil municipal</a></li>
          <li><a href="services-municipaux.php">Les services municipaux</a></li>
          <li><a href="associations.php">Associations</a></li>
          <li><a href="professionnels.php">Les professionnels</a></li>
        </ul>
      </div>
      <div>
        <h3>Démarches</h3>
        <ul>
          <li><a href="https://www.service-public.fr/" target="_blank" rel="noopener">Service-Public.fr</a></li>
          <li><a href="https://www.service-public.fr/particuliers/vosdroits/N359" target="_blank" rel="noopener">Actes d'état civil</a></li>
          <li><a href="https://www.service-public.fr/particuliers/vosdroits/R16396" target="_blank" rel="noopener">Inscription électorale</a></li>
          <li><a href="services.php#urbanisme">Urbanisme</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="container footer-bottom">
      <p style="margin:0">© <span class="js-year">2026</span> Mairie de Gagnières — Tous droits réservés · <a class="footer-credit" href="https://estelle-pratlong.fr/" target="_blank" rel="noopener">Site réalisé par Estelle Pratlong</a></p>
      <ul>
        <li><a href="mentions-legales.php">Mentions légales</a></li>
        <li><a href="confidentialite.php">Politique de confidentialité</a></li>
      </ul>
    </div>
  </footer>

  <!-- Fenêtre modale d'agrandissement d'image (liens « Voir l'image ») -->
  <div class="lightbox" id="lightbox" aria-hidden="true">
    <button class="lightbox-close" type="button" aria-label="Fermer">&times;</button>
    <img src="" alt="" id="lightbox-img">
  </div>

  <!-- ============================== Scripts ==============================
       annonces.js n'est chargé que si la page l'a demandé ($includeAnnonces),
       c'est-à-dire uniquement la page d'accueil (bloc « Flash info »). -->
<?php if ($includeAnnonces): ?>
  <script src="assets/js/annonces.js"></script>
<?php endif; ?>
  <script src="assets/js/main.js"></script>
</body>
</html>
