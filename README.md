# Site de la Mairie de Gagnières

Refonte complète du site officiel de la commune de **Gagnières** (Gard) : un site
moderne, sobre et accessible, pensé pour être **facile à maintenir par un secrétariat non
technicien** tout en restant **autonome et respectueux des données** des visiteurs.

Projet mené par [Estelle Pratlong](https://estelle-pratlong.fr/), conseillère municipale
déléguée à la communication — également développeuse.

---

## Le projet en bref

L'ancien site n'était plus maintenable et échappait à la commune. L'objectif : reprendre
l'intégralité des contenus, les **réorganiser et les moderniser**, et donner à la mairie un
outil qu'elle peut faire vivre **sans dépendre d'un prestataire ni écrire une ligne de code**.

Le parti pris technique : **du PHP simple, sans framework ni outil de build**, pour un site qui
tourne sur n'importe quel hébergement mutualisé et que n'importe quel développeur peut reprendre
en quelques minutes.

## Fonctionnalités

- **Gabarit unique** : en-tête, menu, pied de page et référencement définis à un seul endroit ;
  chaque page ne fournit que son contenu (principe du `base.html.twig` de Symfony, en PHP natif).
- **Espace d'administration** (`/admin`) : le secrétariat publie les **actualités** de l'accueil
  (titre, date, texte, affiche) depuis un formulaire, sans toucher au code.
- **Carrousel d'actualités** en page d'accueil, rendu côté serveur (donc référençable).
- **Annuaires** des professionnels et des associations, pilotés par de simples tableaux de données.
- **Formulaire de contact** avec envoi serveur, accusé de réception et protection anti-spam.
- **Configuration centralisée** : toutes les coordonnées de la mairie dans un seul fichier.
- **Pages légales et RGPD** complètes, et **déclaration d'accessibilité**.

## Choix techniques notables

- **Zéro dépendance, zéro requête externe.** Aucun framework, aucun CDN : même les polices
  (Inter, Outfit) sont **hébergées en local**. Résultat : rien n'est transmis à un service tiers
  et **aucune donnée personnelle ne fuit** (pas de cookies, pas d'IP envoyée à Google).
- **URLs propres** via réécriture `.htaccess` : le code est rangé dans des dossiers (`pages/`,
  `assets/`, `partials/`) tout en gardant des adresses lisibles (`/services.php`).
- **Administration maison sécurisée** : sessions PHP, mot de passe **haché**, protection **CSRF**
  sur tous les formulaires, **téléversement d'images validé** (type réel + taille).
- **Séparation contenu / code** : les données saisies en ligne (annonces, affiches) ne sont pas
  versionnées, pour un dépôt propre et un contenu de production jamais écrasé par un déploiement.
- **Référencement** soigné : titres et descriptions uniques, URL canoniques, Open Graph,
  données structurées JSON-LD, `sitemap.php`, page 404 personnalisée.
- **Accessibilité (RGAA)** : structure sémantique, navigation clavier, contrastes AA, gestion du
  focus (fenêtre modale), messages annoncés aux lecteurs d'écran.

## Stack

PHP « vanilla » · HTML5 · CSS3 (variables natives) · JavaScript sans dépendance · Apache
(`.htaccess`). Aucune étape de build, aucun `node_modules`.

## Organisation du code

```
pages/        Les pages du site (une page = un fichier)
admin/        L'espace d'administration
partials/     Le gabarit commun et les briques réutilisables
assets/       CSS, JavaScript, polices et images
config.php    Domaine + coordonnées de la mairie (point de réglage unique)
```

> La **documentation de maintenance** (comment publier une annonce, ajouter un professionnel,
> changer les couleurs, mettre le site en ligne…) est détaillée dans **[`GUIDE.md`](GUIDE.md)**.

---

Conception et réalisation : [Estelle Pratlong](https://estelle-pratlong.fr/) pour la commune de Gagnières.
