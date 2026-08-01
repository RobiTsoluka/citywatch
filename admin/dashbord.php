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
            <a href="#" class="dashboard-sidebar-nav-item">
                <i class="ti ti-alert-triangle" aria-hidden="true"></i>
                Signalements
            </a>
            <a href="#" class="dashboard-sidebar-nav-item">
                <i class="ti ti-users" aria-hidden="true"></i>
                Citoyens
            </a>
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
                <p class="dashboard-statistiques-card-valeur">1 248</p>
                <p class="dashboard-statistiques-card-label">Total signalements</p>
            </div>
            <div class="dashboard-statistiques-card">
                <p class="dashboard-statistiques-card-valeur dashboard-statistiques-card-valeur-orange">342</p>
                <p class="dashboard-statistiques-card-label">En attente</p>
            </div>
            <div class="dashboard-statistiques-card">
                <p class="dashboard-statistiques-card-valeur dashboard-statistiques-card-valeur-bleu">187</p>
                <p class="dashboard-statistiques-card-label">En cours</p>
            </div>
            <div class="dashboard-statistiques-card">
                <p class="dashboard-statistiques-card-valeur dashboard-statistiques-card-valeur-vert">719</p>
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
                    <tr>
                        <td class="dashboard-tableau-id">#001</td>
                        <td><span class="dashboard-tableau-badge cat-rouge">Route</span></td>
                        <td class="dashboard-tableau-description">Nid-de-poule dangereux Av. Kasa-Vubu...</td>
                        <td>
                            <div class="dashboard-tableau-citoyen">
                                <div class="dashboard-tableau-citoyen-avatar">KM</div>
                                <span>Karim M.</span>
                            </div>
                        </td>
                        <td class="dashboard-tableau-date">il y a 2h</td>
                        <td>
                            <select class="dashboard-tableau-select">
                                <option selected>En attente</option>
                                <option>En cours</option>
                                <option>Résolu</option>
                            </select>
                        </td>
                        <td><a href="#" class="dashboard-tableau-btn-voir">Voir</a></td>
                    </tr>
                    <tr>
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
                    </tr>
                </tbody>
            </table>
        </div>

    </main>

</div>

</body>
</html>