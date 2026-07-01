<?php
session_start();

$connect = isset($_SESSION['user_id']);

if(!isset($_SESSION['user_id'])){
    header("Location: ../index.php");
    exit();
}elseif($connect && $_SESSION['user_role'] === "admin" ){
    header("Location: ../admin/dashbord.php");
    exit();
}

if(isset($_SESSION['user_id'])){
    header("Location: ../index.php");
    exit();
}