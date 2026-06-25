<?php 
require_once "./config/config.php";
require_once  "./includes/fonctions.php";

$pdo = PdoBdd();

// les tableaux avec donnés et erreurs lors de la soummision

$donnee = [];
$erreur = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // Verification pour le nom

    $nom = trim($_POST['nom'] ?? '');

    if( empty($nom) ){
        $erreur['nom'] = "Vous devez Remplir le champ nom";
    }elseif ( strlen($nom) < 2 ) {
        $erreur['nom'] = "Nom Trop court minimum 2 lettres ";
    }

    $donnee['nom'] = $nom;

    // verification pour le prenom

    $prenom = trim($_POST['prenom'] ?? '');

    if($prenom === ''){
        $prenom = null;
    }

    if( $prenom !== null && strlen($prenom) < 2 ){
        $erreur['prenom'] = "Prénom trop Court minimum 2 lettres";
    }
    $donnee['prenom'] = $prenom;

    //verification pour l'email

    $email = strtolower(trim($_POST['email'] ?? ''));

    if( empty($email) ){
        $erreur['email'] = "Vous devez remplir le champ email";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erreur['email'] = "Email invalide ";
    }else{

        //recuperation de l'email

        $recupEmail = $pdo -> prepare('SELECT email FROM users WHERE email = ?');
        $recupEmail ->execute([$email]);
        $emailExists = $recupEmail -> fetch();

        if($emailExists){
            $erreur['email'] = "Cet Email existe déjà veuillez changer d'email";
        }
    }

    $donnee['email'] = $email;

    // Verification pour le mot de passe 

    $password = trim($_POST['password'] ?? '');

    if(empty($password) || $password === ''){
        $erreur['password'] = "Veuillez remplir le champ mot de passe ";
    }elseif(strlen($password) < 8 ){
        $erreur['password'] = "Le mot de passe doit contenir 8 caractères minimum";
    }

    if(empty($erreur)){
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $donnee['password'] = $password_hash;

        $stmt = $pdo -> prepare("INSERT INTO users (nom, prenom, email, password) VALUES (?, ?, ?, ?)");
        $stmt -> execute(array($donnee['nom'], $donnee['prenom'], $donnee['email'], $donnee['password']));

        header('Location: /citywatch/connexion.php?inscription=reussie!');
        exit;


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
                    <input type="text" name="nom" id="nom" autocomplete="off" placeholder="Entrer votre nom" value="<?= htmlspecialchars($donnee['nom'] ?? '') ?>">
                    <?php if(isset($erreur['nom'])): ?>
                        <span class="erreur"><?= htmlspecialchars($erreur['nom']) ?></span>
                    <?php endif; ?>
                </div>

                <div class="box-prenom">
                    <label for="prenom">Prénom<span> (Facultatif)</span></label>   
                    <input type="text" id="prenom" name="prenom" autocomplete="off" placeholder="Entrer votre prenom" value="<?= htmlspecialchars($donnee['prenom'] ?? '') ?>" >  
                    <?php if(isset($erreur['prenom'])): ?>
                        <span class="erreur"><?= htmlspecialchars($erreur['prenom']) ?></span>
                    <?php endif; ?>
                </div>

            </div>

            <div class="box-email">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Entrer un email " autocomplete="off" value="<?= htmlspecialchars($donnee['email'] ?? '') ?>">
                    <?php if(isset($erreur['email'])): ?>
                        <span class="erreur"><?= htmlspecialchars($erreur['email']) ?></span>
                    <?php endif; ?>
            </div>

            <div class="box-password">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Entrer un mot de passe (8 caractères minimum)" autocomplete="off">
                    <?php if(isset($erreur['password'])): ?>
                        <span class="erreur"><?= htmlspecialchars($erreur['password']) ?></span>
                    <?php endif; ?>
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