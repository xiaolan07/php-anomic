<?php
require_once '../utils/common.php';
require_once '../Models/Artiste.php';


class DAOArtiste
{
    private $artiste;
    private $connexion;
    public function __construct($a)
    {
        $this->artiste = $a;
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
    /*
    public function readAll(){

        $sql = 'SELECT * FROM Artiste';
        $sqlQuery = new SqlQuery($sql);
        return $this->getList($sqlQuery);

    }


    protected function readRow($row){
        $artiste = new Artiste();
        $artiste->id= $row['id'];
        $artiste->name = $row['name'];

        return $artiste;
    }

    protected function getList($sqlQuery){
        $tab = QueryExecutor::execute($sqlQuery);
        $ret = array();

        return $ret;
    }*/

}