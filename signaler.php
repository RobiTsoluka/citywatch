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

            <h2>Que voulez vous signalez ? </h2>

            <div class="retour-acceuil">
                <a href="./index.php">Retour à l'acceuil</a>
            </div>

        </div>

        <div class="formulaire-signaler">
            <form action="">
                <div class="categories">

                    <label for="route" class="cards-categories">
                        <input type="radio" name="categorie" value="route" id="route">
                        Route
                        
                    </label>
                    <label for="innondation" class="cards-categories">
                        <input type="radio" name="categorie" id="innondation" value="innondation">
                        Innondation

                    </label>
                    <label for="dechets" class="cards-categories">
                        <input type="radio" name="categorie" id="dechets" value="dechets">
                        Déchets

                    </label>
                    <label for="canniveau" class="cards-categories">
                        <input type="radio" name="categorie" id="canniveau" value="canniveau">
                        Canniveau bouché

                    </label>
                    <label for="autres" class="cards-categories">
                        <input type="radio" name="categorie" id="autres" value="autre">
                        Autres

                    </label>

                </div>

                <div class="input-description">
                    <label for="description">Description du problème</label>
                    <textarea name="description" id="description" placeholder="Decrivez le problème... ex(route endommagé, mont-ngafula cité-verte ...)" ></textarea>

                    
                </div>


                <div class="input-photos-container">
                    <label for="photo">Photo</label>
                    <p>Position detecté automatiquement</p>

                    <div class="input-photo">
                        <label for="photo">
                            TELEVERSER UNE PHOTO DU PROBLEME
                            <input type="file" name="photo" id="photo">
                        </label>
                    </div>
                </div>

                <button type="submit">Soumettre</button>

                
                

                
        </div>
            </form>
            




    </div>
    
</body>
</html>