// Mairie de Gagnières — interactions du site

document.addEventListener('DOMContentLoaded', function () {
  // Menu mobile
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.querySelector('.site-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  // Sous-menus déroulants
  document.querySelectorAll('.nav-drop > button').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      var drop = btn.parentElement;
      var wasOpen = drop.classList.contains('open');
      document.querySelectorAll('.nav-drop.open').forEach(function (d) {
        d.classList.remove('open');
        d.querySelector('button').setAttribute('aria-expanded', 'false');
      });
      if (!wasOpen) {
        drop.classList.add('open');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
  });

  document.addEventListener('click', function () {
    document.querySelectorAll('.nav-drop.open').forEach(function (d) {
      d.classList.remove('open');
      d.querySelector('button').setAttribute('aria-expanded', 'false');
    });
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      document.querySelectorAll('.nav-drop.open').forEach(function (d) {
        d.classList.remove('open');
        d.querySelector('button').setAttribute('aria-expanded', 'false');
      });
    }
  });

  // Formulaire de contact : ouvre le logiciel de messagerie avec le message pré-rempli.
  // (À remplacer par un véritable envoi serveur une fois l'hébergement choisi.)
  var form = document.getElementById('contact-form');
  if (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var nom = document.getElementById('cf-nom').value.trim();
      var email = document.getElementById('cf-email').value.trim();
      var sujet = document.getElementById('cf-sujet').value.trim() || 'Message depuis le site de la mairie';
      var message = document.getElementById('cf-message').value.trim();
      var corps = message + '\n\n—\n' + nom + '\n' + email;
      window.location.href = 'mailto:mairie.gagnieres@laposte.net' +
        '?subject=' + encodeURIComponent(sujet) +
        '&body=' + encodeURIComponent(corps);
    });
  }

  // Année courante dans le pied de page
  document.querySelectorAll('.js-year').forEach(function (el) {
    el.textContent = new Date().getFullYear();
  });

  // Flash info : affiche les annonces de assets/js/annonces.js dont la date
  // n'est pas passée. Le bloc disparaît s'il n'y a plus rien à afficher.
  var flashSection = document.getElementById('flash-info');
  var flashList = document.getElementById('flash-list');
  if (flashSection && flashList && typeof ANNONCES !== 'undefined') {
    var today = new Date();
    today.setHours(0, 0, 0, 0);

    var actives = ANNONCES.filter(function (a) {
      if (!a || !a.date) { return false; }
      var parts = a.date.split('-');
      var limite = new Date(parseInt(parts[0], 10), parseInt(parts[1], 10) - 1, parseInt(parts[2], 10));
      return limite >= today;
    });

    if (actives.length > 0) {
      actives.forEach(function (a) {
        var card = document.createElement('article');
        card.className = 'flash-card';

        var body = document.createElement('div');
        body.className = 'flash-body';

        if (a.quand) {
          var quand = document.createElement('p');
          quand.className = 'flash-quand';
          quand.textContent = a.quand;
          body.appendChild(quand);
        }

        var titre = document.createElement('h3');
        titre.textContent = a.titre || '';
        body.appendChild(titre);

        if (a.texte) {
          var texte = document.createElement('p');
          texte.className = 'flash-texte';
          texte.textContent = a.texte;
          body.appendChild(texte);
        }

        if (a.affiche) {
          var lien = document.createElement('a');
          lien.className = 'flash-affiche';
          lien.href = a.affiche;
          lien.target = '_blank';
          lien.rel = 'noopener';
          lien.setAttribute('aria-label', 'Voir l’affiche : ' + (a.titre || ''));
          var img = document.createElement('img');
          img.src = a.affiche;
          img.alt = 'Affiche : ' + (a.titre || '');
          img.loading = 'lazy';
          lien.appendChild(img);
          card.appendChild(lien);
        }

        card.appendChild(body);
        flashList.appendChild(card);
      });
      flashSection.hidden = false;
    }
  }
});
