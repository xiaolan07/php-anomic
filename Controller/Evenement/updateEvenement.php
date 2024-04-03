<?php
require_once '../../utils/common.php';

$db = initDatabase();
$body = file_get_contents('php://input');
$json = json_decode($body);
$idEvenement = $json->{'id'};
$newTitre = $json->{'titre'};
$newdateDebutEvenement = $json->{'dateDebutEvenement'};
$newdateFinEvenement = $json->{'dateFinEvenement'};
$newVille = $json->{'ville'};
$newContenue = $json->{'contenu'};
$newContact = $json->{'contact'};


/*$sql = "UPDATE Evenement SET titre = '$newTitre', dateDebutEvenement = '$newdateDebutEvenement'
               ,dateFinEvenement='$newdateFinEvenement', ville='$newVille',contenu='$newContenue',
               contact='$newContact'
               WHERE id = '$idEvenement'";
$reponse = $db->query($sql);
*/
$sth = $db->prepare("UPDATE Evenement SET titre = :newTitre, dateDebutEvenement = :newdateDebutEvenement
               ,dateFinEvenement=:newdateFinEvenement, ville=:newVille,contenu=:newContenue,
               contact=:newContact
               WHERE id = :idEvenement");
$sth->bindValue(':newTitre', $newTitre, PDO::PARAM_STR);
$sth->bindValue(':newdateDebutEvenement', $newdateDebutEvenement, PDO::PARAM_STR);
$sth->bindValue(':newdateFinEvenement', $newdateFinEvenement, PDO::PARAM_STR);
$sth->bindValue(':newVille', $newVille, PDO::PARAM_STR);
$sth->bindValue(':newContenue', $newContenue, PDO::PARAM_STR);
$sth->bindValue(':newContact', $newContact, PDO::PARAM_STR);
$sth->bindValue(':idEvenement', $idEvenement, PDO::PARAM_INT);

if(!$sth->execute()) {
    // Lever une exception si l'erreur
    http_response_code(403);
}


