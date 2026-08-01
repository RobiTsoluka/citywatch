// Js pour afficher le menu cacher ou le desactiver quand on clique sur le bouton profil

document.getElementById('button_profil').addEventListener('click', function(e) {
    document.getElementById('nav_dropdown').classList.toggle('visible');
    e.stopPropagation();
});

document.getElementById('nav_dropdown').addEventListener('click', function(e) {
    e.stopPropagation();
});

document.addEventListener('click', function() {
    document.getElementById('nav_dropdown').classList.remove('visible');
});