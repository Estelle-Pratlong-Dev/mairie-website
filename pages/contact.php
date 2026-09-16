<?php
/* =============================================================================
 * PAGE — CONTACT — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Contact — Mairie de Gagnières';
$description  = 'Contactez la mairie de Gagnières : coordonnées, horaires d\'ouverture, formulaire de contact et plan d\'accès.';
$active      = 'contact';
$canonical   = 'contact.php';
$pageTitle   = 'Contacter la mairie';
$pageLead    = 'Vous désirez nous poser une question, nous signaler un problème technique dans la commune ou nous contacter pour toute autre raison : n\'hésitez pas !';
$crumbs      = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'Contact']];
require_once __DIR__ . '/../partials/icons.php';

/* =============================================================================
 * TRAITEMENT DU FORMULAIRE DE CONTACT (envoi serveur)
 * Envoie le message à la mairie + un accusé de réception à l'expéditeur.
 * L'envoi réel ne fonctionne qu'une fois le site hébergé (fonction PHP mail()).
 * ========================================================================== */
$envoye     = isset($_GET['envoye']);   // afficher le message de confirmation
$formErrors = [];
$old = ['nom' => '', 'email' => '', 'sujet' => '', 'message' => ''];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    foreach (['nom', 'email', 'sujet', 'message'] as $k) {
        $old[$k] = trim($_POST[$k] ?? '');
    }
    $potDeMiel = trim($_POST['site_web'] ?? '');  // champ piège anti-robot (invisible)

    if ($old['nom'] === '') {
        $formErrors[] = 'Merci d’indiquer votre nom.';
    }
    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $formErrors[] = 'Merci d’indiquer une adresse e-mail valide.';
    }
    if ($old['message'] === '') {
        $formErrors[] = 'Merci d’écrire votre message.';
    } elseif (mb_strlen($old['message']) > 5000) {
        $formErrors[] = 'Votre message est trop long (5000 caractères maximum).';
    }

    // Robot détecté (champ piège rempli) : on n'envoie rien mais on affiche « envoyé ».
    if ($potDeMiel !== '') {
        header('Location: contact.php?envoye=1');
        exit;
    }

    if (!$formErrors) {
        // Nettoyage anti-injection d'en-têtes (retours à la ligne interdits)
        $sansSaut = fn(string $s): string => trim(str_replace(["\r", "\n"], ' ', $s));
        $nom   = $sansSaut($old['nom']);
        $email = $sansSaut($old['email']);
        $sujet = $old['sujet'] !== '' ? $sansSaut($old['sujet']) : 'Message depuis le site';
        $from  = $mairie['email_expediteur'];

        // 1) Message transmis à la mairie (objet marqué « Site … »)
        $sujetMairie = '[Site ' . $mairie['ville'] . '] ' . $sujet;
        $corpsMairie = "Nouveau message envoyé depuis le formulaire du site de la mairie.\r\n\r\n"
            . "Nom : $nom\r\nE-mail : $email\r\nSujet : $sujet\r\n\r\n"
            . "Message :\r\n" . $old['message'] . "\r\n\r\n"
            . "— Envoyé via le site " . $baseUrl . " (répondez directement à l'expéditeur).";
        $entetesMairie = "From: {$mairie['nom']} <$from>\r\n"
            . "Reply-To: $nom <$email>\r\n"
            . "Content-Type: text/plain; charset=UTF-8\r\n";
        $envoiOk = @mail($mairie['email'], $sujetMairie, $corpsMairie, $entetesMairie);

        // 2) Accusé de réception automatique à l'expéditeur
        $corpsAccuse = "Bonjour $nom,\r\n\r\n"
            . "Nous avons bien reçu votre message envoyé via le site de la mairie de Gagnières. "
            . "Notre équipe vous répondra dans les meilleurs délais.\r\n\r\n"
            . "Rappel de votre message :\r\nSujet : $sujet\r\n" . $old['message'] . "\r\n\r\n"
            . "Ceci est un accusé de réception automatique, merci de ne pas y répondre.\r\n\r\n"
            . $mairie['nom'] . "\r\n" . $mairie['tel'] . " — " . $mairie['email'];
        $entetesAccuse = "From: {$mairie['nom']} <$from>\r\n"
            . "Content-Type: text/plain; charset=UTF-8\r\n";
        @mail($email, 'Votre message à la mairie de Gagnières a bien été reçu', $corpsAccuse, $entetesAccuse);

        if ($envoiOk) {
            header('Location: contact.php?envoye=1');
            exit;
        }
        $formErrors[] = "L'envoi a échoué. Merci de réessayer ou de nous écrire directement à " . $mairie['email'] . '.';
    }
}

