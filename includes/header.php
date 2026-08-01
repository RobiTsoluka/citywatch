<nav class="navbar">
    <a class="link-logo" href="<?= SITE_URL ?>/index.php">
        <div class="logo">
            <img src="/citywatch/assets/img/citywatch_logo.svg" alt="logo">
            <h1>City<span>Watch</span></h1>
        </div>
    </a>
    
    <ul class="nav-center">
        <li><a href="<?= SITE_URL ?>/index.php">Accueil</a></li>
        <li><a href="#">Carte</a></li>

        <?php if(!isset($_SESSION['user_id'])): ?> 
            <li><a href="<?= SITE_URL ?>/connexion.php">Signaler</a></li>
        <?php else: ?>
            <li><a href="<?= SITE_URL ?>/signaler.php">Signaler</a></li>
        <?php endif; ?>

        <li><a href="#">À propos</a></li>
    </ul>

    <ul class="nav-right">
        <?php if(!isset($_SESSION['user_id'])): ?>
            <li><a href="<?= SITE_URL ?>/connexion.php">Connexion</a></li>
            <li><a href="<?= SITE_URL ?>/inscription.php">S'inscrire</a></li>
        <?php else: ?>
            <li>
                <button type="button" id="button_notif" class="nav-btn-notif">
                    <i class="ti ti-bell"></i>
                    <span class="nav-btn-notif-badge">3</span>
                </button>
            </li>
            <li>
                <button type="button" id="button_profil" class="nav-btn-profil">
                    <?= isset($initialesUser) ? htmlspecialchars($initialesUser) : '?' ?>
                </button>
            </li>
        <?php endif; ?>
    </ul>
</nav>

<?php if(isset($_SESSION['user_id'])): ?>
<div class="nav-dropdown" id="nav_dropdown">
    <div class="nav-dropdown-header">
        <div class="nav-dropdown-header-avatar">
            <?= isset($initialesUser) ? htmlspecialchars($initialesUser) : '?' ?>
        </div>
        <div class="nav-dropdown-header-info">
            <p class="nav-dropdown-header-nom">
                <?= (isset($nom) && isset($prenom)) ? htmlspecialchars($nom . ' ' . $prenom) : '' ?>
            </p>
            <p class="nav-dropdown-header-role">Citoyen</p>
        </div>
    </div>

    <div class="nav-dropdown-separateur"></div>

    <a href="<?= SITE_URL ?>/signaler.php" class="nav-dropdown-item">
        <i class="ti ti-map-pin-plus"></i>
        Faire un signalement
    </a>
    <a href="<?= SITE_URL ?>/mon_profil.php" class="nav-dropdown-item">
        <i class="ti ti-alert-triangle"></i>
        Mes signalements
    </a>

    <div class="nav-dropdown-separateur"></div>

    <a href="<?= SITE_URL ?>/deconnexion.php" class="nav-dropdown-item nav-dropdown-item-deconnexion">
        <i class="ti ti-logout"></i>
        Déconnexion
    </a>
</div>
<?php endif; ?>