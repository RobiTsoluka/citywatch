<?php
require_once './config/db.php';


function PdoBdd(){
    $connection = new database();
    $pdo = $connection -> getConnection();
    return $pdo;
}


// classes pour couleur des categorie et statuts

$couleurs_categories = [
    'route'      => 'cat-rouge',
    'inondation' => 'cat-bleu',
    'dechets'    => 'cat-orange',
    'caniveau'   => 'cat-vert',
    'autre'      => 'cat-gris'
];

$couleurs_statuts = [
    'en_attente' => 'statut-orange',
    'en_cours'   => 'statut-bleu',
    'resolu'     => 'statut-vert'
];

function getInitiales(string $nom, string $prenom): string{
    return strtoupper($nom[0]) . ($prenom ? strtoupper($prenom[0]) : "");
}