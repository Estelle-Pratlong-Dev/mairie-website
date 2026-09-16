<?php
/* =============================================================================
 * SOCLE COMMUN DE L'ESPACE D'ADMINISTRATION
 * -----------------------------------------------------------------------------
 * Chargé en tête de CHAQUE page de /admin. Il :
 *   - démarre une session sécurisée ;
 *   - donne les outils de connexion (admin_est_connecte, admin_exiger_connexion) ;
 *   - protège les formulaires contre la falsification de requête (CSRF) ;
 *   - gère les messages de confirmation (flash) ;
 *   - fournit un petit gabarit d'affichage (admin_header / admin_footer).
 * ========================================================================== */

require_once __DIR__ . '/../config.php';          // $mairie, $adminMotDePasseHash
require_once __DIR__ . '/../partials/icons.php';   // icon()
require_once __DIR__ . '/../partials/annonces.php';   // données des annonces Flash info

/* --- Session sécurisée ---------------------------------------------------- */
if (session_status() !== PHP_SESSION_ACTIVE) {
    // Cookie sécurisé : 'secure' activé automatiquement en HTTPS (production),
    // laissé inactif en local (http://…test) pour ne pas bloquer la connexion.
    $enHttps = (($_SERVER['HTTPS'] ?? '') !== '' && ($_SERVER['HTTPS'] ?? '') !== 'off')
        || (($_SERVER['SERVER_PORT'] ?? '') === '443');
    session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax', 'secure' => $enHttps]);
    session_name('mairie_admin');
    session_start();
}

/* --- Authentification ----------------------------------------------------- */
function admin_est_connecte(): bool
{
    return !empty($_SESSION['admin_connecte']);
}

function admin_exiger_connexion(): void
{
    if (!admin_est_connecte()) {
        header('Location: login.php');
        exit;
    }
}

/* --- Protection anti-CSRF ------------------------------------------------- */
function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_champ(): string
{
    return '<input type="hidden" name="_csrf" value="' . htmlspecialchars(csrf_token()) . '">';
}

function csrf_verifier(): bool
{
    return isset($_POST['_csrf'], $_SESSION['csrf'])
        && hash_equals($_SESSION['csrf'], (string) $_POST['_csrf']);
}

/* --- Messages de confirmation (affichés une fois après redirection) ------- */
function flash_definir(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function flash_recuperer(): ?array
{
    if (empty($_SESSION['flash'])) {
        return null;
    }
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);
    return $flash;
}

/* --- Petit utilitaire : texte -> nom de fichier (slug) -------------------- */
function admin_slug(string $texte): string
{
    if (function_exists('iconv')) {
        $ascii = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $texte);
        if ($ascii !== false) {
            $texte = $ascii;
        }
    }
    $texte = strtolower((string) preg_replace('/[^a-zA-Z0-9]+/', '-', $texte));
    return trim($texte, '-') ?: 'annonce';
}

/* --- Téléversement d'une affiche (image) ---------------------------------
 * Valide le poids, le type réel (MIME) et le fait que ce soit une image, puis
 * range le fichier dans assets/img/event/ sous un nom sûr et unique.
 * @return array{0: bool, 1: string}  [succès, nom du fichier | message d'erreur]
 */
function admin_traiter_upload(array $fichier, string $baseNom, string $dossier): array
{
    if ($fichier['size'] > 5 * 1024 * 1024) {
        return [false, 'Image trop lourde (5 Mo maximum).'];
    }
    $mime = (new finfo(FILEINFO_MIME_TYPE))->file($fichier['tmp_name']);
    $extensions = [
        'image/jpeg' => 'jpg', 'image/png' => 'png',
        'image/webp' => 'webp', 'image/gif' => 'gif',
    ];
    if (!isset($extensions[$mime]) || @getimagesize($fichier['tmp_name']) === false) {
        return [false, 'Format d’image non accepté (JPEG, PNG, WebP ou GIF).'];
    }
    if (!is_dir($dossier)) {
        @mkdir($dossier, 0755, true);
    }
    $nom = admin_slug($baseNom) . '-' . bin2hex(random_bytes(3)) . '.' . $extensions[$mime];
    if (!move_uploaded_file($fichier['tmp_name'], $dossier . '/' . $nom)) {
        return [false, 'Impossible d’enregistrer l’image sur le serveur.'];
    }
    return [true, $nom];
}

/* --- Suppression d'une image du serveur ----------------------------------- */
function admin_supprimer_affiche(string $fichier, string $dossier): void
{
    $fichier = basename($fichier);   // sécurité : jamais de chemin
    if ($fichier === '') {
        return;
    }
    $chemin = $dossier . '/' . $fichier;
    if (is_file($chemin)) {
        @unlink($chemin);
    }
}

/* =============================================================================
 * GABARIT D'AFFICHAGE
 * ========================================================================== */
function admin_header(string $titre): void
{
    global $mairie;
    ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title><?= htmlspecialchars($titre) ?> — Administration</title>
  <link rel="stylesheet" href="../assets/css/style.css<?= asset_ver(__DIR__ . '/../assets/css/style.css') ?>">
  <link rel="stylesheet" href="../assets/css/admin.css<?= asset_ver(__DIR__ . '/../assets/css/admin.css') ?>">
</head>
<body class="admin">
  <header class="admin-bar">
    <div class="admin-bar-inner">
      <span class="admin-brand"><?= icon('shield') ?> Administration — <?= htmlspecialchars($mairie['ville']) ?></span>
<?php if (admin_est_connecte()): ?>
      <nav class="admin-nav">
        <a href="index.php">Annonces</a>
        <a href="../" target="_blank" rel="noopener">Voir le site</a>
        <a href="logout.php" class="admin-logout"><?= icon('logout') ?> Déconnexion</a>
      </nav>
<?php endif; ?>
    </div>
  </header>
  <main class="admin-main">
    <div class="admin-container">
<?php
    $flash = flash_recuperer();
    if ($flash):
        $classe = $flash['type'] === 'succes' ? 'admin-flash-succes' : 'admin-flash-erreur';
?>
      <div class="admin-flash <?= $classe ?>"><?= icon($flash['type'] === 'succes' ? 'check-circle' : 'alert') ?> <span><?= htmlspecialchars($flash['message']) ?></span></div>
<?php endif;
}

function admin_footer(): void
{
    ?>
    </div>
  </main>
</body>
</html>
<?php
}
