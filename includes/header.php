 

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

        <?php if(!isset($_SESSION['user_id'])): ?> 
            <li><a href="<?= SITE_URL ?>/connexion.php">Signaler</a></li>
        <?php else : ?>
            <li><a href="<?= SITE_URL ?>/signaler.php">Signaler</a></li>
        <?php endif ?>

        <li><a href="#">A propos</a></li>
    </ul>
    <ul class="nav-right">

            <?php if(!isset($_SESSION['user_id'])): ?>
                <li><a href="<?= SITE_URL ?>/connexion.php">Connexion</a></li>
                <li><a href="<?= SITE_URL ?>/inscription.php">S'inscrire</a></li>
            <?php else: ?>
                <button type="button" id="button_notif">🔔</button>
                <button type="button" id="button_profil">🧑‍💻</button>
            <?php endif; ?>

    </ul>
</nav>



