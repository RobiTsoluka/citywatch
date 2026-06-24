<?php 

require_once "./config/config.php";
require_once "./config/db.php";

// $db = new database();
// $pdo = $db->getConnection();


// if ($_SERVER["REQUEST_METHOD"] == 'POST') {



//     if(empty($_POST["nom"] )|| empty($_POST["email"]) || empty($_POST["password"])){
//         echo "";
//     }else{
//         $nom = htmlspecialchars(trim($_POST["nom"]));
//         $prenom = htmlspecialchars(trim($_POST["prenom"]));
//         $email = htmlspecialchars(trim($_POST["email"]));
//         $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        

//         $recupemail = $pdo->prepare("SELECT email FROM users where email = ? ");
//         $recupemail->execute(array($email));
//         $emailExists = $recupemail->fetch();

//         if($emailExists){
//             echo "<script>alert('cet email est deja utilisé')</script>";
//         }else{
//             $insererUser = $pdo->prepare("INSERT INTO users(nom, prenom, email, password, role) VALUES(?, ?, ?, ?,'citoyen')");
//             $insererUser->execute(array($nom, $prenom, $email, $password));
//             echo "<script>alert('Inscription réussie !')</script>";
        
//         }
    
//     }

// }

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAGE D'INSCRIPTION</title>
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/main.css">
</head>
<body>


<div class="container-inscription">

    <div class="description">

    <img src="/citywatch/assets/img/citywatch_logo.svg" alt="">

    <div class="texte">

        <h2>Inscrivez vous </h2>
        <p>Créer un compte citoyen pour pouvoir effectuer rapidement <br> des signalements et rendre <br> votre ville meilleure !</p>

    </div>



    </div>

    <div class="form">
        <h1>Créer un compte</h1>
        <p>Créer votre compte citoyen en moins d'une minute !</p>

        <form action="" method="post">
            <div class="box-names">
                <div class="box-nom">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" autocomplete="off" placeholder="Entrer votre nom">
                </div>

                <div class="box-prenom">
                    <label for="prenom">Prénom<span> (Facultatif)</span></label>   
                    <input type="text" id="prenom" name="prenom" autocomplete="off" placeholder="Entrer votre prenom">                 
                </div>

            </div>

            <div class="box-email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Entrer un email ">
            </div>

            <div class="box-password">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Entrer un mot de passe (8 caractères minimum)">
            </div>

            <div class="box-button">
                <button type="submit">Créer un compte</button>
            </div>

            <div class="dejaCompte">
                <p>Vous possedez un compte ? <a href="">Se connecter...</a></p>
            </div>

        </form>
    </div>



</div>


    
</body>
</html>