ob_start();
?>

    <section class="section">
      <div class="container">
        <div class="grid cols-3" style="margin-bottom: 2.5rem;">
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('phone') ?></span>
            <h2>Par téléphone</h2>
            <ul class="info-list">
              <li><a href="tel:<?= telHref($mairie['tel']) ?>"><?= $mairie['tel'] ?></a></li>
              <li>Urgences mairie : <a href="tel:<?= telHref($mairie['tel_urgence']) ?>"><?= $mairie['tel_urgence'] ?></a></li>
            </ul>
          </div>
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('mail') ?></span>
            <h2>Par e-mail ou courrier</h2>
            <ul class="info-list">
              <li><a href="mailto:<?= $mairie['email'] ?>"><?= $mairie['email'] ?></a></li>
              <li><?= $mairie['nom'] ?><br><?= $mairie['adresse'] ?><br><?= $mairie['code_postal'] ?> <?= $mairie['ville'] ?></li>
            </ul>
          </div>
          <div class="card">
            <span class="icon-badge accent" aria-hidden="true"><?= icon('clock') ?></span>
            <h2>Horaires d'ouverture</h2>
            <table class="hours-table">
              <caption class="sr-only">Horaires d'ouverture de la mairie au public</caption>
<?php foreach ($mairie['horaires'] as $jour => $plage): ?>
              <tr><th scope="row"><?= $jour ?></th><td><?= $plage ?></td></tr>
<?php endforeach; ?>
            </table>
          </div>
        </div>

        <div class="grid cols-2" style="align-items: start;">
          <div class="card">
            <h2 style="font-size: 1.4rem;">Écrivez-nous</h2>
<?php if ($envoye): ?>
            <div class="form-success" role="status">
              <?= icon('check-circle') ?>
              <div>
                <strong>Votre message a bien été envoyé.</strong><br>
                Un accusé de réception vient de vous être adressé par e-mail. La mairie vous répondra dans les meilleurs délais.
              </div>
            </div>
            <p style="margin-top: 1rem;"><a href="contact.php">Envoyer un autre message</a></p>
<?php else: ?>
            <p style="color: var(--ink-soft); font-size: 0.95rem;">Votre message est transmis directement à la mairie, et vous en recevez un accusé de réception par e-mail.</p>
<?php if ($formErrors): ?>
            <div class="form-error" role="alert">
              <strong>Votre message n'a pas pu être envoyé :</strong>
              <ul>
<?php foreach ($formErrors as $err): ?>                <li><?= htmlspecialchars($err) ?></li>
<?php endforeach; ?>
              </ul>
            </div>
<?php endif; ?>
            <form method="post" action="contact.php" class="form-grid">
              <p class="form-note">Les champs suivis d'un astérisque (<span class="req">*</span>) sont obligatoires.</p>
              <div class="row-2">
                <div>
                  <label for="cf-nom">Nom <span class="req">*</span></label>
                  <input type="text" id="cf-nom" name="nom" required autocomplete="name" value="<?= htmlspecialchars($old['nom']) ?>">
                </div>
                <div>
                  <label for="cf-email">E-mail <span class="req">*</span></label>
                  <input type="email" id="cf-email" name="email" required autocomplete="email" value="<?= htmlspecialchars($old['email']) ?>">
                </div>
              </div>
              <div>
                <label for="cf-sujet">Sujet</label>
                <input type="text" id="cf-sujet" name="sujet" value="<?= htmlspecialchars($old['sujet']) ?>">
              </div>
              <div>
                <label for="cf-message">Votre message <span class="req">*</span></label>
                <textarea id="cf-message" name="message" required><?= htmlspecialchars($old['message']) ?></textarea>
              </div>
              <!-- Champ piège anti-robot : invisible, laissé vide par les humains. -->
              <div class="form-hp" aria-hidden="true">
                <label for="cf-site">Ne pas remplir</label>
                <input type="text" id="cf-site" name="site_web" tabindex="-1" autocomplete="off">
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Envoyer le message</button>
              </div>
              <p class="form-note">Les informations transmises sont utilisées uniquement pour répondre à votre demande, conformément au RGPD. Voir notre <a href="confidentialite.php">politique de confidentialité</a>.</p>
            </form>
<?php endif; ?>
          </div>
          <div>
            <div class="map-frame">
              <iframe
                title="Plan d'accès à la mairie de Gagnières"
                src="https://www.openstreetmap.org/export/embed.html?bbox=4.119337%2C44.301526%2C4.139337%2C44.313526&amp;layer=mapnik&amp;marker=44.307526%2C4.129337"
                loading="lazy"></iframe>
            </div>
            <p style="font-size: 0.88rem; color: var(--ink-soft); margin-top: 0.6rem;">
              <a href="https://www.openstreetmap.org/?mlat=44.307526&amp;mlon=4.129337#map=16/44.30753/4.12934" target="_blank" rel="noopener">Afficher la carte en plein écran</a>
            </p>
          </div>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include __DIR__ . '/../partials/layout.php'; ?>
