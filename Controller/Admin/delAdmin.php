<?php

require_once '../../utils/common.php';
$db = initDatabase();


$idAdmin = $_GET["idAdmin"];

/*$requetteDel = "delete from Admin where id=".$idAdmin;


$query=$db->query($requetteDel);*/
$sth = $db->prepare("delete from Admin where id=:id");
$sth->bindValue(':id', $idAdmin, PDO::PARAM_INT);
$res = $sth->execute();

if(!$res){
    return "La suppression a échoué";
} else {
    return "La suppression a réussi";
}

?>




