# Guide de maintenance — Site de la mairie de Gagnières

Ce document explique **comment le site est rangé** et **comment le faire évoluer**,
pour que n'importe qui puisse le reprendre à l'avenir, même sans avoir participé au projet.

> Le site est écrit en **PHP** simple, sans framework ni outil à installer. Il suffit d'un
> hébergement web classique avec PHP (l'hébergeur de la commune est **Amen**).

---

## 1. Comment le projet est rangé

```
mairie-website/
│
├── pages/                    TOUTES les pages du site (une page = un fichier .php)
│   ├── index.php             Accueil (Flash info, actualités, présentation, démarches…)
│   ├── mot-du-maire.php      ┐
│   ├── conseil-municipal.php │  Les pages du menu.
│   ├── services-municipaux.php│
│   ├── services.php          │  Grâce au fichier .htaccess, l'adresse publique reste
│   ├── professionnels.php    │  PROPRE : pages/services.php s'ouvre sur
│   ├── associations.php      │  mairie-gagnieres.fr/services.php (et non /pages/…).
│   ├── contact.php           │
│   ├── mentions-legales.php  │
│   ├── confidentialite.php   ┘
│   └── 404.php               Page affichée quand une adresse n'existe pas
│
├── admin/                    ⭐ ESPACE D'ADMINISTRATION (publication des annonces)
│   ├── login.php             Connexion (mot de passe)
│   ├── index.php             Liste des annonces + boutons modifier / supprimer
│   ├── editer.php            Formulaire pour créer ou modifier une annonce
│   ├── supprimer.php         Suppression d'une annonce
│   ├── logout.php            Déconnexion
│   └── _bootstrap.php        Socle commun (session, sécurité) — ne pas ouvrir directement
│
├── config.php                ⭐ RÉGLAGES : domaine, coordonnées de la mairie, mot de passe admin
│
├── data/
│   ├── annonces.json         ⭐ Les annonces « Flash info » (écrites par l'espace admin,
│   │                             contenu NON versionné — voir partie 4)
│   └── annonces.example.json    Exemple de format (à copier vers annonces.json pour une démo)
│
├── partials/                 Briques communes à toutes les pages
│   ├── layout.php            Le « squelette » (en-tête, menu, pied de page, SEO, modale)
│   ├── icons.php             Les icônes + le fil d'Ariane + petits utilitaires
│   └── annonces.php          Lecture/écriture des annonces (utilisé par l'accueil ET l'admin)
│
├── assets/                   Tout ce qui habille le site
│   ├── css/
│   │   ├── style.css         Mise en forme du site public (couleurs en haut du fichier)
│   │   └── admin.css         Mise en forme de l'espace d'administration
│   ├── js/
│   │   └── main.js           Menu mobile, fenêtre modale « Voir l'image »
│   └── img/                  Toutes les images, rangées par thème
│       ├── village/          Photos du village (accueil, galerie)
│       ├── pro/              Logos / cartes de visite des professionnels
│       ├── asso/             Images des associations
│       ├── event/            Affiches des annonces (Flash info)
│       └── logo.png          Le blason de la commune (en-tête + pied de page)
│
├── sitemap.php               Plan du site pour les moteurs de recherche
├── robots.txt                Consignes pour les moteurs de recherche
├── .htaccess                 Réglages serveur (URLs propres, page 404, sécurité, cache)
├── favicon.svg               Petite icône affichée dans l'onglet du navigateur
│
├── README.md                 Présentation générale du projet
└── GUIDE.md                  Ce guide
```

Les fichiers marqués ⭐ sont ceux qu'on modifie le plus souvent.

> **Pourquoi les pages sont dans `pages/` mais les adresses restent à la racine ?**
> Le fichier `.htaccess` fait une « réécriture d'URL » : le visiteur voit
> `mairie-gagnieres.fr/services.php`, alors que le fichier vit dans `pages/`. C'est le
> même principe que Symfony ou Laravel : le code est rangé dans des dossiers, mais les
> adresses restent propres. **Rien à changer dans les liens** entre les pages.

---

## 2. Le principe de fonctionnement (à comprendre une fois)

Tout ce qui est **identique sur toutes les pages** (en-tête, menu, pied de page, référencement)
est écrit **une seule fois** dans `partials/layout.php`. Chaque page ne contient donc que **son
propre contenu** et quelques informations en haut de fichier :

```php
<?php
$title     = 'Titre pour l’onglet et Google';
$pageTitle = 'Titre affiché en haut de la page';
$crumbs    = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'Ma page']];
require_once __DIR__ . '/../partials/icons.php';
ob_start();                                    // on « capture » le contenu de la page
?>
   … le contenu de la page …
<?php
$content = ob_get_clean();                     // le contenu est mis de côté
include __DIR__ . '/../partials/layout.php';   // le squelette l'insère au bon endroit
```

**Conséquence pratique :** pour changer le menu, le pied de page ou le référencement de
**tout le site**, on touche **un seul fichier** : `partials/layout.php`.

---

## 3. Comment faire pour… (tâches courantes)

### Changer un numéro de téléphone, l'adresse, un horaire, le nom du maire
➡ **`config.php`**, dans le tableau `$mairie`. Une seule ligne à modifier, c'est répercuté
**partout** (barre du haut, pied de page, page contact, mentions légales, fiche Google…).

### Publier / modifier / retirer une annonce « Flash info »
➡ **Par l'espace d'administration** : voir la partie **4** ci-dessous. On n'édite plus de
fichier à la main — tout se fait depuis le navigateur, avec un formulaire.

### Ajouter ou modifier un professionnel
➡ **`pages/professionnels.php`** : tout en haut du fichier, le tableau `$sections` liste les
pros par catégorie. Copier un bloc `[ ... ]`, changer le nom, la description, les coordonnées,
les liens et l'image. Déposer les images dans `assets/img/pro/`.

### Ajouter ou modifier une association
➡ **`pages/associations.php`** : même principe, tableau `$assos` en haut du fichier. Images
dans `assets/img/asso/`.

### Changer les couleurs du site
➡ **`assets/css/style.css`**, tout en haut (`--slate-*` pour les gris, `--blue-*` pour le bleu).

### Modifier le menu, le pied de page ou le référencement
➡ **`partials/layout.php`** (un seul endroit pour tout le site).

### Ajouter une icône
➡ **`partials/icons.php`** : ajouter une ligne `'nom' => '<path .../>'` dans le tableau, puis
l'utiliser dans une page avec `<?= icon('nom') ?>`.

### Ajouter une nouvelle page
1. Copier un fichier de page existant dans `pages/` (ex. `mentions-legales.php`).
2. Adapter en haut : `$title`, `$pageTitle`, `$crumbs`, `$canonical`.
3. Écrire le contenu entre `ob_start();` et `$content = ob_get_clean();`.
4. Ajouter le lien vers la page dans le menu (`partials/layout.php`) et dans `sitemap.php`.
   L'adresse publique sera automatiquement `mairie-gagnieres.fr/nom-du-fichier.php`.

---

## 4. L'espace d'administration (annonces « Flash info »)

L'espace d'administration permet au secrétariat de **publier les annonces** qui s'affichent dans
le **carrousel « Actualités & agenda »** de la page d'accueil, **sans toucher au code**.

### S'y connecter
➡ Adresse : **`mairie-gagnieres.fr/admin/`**. Un mot de passe est demandé (unique, partagé
par le secrétariat).

### Publier une annonce
1. Cliquer sur **« Nouvelle annonce »**.
2. Remplir le **titre** (obligatoire) et la **date de fin d'affichage** (obligatoire).
3. Facultatif : le champ **« Quand »** (ex. *« Dimanche 14 juin à partir de 9h »*), une
   **description**, et une **affiche / photo** (JPEG, PNG, WebP ou GIF, 5 Mo maximum).
4. **Publier**. L'annonce apparaît aussitôt sur la page d'accueil.

### Ce qui se passe ensuite
- L'annonce reste visible **jusqu'à sa date de fin**, puis **disparaît toute seule** (rien à
  faire). Quand il n'y a plus d'annonce en cours, le carrousel disparaît entièrement (seul
  l'encadré « Suivez l'actualité » reste).
- Le carrousel affiche jusqu'à **3 annonces côte à côte** ; au-delà, des flèches permettent de
  faire défiler les suivantes.
- Depuis la liste, on peut à tout moment **Modifier** ou **Supprimer** une annonce.
- Dans la liste, une pastille indique si l'annonce est **En ligne** ou **Expirée**.

### Changer le mot de passe (important avant la mise en ligne)
Le mot de passe temporaire actuel est **`gagnieres2026`** — **à changer**. Le mot de passe
n'est jamais stocké en clair : seule son **empreinte** est enregistrée dans `config.php`.
Pour en définir un nouveau, exécuter en local :

```
php -r "echo password_hash('le-nouveau-mot-de-passe', PASSWORD_DEFAULT);"
```

puis coller le résultat dans `config.php`, à la ligne `$adminMotDePasseHash = '…';`.

### Où sont enregistrées les annonces ?
Dans le fichier **`data/annonces.json`** (écrit automatiquement par l'espace admin) et les
affiches dans **`assets/img/event/`**. Une sauvegarde du site = une copie de ces deux éléments.

> **Important — contenu vs code :** `data/annonces.json` et les affiches de `assets/img/event/`
> sont du **contenu** saisi depuis l'admin, pas du code : ils **ne sont pas versionnés** (git les
> ignore). Le dépôt reste ainsi propre, et **mettre à jour le code du site n'écrase jamais les
> annonces** publiées en ligne. Pour repartir d'une démo, copier `data/annonces.example.json`
> vers `data/annonces.json`.

> **Note technique :** l'accueil lit `data/annonces.json` côté serveur (via
> `partials/annonces.php`) et affiche les annonces encore valides. Il n'y a plus de fichier
> JavaScript à éditer à la main.

