<?php
require_once 'includes/auth_check.php';
require_once 'includes/constantes.php';



$pdo = PdoBdd();

$stmtUser = $pdo -> prepare("SELECT * FROM users WHERE user_id = ? ");
$stmtUser -> execute([$_SESSION['user_id']]);
$user = $stmtUser ->fetch();

$nom_user = $user['nom'];
$prenom_user = $user['prenom'] !== NULL ? $user['prenom'] : "" ;

$initialesUser = getInitiales($nom_user, $prenom_user);

$stmtSignalement = $pdo -> prepare("SELECT * FROM signalements WHERE user_id = ? ORDER BY date_creation DESC");
$stmtSignalement -> execute([$_SESSION['user_id']]);
$signalements = $stmtSignalement -> fetchAll();









?>






<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/main.css">
    <title>Document</title>
</head>
<body>

<div class="mon-profil-container">

    <div class="header">
        <div class="user-nom">
            <div class="initiales">
                <div>
                    <h1 class="nav-dropdown-header-avatar" ><?= htmlspecialchars($initialesUser)?></h1>
                </div>
                <div class="nom">
                    <h1><?= htmlspecialchars(strtoupper($nom_user) . " " .strtoupper($prenom_user) ); ?></h1>
                </div>
            </div>

            <div class="infosUser">
                <p><?= htmlspecialchars($user['email']) ?></p>
            </div>

        </div>

        <div class="deconnection">
            <a href="./deconnexion.php">Se deconnecter</a>
        </div>

    </div>

    <div class="statistiques-container">
        <div>
            <h2>Signalements</h2>
            <p class="cat-gris"><?= count($signalements) ?></p>

        </div>
        <div>
            <h2 >En attente</h2>
            <p class="statut-orange">
                <?php
                echo count(array_filter($signalements, function ($tab) {
                    return $tab['statut'] === "en_attente";
                }))
                ?>
            </p>


        </div>
        <div>
            <h2>Résolu</h2>
            <p class="statut-vert">
                <?php
                 echo count(array_filter($signalements, function ($tab) {
                    return $tab['statut'] === "resolu";
                }))
                ?>
            </p>

        </div>

    </div>


    <div class="liste">

        <div class="description">
            <div class="titre">
                <div class="text">
                    <p class="">Historique des signalements &middot;</p>
                </div>
            </div>

            <div class="tri-status">
                <a href="" class="active">Tout</a>
                <a href="">En attente</a>
                <a href="">En cours</a>
                <a href="">Résolu</a>
            </div>
        </div>
        <ul>

            <?php if (!empty($signalements)): ?>
                <?php foreach($signalements as $signalement): ?>

                    <?php 
                    $classes_categorie = $couleurs_categories[$signalement['categorie']];
                    $classes_Status = $couleurs_statuts[$signalement['statut']];

    
                         
                    ?>


                    <li>
                        <div class="signalement-content">
                            <div class="top">
                                <div class="top-content" >
                                    <div class="badge <?= $classes_categorie ?>"></div>
                                    <div class="description">
                                        <p><?= htmlspecialchars($signalement['description']) ?></p>
                                    </div>
                                </div>

                            </div>

                            <div class="bottom">
                                <div>

                                    <div class="categorie-text">
                                        <span><?= htmlspecialchars($signalement['categorie']) ?></span>
                                    </div>

                                </div>

                                <div class="statut">
                                    <span class="<?= $classes_Status ?>"><?= htmlspecialchars($signalement['statut']) ?></span>
                                </div>
                            </div>




                        </div>
                    </li>




                <?php endforeach; ?>
            <?php endif; ?>

        </ul>
        
    </div>



</div>







</body>
</html>