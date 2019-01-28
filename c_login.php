<?php
session_start();
require_once("database.php");

if(isset($_POST['connect'])){
    $log_password =$_POST['password'];
        if(!empty($log_password)){
            $db = new Database("localhost","cv","root","");
            // Vérification si les mot de passe correspondent
            $reqpPassword= $db -> verif_mdp($log_password);
            if($reqpPassword === true){
                // Vérification si User existe
                $requser = $db -> login();
                header('Location:./admin.php');
            }
            else{
                $_SESSION['login_errors'] = "Mauvais mot de passe";
                header('Location:./login.php');
            }
        }
        else{
            $_SESSION['login_errors'] = "Champs vide";
            header('Location:./login.php');
        }
}