---

## 5. Mettre le site en ligne

1. Récupérer le domaine (**mairie-gagnieres.fr**) et les accès d'hébergement **Amen**.
2. Vérifier le domaine dans `config.php` (`$baseUrl`) et `robots.txt`.
3. **Changer le mot de passe** de l'espace d'administration (voir partie 4).
4. Créer l'adresse e-mail expéditrice **no-reply@mairie-gagnieres.fr** (elle envoie les messages
   du formulaire ; réglable dans `config.php` → `email_expediteur`).
5. Téléverser tous les fichiers à la racine de l'hébergement (le dossier `.claude/`, présent en
   local, est inutile en ligne).
6. Vérifier que **le module de réécriture d'URL est actif** (`mod_rewrite`) : la page d'accueil
   doit s'ouvrir sur `mairie-gagnieres.fr/` et les pages sur `…/services.php` etc.
7. Vérifier que le **dossier `data/` est accessible en écriture** par le serveur (pour que
   l'espace admin puisse enregistrer les annonces).
8. Vérifier que le formulaire de contact envoie bien les e-mails, et tester l'espace admin.

> **Mises à jour ultérieures du site :** ne re-téléverser que les fichiers **de code** modifiés.
> Ne pas écraser `data/annonces.json` ni le contenu de `assets/img/event/` en ligne : ce sont les
> annonces publiées par le secrétariat. (C'est pour cela qu'ils ne sont pas dans le dépôt git.)
> Il est prudent d'en garder une **sauvegarde** régulière.

### Points restant à finaliser avant la bascule
- Actualiser le **mot du Maire** (texte encore signé Olivier Martin) et le faire valider.
- Confirmer l'**adresse légale** du siège (14 rue du Village ou Place de la Mairie).
- Réaliser l'**audit d'accessibilité (RGAA)** et publier la déclaration.

---

## 6. Pour un développeur (détails techniques)

- **Aucune dépendance** : PHP + HTML/CSS/JS natifs. Seules les polices Google Fonts sont
  chargées à distance.
- **URLs propres** : `.htaccess` réécrit `/xxx.php` vers `pages/xxx.php` et `/` vers
  `pages/index.php`. Les fichiers réels (assets, `sitemap.php`, `robots.txt`) ne sont pas
  réécrits. Les dossiers `partials/`, `data/` et les fichiers `admin/_*` sont interdits d'accès
  direct (403), et le listing des dossiers est désactivé.
- **Fonctions utilitaires** (`partials/icons.php`) : `icon('nom')`, `breadcrumb([...])`,
  `telHref('06 …')`, `date_fr('AAAA-MM-JJ')`, `asset_ver($fichier)` (suffixe `?v=…` basé sur la
  date de modification, pour contourner le cache navigateur du `.htaccess`).
- **Annonces** (`partials/annonces.php`) : `annonces_actives()`, `annonces_toutes()`,
  `annonce_par_id()`, `annonces_enregistrer()`. Données dans `data/annonces.json`.
- **Carrousel d'accueil** : les annonces actives sont rendues côté serveur dans
  `pages/index.php` (cartes portrait). ≤ 3 → cartes centrées à largeur fixe ; > 3 → défilement
  horizontal (`assets/js/main.js`). Aucune annonce → le carrousel n'est pas rendu.
- **Espace admin** (`admin/`) : session PHP, mot de passe haché (`password_hash`), protection
  CSRF sur tous les formulaires, upload d'image validé (type MIME réel + `getimagesize`) et
  rangé sous un nom sûr dans `assets/img/event/`.
- **Formulaire de contact** : traité côté serveur dans `pages/contact.php` (fonction `mail()`),
  avec accusé de réception, champ piège anti-robot et schéma *post-redirect-get*.
- **SEO** : titres/descriptions uniques, URL canoniques, Open Graph, données structurées JSON-LD,
  `sitemap.php` généré depuis `config.php`.
