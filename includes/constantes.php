<?php
require_once __DIR__ . '/../config/db.php';

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

function tempsEcoule(string $date): string {

    $diff = time() - strtotime($date);

    if ($diff < 3600) {
        $min = round($diff / 60);
        return "il y a " . $min . " min";
    } elseif ($diff < 86400) {
        $h = round($diff / 3600);
        return "il y a " . $h . "h";
    } elseif ($diff < 2592000) {
        $j = round($diff / 86400);
        return "il y a " . $j . " jour" . ($j > 1 ? "s" : "");
    } else {
        $mois = round($diff / 2592000);
        return "il y a " . $mois . " mois";
    }
}