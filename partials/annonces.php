<?php
/* =============================================================================
 * MODULE — ANNONCES « FLASH INFO »
 * -----------------------------------------------------------------------------
 * Couche d'accès aux données. Les annonces sont enregistrées dans
 * data/annonces.json (via l'interface d'administration) et lues ici, à la fois
 * par la page d'accueil (affichage public) et par l'espace d'administration.
 *
 * Une annonce = un tableau :
 *   id        identifiant unique (généré automatiquement)
 *   titre     titre affiché (obligatoire)
 *   quand     date/heure lisible par les visiteurs (facultatif)
 *   texte     descriptif (facultatif)
 *   date_fin  dernier jour d'affichage, "AAAA-MM-JJ" (obligatoire) : le
 *             lendemain, l'annonce disparaît toute seule du site.
 *   affiche   nom du fichier image dans assets/img/event/ (facultatif)
 * ========================================================================== */

/** Chemin du fichier de données JSON. */
function annonces_chemin_fichier(): string
{
    return __DIR__ . '/../data/annonces.json';
}

/** Dossier où sont déposées les affiches (images des annonces). */
function annonces_dossier_affiches(): string
{
    return __DIR__ . '/../assets/img/event';
}

/** Toutes les annonces enregistrées (dans l'ordre du fichier). */
function annonces_toutes(): array
{
    $fichier = annonces_chemin_fichier();
    if (!is_file($fichier)) {
        return [];
    }
    $data = json_decode((string) file_get_contents($fichier), true);
    return is_array($data) ? $data : [];
}

/**
 * Annonces encore valides (date de fin non dépassée), triées par date de fin.
 * @param string|null $aujourdhui date de référence "AAAA-MM-JJ" (par défaut : ce jour)
 */
function annonces_actives(?string $aujourdhui = null): array
{
    $today = $aujourdhui ?? date('Y-m-d');
    $actives = array_filter(
        annonces_toutes(),
        fn(array $a): bool => !empty($a['date_fin']) && $a['date_fin'] >= $today
    );
    usort($actives, fn(array $x, array $y): int => strcmp($x['date_fin'], $y['date_fin']));
    return array_values($actives);
}

/** Retrouve une annonce par son identifiant, ou null. */
function annonce_par_id(string $id): ?array
{
    foreach (annonces_toutes() as $a) {
        if (($a['id'] ?? '') === $id) {
            return $a;
        }
    }
    return null;
}

/**
 * Enregistre la liste complète des annonces dans le fichier JSON.
 * @return bool vrai si l'écriture a réussi
 */
function annonces_enregistrer(array $liste): bool
{
    $json = json_encode(
        array_values($liste),
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_INVALID_UTF8_SUBSTITUTE
    );
    if ($json === false) {
        return false;
    }
    return file_put_contents(annonces_chemin_fichier(), $json . "\n", LOCK_EX) !== false;
}
