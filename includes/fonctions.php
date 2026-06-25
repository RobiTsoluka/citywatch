<?php

require_once './config/db.php';

function PdoBdd(){
    $connection = new database();
    $pdo = $connection -> getConnection();
    return $pdo;
}

