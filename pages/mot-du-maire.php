<?php
/* =============================================================================
 * PAGE — LE MOT DU MAIRE — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Le mot du Maire — Mairie de Gagnières';
$description  = 'Le mot de bienvenue du Maire de Gagnières, commune du Gard en Occitanie.';
$active      = 'mot-du-maire';
$canonical   = 'mot-du-maire.php';
$pageTitle   = 'Le mot du Maire';
$crumbs      = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'La Mairie'], ['label' => 'Le mot du Maire']];
require_once __DIR__ . '/../partials/icons.php';
ob_start();
?>

    <section class="section">
      <div class="container">
        <div class="prose">
          <p>Chères Gagniéroises, chers Gagniérois,</p>
          <p><strong>Une nouvelle équipe, un nouveau site internet officiel !</strong></p>
          <p>C'est avec beaucoup de fierté et de sincérité que je m'adresse à vous à travers ce nouveau site officiel, pour vous partager mes réflexions et mes engagements. Ce mandat est un honneur, mais aussi une responsabilité : défendre les intérêts de notre commune et œuvrer pour le bien de tous ses habitants.</p>
          <p>Je suis particulièrement heureux de pouvoir m'appuyer sur une équipe municipale à l'image de notre village : composée d'élus expérimentés et de nouveaux visages, issus d'horizons variés, mais tous animés par la même volonté d'agir pour l'intérêt collectif. Cette diversité est une richesse, elle nourrit nos échanges, renforce nos décisions et nous permet d'avancer avec justesse.</p>
          <p>Depuis notre élection, nous avons engagé un travail de proximité, dans un esprit de dialogue, de transparence et de responsabilité. Nous poursuivons les projets qui améliorent notre cadre de vie, renforcent nos services publics et préservent notre patrimoine.</p>
          <p>Parmi les priorités à venir, nous mettons l'accent sur :</p>
          <ul>
            <li>Offrir aux jeunes de notre commune des opportunités uniques de se développer et de s'impliquer dans des projets stimulants</li>
            <li>Le maintien et l'amélioration de nos équipements et espaces verts</li>
            <li>Le développement de la transition écologique</li>
            <li>Le soutien aux associations et à la vie locale</li>
          </ul>
          <p>Je tiens à remercier l'ensemble des acteurs qui contribuent à la vie de notre commune : enseignants, agents municipaux, bénévoles, parents et habitants. Votre engagement est la force qui nous permet de construire un avenir solide et convivial.</p>
          <p>Avec toute ma considération,</p>
          <p class="signature">Le Maire,<br>Bernard Durand</p>
        </div>

        <hr class="divider">

        <div class="section-head">
          <h2>Aller plus loin</h2>
        </div>

        <div class="grid cols-2">
          <a class="card" href="conseil-municipal.php">
            <span class="icon-badge" aria-hidden="true"><?= icon('users') ?></span>
            <h3>Le Conseil municipal</h3>
            <p>Découvrez l'équipe des élus et leurs délégations.</p>
            <span class="card-link">Voir la page <?= icon('arrow-right', 'icon') ?></span>
          </a>
          <a class="card" href="services-municipaux.php">
            <span class="icon-badge" aria-hidden="true"><?= icon('landmark') ?></span>
            <h3>Les services municipaux</h3>
            <p>Les équipes au service des habitants au quotidien.</p>
            <span class="card-link">Voir la page <?= icon('arrow-right', 'icon') ?></span>
          </a>
        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include __DIR__ . '/../partials/layout.php'; ?>
