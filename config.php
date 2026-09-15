<?php
/* =============================================================================
 * CONFIGURATION GÉNÉRALE DU SITE
 * -----------------------------------------------------------------------------
 * Le SEUL fichier à modifier pour l'adresse du site ET les coordonnées de la
 * mairie. Toutes les pages et le gabarit lisent ces valeurs : changer un
 * numéro de téléphone ou un horaire ici le met à jour PARTOUT.
 * ========================================================================== */

/* Adresse complète du site, SANS slash final. Sert aux URL canoniques,
   aux balises Open Graph et au plan du site (sitemap.php). */
$baseUrl = 'https://mairie-gagnieres.fr';

/* Coordonnées et informations de la mairie — un seul endroit à tenir à jour. */
$mairie = [
    'nom'             => 'Mairie de Gagnières',
    'commune'         => 'Commune de Gagnières',
    'maire'           => 'Bernard Durand',
    'adresse'         => 'Place de la Mairie',
    'code_postal'     => '30160',
    'ville'           => 'Gagnières',
    'tel'             => '04 66 25 02 02',
    'tel_urgence'     => '06 58 24 20 30',
    'email'           => 'mairie.gagnieres@laposte.net',
    // Adresse expéditrice des e-mails envoyés PAR le site (formulaire de contact).
    // Doit être une adresse valide sur le domaine (à créer chez l'hébergeur).
    'email_expediteur' => 'no-reply@mairie-gagnieres.fr',
    'siret'           => '213 001 209 00013',
    'latitude'        => 44.307526,
    'longitude'       => 4.129337,
    'facebook'        => 'https://www.facebook.com/MairieGagnieres',
    'facebook_groupe' => 'https://www.facebook.com/groups/509135176230743',
    // Horaires d'ouverture : jour => plage affichée (footer + page contact)
    'horaires'        => [
        'Lundi'    => '8h–12h · 13h30–17h30',
        'Mardi'    => '8h–12h',
        'Mercredi' => '9h–12h · 13h30–17h30',
        'Jeudi'    => '8h–12h',
        'Vendredi' => '8h–12h',
    ],
];
