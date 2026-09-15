# Site de la Mairie de Gagnières

Site officiel de la commune de **Gagnières** (Gard). Refonte complète et modernisée
de l'ancien site, à contenus équivalents mais réorganisés et actualisés.

Le site est **validé** ; il remplacera l'ancien dès la récupération du nom de domaine
et des accès d'hébergement.

- **Langage** : PHP « vanilla » (pages assemblées par un gabarit unique), sans framework
  ni étape de build.
- **Dépendances** : aucune. Seules les polices Google Fonts sont chargées à distance.
- **Hébergement** : tout hébergement mutualisé avec PHP (le site cible **Amen**, l'hébergeur
  actuel de la commune).

## Voir le site en local

Démarrez Laragon puis ouvrez **http://mairie-website.test** (PHP est nécessaire — un simple
double-clic sur un fichier ne suffit pas).

## Fonctionnalités

- **Gabarit unique** : en-tête, menu, pied de page et `<head>` (SEO) définis à un seul endroit.
- **Annuaires** professionnels et associations pilotés par des **tableaux de données** (ajouter
  une fiche = ajouter quelques lignes, sans recopier de HTML).
- **Flash info** : annonces d'accueil à **expiration automatique** par date.
- **Fenêtre modale** (« Voir l'image ») pour agrandir logos, cartes de visite et photos.
- **Référencement** complet (voir plus bas) et pages **légales / RGPD** conformes.
- **Responsive** (mobile, tablette) et **accessible** (navigation clavier, contrastes,
  fil d'Ariane sémantique, `alt` sur les images).

## Architecture

Principe du **gabarit unique**, comme le `base.html.twig` de Symfony :

- **`partials/layout.php`** contient tout ce qui ne change pas d'une page à l'autre
  (`<head>`, barre de contact, menu, pied de page, scripts). Toutes les balises de structure
  s'y ouvrent **et** s'y ferment.
- **Chaque page** ne fournit que son contenu et quelques variables :

  ```php
  <?php
  $title = '…'; $description = '…'; $active = '…'; $canonical = 'services.php';
  $pageTitle = 'Vie pratique';           // titre du bandeau interne
  $pageLead  = '…';                      // sous-titre (facultatif)
  $crumbs    = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'Vie pratique']];
  ob_start();
  ?>
     … sections de la page …
  <?php $content = ob_get_clean(); include 'partials/layout.php'; ?>
  ```

- Les **icônes** sont centralisées dans `partials/icons.php` : `<?= icon('phone') ?>`.
- Le **fil d'Ariane** est généré par `breadcrumb()` (voir `partials/icons.php`).

## Structure des fichiers

| Fichier / dossier | Rôle |
|---|---|
| `index.php` | Accueil (Flash info, actualités, présentation, démarches, galerie) |
| `mot-du-maire.php` · `conseil-municipal.php` · `services-municipaux.php` | La Mairie |
| `services.php` | Vie pratique (école, santé, déchets, transports…) |
| `professionnels.php` · `associations.php` | Annuaires (tableaux de données en tête de fichier) |
| `contact.php` | Contact, horaires, plan d'accès |
| `mentions-legales.php` · `confidentialite.php` | Pages légales et RGPD |
| `404.php` | Page d'erreur « introuvable » |
| `config.php` | **Domaine + toutes les coordonnées de la mairie** (tél, adresse, e-mail, horaires, réseaux…) — un seul endroit à tenir à jour |
| `partials/layout.php` | Gabarit commun (menu, pied de page, SEO, modale) |
| `partials/icons.php` | Catalogue d'icônes SVG + fil d'Ariane |
| `assets/css/style.css` | Mise en forme (couleurs en haut du fichier) |
| `assets/js/main.js` | Menu mobile, formulaire, Flash info, modale |
| `assets/js/annonces.js` | **Contenu des annonces Flash info** |
| `img/village/` · `img/pro/` · `img/asso/` · `img/event/` | Photos et affiches |
| `sitemap.php` · `robots.txt` · `.htaccess` · `favicon.svg` | Référencement / config serveur |

## Gérer le contenu au quotidien

- **Annonces (Flash info)** : `assets/js/annonces.js`. Chaque annonce a une **date de fin**
  (AAAA-MM-JJ) ; passée cette date, elle disparaît d'elle-même. Affiches dans `img/event/`.
- **Professionnels / Associations** : modifier le tableau en tête de `professionnels.php` /
  `associations.php` (nom, coordonnées, liens, image). Images dans `img/pro/` et `img/asso/`.
- **Couleurs** : variables en haut de `assets/css/style.css` (`--slate-*`, `--blue-*`).
- **Coordonnées de la mairie** (téléphone, adresse, e-mail, horaires, nom du maire, réseaux) :
  le tableau `$mairie` dans **`config.php`**. Modifié ici, c'est répercuté sur **tout le site**
  (barre de contact, pied de page, page contact, mentions légales, données Google…).

## Référencement (SEO)

Titre + description uniques par page, URL canoniques, Open Graph, données structurées JSON-LD
(fiche mairie), favicon, `theme-color`, `sitemap.php`, `robots.txt`, `.htaccess`
(compression, cache, UTF-8, page 404).

## Mise en ligne

1. **Récupérer** le nom de domaine et les accès d'hébergement (Amen).
2. **Domaine** : déjà réglé sur `https://mairie-gagnieres.fr` (dans `config.php` → `$baseUrl`
   et dans `robots.txt`). À vérifier seulement si l'adresse finale diffère (www ou non).
3. **Téléverser** l'ensemble des fichiers à la racine de l'hébergement (le dossier `.claude/`
   est ignoré par git et inutile en ligne).
4. Vérifier que l'hébergement sert bien `index.php` par défaut et que `.htaccess` est actif.

### Points à finaliser avant la bascule

- **Mot du Maire** : actualiser le texte (encore signé Olivier Martin) et le faire valider
  par M. Bernard Durand.
- **Formulaire de contact** : choisir entre le fonctionnement actuel (`mailto:`, ouvre le
  logiciel de messagerie du visiteur) et un **envoi serveur** en PHP (message reçu directement).
- **Adresse légale** : confirmer le siège officiel (14 rue du Village ou Place de la Mairie).
- **Accessibilité** : réaliser l'audit RGAA et publier la déclaration d'accessibilité.
- **Actualités** : penser à publier des actualités récentes.

---

Conception et réalisation : [Estelle Pratlong](https://estelle-pratlong.fr/) pour la commune de Gagnières.
