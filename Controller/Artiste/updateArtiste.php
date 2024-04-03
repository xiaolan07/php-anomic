<?php
require_once '../../utils/common.php';

$db = initDatabase();
$body = file_get_contents('php://input');

$json = json_decode($body );
$idArtiste = $json->{'id'};
$newNom = $json->{'nom'};
$newType_artiste = $json->{'type_artiste'};
$newIntro = $json->{'intro'};
$newContact = $json->{'contact'};

/*$sql = "UPDATE Artiste SET nom = '$newNom', type_artiste = '$newType_artiste'
               ,intro='$newIntro', contact='$newContact'
               WHERE id = '$idArtiste'";
$reponse = $db->query($sql);*/

$sth = $db->prepare("UPDATE Artiste SET nom = :newNom, type_artiste = :newType_artiste
               ,intro = :newIntro, contact = :newContact
               WHERE id = :idArtiste");
$sth->bindValue(':newNom', $newNom, PDO::PARAM_STR);
$sth->bindValue(':newType_artiste', $newType_artiste, PDO::PARAM_STR);
$sth->bindValue(':newIntro', $newIntro, PDO::PARAM_STR);
$sth->bindValue(':newContact', $newContact, PDO::PARAM_STR);
$sth->bindValue(':idArtiste', $idArtiste, PDO::PARAM_INT);
print_r($json);
if(!$sth->execute()) {
    // Lever une exception si l'erreur
    http_response_code(403);
}

