<?php
/* =============================================================================
 * PAGE — CONTACT — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Contact — Mairie de Gagnières';
$description  = 'Contactez la mairie de Gagnières : coordonnées, horaires d\'ouverture, formulaire de contact et plan d\'accès.';
$active      = 'contact';
$canonical   = 'contact.php';
$pageTitle   = 'Contacter la mairie';
$pageLead    = 'Vous désirez nous poser une question, nous signaler un problème technique dans la commune ou nous contacter pour toute autre raison : n\'hésitez pas !';
$crumbs      = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'Contact']];
require_once __DIR__ . '/partials/icons.php';
ob_start();
?>

    <section class="section">
      <div class="container">
        <div class="grid cols-3" style="margin-bottom: 2.5rem;">
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('phone') ?></span>
            <h3>Par téléphone</h3>
            <ul class="info-list">
              <li><a href="tel:+33466250202">04 66 25 02 02</a></li>
              <li>Urgences mairie : <a href="tel:+33658242030">06 58 24 20 30</a></li>
            </ul>
          </div>
          <div class="card">
            <span class="icon-badge" aria-hidden="true"><?= icon('mail') ?></span>
            <h3>Par e-mail ou courrier</h3>
            <ul class="info-list">
              <li><a href="mailto:mairie.gagnieres@laposte.net">mairie.gagnieres@laposte.net</a></li>
              <li>Mairie de Gagnières<br>Place de la Mairie<br>30160 Gagnières</li>
            </ul>
          </div>
          <div class="card">
            <span class="icon-badge accent" aria-hidden="true"><?= icon('clock') ?></span>
            <h3>Horaires d'ouverture</h3>
            <table class="hours-table">
              <tr><th scope="row">Lundi</th><td>8h–12h · 13h30–17h30</td></tr>
              <tr><th scope="row">Mardi</th><td>8h–12h</td></tr>
              <tr><th scope="row">Mercredi</th><td>9h–12h · 13h30–17h30</td></tr>
              <tr><th scope="row">Jeudi</th><td>8h–12h</td></tr>
              <tr><th scope="row">Vendredi</th><td>8h–12h</td></tr>
            </table>
          </div>
        </div>

        <div class="grid cols-2" style="align-items: start;">
          <div class="card">
            <h2 style="font-size: 1.4rem;">Écrivez-nous</h2>
            <p style="color: var(--ink-soft); font-size: 0.95rem;">Votre message ouvrira votre logiciel de messagerie, prêt à être envoyé à la mairie.</p>
            <form id="contact-form" class="form-grid">
              <div class="row-2">
                <div>
                  <label for="cf-nom">Nom <span class="req">*</span></label>
                  <input type="text" id="cf-nom" name="nom" required autocomplete="name">
                </div>
                <div>
                  <label for="cf-email">E-mail <span class="req">*</span></label>
                  <input type="email" id="cf-email" name="email" required autocomplete="email">
                </div>
              </div>
              <div>
                <label for="cf-sujet">Sujet</label>
                <input type="text" id="cf-sujet" name="sujet">
              </div>
              <div>
                <label for="cf-message">Votre message <span class="req">*</span></label>
                <textarea id="cf-message" name="message" required></textarea>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Envoyer le message</button>
              </div>
              <p class="form-note">Les informations transmises sont utilisées uniquement pour répondre à votre demande, conformément au RGPD. Voir notre <a href="confidentialite.php">politique de confidentialité</a>.</p>
            </form>
          </div>
          <div>
            <div class="map-frame">
              <iframe
                title="Plan d'accès à la mairie de Gagnières"
                src="https://www.openstreetmap.org/export/embed.html?bbox=4.119337%2C44.301526%2C4.139337%2C44.313526&amp;layer=mapnik&amp;marker=44.307526%2C4.129337"
                loading="lazy"></iframe>
            </div>
            <p style="font-size: 0.88rem; color: var(--ink-soft); margin-top: 0.6rem;">
              <a href="https://www.openstreetmap.org/?mlat=44.307526&amp;mlon=4.129337#map=16/44.30753/4.12934" target="_blank" rel="noopener">Afficher la carte en plein écran</a>
            </p>
          </div>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include 'partials/layout.php'; ?>
