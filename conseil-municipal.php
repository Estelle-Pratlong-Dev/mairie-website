<?php
/* =============================================================================
 * PAGE — LE CONSEIL MUNICIPAL — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Le Conseil municipal — Mairie de Gagnières';
$description  = 'Composition du Conseil municipal de Gagnières : maire, adjoints, conseillers délégués et conseillers municipaux.';
$active      = 'conseil';
$canonical   = 'conseil-municipal.php';
require_once __DIR__ . '/partials/icons.php';
ob_start();
?>


    <section class="page-hero">
      <div class="container">
        <p class="crumbs"><a href="index.php">Accueil</a> › La Mairie › Le Conseil municipal</p>
        <h1>Le Conseil municipal</h1>
        <p class="lead">Quinze élus au service de la commune et de ses habitants.</p>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section-head">
          <span class="kicker">L'exécutif</span>
          <h2>Le Maire et les adjoints</h2>
        </div>
        <div class="grid cols-2" style="margin-bottom: 1.2rem;">
          <div class="person lead-person">
            <span class="avatar" aria-hidden="true">BD</span>
            <div>
              <h3>Bernard Durand</h3>
              <p>Maire de Gagnières</p>
            </div>
          </div>
        </div>
        <div class="grid cols-2">
          <div class="person">
            <span class="avatar" aria-hidden="true">JB</span>
            <div>
              <h3>Jean-Louis Bay</h3>
              <p>1<sup>er</sup> adjoint — Administration générale</p>
            </div>
          </div>
          <div class="person">
            <span class="avatar" aria-hidden="true">AB</span>
            <div>
              <h3>Adeline Benyus</h3>
              <p>2<sup>e</sup> adjointe — Éducation, jeunesse</p>
            </div>
          </div>
          <div class="person">
            <span class="avatar" aria-hidden="true">MV</span>
            <div>
              <h3>Marc Volpilière</h3>
              <p>3<sup>e</sup> adjoint — Social, santé</p>
            </div>
          </div>
          <div class="person">
            <span class="avatar" aria-hidden="true">CH</span>
            <div>
              <h3>Corine Heinrich</h3>
              <p>4<sup>e</sup> adjointe — Administration organisationnelle</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section tint">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Délégations</span>
          <h2>Les conseillers délégués</h2>
        </div>
        <div class="grid cols-3">
          <div class="person">
            <span class="avatar" aria-hidden="true">RG</span>
            <div>
              <h3>Rémy Gruszecki</h3>
              <p>Travaux</p>
            </div>
          </div>
          <div class="person">
            <span class="avatar" aria-hidden="true">AL</span>
            <div>
              <h3>Anaïs Lambray</h3>
              <p>Jeunesse, animations &amp; festivités</p>
            </div>
          </div>
          <div class="person">
            <span class="avatar" aria-hidden="true">AN</span>
            <div>
              <h3>Anthony Nal</h3>
              <p>Urbanisme</p>
            </div>
          </div>
          <div class="person">
            <span class="avatar" aria-hidden="true">MA</span>
            <div>
              <h3>Mélanie Angleviel</h3>
              <p>Finances, budget</p>
            </div>
          </div>
          <div class="person">
            <span class="avatar" aria-hidden="true">EP</span>
            <div>
              <h3>Estelle Pratlong</h3>
              <p>Citoyenneté, communication</p>
            </div>
          </div>
          <div class="person">
            <span class="avatar" aria-hidden="true">SV</span>
            <div>
              <h3>Sylvia Vialle</h3>
              <p>Handicap</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Le conseil</span>
          <h2>Les conseillers municipaux</h2>
        </div>
        <div class="grid cols-2">
          <div class="person">
            <span class="avatar" aria-hidden="true">OM</span>
            <div>
              <h3>Olivier Martin</h3>
              <p>Président de la Communauté de communes Cèze Cévennes</p>
            </div>
          </div>
          <div class="person">
            <span class="avatar" aria-hidden="true">TD</span>
            <div>
              <h3>Thibaud Dutrey</h3>
              <p>Conseiller municipal</p>
            </div>
          </div>
          <div class="person">
            <span class="avatar" aria-hidden="true">CR</span>
            <div>
              <h3>Christian Richard</h3>
              <p>Conseiller municipal</p>
            </div>
          </div>
          <div class="person">
            <span class="avatar" aria-hidden="true">LB</span>
            <div>
              <h3>Linda Beraud</h3>
              <p>Conseillère municipale</p>
            </div>
          </div>
        </div>

        <hr class="divider">

        <div class="card">
          <h3>Organisation du conseil</h3>
          <p>Le conseil municipal est organisé en cinq pôles municipaux dotés de rapporteurs désignés : administration générale, travaux et environnement, jeunesse et éducation, actions sociales, animations culturelles. Les élus assurent également de nombreuses représentations intercommunales auprès des syndicats et structures partenaires de la commune.</p>
          <p style="margin-top: 0.8rem;"><a href="https://drive.google.com/drive/folders/1ZCCwGFGB4mOFakg4UJP83ixNdLljqL6E" target="_blank" rel="noopener">Consulter les comptes rendus du Conseil municipal →</a></p>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include 'partials/layout.php'; ?>
