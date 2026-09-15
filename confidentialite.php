<?php
/* =============================================================================
 * PAGE — POLITIQUE DE CONFIDENTIALITÉ / RGPD — MAIRIE DE GAGNIÈRES
 * ========================================================================== */
$title       = 'Politique de confidentialité — Mairie de Gagnières';
$description  = 'Politique de confidentialité et protection des données personnelles (RGPD) du site de la mairie de Gagnières.';
$active      = '';
$canonical   = 'confidentialite.php';
$robots      = 'noindex, follow';
$pageTitle   = 'Politique de confidentialité';
$pageLead    = 'Protection de vos données personnelles (RGPD).';
$crumbs      = [['label' => 'Accueil', 'url' => 'index.php'], ['label' => 'Politique de confidentialité']];
require_once __DIR__ . '/partials/icons.php';
ob_start();
?>

    <section class="section">
      <div class="container">
        <div class="prose">

          <h2>Responsable du traitement</h2>
          <p>Le responsable du traitement des données personnelles collectées sur ce site est la <?= $mairie['commune'] ?> (<?= $mairie['adresse'] ?>, <?= $mairie['code_postal'] ?> <?= $mairie['ville'] ?>). Conformément au Règlement général sur la protection des données (RGPD) et à la loi n° 78-17 du 6 janvier 1978 « Informatique et Libertés », la commune a désigné un Délégué à la Protection des Données (DPO) et tient un registre de ses traitements.</p>

          <h2>Données collectées et finalité</h2>
          <p>Les seules données personnelles traitées sont celles que vous transmettez volontairement via le formulaire de contact : votre nom, votre adresse e-mail et le contenu de votre message. Elles servent uniquement à recevoir votre demande et à y répondre.</p>

          <h2>Base légale</h2>
          <p>Le traitement repose sur votre consentement, matérialisé par l'envoi volontaire de votre message, ainsi que sur l'exécution des missions d'intérêt public de la commune.</p>

          <h2>Destinataires des données</h2>
          <p>Vos données sont destinées aux seuls services de la mairie chargés de traiter votre demande. Elles ne sont ni vendues ni cédées à des tiers, et ne peuvent être communiquées qu'à une autorité judiciaire ou administrative légalement habilitée à en faire la demande. Le cas échéant, tout prestataire technique intervenant pour la commune est soumis à une obligation de confidentialité.</p>

          <h2>Durée de conservation</h2>
          <p>Vos données sont conservées le temps nécessaire au traitement de votre demande, sans excéder un an à compter de notre dernier échange.</p>

          <h2>Sécurité</h2>
          <p>La commune met en œuvre des mesures techniques et organisationnelles adaptées afin de protéger vos données contre la perte, l'altération ou l'accès non autorisé. L'accès aux données est limité aux personnes qui en ont besoin dans le cadre de leurs missions.</p>

          <h2>Vos droits</h2>
          <p>Vous disposez, sur les données vous concernant, des droits suivants : droit d'accès, de rectification, d'effacement, de limitation du traitement, d'opposition, de portabilité, ainsi que le droit de définir des directives relatives à leur sort après votre décès.</p>

          <h2>Exercer vos droits</h2>
          <p>Pour exercer ces droits, contactez la mairie :</p>
          <ul>
            <li>par e-mail : <a href="mailto:<?= $mairie['email'] ?>"><?= $mairie['email'] ?></a> ;</li>
            <li>par courrier : Délégué à la Protection des Données — <?= $mairie['nom'] ?>, <?= $mairie['adresse'] ?>, <?= $mairie['code_postal'] ?> <?= $mairie['ville'] ?>.</li>
          </ul>
          <p>Une preuve d'identité pourra vous être demandée, et une réponse vous sera apportée dans les meilleurs délais.</p>

          <h2>Réclamation</h2>
          <p>Si, après nous avoir contactés, vous estimez que vos droits ne sont pas respectés, vous pouvez adresser une réclamation à la CNIL — 3 place de Fontenoy, TSA 80715, 75334 Paris Cedex 07 — <a href="https://www.cnil.fr" target="_blank" rel="noopener">cnil.fr</a>.</p>

          <h2>Cookies</h2>
          <p>Ce site n'utilise aucun cookie de suivi ni outil de mesure d'audience. Seules les polices de caractères sont chargées depuis un service tiers (Google Fonts).</p>

          <h2>Réseaux sociaux</h2>
          <p>Les liens vers Facebook et Instagram présents sur le site sont de simples liens : aucune donnée n'est transmise à ces plateformes tant que vous ne cliquez pas volontairement pour vous y rendre. Une fois sur ces réseaux, leurs propres règles de confidentialité s'appliquent.</p>

        </div>
      </div>
    </section>

<?php $content = ob_get_clean(); include 'partials/layout.php'; ?>
