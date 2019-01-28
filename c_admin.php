<?php
session_start();
require_once('./database.php');
$db = new Database("localhost","cv","root","");
// Formulaire Informations
if(isset($_POST['info_save'])){
    $firstname = htmlspecialchars($_POST['firstname']);
    $name = htmlspecialchars($_POST['name']);
    $age = htmlspecialchars($_POST['age']);
    $email = htmlspecialchars($_POST['email']);
    $ville = htmlspecialchars($_POST['ville']);
    $cp = htmlspecialchars($_POST['cp']);
    $dep = htmlspecialchars($_POST['dep']);
    $intro = htmlspecialchars($_POST['intro']);
    $db -> updateInfo($firstname,$name,$age,$email,$ville,$cp,$dep,$intro);
    $_SESSION['success'] = "Données sauvegardées";
    header('Location:./admin.php');
}

//Formulaire Experience professionnelle
if(isset($_POST['exp_save'])){
    $title = htmlspecialchars($_POST['title']);
    $place = htmlspecialchars($_POST['place']);
    $city = htmlspecialchars($_POST['city']);
    $date_be = htmlspecialchars($_POST['date_be']);
    $date_en = htmlspecialchars($_POST['date_en']);
    $description = htmlspecialchars($_POST['description']);
    $db -> insertExp($title, $place ,$city ,$date_be ,$date_en ,$description);
    $_SESSION['success_insert'] = "Données sauvegardées";
    header('Location:./admin.php');
}


// Formulaire Formations
if(isset($_POST['for_save'])){
    $school = htmlspecialchars($_POST['school']);
    $city = htmlspecialchars($_POST['city']);
    $diplome = htmlspecialchars($_POST['diplome']);
    $date_be_for = htmlspecialchars($_POST['date_be_for']);
    $date_en_for = htmlspecialchars($_POST['date_en_for']);
    $description = htmlspecialchars($_POST['description_form']);
    $db -> insertFormation($school , $city , $diplome , $description ,$date_be_for ,$date_en_for);
    $_SESSION['success_insert_for'] = "Données sauvegardées";
    header('Location:./admin.php');
}

// Formulaire Compétences
if(isset($_POST['comp_save'])){
    $name = htmlspecialchars($_POST['comp_name']);
    $icone = htmlspecialchars($_POST['icon']);
    $db -> insertComp($name , $icone);
    $_SESSION['success_insert_comp'] = "Données sauvegardées";
    header('Location:./admin.php');
}

// Formulaire Interêts
if(isset($_POST['int_save'])){
    $name = htmlspecialchars($_POST['int_name']);
    $icone = htmlspecialchars($_POST['int_icon']);
    $db -> insertInt($name , $icone);
    $_SESSION['success_insert_int'] = "Données sauvegardées";
    header('Location:./admin.php');
}

