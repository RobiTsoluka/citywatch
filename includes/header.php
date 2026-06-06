    <link rel="stylesheet" href="/citywatch/assets/css/main.css">

    <?php require_once "config/config.php"; ?>

<nav class="navbar">
    <a class="link-logo" href="<?= SITE_URL ?>/index.php">
        <div class="logo">
            <img src="/citywatch/assets/img/citywatch_logo.svg" alt="logo">
            <h1>City<span>Watch</span></h1>
        </div>
    </a>
    
    <ul class="nav-center">
        <li><a href="<?= SITE_URL ?>/index.php">Acceuil</a></li>
        <li><a href="#">Carte</a></li>
        <li><a href="#">Signaler</a></li>
        <li><a href="#">Statistiques</a></li>
        <li><a href="#">A propos</a></li>
    </ul>
    <ul class="nav-right">
        <li><a href="#">Connexion</a></li>
        <li><a href="#">S'inscrire</a></li>
    </ul>
</nav>
