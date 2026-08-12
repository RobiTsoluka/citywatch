<?php
session_start();
require_once __DIR__ . '/../includes/constantes.php';










// if($_SESSION['user_role'] !== 'admin'){
//     header('Location: ../index.php');
//     exit();
// }

$pdo = PdoBdd();


// Récupération des statistiques

// Total signalements
$stat1sql = "SELECT COUNT(*) FROM signalements";
$stmtStat1 = $pdo->query($stat1sql);

$totalSignalements = $stmtStat1->fetchColumn();


// Total signalements en attente

$stat2sql = "SELECT COUNT(*) FROM signalements WHERE statut = 'en_attente' ";
$stmtStat2 = $pdo->query($stat2sql);

$totalEnAttente = $stmtStat2->fetchColumn();

// Total signalements en cours

$stat3sql = "SELECT COUNT(*) FROM signalements WHERE statut = 'en_cours' ";
$stmtStat3 = $pdo->query($stat3sql);

$totalEnCours = $stmtStat3->fetchColumn();

// Total signalements résolus

$stat4sql = "SELECT COUNT(*) FROM signalements WHERE statut = 'resolu' ";
$stmtStat4 = $pdo->query($stat4sql);

$totalResolu = $stmtStat4->fetchColumn();


// Récupération des signalements pour le tableau

$signalementsSql = "SELECT signalements.signalement_id, signalements.categorie, signalements.description, signalements.date_creation, users.nom, users.prenom
FROM signalements
JOIN users ON signalements.user_id = users.user_id
";
$stmtSignalements = $pdo->query($signalementsSql);
$signalements = $stmtSignalements->fetchAll();

// Récupération du nom/prénom lié au signalement
$nomSignalement = $signalements[0]['nom'] ?? '';
$prenomSignalement = $signalements[0]['prenom'] ?? '';

//description du signalement arrondie à 40 caractères avec "..." si le texte est plus long



// Récupération de la couleur de la catégorie du signalement depuis le tableau $couleurs_categories défini dans constantes.php

$CatColors = $couleurs_categories[$signalements[0]['categorie']] ?? '';

// Temps ecoulé depuis la création du signalement

$date = $signalements[0]['date_creation'] ?? '';

$dateSignalementsTempsEc =  tempsEcoule($date);

// initiales de l'utilisateur lié au signalement
$userInitiales = getInitiales($nomSignalement, $prenomSignalement);









?>










<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont/tabler-icons.min.css">
    <title>Dashboard — CityWatch</title>
</head>
<body>

