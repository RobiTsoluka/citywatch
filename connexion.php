<?php 
session_start();


require_once "./config/config.php";
require_once  "./includes/fonctions.php";

$pdo = PdoBdd();


// Verification

$erreur = "" ;

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $email = trim($_POST['email']) ?? '';
    $password = trim($_POST['password'] ?? '');
   

    // Recuperation de user dans la base de donnee 

    $stmt = $pdo->prepare("SELECT user_id, email, password, role from users where email = ? ");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if(!$user || !password_verify($password, $user['password'])){
        $erreur = "Email ou mot de passe incorrect ";
    }else{

        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['username'] = $user['nom'];

        header('Location: ./includes/auth_check.php');
        exit();

    }





    



}










?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/citywatch/assets/css/main.css">
    <title>PAGE CONNEXION</title>
</head>
<body>

<div class="container-inscription">

    <div class="description">

    <img src="/citywatch/assets/img/citywatch_logo.svg" alt="">

    <div class="texte">

        <h2>Connectez-vous </h2>
        <p>Créer un compte citoyen pour pouvoir effectuer rapidement <br> des signalements et rendre <br> votre ville meilleure !</p>

    </div>



    </div>

    <div class="form">

        <h1>Se connecter</h1>
        <p>Créer votre compte citoyen en moins d'une minute !</p>

        <form action="" method="post">
            <?php if(!empty($erreur)): ?>
                <span class="erreur"><?= $erreur ?></span>
            <?php endif; ?>
        
            <div class="box-email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Entrer votre email " autocomplete="off" value="<?= htmlspecialchars($_POST['email'] ?? '')  ?>">
            </div>

            <div class="box-password">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Entrer votre mot de passe " autocomplete="off">
            </div>

            <div class="box-button">
                <button type="submit">Se connecter</button>
            </div>



            <div class="dejaCompte">
                <p>Pas de compte ? <a href="<?= SITE_URL ?>/inscription.php">S'inscrire...</a></p>
            </div>

        </form>
    </div>



</div>



    
</body>
</html>