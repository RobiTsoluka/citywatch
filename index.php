<?php
session_start();

require_once "config/config.php"; 





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

<?php require_once "includes/header.php" ?>
<div class="profil_container" style="margin-top: 100px;">
    <div class="titre" >
        <p>
            <?php 
            
                echo strtoupper(
                    
                    "bonjour" . " " . $_SESSION['user_nom'] . 
                    (isset($_SESSION['user_prenom']) ? $_SESSION['user_prenom'] : '') 

                    ) 
                
            ?>
        </p>
    </div>
            
</div>




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
                <p>Signalez un danger, confirmez une alerte, 
                   suivez les interventions. <br> CityWatch relie les citoyens et les autorités 
                   instantanément.</p>
            </div>
            
            


        </div>

        <div class="hero-section-left-buttons">
            <a href="#" class="hero-section-left-button">Voir la carte</a>
            <a href="#" class="hero-section-left-button">Faire un signalement</a>

        </div>

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
        <div>
            

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
    <div class="acceuil-alertes-categories-description">
        <h3>Alertes par catégorie</h3>
        <p>Ce mois-ci</p>
    </div>

    <div class="acceuil-alertes-categories-categories">
        <div>
            <p>Route endommagée</p>
        </div>
        <div>
            <p></p>
        </div>
        <div>
            <p>Inondation</p>
        </div>
        <div>
            <p>Déchets</p>
        </div>
        <div>
            <p>Caniveau bouché</p>
        </div>
        <div>
            <p>Autre</p>
        </div>
    </div>

</div>

<?php if(isset($_SESSION['user_id'])): ?>
    <p><?php echo htmlspecialchars($_SESSION['user_nom']) ?></p>
<?php endif; ?>

<div class="acceuil-register">
    <div class="acceuil-register-description">
        <h3>Votre ville a besoin de vous </h3>
        <p>Rejoignez plus de 5 600 citoyens qui contribuent à rendre leur ville plus sûre chaque jour.</p>
    </div>
    <a href="<?= SITE_URL ?>/inscription.php" class="acceuil-register-button">Créer un compte </a>
</div>



<script src="./assets/js/main.js"></script>    
</body>
</html>