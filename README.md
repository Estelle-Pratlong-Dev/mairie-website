# Site de la Mairie de Gagnières

Site officiel de la commune de **Gagnières** (Gard). Refonte complète et modernisée
de l'ancien site, à contenus équivalents mais réorganisés et actualisés.

Le site est **validé** ; il remplacera l'ancien dès la récupération du nom de domaine
et des accès d'hébergement.

- **Langage** : PHP « vanilla » (pages assemblées par un gabarit unique), sans framework
  ni étape de build.
- **Dépendances** : aucune, et **aucune requête externe** — les polices (Inter, Outfit) sont
  hébergées en local (`assets/fonts/`), donc rien n'est transmis à un service tiers (RGPD).
- **Hébergement** : tout hébergement mutualisé avec PHP (le site cible **Amen**, l'hébergeur
  actuel de la commune).

## Voir le site en local

Démarrez Laragon puis ouvrez **http://mairie-website.test** (PHP est nécessaire — un simple
double-clic sur un fichier ne suffit pas).

## Fonctionnalités

- **Gabarit unique** : en-tête, menu, pied de page et `<head>` (SEO) définis à un seul endroit.
- **Annuaires** professionnels et associations pilotés par des **tableaux de données** (ajouter
  une fiche = ajouter quelques lignes, sans recopier de HTML).
- **Actualités** : les annonces sont publiées depuis un **espace d'administration** (`/admin`)
  et s'affichent en **carrousel** sur l'accueil, avec **expiration automatique** par date — sans
  toucher au code.
- **Fenêtre modale** (« Voir l'image ») pour agrandir logos, cartes de visite et photos.
- **Référencement** complet (voir plus bas) et pages **légales / RGPD** conformes.
- **Responsive** (mobile, tablette) et **accessible** (navigation clavier, contrastes,
  fil d'Ariane sémantique, `alt` sur les images).

## Espace d'administration

Une interface protégée par mot de passe (`/admin`) permet au secrétariat de **publier les
annonces** de l'accueil (titre, date de fin, description, affiche) **sans connaissances
techniques**. Côté sécurité : mot de passe unique **haché** (`password_hash`), session PHP,
protection **CSRF** sur tous les formulaires et **téléversement d'image validé** (type MIME réel
et taille). Les annonces sont enregistrées dans `data/annonces.json` et affichées en carrousel sur
l'accueil. Mode d'emploi détaillé dans **`GUIDE.md`** (partie 4).

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
  require_once __DIR__ . '/../partials/icons.php';
  ob_start();
  ?>
     … sections de la page …
  <?php $content = ob_get_clean(); include __DIR__ . '/../partials/layout.php'; ?>
  ```

- Les **icônes** sont centralisées dans `partials/icons.php` : `<?= icon('phone') ?>`.
- Le **fil d'Ariane** est généré par `breadcrumb()` (voir `partials/icons.php`).

## Structure des fichiers

| Fichier / dossier | Rôle |
|---|---|
| `pages/` | **Toutes les pages du site** (accueil, La Mairie, vie pratique, annuaires, contact, pages légales, 404). L'adresse publique reste propre grâce à `.htaccess` : `pages/services.php` → `/services.php` |
| `admin/` | **Espace d'administration** : connexion + gestion des annonces « Flash info » |
| `config.php` | **Domaine, coordonnées de la mairie et mot de passe admin** — un seul endroit à tenir à jour |
| `data/annonces.json` | **Contenu des annonces** (écrit par l'espace admin) — **non versionné** ; `data/annonces.example.json` donne le format |
| `partials/layout.php` | Gabarit commun (menu, pied de page, SEO, modale) |
| `partials/icons.php` | Catalogue d'icônes SVG + fil d'Ariane |
| `partials/annonces.php` | Lecture/écriture des annonces (accueil + admin) |
| `assets/css/style.css` · `assets/css/admin.css` | Mise en forme du site public / de l'admin |
| `assets/css/fonts.css` · `assets/fonts/` | Polices Inter & Outfit **hébergées en local** (aucune requête externe, RGPD) |
| `assets/js/main.js` | Menu mobile, fenêtre modale, carrousel d'actualités |
| `assets/img/village/` · `pro/` · `asso/` · `event/` | Photos et affiches |
| `sitemap.php` · `robots.txt` · `.htaccess` · `favicon.svg` | Référencement / config serveur (URLs propres, sécurité, cache) |

## Gérer le contenu au quotidien

- **Annonces (Flash info)** : depuis l'**espace d'administration** `mairie-gagnieres.fr/admin/`
  (formulaire : titre, date de fin, description, affiche). Passée la date de fin, l'annonce
  disparaît d'elle-même. Aucune manipulation de code. *(Détails dans `GUIDE.md`, partie 4.)*
- **Professionnels / Associations** : modifier le tableau en tête de `pages/professionnels.php` /
  `pages/associations.php` (nom, coordonnées, liens, image). Images dans `assets/img/pro/` et
  `assets/img/asso/`.
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
3. **Changer le mot de passe** de l'espace d'administration (voir `GUIDE.md`, partie 4).
4. **Téléverser** l'ensemble des fichiers à la racine de l'hébergement (le dossier `.claude/`
   est ignoré par git et inutile en ligne).
5. Vérifier que **`mod_rewrite` est actif** (URLs propres) et que le dossier **`data/`** est
   accessible en écriture (pour que l'admin puisse enregistrer les annonces).

> **Contenu vs code.** Les annonces (`data/annonces.json`) et les affiches téléversées
> (`assets/img/event/`) sont du contenu saisi en ligne : ils **ne sont pas versionnés**. Lors
> d'une mise à jour du code, ne pas les écraser sur le serveur. Pour une démo locale, copier
> `data/annonces.example.json` vers `data/annonces.json`.

### Points à finaliser avant la bascule

- **Mot du Maire** : actualiser le texte (encore signé Olivier Martin) et le faire valider
  par M. Bernard Durand.
- **Mot de passe admin** : remplacer le mot de passe temporaire (`gagnieres2026`).
- **Adresse e-mail expéditrice** : créer `no-reply@mairie-gagnieres.fr` chez l'hébergeur.
- **Adresse légale** : confirmer le siège officiel (14 rue du Village ou Place de la Mairie).
- **Accessibilité** : réaliser l'audit RGAA et publier la déclaration d'accessibilité.

---

Conception et réalisation : [Estelle Pratlong](https://estelle-pratlong.fr/) pour la commune de Gagnières.