<div class="dashboard-conteneur">

    <aside class="dashboard-sidebar">
        <div class="dashboard-sidebar-logo">
            <img src="../assets/img/citywatch_logo.svg" alt="logo">
            <h2>City<span>Watch</span></h2>
        </div>

        <nav class="dashboard-sidebar-nav">
            <a href="dashboard.php" class="dashboard-sidebar-nav-item active">
                <i class="ti ti-layout-dashboard" aria-hidden="true"></i>
                Dashboard
            </a>
            <a href="#" class="dashboard-sidebar-nav-item">
                <i class="ti ti-map-pin" aria-hidden="true"></i>
                Carte
            </a>
            <!-- <a href="#" class="dashboard-sidebar-nav-item">
                <i class="ti ti-alert-triangle" aria-hidden="true"></i>
                Signalements
            </a>
            <a href="#" class="dashboard-sidebar-nav-item">
                <i class="ti ti-users" aria-hidden="true"></i>
                Citoyens
            </a> -->
        </nav>

        <div class="dashboard-sidebar-bottom">
            <span class="dashboard-sidebar-badge">
                <i class="ti ti-shield" aria-hidden="true"></i>
                Admin
            </span>
            <a href="../deconnexion.php" class="dashboard-sidebar-deconnexion">
                <i class="ti ti-logout" aria-hidden="true"></i>
                Déconnexion
            </a>
        </div>
    </aside>

    <main class="dashboard-principal">

        <div class="dashboard-principal-header">
            <div>
                <h1 class="dashboard-principal-titre">Dashboard</h1>
                <p class="dashboard-principal-sous-titre">Vue d'ensemble · Kinshasa</p>
            </div>
        </div>

        <div class="dashboard-statistiques">
            <div class="dashboard-statistiques-card">
                <p class="dashboard-statistiques-card-valeur"><?= number_format($totalSignalements, 0, ',', ' ') ?></p>
                <p class="dashboard-statistiques-card-label">Total signalements</p>
            </div>
            <div class="dashboard-statistiques-card">
                <p class="dashboard-statistiques-card-valeur dashboard-statistiques-card-valeur-orange">
                    <?= number_format($totalEnAttente, 0 , ',' , ' ') ?>
                </p>
                <p class="dashboard-statistiques-card-label">En attente</p>
            </div>
            <div class="dashboard-statistiques-card">
                <p class="dashboard-statistiques-card-valeur dashboard-statistiques-card-valeur-bleu">
                    <?= number_format($totalEnCours, 0 , ',' , ' ') ?>
                </p>
                <p class="dashboard-statistiques-card-label">En cours</p>
            </div>
            <div class="dashboard-statistiques-card">
                <p class="dashboard-statistiques-card-valeur dashboard-statistiques-card-valeur-vert">
                    <?= number_format($totalResolu, 0 , ',' , ' ') ?>
                </p>
                <p class="dashboard-statistiques-card-label">Résolus</p>
            </div>
        </div>

        <div class="dashboard-filtres">
            <div class="dashboard-filtres-pills">
                <a href="#" class="dashboard-filtres-pill active">Tous</a>
                
                <a href="#" class="dashboard-filtres-pill">En attente</a>
                <a href="#" class="dashboard-filtres-pill">En cours</a>
                <a href="#" class="dashboard-filtres-pill">Résolu</a>
            </div>
            <select class="dashboard-filtres-select">
                <option>Toutes catégories</option>
                <option>Route</option>
                <option>Inondation</option>
                <option>Déchets</option>
                <option>Caniveau</option>
                <option>Autre</option>
            </select>
        </div>

        <div class="dashboard-tableau-wrapper">
            <table class="dashboard-tableau">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Catégorie</th>
                        <th>Description</th>
                        <th>Citoyen</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($signalements as $signalement): ?>
                        <tr>
                            <td class="dashboard-tableau-id"><?= "0" . $signalement['signalement_id'] ?></td>
                            <td><span class="dashboard-tableau-badge <?= $CatColors ?>">Route</span></td>
                            <td class="dashboard-tableau-description"><?= mb_strimwidth($signalement['description'], 0, 50, "...") ?></td>
                            <td>
                                <div class="dashboard-tableau-citoyen">
                                    <div class="dashboard-tableau-citoyen-avatar"><?= $userInitiales ?></div>
                                    <span><?= $nomSignalement . " " . $prenomSignalement ?></span>
                                </div>
                            </td>
                            <td class="dashboard-tableau-date"><?= $dateSignalementsTempsEc ?></td>
                            <td>
                                <select class="dashboard-tableau-select">
                                    <option selected>En attente</option>
                                    <option>En cours</option>
                                    <option>Résolu</option>
                                </select>
                            </td>
                            <td><a href="#" class="dashboard-tableau-btn-voir">Voir</a></td>
                        </tr>
                    <?php endforeach; ?>
                    <!-- <tr>
                        <td class="dashboard-tableau-id">#002</td>
                        <td><span class="dashboard-tableau-badge cat-bleu">Inondation</span></td>
                        <td class="dashboard-tableau-description">Rue inondée après les pluies Q. Matonge...</td>
                        <td>
                            <div class="dashboard-tableau-citoyen">
                                <div class="dashboard-tableau-citoyen-avatar">AM</div>
                                <span>Amina M.</span>
                            </div>
                        </td>
                        <td class="dashboard-tableau-date">il y a 5h</td>
                        <td>
                            <select class="dashboard-tableau-select">
                                <option>En attente</option>
                                <option selected>En cours</option>
                                <option>Résolu</option>
                            </select>
                        </td>
                        <td><a href="#" class="dashboard-tableau-btn-voir">Voir</a></td>
                    </tr>
                    <tr>
                        <td class="dashboard-tableau-id">#003</td>
                        <td><span class="dashboard-tableau-badge cat-orange">Déchets</span></td>
                        <td class="dashboard-tableau-description">Dépôt sauvage d'ordures Cité Verte...</td>
                        <td>
                            <div class="dashboard-tableau-citoyen">
                                <div class="dashboard-tableau-citoyen-avatar">JK</div>
                                <span>Jean K.</span>
                            </div>
                        </td>
                        <td class="dashboard-tableau-date">il y a 1j</td>
                        <td>
                            <select class="dashboard-tableau-select">
                                <option>En attente</option>
                                <option>En cours</option>
                                <option selected>Résolu</option>
                            </select>
                        </td>
                        <td><a href="#" class="dashboard-tableau-btn-voir">Voir</a></td>
                    </tr> -->
                </tbody>
            </table>
        </div>

    </main>

</div>

</body>
</html>