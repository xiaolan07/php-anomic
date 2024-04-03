<?php

class DAOEvenement{
    private $evenement;
    private $connexion;

    /**
     * @param $evenement
     * @param $connexion
     */
    public function __construct($e)
    {
        $this->evenement = $e;
        $this->connexion = null;
    }

    public function connect(){

        try{
            $this->connexion = new PDO("mysql:host=" . PDO_HOST . ";"."dbname=" . PDO_DBBASE, PDO_USER, PDO_PW);
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * @return mixed
     */
    public function getEvenement()
    {
        return $this->evenement;
    }

    /**
     * @param mixed $evenement
     */
    public function setEvenement($evenement)
    {
        $this->evenement = $evenement;
    }

    /**
     * @param $id
     * @param $titre
     * @param $dateDebutEvenement
     * @param $dateFinEvenement
     * @param $ville
     * @param $contenu
     * @param $posteur
     * @param $contact
     */
    //version simplifiée d'une dao avec une méthode add et des parametres nommés et bindValue
    public function add() {

        try{
            $this->connect();
            $query = " INSERT INTO Evenement values(:id,:titre,:dateDebutEvenement,:dateFinEvenement,
                              :ville,:contenu,:posteur,:contact)";
            $data = array(
                ':id'=>$this->evenement->getId(),
                ':titre'=> $this->evenement->getTitre(),
                ':dateDebutEvenement'=>$this->evenement->getDateDebutEvenement(),
                ':dateFinEvenement'=>$this->evenement->getDateFinEvenement(),
                ':ville'=> $this->evenement->getVille(),
                ':contenu'=> $this->evenement->getContenu(),
                ':posteur'=> $this->evenement->getPosteur(),
                ':contact'=> $this->evenement->getContact()
            );
            $sth = $this->connexion->prepare( $query );
            $res=$sth->execute( $data );
            $this->connexion = null;
            //pour ajouter tous les evenements de la bdd
            return $res;
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function delete() {

        try{
            $this->connect();
            $query = " delete from Evenement where id=:id ";
            $data = array(
                ':id'=>$this->evenement->getId(),
            );
            $sth = $this->connexion->prepare( $query );
            $res=$sth->execute( $data );
            $this->connexion = null;
            //pour supprimer
            return $res;
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function update() {

        try{
            $this->connect();
            $query = " update evenement set titre=:titre, dateDebutEvenement=:dateDebutEvenement , 
                      dateFinEvenement=:dateFinEvenement , ville=:ville ,
                      contenu=:contenu , posteur=:posteur , contact=:contact , where id=:id ";
            $data = array(
                ':id'=>$this->evenement->getId(),
                ':titre'=> $this->evenement->getTitre(),
                ':dateDebutEvenement'=>$this->evenement->getDateDebutEvenement(),
                ':dateFinEvenement'=>$this->evenement->getDateFinEvenement(),
                ':ville'=> $this->evenement->getVille(),
                ':contenu'=> $this->evenement->getContenu(),
                ':posteur'=> $this->evenement->getPosteur(),
                ':contact'=> $this->evenement->getContact()
            );
            $sth = $this->connexion->prepare( $query );
            $res=$sth->execute( $data );
            $this->connexion = null;
            //pour modifier
            return $res;
        }catch (PDOException $e){
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }





}


?>