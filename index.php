<?php
session_start();


require_once './config/db.php';
require_once './config/config.php';
require_once './includes/constantes.php';


$pdo = PdoBdd();



$stmtRecents = $pdo->query("SELECT * FROM signalements ORDER BY date_creation DESC LIMIT 4");
$signalements_recents = $stmtRecents->fetchAll();

$stmtCountCategoriesRoute = $pdo->prepare("SELECT COUNT(*) as count FROM signalements WHERE categorie = 'route'");
$stmtCountCategoriesRoute->execute();
$categories_route_count = $stmtCountCategoriesRoute->fetchAll();

$countRoute = $categories_route_count[0]['count'] ?? 0;


$stmtCountCategoriesInondation = $pdo->prepare("SELECT COUNT(*) as count FROM signalements WHERE categorie = 'inondation'");
$stmtCountCategoriesInondation->execute();
$categories_inondation_count = $stmtCountCategoriesInondation->fetchAll();

$countInondation = $categories_inondation_count[0]['count'] ?? 0;


$stmtCountCategoriesDechets = $pdo->prepare("SELECT COUNT(*) as count FROM signalements WHERE categorie = 'dechets'");
$stmtCountCategoriesDechets->execute();
$categories_dechets_count = $stmtCountCategoriesDechets->fetchAll();

$countDechets = $categories_dechets_count[0]['count'] ?? 0;


$stmtCountCategoriesCaniveau = $pdo->prepare("SELECT COUNT(*) as count FROM signalements WHERE categorie = 'caniveau'");
$stmtCountCategoriesCaniveau->execute();
$categories_caniveau_count = $stmtCountCategoriesCaniveau->fetchAll();

$countCaniveau = $categories_caniveau_count[0]['count'] ?? 0;


$stmtCountCategoriesAutre = $pdo->prepare("SELECT COUNT(*) as count FROM signalements WHERE categorie = 'autre'");
$stmtCountCategoriesAutre->execute();
$categories_autre_count = $stmtCountCategoriesAutre->fetchAll();

$countAutre = $categories_autre_count[0]['count'] ?? 0;

$countRoutePourcentage = $countRoute > 0 ? ($countRoute / ($countRoute + $countInondation + $countDechets + $countCaniveau + $countAutre)) * 100 : 0;
$countInondationPourcentage = $countInondation > 0 ? ($countInondation / ($countRoute + $countInondation + $countDechets + $countCaniveau + $countAutre)) * 100 : 0;
$countDechetsPourcentage = $countDechets > 0 ? ($countDechets / ($countRoute + $countInondation + $countDechets + $countCaniveau + $countAutre)) * 100 : 0;
$countCaniveauPourcentage = $countCaniveau > 0 ? ($countCaniveau / ($countRoute + $countInondation + $countDechets + $countCaniveau + $countAutre)) * 100 : 0;
$countAutrePourcentage = $countAutre > 0 ? ($countAutre / ($countRoute + $countInondation + $countDechets + $countCaniveau + $countAutre)) * 100 : 0;


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/citywatch/assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.31.0/dist/tabler-icons.min.css">
    <title>Document</title>
</head>
<body>

<?php require_once 'includes/header.php' ?>


<div class="hero-section">
    <div class="hero-section-left">
        <div class="hero-section-left-text-haut">
            <div class="hero-section-left-text-haut-tiret"></div>
            <p class="hero-section-left-text-haut-description">PLATEFORME CITOYENNE &middot; TEMPS REEL</p>
        </div>

        <div class="hero-section-left-text-centre">
            <div class="hero-section-left-text-centre-title">
                <h1>La ville <br> qui <span>écoute</span> <br> enfin.</h1>
            </div>

            <div class="hero-section-left-text-centre-paragraphe">
                <p>Signalez un danger, 
                   suivez les interventions. <br> CityWatch La plateforme relie les citoyens et les autorités 
                   instantanément.</p>
            </div>
            

        </div>

        <div class="hero-section-left-buttons">
            <a href="#" class="hero-section-left-button">Voir la carte</a>
            <a href="#" class="hero-section-left-button">Faire un signalement</a>

        </div>

        <?php if(isset($_SESSION['user_id'])): ?>
            <div class="link-mes-signalements">
                <a href="<?= SITE_URL ?>/mon_profil.php" >
                    <i class="ti ti-alert-triangle"></i>
                    Mes signalements
                </a>
            </div>
        <?php endif; ?>

        <div class="hero-section-left-stats">
            <div>
                <h4>1000+</h4>
                <p>Alertes ce mois-ci</p>
            </div>
            <div>
                <h4>94%</h4>
                <p>Alertes traitées en 48h</p>

            </div>
            <div>
                <h4>5000+</h4>
                <p>citoyens actifs</p>
                
            </div>
        </div>

        

    </div>

    <div class="hero-section-right">
        <div class="accueil-recents">
            <div class="accueil-recents-entete">
                <h3>Signalements récents</h3>
            </div>

            <div class="accueil-recents-liste">

                <?php if(empty($signalements_recents)): ?>
                    <div class="accueil-recents-vide">
                        <i class="ti ti-alert-circle"></i>
                        <p>Aucun signalement pour l'instant</p>
                    </div>
                <?php else: ?>
                    <?php foreach($signalements_recents as $s): ?>
                    <?php $classe_cat = $couleurs_categories[$s['categorie']]; ?>
                    <div class="accueil-recents-card">
                        <div class="accueil-recents-card-haut">
                            <span class="accueil-recents-card-badge <?= $classe_cat ?>">
                                <?= htmlspecialchars($s['categorie']) ?>
                            </span>
                            <span class="accueil-recents-card-temps">
                                <?= tempsEcoule($s['date_creation']) ?>
                            </span>
                        </div>
                        <p class="accueil-recents-card-description">
                            <?= htmlspecialchars(substr($s['description'], 0, 80)) ?>...
                        </p>
                        <div class="accueil-recents-card-bas">
                            <div class="accueil-recents-card-localisation">
                                <i class="ti ti-map-pin"></i>
                                <span>Kinshasa</span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>

            <a href="<?= isset($_SESSION['user_id']) ? SITE_URL . '/alerte.php' : SITE_URL . '/connexion.php' ?>" 
            class="accueil-recents-voir-plus">
                Voir tous les signalements
                <i class="ti ti-arrow-right"></i>
            </a>
        </div>

    </div>
