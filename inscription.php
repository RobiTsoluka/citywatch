<?php 

require_once "./config/config.php";
require_once "./config/db.php";

$db = new database();
$pdo = $db->getConnection();


if ($_SERVER["REQUEST_METHOD"] == 'POST') {



    if(empty($_POST["nom"] )|| empty($_POST["email"]) || empty($_POST["password"])){
        echo "";
    }else{
        $nom = htmlspecialchars(trim($_POST["nom"]));
        $prenom = htmlspecialchars(trim($_POST["prenom"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        

        $recupemail = $pdo->prepare("SELECT email FROM users where email = ? ");
        $recupemail->execute(array($email));
        $emailExists = $recupemail->fetch();

        if($emailExists){
            echo "<script>alert('cet email est deja utilisé')</script>";
        }else{
            $insererUser = $pdo->prepare("INSERT INTO users(nom, prenom, email, password, role) VALUES(?, ?, ?, ?,'citoyen')");
            $insererUser->execute(array($nom, $prenom, $email, $password));
            echo "<script>alert('Inscription réussie !')</script>";
        
        }
    
    }

}

?>


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
        <!-- <label for="nom">Nom</label> -->
        <input type="text" name="nom" id="nom" placeholder="Nom" autocomplete="off">
        <!-- <label for="prenom">Prénom (facultatif)</label> -->
        <input type="text" name="prenom" id="prenom" placeholder="Prénom(facultatif)" autocomplete="off">
        <!-- <label for="email">Email</label> -->
        <input type="email" name="email" id="email" placeholder="Email" autocomplete="off">
        <!-- <label for="password">Mot de passe</label> -->
        <input type="password" name="password" id="password" placeholder="Mot de passe" autocomplete="off">
        <button type="submit">S'inscrire</button>

    </form>

    <p>Vous avez deja un compte ? <a href="<?= SITE_URL ?>/connexion.php">Se connecter</a></p>



</div>


    
</body>
</html>