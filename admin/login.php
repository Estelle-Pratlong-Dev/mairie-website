<?php
/* =============================================================================
 * ADMINISTRATION — CONNEXION
 * ========================================================================== */
require_once __DIR__ . '/_bootstrap.php';

if (admin_est_connecte()) {
    header('Location: index.php');
    exit;
}

$erreur = '';
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    if (!csrf_verifier()) {
        $erreur = 'Session expirée, merci de réessayer.';
    } elseif (password_verify((string) ($_POST['mot_de_passe'] ?? ''), $adminMotDePasseHash)) {
        session_regenerate_id(true);
        $_SESSION['admin_connecte'] = true;
        header('Location: index.php');
        exit;
    } else {
        $erreur = 'Mot de passe incorrect.';
    }
}

admin_header('Connexion');
?>
      <div class="admin-login">
        <h1><?= icon('shield') ?> Espace d'administration</h1>
        <p class="admin-intro">Réservé au secrétariat de la mairie. Cet espace permet de publier les annonces « Flash info » affichées sur la page d'accueil.</p>
<?php if ($erreur): ?>
        <div class="admin-flash admin-flash-erreur"><?= icon('alert') ?> <span><?= htmlspecialchars($erreur) ?></span></div>
<?php endif; ?>
        <form method="post" action="login.php" class="form-grid">
          <?= csrf_champ() ?>
          <div>
            <label for="mdp">Mot de passe</label>
            <input type="password" id="mdp" name="mot_de_passe" required autofocus autocomplete="current-password">
          </div>
          <div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
          </div>
        </form>
      </div>
<?php admin_footer();
