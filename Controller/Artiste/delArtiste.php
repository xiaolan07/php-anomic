<?php

require_once '../../utils/common.php';

    $db = initDatabase();

    $idArtiste = $_GET["idArtiste"];

   /* $sql1 = "delete from Artiste where id=".$idArtiste;
    $sql2 = "delete from artiste_oeuvre where artiste_id=".$idArtiste;
    $query2=$db->query($sql2);*/


   $sth2 = $db->prepare("delete from Artiste where id=:id");
   $sth2->bindValue(':id', $idArtiste, PDO::PARAM_INT);


   $sth1 = $db->prepare("delete from artiste_oeuvre where artiste_id=:id");
   $sth1->bindValue(':id', $idArtiste, PDO::PARAM_INT);

    if(!$sth1->execute()){
        return "La suppression a échoué";
    } else {

        if($sth2->execute()){
           // header("Location:../../View/Artiste/delArtiste.php");
            return "La suppression a réussi";
        }
        //header("Location:../../Controller/Artiste/controllerArtiste.php");

    }


?>