</div>

<div class="Acceuil-cards">
    <div>
        <p>01</p>
        <i class="ti ti-map-2"></i>
        <h4>Carte en direct</h4>
        <p>Toutes les alertes visibles sur une carte interactive.</p>
    </div>
    <div>
        <p>02</p>
        <i class="ti ti-thumb-up"></i>
        <h4>Vote citoyen</h4>
        <p>Les habitants confirment les alertes. Plus de votes sur une = priorité plus haute.</p>

    </div>
    <div>
        <p>03</p>
        <i class="ti ti-camera-up"></i>
        <h4>Photo + GPS auto</h4>
        <p>Un clic, une photo. La position est capturée automatiquement.</p>

    </div>
    <div>
        <p>04</p>
        <i class="ti ti-shield-check"></i>
        <h4>Dashboard autorités</h4>
        <p>Les autorités voient les urgences triées et peuvent répondre.</p>

    </div>
</div>

<div class="acceuil-alertes-categories">
    <div class="acceuil-alertes-categories-content">

        <div class="acceuil-alertes-categories-description">
            <h3>Alertes par catégorie</h3>
            <p>Ce mois-ci</p>
        </div>

        <div class="acceuil-alertes-categories-categories">
            <div>
                <p>Route endommagée</p>
                <div class="acceuil-alertes-categories-bar">
                    <div style="width: <?= $countRoutePourcentage ? $countRoutePourcentage : 0 ?>%" class="<?= $couleurs_categories['route'] ?? '' ?>"></div>
                </div>
                <p class="acceuil-alertes-categories-count"><?= $countRoute ?></p>
            </div>

            <div>
                <p>Inondation</p>
                <div class="acceuil-alertes-categories-bar">
                    <div style="width: <?= $countInondationPourcentage ? $countInondationPourcentage : 0 ?>%" class="<?= $couleurs_categories['inondation'] ?? '' ?>"></div>
                </div>
                <p class="acceuil-alertes-categories-count"><?= $countInondation ?></p>
            </div>
            <div>
                <p>Déchets</p>
                <div class="acceuil-alertes-categories-bar">
                    <div style="width: <?= $countDechetsPourcentage ? $countDechetsPourcentage : 0 ?>%" class="<?= $couleurs_categories['dechets'] ?? '' ?>"></div> 
                </div>
                <p class="acceuil-alertes-categories-count"><?= $countDechets ?></p>
            </div>
            <div>
                <p>Caniveau bouché</p>
                <div class="acceuil-alertes-categories-bar">
                    <div style="width: <?= $countCaniveauPourcentage ? $countCaniveauPourcentage : 0 ?>%" class="<?= $couleurs_categories['caniveau'] ?? '' ?>"></div>
                </div>
                <p class="acceuil-alertes-categories-count"><?= $countCaniveau ?></p>
            </div>
            <div>
                <p>Autre</p>
                <div class="acceuil-alertes-categories-bar">
                    <div style="width: <?= $countAutrePourcentage ? $countAutrePourcentage : 0 ?>%" class="<?= $couleurs_categories['autre'] ?? '' ?>"></div>
                </div>
                <p class="acceuil-alertes-categories-count"><?= $countAutre ?></p>
            </div>
        </div>

    </div>
    

</div>

<div class="acceuil-register">
    <div class="acceuil-register-description">
        <h3>Votre ville a besoin de vous </h3>
        <p>Rejoignez plus de 5 600 citoyens qui contribuent à rendre leur ville plus sûre chaque jour.</p>
    </div>
    <a href="<?= SITE_URL ?>/inscription.php" class="acceuil-register-button">Créer un compte </a>
</div>





<?php require_once 'includes/footer.php' ?>

<script src="./assets/js/main.js"></script>    
</body>
</html>