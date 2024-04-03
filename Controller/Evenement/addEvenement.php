<?php
require_once '../../utils/common.php';
$db = initDatabase();

$desDir = "../../uploads/";

/*$sql = "INSERT INTO evenement (titre,dateDebutEvenement,dateFinEvenement,ville,contenu,contact) "
    ."VALUES ('".$_POST['titre']."', '". $_POST['dateDebutEvenement'] .
    "', '". $_POST['dateFinEvenement'] . "', '". $_POST['ville'] . "', '".
    $_POST['contenu'] . "', '". $_POST['contact'] . "')";

$res = $db->query($sql);
*/

$titre = $_POST['titre'];
$dateDebutEvenement = $_POST['dateDebutEvenement'];
$dateFinEvenement = $_POST['dateFinEvenement'];
$ville = $_POST['ville'];
$contenu = $_POST['contenu'];
$contact = $_POST['contact'];

$sth = $db->prepare("INSERT INTO evenement(titre,dateDebutEvenement,dateFinEvenement,ville,contenu,contact) 
                    VALUES(:titre,:dateDebutEvenement,:dateFinEvenement,:ville,:contenu,:contact) ");

$sth->bindValue(':titre', $titre, PDO::PARAM_STR);
$sth->bindValue(':dateDebutEvenement', $dateDebutEvenement, PDO::PARAM_STR);
$sth->bindValue(':dateFinEvenement', $dateFinEvenement, PDO::PARAM_STR);
$sth->bindValue(':ville', $ville, PDO::PARAM_STR);
$sth->bindValue(':contenu', $contenu, PDO::PARAM_STR);
$sth->bindValue(':contact', $contact, PDO::PARAM_STR);
$sth->execute();


if ($sth->execute()) {
    // Récupérer l'id de l'artiste créée
    $id = $db->query('SELECT MAX(id) FROM evenement');
    $data = $id -> fetchAll(PDO::FETCH_ASSOC);
    $id = $data[0]['MAX(id)'];

    // Déplacer le fichier upload en nommant par un nouveau nom unique pour fichier
    $path = $_FILES['posteur']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $fileName = $id . $_POST['titre'] . "." . $ext;
    $file = $desDir . $fileName;
    move_uploaded_file($_FILES['posteur']['tmp_name'], $file);

    // Mis à jour l'artiste créée avec nom de fichier
    $db->query("UPDATE evenement SET posteur = '" . $fileName ."' WHERE id = " . $id . ";");

    echo "reussir";
    header("Location:../../View/Events/evenementList.php");
    exit();
} else {
    //die("Erreur SQLite (permission d'écriture sur le fichier et son répertoire ?) : $sql");
    echo "error d'ajouter une evenement";
}