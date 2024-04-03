<?php
/*
require_once '../../utils/common.php';

$db = initDatabase();
$desDir = "../../uploads/";

$photo = $_POST['photo'];


$sth = $db->prepare("INSERT INTO Gallery(photo) 
                    VALUES(:photo)");
$sth->bindValue(':photo', $photo, PDO::PARAM_STR);
$sth->execute();


if ($sth->execute()) {
    $id = $db->query('SELECT MAX(id) FROM Gallery');
    // Déplacer le fichier upload en nommant par un nouveau nom unique pour fichier
    $path = $_FILES['photo']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $fileName = $id . $_POST['nom'] . "." . $ext;
    $file = $desDir . $fileName;
    move_uploaded_file($_FILES['photo']['tmp_name'], $file);

    // Mis à jour l'artiste créée avec nom de fichier
    $db->query("UPDATE Gallery SET photo = '" . $fileName . "' WHERE id = " . $id . ";");
    echo "reussir";
    header("Location:../../View/Gallery/photoList.php");
    exit();
} else {
    //die("Erreur SQLite (permission d'écriture sur le fichier et son répertoire ?) : $sql");
    echo "error d'ajouter une photo";
}*/
