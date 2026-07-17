<?php
session_start();

require_once './config/db.php';
require_once './config/config.php';
require_once './includes/fonctions.php';

$pdo = PdoBdd();


$erreur = [];


if($_SERVER["REQUEST_METHOD"] === "POST"){

// on recupère les données du formulaire


$photo = $_FILES['photo'];
$categorie = $_POST['categorie'] ?? '';
$description = trim($_POST['description'] ?? '');

$latitude = $_POST['latitude'] ?? NULL ;
$longitude = $_POST['longitude'] ?? NULL ;


if(!$categorie){
    $erreur['categorie'] = "Veuillez selectionner une categorie";
}

if(empty($description)){
    $erreur['description'] = "Veuillez décrire le problème";
}elseif(strlen($description) < 8 ){
    $erreur['description'] = "Description du problème trop courte";
}


if($photo['error'] === 4){
    $erreur['photo'] = "Veuillez uploader une image du problème";
}elseif($photo['size'] > MAX_FILE_SIZE){
    $erreur['photo'] = "La taille du fichier ne doit pas depasser 5 MB";
}elseif($photo['error'] !== 0){
    $erreur['photo'] = "Une erreur est survenue lors de l'upload de l'image";
}else{

    $types_autorises = ["image/jpeg","image/png","image/webp"];

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $vrai_type = finfo_file($finfo, $photo['tmp_name']);
    finfo_close($finfo);

    if(!in_array($vrai_type, $types_autorises)){
        $erreur['photo'] = "Ce format d'image n'est pas autorisé";
    }

}

$nomFichierUnique = NULL;

if(empty($erreur)){

    // Deplacer le fichier vers le dossier upload

    $extensionFichier = strtolower(pathinfo($photo['name'],PATHINFO_EXTENSION));
    $nomFichierUnique = uniqid("Signalement_",true) . "." . $extensionFichier;

    $destination = 'assets/img/uploads/' . $nomFichierUnique;


    if(!move_uploaded_file($photo['tmp_name'],$destination)){
        $erreur['photo'] = "Erreur lors de la sauvegarde du fichier";
        $nomFichierUnique = NULL;
    }

}



if(empty($erreur)){

    //insertion en bdd

    $stmt = $pdo -> prepare("INSERT INTO signalements  (user_id, categorie, description,
    longitude, latitude, photo) VALUES (?,?,?,?,?,?)");

    $stmt -> execute(array(
        $_SESSION['user_id'],
        $categorie,
        $description,
        $longitude,
        $latitude,
        $nomFichierUnique        
        ));
    
    $reussie = true;

}





}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/main.css">
    <title>Document</title>
</head>
<body>


    <div class="signaler-container">

        <div class="description"> 
            <div class="titre">
                <div class="tiret"></div>
                <h1>Nouveau signalement &middot;</h1>
            </div>

            <h2>Que voulez-vous signalez ? </h2>

            <div class="retour-acceuil">
                <a href="./index.php">Retour à l'acceuil</a>
            </div>

        </div>

        <div class="formulaire-signaler">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="categories">

                    <label for="route" class="cards-categories">
                        <input type="radio" name="categorie" value="route" id="route">
                        Route endommagée
                        
                    </label>
                    <label for="innondation" class="cards-categories">
                        <input type="radio" name="categorie" id="innondation" value="inondation">
                        Inondation

                    </label>
                    <label for="dechets" class="cards-categories">
                        <input type="radio" name="categorie" id="dechets" value="dechets">
                        Déchets

                    </label>
                    <label for="canniveau" class="cards-categories">
                        <input type="radio" name="categorie" id="canniveau" value="caniveau">
                        Caniveau bouché

                    </label>
                    <label for="autres" class="cards-categories">
                        <input type="radio" name="categorie" id="autres" value="autre">
                        Autre

                    </label>

                </div>
                <?php if(isset($erreur['categorie'])): ?>
                    <span class="erreur"><?= htmlspecialchars($erreur['categorie']) ?></span>
                <?php endif; ?>

                <div class="input-description">
                    <label for="description">Description du problème</label>
                    <textarea name="description" id="description" placeholder="Decrivez le problème... ex(route endommagé, mont-ngafula cité-verte ...)" ></textarea>
            
                </div>
                <?php if(isset($erreur['description'])): ?>
                    <span class="erreur"><?= htmlspecialchars($erreur['description']) ?></span>
                    <br>
                <?php endif; ?>

                <input type="hidden" name="latitude" id="latitude" value="">
                <input type="hidden" name="longitude" id="longitude" value="">

                <div class="input-photos-container">
                    <label for="photo">Photo</label>
                    <p>Position detecté automatiquement</p>

                    <div class="input-photo">
                        <label for="photo">

                            <span id="photo_text">TELEVERSER UNE PHOTO DU PROBLEME</span>
                            
                            <input type="file" name="photo" id="photo" >
                        </label>
                    </div>
                </div>
                <?php if(isset($erreur['photo'])):?>
                    <span class="erreur"><?= htmlspecialchars($erreur['photo']) ?></span>
                <?php endif; ?>

                <button type="submit">Soumettre</button>

                
                

            </form>        
        </div>
            
            
    </div>

    <?php if(isset($reussie) && $reussie === true) :?>
        <div class="succes-signaler">
            <div class="succes-container">
                <h1>Signalement Effectué !</h1>
                <p>Lorem ipsum dolor sit amet.</p>

                <div class="succes-container-link">
                    <a href="./index.php">Retour à l'acceuil</a>
                    <a href="./mon_profil.php">Voir mes Signalements</a>
                </div>

            </div>
        </div>
    <?php endif ?>
    
    <script src="./assets/js/signaler.js"></script>
</body>
</html>