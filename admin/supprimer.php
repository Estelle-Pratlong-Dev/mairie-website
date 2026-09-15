<?php
/* =============================================================================
 * ADMINISTRATION — SUPPRIMER UNE ANNONCE
 * ========================================================================== */
require_once __DIR__ . '/_bootstrap.php';
admin_exiger_connexion();

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST' && csrf_verifier()) {
    $id      = (string) ($_POST['id'] ?? '');
    $annonce = annonce_par_id($id);
    if ($annonce) {
        $liste = array_filter(annonces_toutes(), fn(array $a): bool => ($a['id'] ?? '') !== $id);
        if (annonces_enregistrer($liste)) {
            if (!empty($annonce['affiche'])) {
                admin_supprimer_affiche($annonce['affiche'], annonces_dossier_affiches());
            }
            flash_definir('succes', 'Annonce supprimée.');
        } else {
            flash_definir('erreur', 'Suppression impossible (droits d’écriture ?).');
        }
    } else {
        flash_definir('erreur', 'Annonce introuvable.');
    }
} else {
    flash_definir('erreur', 'Action non autorisée.');
}

header('Location: index.php');
exit;
