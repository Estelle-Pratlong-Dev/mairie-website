// Mairie de Gagnières — interactions du site

document.addEventListener('DOMContentLoaded', function () {
  // Menu mobile
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.querySelector('.site-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.setAttribute('aria-label', open ? 'Fermer le menu' : 'Ouvrir le menu');
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

  // (Le formulaire de contact est traité côté serveur par contact.php.)
  // (Le « Flash info » est rendu côté serveur par pages/index.php depuis
  //  data/annonces.json — voir l'espace d'administration /admin.)

  // Année courante dans le pied de page
  document.querySelectorAll('.js-year').forEach(function (el) {
    el.textContent = new Date().getFullYear();
  });

  // Lightbox « Voir l'image » : fenêtre modale accessible (rôle dialog, gestion
  // du focus : déplacé sur « Fermer » à l'ouverture, piégé à l'intérieur, puis
  // rendu au lien d'origine à la fermeture).
  var lightbox = document.getElementById('lightbox');
  if (lightbox) {
    var lightboxImg = document.getElementById('lightbox-img');
    var lightboxClose = lightbox.querySelector('.lightbox-close');
    var declencheur = null;   // lien qui a ouvert la modale, pour lui rendre le focus

    var openLightbox = function (src, alt, source) {
      declencheur = source || null;
      lightboxImg.src = src;
      lightboxImg.alt = alt || '';
      lightbox.classList.add('open');
      lightbox.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
      lightboxClose.focus();
    };
    var closeLightbox = function () {
      lightbox.classList.remove('open');
      lightbox.setAttribute('aria-hidden', 'true');
      lightboxImg.src = '';
      document.body.style.overflow = '';
      if (declencheur) { declencheur.focus(); declencheur = null; }
    };

    document.querySelectorAll('.js-lightbox').forEach(function (link) {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        openLightbox(link.getAttribute('href'), link.getAttribute('data-alt'), link);
      });
    });

    lightboxClose.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', function (e) {
      if (e.target === lightbox) { closeLightbox(); }
    });
    document.addEventListener('keydown', function (e) {
      if (!lightbox.classList.contains('open')) { return; }
      if (e.key === 'Escape') {
        closeLightbox();
      } else if (e.key === 'Tab') {
        // Un seul élément focusable (le bouton Fermer) : on y maintient le focus.
        e.preventDefault();
        lightboxClose.focus();
      }
    });
  }

  // Carrousel d'actualités : cartes portrait côte à côte, défilement horizontal.
  // Les flèches n'apparaissent que si le contenu déborde, et se désactivent aux
  // extrémités.
  document.querySelectorAll('[data-carousel]').forEach(function (carousel) {
    var track = carousel.querySelector('.carousel-track');
    if (!track) { return; }
    var prev = carousel.querySelector('.carousel-prev');
    var next = carousel.querySelector('.carousel-next');

    var pas = function () {
      var slide = track.querySelector('.carousel-slide');
      return slide ? slide.getBoundingClientRect().width + 20 : track.clientWidth * 0.8;
    };
    if (prev) { prev.addEventListener('click', function () { track.scrollBy({ left: -pas(), behavior: 'smooth' }); }); }
    if (next) { next.addEventListener('click', function () { track.scrollBy({ left: pas(), behavior: 'smooth' }); }); }

    var majEtat = function () {
      var max = track.scrollWidth - track.clientWidth - 2;
      if (prev) { prev.disabled = track.scrollLeft <= 0; }
      if (next) { next.disabled = track.scrollLeft >= max; }
    };
    track.addEventListener('scroll', majEtat);
    window.addEventListener('resize', majEtat);
    majEtat();
  });
});
