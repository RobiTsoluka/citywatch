<?php require_once "./config/config.php" ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGE D'INSCRIPTION</title>
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/main.css">
</head>
<body class="body-inscription">

<a class="link-logo" href="<?= SITE_URL ?>/index.php">

    <div class="logo">
        <img src="/citywatch/assets/img/citywatch_logo.svg" alt="logo">
        <h1>City<span>Watch</span></h1>
    </div>
</a>

<div class="container-inscription">

    <h1>Inscription.</h1>

    <form action="" method="post">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" placeholder="votre nom">
        <label for="prenom">Prénom (facultatif)</label>
        <input type="text" name="prenom" id="prenom" placeholder="votre prénom">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="votre email">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="votre mot de passe">
        <button type="submit">S'inscrire</button>

    </form>

    <p>Vous avez deja un compte ? <a href="<?= SITE_URL ?>/connexion.php">Se connecter</a></p>



</div>


    
</body>
</html>