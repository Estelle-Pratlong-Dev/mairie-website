/* ============================================================
   FLASH INFO — Annonces et événements à venir
   ============================================================

   C'EST ICI QU'ON AJOUTE OU MODIFIE LES ANNONCES DU SITE.

   Chaque annonce s'écrit entre accolades { ... } et se termine
   par une virgule. Les champs :

     titre     : le titre de l'annonce (obligatoire)
     date      : dernier jour d'affichage, format "AAAA-MM-JJ" (obligatoire)
                 → le lendemain de cette date, l'annonce disparaît
                   automatiquement du site.
     quand     : la date/heure affichée aux visiteurs (texte libre)
     texte     : le descriptif (texte libre)
     affiche   : chemin d'une image/affiche à montrer (facultatif,
                 mettre "" s'il n'y en a pas)

   Quand il n'y a plus aucune annonce valide, le bloc Flash info
   disparaît entièrement de la page d'accueil.

   Pensez à enregistrer le fichier après modification.
   ============================================================ */

var ANNONCES = [

  {
    titre: "Vente de brioches dans le village",
    date: "2026-06-14",
    quand: "Dimanche 14 juin à partir de 9h",
    texte: "Vente en porte à porte par les parents d'élèves et leurs enfants, au profit de la Société du Sou des écoles. Brioches de la boulangerie du village !",
    affiche: "img/event/vente-brioches-14-juin.jpg"
  },

  {
    titre: "Fête de tous pour tous — repas campagnard",
    date: "2026-06-27",
    quand: "Samedi 27 juin dès 11h30 — Centre Chrétien de Gagnières",
    texte: "Journée festive et champêtre organisée par la municipalité : repas campagnard à 13h (terrine, longe de porc de Lozère, pélardon, tarte aux pommes), animation musicale par le groupe Gandarva. Inscription obligatoire en mairie avant le jeudi 18 juin.",
    affiche: "img/event/fete-tous-pour-tous-27-juin.jpg"
  },

  {
    titre: "Collecte des encombrants",
    date: "2026-06-30",
    quand: "Lundi 15 et mardi 30 juin, à partir de 8h",
    texte: "Inscription obligatoire au 04 66 61 32 93, jusqu'à la veille à midi. Calendrier complet de l'année sur l'affiche.",
    affiche: "img/event/encombrants-2026.jpg"
  }

];
