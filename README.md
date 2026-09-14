# Site de la Mairie de Gagnières

Refonte moderne du site https://mairie-gagnieres.fr/ — mêmes contenus, présentation actualisée.
Site en **PHP** (pages assemblées à partir d'un gabarit unique), hébergeable sur tout
hébergement mutualisé classique (OVH, Ionos, o2switch…).

## Voir le site en local

Démarrez Laragon puis ouvrez **http://mairie-website.test**.
(PHP est nécessaire — un simple double-clic sur les fichiers ne suffit pas.)

## Architecture (important)

Le site utilise le principe du **gabarit unique**, comme le `base.html.twig` de Symfony :

- **`partials/layout.php`** contient tout ce qui ne change pas d'une page à l'autre :
  `<head>` (SEO), barre de contact, menu, pied de page, scripts. **Toutes les balises
  s'ouvrent et se ferment dans ce seul fichier.**
- **Chaque page** (`index.php`, `services.php`, …) ne contient que **son propre contenu**.
  Elle le prépare puis appelle le gabarit :

  ```php
  <?php
  $title = '…'; $description = '…'; $active = '…'; $canonical = 'services.php';
  ob_start();               // on capture le contenu de la page
  ?>
     … sections de la page …
  <?php
  $content = ob_get_clean(); // le contenu part dans $content
  include 'partials/layout.php';
  ```

Pour modifier le menu, le pied de page ou le `<head>` : **un seul endroit**, `partials/layout.php`.

Les **icônes** (téléphone, adresse…) sont centralisées dans `partials/icons.php` et s'utilisent
par leur nom : `<?= icon('phone') ?>`. Ainsi le tracé de chaque icône n'existe qu'une seule fois.

## Les pages

| Fichier | Page |
|---|---|
| `index.php` | Accueil (Flash info, démarches, actualités, galerie) |
| `mot-du-maire.php` | Le mot du Maire |
| `conseil-municipal.php` | Le Conseil municipal |
| `services-municipaux.php` | Les équipes municipales |
| `services.php` | Vie pratique (école, santé, déchets, transports…) |
| `professionnels.php` | Annuaire des commerçants et artisans |
| `associations.php` | Les associations |
| `contact.php` | Contact, horaires, plan d'accès |
| `mentions-legales.php` | Mentions légales et RGPD |
| `404.php` | Page d'erreur « introuvable » |
| `partials/layout.php` | Gabarit commun (menu, pied de page, SEO) |
| `partials/icons.php` | Catalogue des icônes SVG — appelées par `icon('nom')` |
| `config.php` | Réglages du site (adresse/domaine) — **à éditer à la mise en ligne** |
| `assets/css/style.css` | Mise en forme (couleurs en haut du fichier) |
| `assets/js/main.js` | Menu mobile, formulaire, Flash info |
| `assets/js/annonces.js` | **Contenu des annonces Flash info** (voir ci-dessous) |

## Flash info (annonces à expiration automatique)

Les annonces de la page d'accueil se gèrent dans **`assets/js/annonces.js`** : chaque annonce
a une **date de fin** (format AAAA-MM-JJ). Le lendemain, elle disparaît toute seule ; quand il
n'y a plus d'annonce, le bloc entier disparaît. Le mode d'emploi est en tête du fichier.
Les affiches se déposent dans `img/event/`.

## Référencement (SEO) — déjà en place

- Titre + description uniques par page, URL canonique, Open Graph (partage réseaux sociaux)
- Données structurées JSON-LD (fiche mairie pour Google), favicon, `theme-color`
- `robots.txt`, `sitemap.php` (généré depuis `config.php`), page `404.php`, `.htaccess` (compression, cache, UTF-8)

> **À faire le jour de la mise en ligne :** l'adresse du site est centralisée dans **`config.php`**
> (`$baseUrl`) — un seul endroit à modifier pour tout le PHP (canonical, Open Graph, JSON-LD,
> `sitemap.php`). Seul `robots.txt` (fichier statique) contient encore le domaine en clair,
> à mettre à jour aussi.

## À faire avant la mise en ligne

1. **Mot du Maire** : texte encore signé Olivier Martin — à faire actualiser/signer par le maire actuel.
2. **Formulaire de contact** : ouvre le logiciel de messagerie (`mailto:`). Pour un envoi
   serveur, prévoir un petit script PHP côté hébergeur.
3. **Mentions légales** : compléter le nom de l'hébergeur.
4. **Domaine** : mettre à jour `$baseUrl` (voir ci-dessus).
