function ChangeTextInputFile(){
    document.querySelector('#photo').addEventListener('change', function(){
        const fichier = this.files[0]

        if(fichier){
            document.querySelector('#photo_text').textContent = fichier.name
        }
    })
}



function recupererPosition(){

    navigator.geolocation.getCurrentPosition(

        function(position){
            document.querySelector('#latitude').value = position.coords.latitude
            document.querySelector('#longitude').value = position.coords.longitude
        },

        function(erreur){
            console.log("GPS - Indisponible");
            
        }

    )
    
}


ChangeTextInputFile();
recupererPosition();

