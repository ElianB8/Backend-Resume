<?php

class Database{

    protected $host;
    protected $dbname;
    protected $user;
    protected $password;
    protected $db;

    public function __construct($_host , $_dbname , $_user , $_password){
        $this -> host = $_host;
        $this -> dbname = $_dbname;
        $this -> user = $_user;
        $this -> password = $_password;

        try{
                $this -> db = new PDO('mysql:host='.$this -> host.';dbname='.$this -> dbname.';charset=utf8', ''.$this -> user.'', ''.$this ->password.'',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e){
                die('Erreur : '.$e->getMessage());
        }
    }

    public function verif_mdp($password){
        $req = $this -> db -> prepare("SELECT password FROM login WHERE id = 1");
        $req -> execute();
        $data = $req -> fetch();
        if(password_verify($password , $data['password'])){
                return true;
        }
        else{
                return false;
        }
    }   

    public function login(){
        $requser = $this -> db -> prepare("SELECT * FROM login WHERE id = 1 ");
        $requser -> execute();
        $userexist = $requser -> rowCount();
        if($userexist == 1 ){
                $userinfo = $requser -> fetch();
                $_SESSION['id'] =$userinfo['id'];
        }
    }
    // Section information
    public function updateInfo($firstname,$name,$age,$email,$ville,$cp,$dep,$intro){
        try{
                $requser = $this -> db -> prepare("UPDATE informations SET prenom = ?,nom = ?, age = ?, email = ?, ville = ?, cp = ?, dep = ?, intro = ? WHERE id = 1");
                $requser -> execute(array(
                        $firstname,
                        $name,
                        $age,
                        $email,
                        $ville,
                        $cp,
                        $dep,
                        $intro
                ));
        }
        catch(Exception $e){
                die('Erreur : '.$e->getMessage());
        }
    }

    public function displayInfo($column){
        try{
                $requser = $this -> db -> prepare("SELECT * FROM informations WHERE id = 1");
                $requser -> execute();
                $data = $requser -> fetch();
                echo($data[$column]);
        }
        catch(Exception $e){
                die('Erreur : '.$e->getMessage());
        } 
    }
    // Section expérience professionnelle
    public function insertExp($title,$place,$city,$date_be,$date_en,$description){
        try{
                $requser = $this -> db -> prepare("INSERT INTO experience(titre, lieu, ville, date_deb, date_fin, description) VALUES(:titre, :lieu, :ville, :date_deb, :date_fin, :description)");
                $requser -> execute(array(
                        'titre' => $title,
                        'lieu' => $place,
                        'ville' => $city,
                        'date_deb' => $date_be,
                        'date_fin' => $date_en,
                        'description' => $description
                ));
        }
        catch(Exception $e){
                die('Erreur : '.$e->getMessage());
        }
    }

    public function getExp(){
            $req = $this -> db -> prepare("SELECT * from experience");
            $req -> execute();
            $data = $req -> fetchAll();
            return $data;
    }

    public function getExpRow(){
        $req = $this -> db -> prepare("SELECT * from experience");
        $req -> execute();
        $row = $req -> rowCount();
        return $row;
    } 
    // Section Formation
    public function insertFormation($school , $city ,$diplome,$description ,$date_be_for, $date_en_for){
        try{
        $requser = $this -> db -> prepare("INSERT INTO formations(ecole, ville, diplome, description, date_deb, date_fin) VALUES(:ecole, :ville, :diplome, :description, :date_deb, :date_fin)");
        $requser -> execute(array(
                'ecole' => $school,
                'ville' => $city,
                'diplome' => $diplome,
                'description' => $description,
                'date_deb' => $date_be_for,
                'date_fin' => $date_en_for
        ));
        }
        catch(Exception $e){
                die('Erreur : '.$e->getMessage());
        }
    }

        public function getForm(){
            $req = $this -> db -> prepare("SELECT * from formations");
            $req -> execute();
            $data = $req -> fetchAll();
            return $data;
        }

        public function getFormRow(){
                $req = $this -> db -> prepare("SELECT * from formations");
                $req -> execute();
                $row = $req -> rowCount();
                return $row;
        } 
        //Section compétences

        public function insertComp($name , $icone){
                try{
                        $requser = $this -> db -> prepare("INSERT INTO competences(name , code) VALUES(:nom , :code)");
                        $requser -> execute(array(
                                'nom' => $name,
                                'code' => $icone
                        ));
                }
                catch(Exception $e){
                        die('Erreur : '.$e->getMessage());
                }
        }

        public function getComp(){
            $req = $this -> db -> prepare("SELECT * from competences");
            $req -> execute();
            $data = $req -> fetchAll();
            return $data;
        }

        public function getCompRow(){
                $req = $this -> db -> prepare("SELECT * from competences");
                $req -> execute();
                $row = $req -> rowCount();
                return $row;
        } 

        // Section Interêts
        public function insertInt($name , $icone){
                try{
                        $requser = $this -> db -> prepare("INSERT INTO interets(name , code) VALUES(:nom , :code)");
                        $requser -> execute(array(
                                'nom' => $name,
                                'code' => $icone
                        ));
                }
                catch(Exception $e){
                        die('Erreur : '.$e->getMessage());
                }
        }

        public function getInt(){
            $req = $this -> db -> prepare("SELECT * from interets");
            $req -> execute();
            $data = $req -> fetchAll();
            return $data;
        }

        public function getIntRow(){
                $req = $this -> db -> prepare("SELECT * from interets");
                $req -> execute();
                $row = $req -> rowCount();
                return $row;
        } 
}
