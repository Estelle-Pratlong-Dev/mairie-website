<?php
/* =============================================================================
 * ADMINISTRATION — CRÉER / MODIFIER UNE ANNONCE
 * ========================================================================== */
require_once __DIR__ . '/_bootstrap.php';
admin_exiger_connexion();

$erreurs      = [];
$id           = (string) ($_GET['id'] ?? $_POST['id'] ?? '');
$modification = false;
$annonce      = ['id' => '', 'titre' => '', 'quand' => '', 'texte' => '', 'date_fin' => '', 'affiche' => ''];

// Pré-remplissage si on modifie une annonce existante.
if ($id !== '') {
    $existante = annonce_par_id($id);
    if ($existante) {
        $annonce      = array_merge($annonce, $existante);
        $modification = true;
    }
}

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    if (!csrf_verifier()) {
        $erreurs[] = 'Session expirée, merci de renvoyer le formulaire.';
    } else {
        $annonce['titre']    = trim($_POST['titre'] ?? '');
        $annonce['quand']    = trim($_POST['quand'] ?? '');
        $annonce['texte']    = trim($_POST['texte'] ?? '');
        $annonce['date_fin'] = trim($_POST['date_fin'] ?? '');

        if ($annonce['titre'] === '') {
            $erreurs[] = 'Le titre est obligatoire.';
        }
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $annonce['date_fin']) || strtotime($annonce['date_fin']) === false) {
            $erreurs[] = 'La date de fin d’affichage est obligatoire.';
        }

        // Image : téléversement d'une nouvelle affiche, ou suppression de l'actuelle.
        $supprimerAffiche = !empty($_POST['supprimer_affiche']);
        $nouveauFichier   = null;
        if (isset($_FILES['affiche']) && $_FILES['affiche']['error'] === UPLOAD_ERR_OK) {
            [$ok, $resultat] = admin_traiter_upload($_FILES['affiche'], $annonce['titre'] ?: 'annonce', annonces_dossier_affiches());
            $ok ? ($nouveauFichier = $resultat) : ($erreurs[] = $resultat);
        } elseif (isset($_FILES['affiche']) && $_FILES['affiche']['error'] !== UPLOAD_ERR_NO_FILE) {
            $erreurs[] = 'Le téléversement de l’image a échoué (fichier trop volumineux ?).';
        }

        if (!$erreurs) {
            $ancienFichier = $annonce['affiche'];
            if ($nouveauFichier !== null) {
                $annonce['affiche'] = $nouveauFichier;
            } elseif ($supprimerAffiche) {
                $annonce['affiche'] = '';
            }
            if (!$modification) {
                $annonce['id'] = 'a' . bin2hex(random_bytes(6));
            }

            // Insertion ou remplacement dans la liste, en conservant l'ordre.
            $liste   = annonces_toutes();
            $trouvee = false;
            foreach ($liste as $i => $a) {
                if (($a['id'] ?? '') === $annonce['id']) {
                    $liste[$i] = $annonce;
                    $trouvee   = true;
                    break;
                }
            }
            if (!$trouvee) {
                $liste[] = $annonce;
            }

            if (annonces_enregistrer($liste)) {
                // Nettoyage de l'ancienne image si elle a été remplacée ou retirée.
                if ($ancienFichier !== '' && $ancienFichier !== $annonce['affiche']) {
                    admin_supprimer_affiche($ancienFichier, annonces_dossier_affiches());
                }
                flash_definir('succes', $modification ? 'Annonce mise à jour.' : 'Annonce publiée.');
                header('Location: index.php');
                exit;
            }
            $erreurs[] = 'Enregistrement impossible (droits d’écriture du fichier data/annonces.json ?).';
        }
    }
}

admin_header($modification ? 'Modifier une annonce' : 'Nouvelle annonce');
?>
      <div class="admin-head">
        <h1><?= $modification ? 'Modifier l’annonce' : 'Nouvelle annonce' ?></h1>
        <a href="index.php" class="btn btn-light">Retour à la liste</a>
      </div>

<?php if ($erreurs): ?>
      <div class="admin-flash admin-flash-erreur">
        <?= icon('alert') ?>
        <div>
          <strong>Le formulaire n'a pas pu être enregistré :</strong>
          <ul>
<?php foreach ($erreurs as $e): ?>            <li><?= htmlspecialchars($e) ?></li>
<?php endforeach; ?>
          </ul>
        </div>
      </div>
<?php endif; ?>

      <form method="post" action="editer.php" enctype="multipart/form-data" class="form-grid admin-form">
        <?= csrf_champ() ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($annonce['id']) ?>">

        <div>
          <label for="titre">Titre <span class="req">*</span></label>
          <input type="text" id="titre" name="titre" required maxlength="150" value="<?= htmlspecialchars($annonce['titre']) ?>" placeholder="Ex. : Vente de brioches dans le village">
        </div>

        <div>
          <label for="date_fin">Date de fin d'affichage <span class="req">*</span></label>
          <input type="date" id="date_fin" name="date_fin" required value="<?= htmlspecialchars($annonce['date_fin']) ?>">
          <p class="form-note">L'annonce disparaît toute seule du site le lendemain de cette date.</p>
        </div>

        <div>
          <label for="quand">Quand (texte affiché aux visiteurs)</label>
          <input type="text" id="quand" name="quand" maxlength="150" value="<?= htmlspecialchars($annonce['quand']) ?>" placeholder="Ex. : Dimanche 14 juin à partir de 9h">
        </div>

        <div>
          <label for="texte">Description</label>
          <textarea id="texte" name="texte" rows="5" maxlength="2000" placeholder="Détails de l'annonce…"><?= htmlspecialchars($annonce['texte']) ?></textarea>
        </div>

        <div>
          <label for="affiche">Affiche / photo (facultatif)</label>
<?php if ($annonce['affiche'] !== ''): ?>
          <div class="admin-affiche-actuelle">
            <img src="../assets/img/event/<?= htmlspecialchars($annonce['affiche']) ?>" alt="Affiche actuelle">
            <label class="admin-check"><input type="checkbox" name="supprimer_affiche" value="1"> Retirer cette image</label>
          </div>
          <p class="form-note">Choisir un fichier ci-dessous remplacera l'image actuelle.</p>
<?php endif; ?>
          <input type="file" id="affiche" name="affiche" accept="image/jpeg,image/png,image/webp,image/gif">
          <p class="form-note">JPEG, PNG, WebP ou GIF — 5 Mo maximum.</p>
        </div>

        <div>
          <button type="submit" class="btn btn-primary"><?= $modification ? 'Enregistrer les modifications' : 'Publier l’annonce' ?></button>
        </div>
      </form>
<?php admin_footer();
