<?php require_once './config/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/main.css">
    <title>PAGE CONNEXION</title>
</head>
<body class="body-connexion">

<a class="link-logo" href="<?= SITE_URL ?>/index.php">

    <div class="logo">
        <img src="/citywatch/assets/img/citywatch_logo.svg" alt="logo">
        <h1>City<span>Watch</span></h1>
    </div>
</a>




    <div class="container-connexion">

    <h1>Connexion.</h1>

    <form action="" method="post">

        <input type="email" name="email" id="email" placeholder="Veuillez entrer votre email" autocomplete="off">
        <input type="password" name="password" id="password" placeholder="Veuillez entrer votre mot de passe" autocomplete="off">
        <button type="submit">Se connecter</button>

    </form>

    <p>Vous ne possedez aucun compte ? <a href="<?= SITE_URL ?>/inscription.php">Créer un compte</a></p>



</div>
</body>
</html>