<?php
session_start();

require_once './config/db.php';
require_once './config/config.php';
require_once './includes/constantes.php';


$pdo = PdoBdd();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@3.31.0/dist/tabler-icons.min.css">
    <title>À propos</title>
</head>
<body>

<?php require_once 'includes/header.php' ?>

<div class="apropos-container">

    <div class="apropos-hero">
        <p class="apropos-hero-label">À propos</p>
        <h1 class="apropos-hero-titre">Une ville qui <span>écoute</span> ses citoyens.</h1>
        <p class="apropos-hero-sous-titre">CityWatch est une plateforme citoyenne conçue pour connecter les habitants de Kinshasa aux autorités locales, à travers un système simple et efficace de signalement des problèmes urbains.</p>
    </div>

    <div class="apropos-separateur"></div>

    <div class="apropos-mission">
        <div class="apropos-mission-gauche">
            <div class="apropos-section-label">
                <p>Notre mission</p>
            </div>
            <h2>Donner une voix aux citoyens de Kinshasa</h2>
        </div>
        <div class="apropos-mission-droite">
            <p>Les problèmes d'infrastructure urbaine à Kinshasa — routes dégradées, inondations, caniveaux bouchés, dépôts des déchets par terre  — touchent des milliers de citoyens chaque jour. Pourtant, ces problèmes tardent souvent à être pris en charge faute d'un canal de communication structuré.</p>
            <p>CityWatch comble ce vide en offrant un outil numérique simple, accessible depuis n'importe quel appareil connecté, permettant à chaque citoyen de signaler un problème avec une photo et une localisation automatique.</p>
        </div>
    </div>

    <div class="apropos-fonctionnalites">
        <div class="apropos-fonctionnalites-card">
            <div class="apropos-fonctionnalites-card-icone">
                <i class="ti ti-map-pin" aria-hidden="true"></i>
            </div>
            <h3>Signalement géolocalisé</h3>
            <p>Chaque signalement est automatiquement localisé sur la carte de Kinshasa grâce à la géolocalisation GPS de votre appareil.</p>
        </div>
        <div class="apropos-fonctionnalites-card">
            <div class="apropos-fonctionnalites-card-icone">
                <i class="ti ti-camera" aria-hidden="true"></i>
            </div>
            <h3>Photo du problème</h3>
            <p>Joignez une photo au signalement pour documenter visuellement le problème et accélérer sa prise en charge.</p>
        </div>
        <div class="apropos-fonctionnalites-card">
            <div class="apropos-fonctionnalites-card-icone">
                <i class="ti ti-eye" aria-hidden="true"></i>
            </div>
            <h3>Suivi en temps réel</h3>
            <p>Consultez l'état de vos signalements et suivez leur évolution jusqu'à leur résolution par les autorités.</p>
        </div>
        <div class="apropos-fonctionnalites-card">
            <div class="apropos-fonctionnalites-card-icone">
                <i class="ti ti-shield-check" aria-hidden="true"></i>
            </div>
            <h3>Espace autorités</h3>
            <p>Un tableau de bord dédié permet aux autorités de gérer et traiter les signalements par ordre de priorité.</p>
        </div>
    </div>

    <div class="apropos-separateur"></div>

    <div class="apropos-technologies">
        <div class="apropos-section-label">
            <p>Technologies utilisées</p>
        </div>
        <div class="apropos-technologies-liste">
            <div class="apropos-technologies-item">
                <i class="ti ti-brand-php" aria-hidden="true"></i>
                <span>PHP 8</span>
            </div>
            <div class="apropos-technologies-item">
                <i class="ti ti-database" aria-hidden="true"></i>
                <span>MySQL</span>
            </div>
            <div class="apropos-technologies-item">
                <i class="ti ti-brand-javascript" aria-hidden="true"></i>
                <span>JavaScript</span>
            </div>
            <div class="apropos-technologies-item">
                <i class="ti ti-map-2" aria-hidden="true"></i>
                <span>Leaflet.js</span>
            </div>
            <div class="apropos-technologies-item">
                <i class="ti ti-brand-html5" aria-hidden="true"></i>
                <span>HTML5 / CSS3</span>
            </div>
        </div>
    </div>

    <div class="apropos-separateur"></div>

    <div class="apropos-developpeur">
        <div class="apropos-developpeur-avatar">TR</div>
        <div class="apropos-developpeur-info">
            <div class="apropos-section-label">

            <p>Développeur</p>
            </div>
            <h2>Tsoluka Robi</h2>
            <p>Étudiant en 2ème année de Licence en Sciences Informatiques à la Faculté des Sciences Informatiques (FASI) de l'Université Protestante au Congo (UPC), Kinshasa.</p>
            <p>CityWatch est un projet de fin d'année académique réalisé dans le cadre du parcours LMD 2025–2026.</p>
            <div class="apropos-developpeur-contact">
                <i class="ti ti-mail" aria-hidden="true"></i>
                Contacter le développeur / robitsoluka5@gmail.com
            </div>
        </div>
    </div>

</div>

<?php require_once 'includes/footer.php' ?>

</body>
</html>