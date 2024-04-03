<?php

require_once '../../utils/common.php';
$db = initDatabase();

$idEvenement = $_GET["idEvenement"];
/*$requetteDel = "delete from evenement where id=".$idEvenement;
$query=$db->query($requetteDel);*/
$sth = $db->prepare("delete from evenement where id=:id");
$sth->bindValue(':id', $idEvenement, PDO::PARAM_INT);




if(!$sth->execute()){
    return "La suppression a échoué";
} else {
    return "La suppression a réussi";
}

?>
