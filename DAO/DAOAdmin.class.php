<?php

class DAOAdmin{
    private $admin;
    private $connexion;

    public function __construct($a) {
        $this->admin = $a;
        $this->connexion = null;
    }

    public function connect(){

        try{
            $this->connexion=new PDO('mysql:host=localhost;dbname=project', 'root', '');
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function getAdmin() {
        return $this->admin;
    }

    public function setAdmin($a) {
        $this->admin = $a;
    }






}


?>