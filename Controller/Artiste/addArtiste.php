<?php
require_once '../../utils/common.php';

    $db = initDatabase();

    /*$tmp_name = $_FILES['profile_artiste']['tmp_name'];
    $size = $_FILES['profile_artiste']['size'];
    $fp = fopen($tmp_name, "r");
    $content = fread($fp, $size);
    fclose($fp);
    $content = addslashes($content);*/

    $desDir = "../../uploads/";

    /*$sql = "INSERT INTO Artiste (nom,type_artiste,intro,contact) "
        ."VALUES ('".$_POST['nom']."', '". $_POST['type_artiste'] .
        "', '". $_POST['intro'] . "', '". $_POST['contact'] . "')";

    $res = $db->query($sql);*/
$nom = $_POST['nom'];
$type_artiste = $_POST['type_artiste'];
$intro = $_POST['intro'];
$contact = $_POST['contact'];

$sth = $db->prepare("INSERT INTO Artiste(nom,type_artiste,intro,contact) 
                    VALUES(:nom,:type_artiste,:intro,:contact)");
$sth->bindValue(':nom', $nom, PDO::PARAM_STR);
$sth->bindValue(':type_artiste', $type_artiste, PDO::PARAM_STR);
$sth->bindValue(':intro', $intro, PDO::PARAM_STR);
$sth->bindValue(':contact', $contact, PDO::PARAM_STR);

    if ($sth->execute()) {
        // Récupérer l'id de l'artiste créée
        $id = $db->query('SELECT MAX(id) FROM Artiste');
        $data = $id -> fetchAll(PDO::FETCH_ASSOC);
        $id = $data[0]['MAX(id)'];

        // Déplacer le fichier upload en nommant par un nouveau nom unique pour fichier
        $path = $_FILES['profile_artiste']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $fileName = $id . $_POST['nom'] . "." . $ext;
        $file = $desDir . $fileName;
        move_uploaded_file($_FILES['profile_artiste']['tmp_name'], $file);

        // Mis à jour l'artiste créée avec nom de fichier
        $db->query("UPDATE Artiste SET profile_artiste = '" . $fileName ."' WHERE id = " . $id . ";");

        //enregistrer des oeuvres
        $oeuvres = $_POST['lien_oeuvre'];
        foreach ($oeuvres as $oeuvre){
            if($oeuvre!=null && $oeuvre!=""){
                $sql2 = "INSERT INTO artiste_oeuvre(lien_oeuvre,artiste_id) " .
                    "VALUES ('". $oeuvre . "','". $id . "')";
                $res2= $db->query($sql2);
            }
        }
        echo "reussir";
        //header("Location:../../View/Artiste/artisteList.php");
        exit();
    } else {
        //die("Erreur SQLite (permission d'écriture sur le fichier et son répertoire ?) : $sql");
        echo "error d'ajouter un artiste";
}
