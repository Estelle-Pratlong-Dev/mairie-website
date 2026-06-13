# Site de la Mairie de Gagnières

Refonte moderne du site https://mairie-gagnieres.fr/ — même contenu, nouvelle présentation.

## Voir le site en local

Le dossier est dans Laragon : démarrez Laragon puis ouvrez **http://mairie-website.test**
(ou ouvrez simplement `index.html` dans un navigateur — le site est 100 % statique).

## Structure

| Fichier | Page |
|---|---|
| `index.html` | Accueil (démarches, chiffres clés, actualités) |
| `mot-du-maire.html` | Le mot du Maire |
| `conseil-municipal.html` | Le Conseil municipal |
| `services-municipaux.html` | Les équipes municipales |
| `services.html` | Vie pratique (les 16 services : école, santé, déchets…) |
| `professionnels.html` | Annuaire des commerçants et artisans |
| `associations.html` | Les associations |
| `contact.html` | Contact, horaires, plan d'accès |
| `mentions-legales.html` | Mentions légales et RGPD |
| `assets/css/style.css` | Toute la mise en forme (couleurs, polices…) |
| `assets/js/main.js` | Menu mobile et formulaire de contact |

## Modifier le contenu

Tout est en HTML simple : ouvrez le fichier de la page concernée et modifiez le texte.
Les couleurs se changent en haut de `assets/css/style.css` (variables `--slate-*` pour
l'anthracite/gris, `--blue-*` pour le bleu d'accent).

## Flash info (annonces à expiration automatique)

Les annonces de la page d'accueil se gèrent dans **`assets/js/annonces.js`** :
chaque annonce a un titre, un texte, une affiche (facultative) et une **date au format
AAAA-MM-JJ** qui est son *dernier jour d'affichage*. Le lendemain de cette date,
l'annonce disparaît toute seule du site ; quand il n'y a plus aucune annonce en cours,
le bloc Flash info disparaît entièrement. Le mode d'emploi détaillé est en commentaire
en haut du fichier.

Les affiches des événements se déposent dans le dossier `img/event/`
(noms de fichiers sans espaces ni accents).

## Photos

Les photos du village sont dans `img/`. La photo du bandeau d'accueil est
`img/ville-de-gagnieres.jpg` (référencée dans `assets/css/style.css`, section `.hero`).
La galerie « Le village en images » se modifie directement dans `index.html`.

## À faire avant la mise en ligne

1. **Mot du Maire** : le texte actuel est repris de l'ancien site et signé Olivier Martin ;
   à faire actualiser/signer par le maire actuel (Bernard Durand).
2. **Formulaire de contact** : il ouvre pour l'instant le logiciel de messagerie du visiteur
   (`mailto:`). Pour un vrai envoi serveur, utiliser le service de formulaire de l'hébergeur
   choisi ou un petit script PHP.
3. **Mentions légales** : compléter le nom de l'hébergeur.
4. **Photos** : remplacer les illustrations par de vraies photos du village si souhaité
   (notamment dans le bandeau d'accueil).
5. **Actualités** : la seule actualité reprise date de 2020 — à remplacer par des actualités récentes.
