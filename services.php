<?php
/* =============================================================================
 * PAGE — VIE PRATIQUE & SERVICES — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Vie pratique & services — Mairie de Gagnières';
$description  = 'Tous les services utiles à Gagnières : école, centre de loisirs, bibliothèque, santé, déchets, transports, urbanisme, poste, tourisme.';
$active      = 'services';
$canonical   = 'services.php';
$pageTitle   = 'Vie pratique & services';
$pageLead    = 'École, santé, déchets, transports, tourisme… retrouvez tous les services utiles au quotidien à Gagnières et aux alentours.';
$crumbs      = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'Vie pratique']];
require_once __DIR__ . '/partials/icons.php';
ob_start();
?>

    <!-- =================== Enfance & éducation =================== -->
    <section class="section">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Enfance &amp; éducation</span>
          <h2>Grandir à Gagnières</h2>
        </div>
        <div class="grid cols-2">
          <div class="card" id="ecole">
            <span class="icon-badge" aria-hidden="true"><?= icon('school') ?></span>
            <h3>École de Gagnières</h3>
            <p>Cantine municipale tous les jours pendant la période scolaire. Accueil municipal (garderie) chaque jour d'école : le matin de 7h30 à 8h30 et le soir de 16h30 à 18h00.</p>
            <ul class="info-list">
              <li><?= icon('phone', 'icon') ?> École : <a href="tel:+33466251375">04 66 25 13 75</a></li>
              <li><?= icon('phone', 'icon') ?> Cantine &amp; garderie : <a href="tel:+33750545034">07 50 54 50 34</a></li>
            </ul>
          </div>
          <div class="card" id="centre-de-loisirs">
            <span class="icon-badge accent" aria-hidden="true"><?= icon('smile') ?></span>
            <h3>Centre de loisirs « Accès pour tous »</h3>
            <p>Accueil des enfants à partir de 3 ans le mercredi et pendant les vacances scolaires (sauf vacances de Noël). Une navette est mise en place le mercredi entre Gagnières et Meyrannes.</p>
            <ul class="info-list">
              <li><?= icon('map-pin', 'icon') ?> 172 rue de Royal, 30410 Meyrannes</li>
              <li><?= icon('phone', 'icon') ?> <a href="tel:+33963292188">09 63 29 21 88</a></li>
              <li><?= icon('mail', 'icon') ?> <a href="mailto:valerie-accespourtous@orange.fr">valerie-accespourtous@orange.fr</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- =================== Culture & patrimoine =================== -->
    <section class="section tint">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Culture &amp; patrimoine</span>
          <h2>Se cultiver, découvrir</h2>
        </div>
        <div class="grid cols-2">
          <div class="card" id="bibliotheque">
            <span class="icon-badge" aria-hidden="true"><?= icon('book') ?></span>
            <h3>Bibliothèque municipale &amp; pôle informatique</h3>
            <p>Accès aux ressources documentaires et aux outils informatiques pour tous. Les modifications exceptionnelles d'horaires sont annoncées sur la page Facebook de la bibliothèque.</p>
            <ul class="info-list">
              <li><?= icon('map-pin', 'icon') ?> 9 rue de l'Église, 30160 Gagnières</li>
              <li><?= icon('phone', 'icon') ?> <a href="tel:+33448213276">04 48 21 32 76</a></li>
              <li><?= icon('clock', 'icon') ?> Lundi 14h30–18h · Mercredi 9h–12h · Jeudi 16h30–18h30 · Vendredi 14h–17h30</li>
            </ul>
          </div>
          <div class="card" id="musee-de-la-mine">
            <span class="icon-badge accent" aria-hidden="true"><?= icon('museum') ?></span>
            <h3>Musée de la Mine</h3>
            <p>Galerie historique et culturelle « Gagnières du Temps des Mines à Aujourd'hui ». Entrée gratuite. Ouvert pendant les vacances scolaires : mardi, mercredi, jeudi, samedi et dimanche de 15h à 18h, et sur rendez-vous.</p>
            <ul class="info-list">
              <li><?= icon('map-pin', 'icon') ?> 52 rue de l'Église, 30160 Gagnières</li>
              <li><?= icon('phone', 'icon') ?> <a href="tel:+33782131521">07 82 13 15 21</a></li>
              <li><?= icon('mail', 'icon') ?> <a href="mailto:gtma@orange.fr">gtma@orange.fr</a></li>
              <li><?= icon('globe', 'icon') ?> <a href="https://museeminegagnieres.fr" target="_blank" rel="noopener">museeminegagnieres.fr</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- =================== Santé & solidarité =================== -->
    <section class="section">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Santé &amp; solidarité</span>
          <h2>Prendre soin de chacun</h2>
        </div>
        <div class="grid cols-3">
          <div class="card" id="services-medicaux" style="grid-column: 1 / -1;">
            <span class="icon-badge" aria-hidden="true"><?= icon('heart') ?></span>
            <h3>Services médicaux</h3>
            <div class="med-grid">

              <!-- Médecin -->
              <div class="med-tile">
                <h4>Médecin généraliste <span class="med-loc">Gagnières</span></h4>
                <div class="med-entry">
                  <p class="med-who">Dr Benoît Debeire</p>
                  <p class="med-line"><?= icon('map-pin') ?> 9 rue de l'Église, 30160 Gagnières</p>
                  <p class="med-line"><?= icon('phone') ?> <a href="tel:+33448212182">04 48 21 21 82</a></p>
                </div>
              </div>

              <!-- Kinésithérapeute -->
              <div class="med-tile">
                <h4>Kinésithérapeute <span class="med-loc">Gagnières</span></h4>
                <div class="med-entry">
                  <p class="med-who">Pascal Champetier</p>
                  <p class="med-line"><?= icon('map-pin') ?> 302 rue de la Cave Coopérative, 30160 Gagnières</p>
                  <p class="med-line"><?= icon('phone') ?> <a href="tel:+33466252805">04 66 25 28 05</a></p>
                </div>
              </div>

              <!-- Dentiste -->
              <div class="med-tile">
                <h4>Dentiste <span class="med-loc">Bessèges</span></h4>
                <div class="med-entry">
                  <p class="med-who">Mme Soler</p>
                  <p class="med-line"><?= icon('phone') ?> <a href="tel:+33466250289">04 66 25 02 89</a></p>
                </div>
              </div>

              <!-- Infirmières (Gagnières + Bessèges) -->
              <div class="med-tile">
                <h4>Infirmières</h4>
                <div class="med-entry">
                  <p class="med-who">Mme Valérie Constant <span class="med-loc">Gagnières</span></p>
                  <p class="med-who">Mme Hélène Gautier</p>
                  <p class="med-line"><?= icon('map-pin') ?> 4 chemin de la Paix, 30160 Gagnières</p>
                  <p class="med-line"><?= icon('phone') ?> <a href="tel:+33612217793">06 12 21 77 93</a></p>
                </div>
                <div class="med-entry">
                  <p class="med-who">Mme Delenne <span class="med-loc">Bessèges</span></p>
                  <p class="med-line"><?= icon('phone') ?> <a href="tel:+33466251100">04 66 25 11 00</a></p>
                </div>
                <div class="med-entry">
                  <p class="med-who">Mme Lyczak <span class="med-loc">Bessèges</span></p>
                  <p class="med-line"><?= icon('phone') ?> <a href="tel:+33466250710">04 66 25 07 10</a></p>
                </div>
              </div>

              <!-- Centre médico-social — Bessèges -->
              <div class="med-tile">
                <h4>CMS de Bessèges</h4>
                <div class="med-entry">
                  <p class="med-line"><?= icon('map-pin') ?> Rue du Docteur Paul Vermale, 30160 Bessèges</p>
                  <p class="med-line"><?= icon('phone') ?> <a href="tel:+33466250024">04 66 25 00 24</a></p>
                  <p class="med-line"><?= icon('clock') ?> Mardi, mercredi et jeudi</p>
                </div>
              </div>

              <!-- Centre médico-social — Saint-Ambroix -->
              <div class="med-tile">
                <h4>CMS de Saint-Ambroix</h4>
                <div class="med-entry">
                  <p class="med-line"><?= icon('map-pin') ?> Boulevard du Nord, 30500 Saint-Ambroix</p>
                  <p class="med-line"><?= icon('phone') ?> <a href="tel:+33466240107">04 66 24 01 07</a></p>
                  <p class="med-line"><?= icon('clock') ?> Tous les jours sauf lundi matin</p>
                </div>
              </div>

            </div>
          </div>
          <div class="card" id="pole-actions-sociales">
            <span class="icon-badge" aria-hidden="true"><?= icon('users') ?></span>
            <h3>Pôle actions sociales</h3>
            <p>Actions en direction du 3<sup>e</sup> âge et accompagnement social. Permanence le mercredi matin de 10h à 12h en mairie.</p>
            <ul class="info-list">
              <li><?= icon('phone', 'icon') ?> <a href="tel:+33466250202">04 66 25 02 02</a></li>
            </ul>
          </div>
          <div class="card" id="portage-medicaments">
            <span class="icon-badge accent" aria-hidden="true"><?= icon('medkit') ?></span>
            <h3>Portage des médicaments</h3>
            <p>Un service de la commune pour faire livrer vos médicaments à domicile. Renseignements auprès de la mairie.</p>
            <ul class="info-list">
              <li><?= icon('clock', 'icon') ?> Lundi, mercredi et vendredi</li>
              <li><?= icon('phone', 'icon') ?> N° d'appel : <a href="tel:+33466250202">04 66 25 02 02</a></li>
            </ul>
          </div>
          <div class="card" id="service-public">
            <span class="icon-badge" aria-hidden="true"><?= icon('landmark') ?></span>
            <h3>Service Public</h3>
            <p>Toutes vos démarches administratives officielles : papiers, famille, logement, travail, retraite…</p>
            <ul class="info-list">
              <li><?= icon('globe', 'icon') ?> <a href="https://www.service-public.gouv.fr/" target="_blank" rel="noopener">service-public.fr</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- =================== Vie quotidienne =================== -->
    <section class="section tint">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Vie quotidienne</span>
          <h2>Les services du quotidien</h2>
        </div>
        <div class="grid cols-2">
          <div class="card" id="agence-postale">
            <span class="icon-badge" aria-hidden="true"><?= icon('mail') ?></span>
            <h3>Agence postale communale</h3>
            <p>Courrier, colis et services postaux de proximité. Levée du courrier du lundi au vendredi à 15h, le samedi à 11h.</p>
            <ul class="info-list">
              <li><?= icon('clock', 'icon') ?> Lundi, mardi, mercredi, vendredi : 9h–12h · Mercredi après-midi : 13h30–16h30</li>
              <li><?= icon('map-pin', 'icon') ?> Place de la Mairie, 30160 Gagnières</li>
              <li><?= icon('globe', 'icon') ?> <a href="https://www.laposte.fr" target="_blank" rel="noopener">laposte.fr</a> — Courrier 3631 · Pro 3634 · Banque Postale 3639</li>
            </ul>
          </div>
          <div class="card" id="dechets">
            <span class="icon-badge accent" aria-hidden="true"><?= icon('trash') ?></span>
            <h3>Déchets ménagers</h3>
            <p>Collecte des ordures ménagères le <strong>lundi et le jeudi</strong>. Encombrants : les 2<sup>e</sup> et 4<sup>e</sup> mercredis du mois à partir de 8h, sur inscription au <a href="tel:+33466613293">04 66 61 32 93</a> (jusqu'à la veille à midi).</p>
            <ul class="info-list">
              <li><?= icon('map-pin', 'icon') ?> Tri sélectif : stade municipal, rue de la Gare, rue de la Rivière, place de la Mairie</li>
              <li><?= icon('map-pin', 'icon') ?> Déchetterie : ZI de Conroc, Bessèges — du lundi au samedi, 8h30–12h / 14h–17h (justificatif de domicile demandé)</li>
            </ul>
          </div>
          <div class="card" id="transports">
            <span class="icon-badge" aria-hidden="true"><?= icon('bus') ?></span>
            <h3>Transports en commun Alès'y</h3>
            <p>Le réseau de transports en commun dessert Gagnières et le bassin alésien.</p>
            <ul class="info-list">
              <li><?= icon('map-pin', 'icon') ?> Agence Alès'y — Gare routière, 15 avenue du Général de Gaulle, 30100 Alès</li>
              <li><?= icon('phone', 'icon') ?> <a href="tel:+33466523131">04 66 52 31 31</a></li>
              <li><?= icon('clock', 'icon') ?> Période scolaire : lun–ven 7h30–12h30 / 13h30–18h30 · Vacances : lun–ven 8h45–12h / 13h45–17h15</li>
              <li><?= icon('globe', 'icon') ?> <a href="https://www.alesy.fr" target="_blank" rel="noopener">alesy.fr</a></li>
            </ul>
          </div>
          <div class="card" id="urbanisme">
            <span class="icon-badge accent" aria-hidden="true"><?= icon('grid') ?></span>
            <h3>Urbanisme</h3>
            <p>Le service urbanisme accompagne particuliers et professionnels dans leurs projets de travaux : permis de construire, déclarations préalables, certificats d'urbanisme, permis d'aménager. Il précise le cadre réglementaire applicable aux différents secteurs de la commune.</p>
            <ul class="info-list">
              <li><?= icon('file', 'icon') ?> Plan Local d'Urbanisme (PLU) : règlement et cartes consultables en mairie</li>
              <li><?= icon('phone', 'icon') ?> <a href="tel:+33466250202">04 66 25 02 02</a> · <a href="mailto:mairie.gagnieres@laposte.net">mairie.gagnieres@laposte.net</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- =================== Administrations & sécurité =================== -->
    <section class="section">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Administrations &amp; sécurité</span>
          <h2>Les services de l'État à proximité</h2>
        </div>
        <div class="grid cols-2">
          <div class="card" id="gendarmerie">
            <span class="icon-badge" aria-hidden="true"><?= icon('shield') ?></span>
            <h3>Gendarmerie nationale</h3>
            <p>Brigade de Saint-Ambroix. En cas d'urgence, composez le 17.</p>
            <ul class="info-list">
              <li><?= icon('map-pin', 'icon') ?> Route d'Uzès, 30500 Saint-Ambroix</li>
              <li><?= icon('phone', 'icon') ?> <a href="tel:+33466240040">04 66 24 00 40</a></li>
              <li><?= icon('clock', 'icon') ?> Lundi, mercredi, vendredi : 8h–12h / 14h–18h</li>
            </ul>
          </div>
          <div class="card" id="tresor-public">
            <span class="icon-badge" aria-hidden="true"><?= icon('landmark') ?></span>
            <h3>Trésor public</h3>
            <p>Service de gestion comptable de Saint-Privat-des-Vieux (près d'Alès) pour vos impôts et paiements publics.</p>
            <ul class="info-list">
              <li><?= icon('map-pin', 'icon') ?> 11 chemin des Espinaux, 30340 Saint-Privat-des-Vieux</li>
              <li><?= icon('phone', 'icon') ?> <a href="tel:+33466784545">04 66 78 45 45</a></li>
              <li><?= icon('clock', 'icon') ?> Du lundi au vendredi : 8h30–12h30</li>
              <li><?= icon('globe', 'icon') ?> <a href="https://lannuaire.service-public.gouv.fr/occitanie/gard/9da96090-630b-4085-a9ac-8c782db51b94" target="_blank" rel="noopener">Fiche officielle service-public.gouv.fr</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- =================== Tourisme =================== -->
    <section class="section tint">
      <div class="container">
        <div class="section-head">
          <span class="kicker">Tourisme</span>
          <h2>Préparer votre séjour</h2>
        </div>
        <div class="grid cols-2">
          <div class="card" id="ot-ceze-cevennes">
            <span class="icon-badge accent" aria-hidden="true"><?= icon('globe') ?></span>
            <h3>Office de Tourisme Cèze Cévennes</h3>
            <p>Randonnées, rivières, patrimoine et hébergements entre Ardèche et Provence.</p>
            <ul class="info-list">
              <li><?= icon('globe', 'icon') ?> <a href="https://www.tourisme-ceze-cevennes.com/" target="_blank" rel="noopener">tourisme-ceze-cevennes.com</a></li>
            </ul>
          </div>
          <div class="card" id="ot-mont-lozere">
            <span class="icon-badge accent" aria-hidden="true"><?= icon('mountain') ?></span>
            <h3>Office du Tourisme du Mont Lozère</h3>
            <p>Découvrez le Mont Lozère et les Cévennes : activités de pleine nature, villages et grands espaces.</p>
            <ul class="info-list">
              <li><?= icon('phone', 'icon') ?> Renseignements en mairie : <a href="tel:+33466250202">04 66 25 02 02</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include 'partials/layout.php'; ?>
