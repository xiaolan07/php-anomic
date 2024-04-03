<?php
require_once '../../utils/common.php';
require_once '../../Models/Admin.php';
require_once '../../DAO/DAOAdmin.class.php';

session_start();
noMagicQuotes();


if (!empty($_SESSION['admin'])) {
    echo "<p>Bonjour, " . $_SESSION['admin']->username . ".</p>";
    //"<a href='. $Artiste->contact .'><img src='../images/facebook.png' /></a>";
    echo "<a href=".'../../user_logout.php'. "/>déconnecter</a>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        .afficherMode input{
            display: none;
        }

        .itemArtiste {
            margin-right: 20px;
        }
    </style>
    <script src="mortifierArtiste.js"></script>


</head>
<body>

<h1>List des artistes</h1>
<div id="lareponse"></div>
<div id="artistes" class="container">
                <?php


                    $db = initDatabase();
                    $Artistes = $db->query("SELECT * FROM Artiste")->fetchAll(PDO::FETCH_OBJ);
                    // il faut seulement connecter afin de consulter tous les admins
                if (!empty($_SESSION['admin'])) {
                    foreach ($Artistes as $Artiste) {
                        echo "<div id=modeAffichageArtiste" . $Artiste->id . ">";
                        echo "<img width='100px' class='itemArtiste' src='../../uploads/" . $Artiste->profile_artiste . "'/>";
                        echo "<br/>";
                        echo "<span class='itemArtiste'>nom:<span id=affichageNomArtiste" . $Artiste->id . ">" . $Artiste->nom . "</span></span>";
                        echo "<br/>";
                        echo "<span class='itemArtiste'>type:<span id=affichageTypeArtiste" . $Artiste->id . ">" . $Artiste->type_artiste . "</span></span>";
                        echo "<br/>";
                        echo "<span class='itemArtiste'>intro:<span id=affichageIntroArtiste" . $Artiste->id . ">" . $Artiste->intro . "</span></span>";
                        echo "<br/>";
                        echo "<span class='itemArtiste'>tel:<span id=affichageContactArtiste" . $Artiste->id . ">" . $Artiste->contact . "</span></span>";

                        echo "<button style='font-size:20px;' onclick=mortifierArtiste(" . $Artiste->id . ")>" . "&#9998;" . "</a>" . "</button>";
                        echo "<button style='font-size:20px;' onclick=supprimerArtiste(" . $Artiste->id . ")>" . "&#10007;" . "</a>" . "</button>";


                        echo "</div>";

                        echo "<div id=modeModificationArtiste" . $Artiste->id . " style='display: none'>";
                        echo "<img width='100px' class='itemArtiste' src='../../uploads/" . $Artiste->profile_artiste . "'/>";
                        echo "<br/>";
                        echo "nom: <input id=nomArtiste" . $Artiste->id . " value='$Artiste->nom' />";
                        echo "<br/>";
                        //echo "<input id=typeArtiste". $Artiste->id . " value='$Artiste->type_artiste' />";
                        echo "Type: <select id=typeArtiste" . $Artiste->id . ">";
                        echo "<option value='Designer'>Designer</option>";
                        echo "<option value='Photographiste'>Photographiste</option>";
                        echo "<option value='Musicien'>Musicien</option>";
                        echo "</select>";
                        echo "<br/>";
                        echo "intro: <input id=introArtiste" . $Artiste->id . " value='$Artiste->intro' />";
                        echo "<br/>";
                        echo "contact: <input id=contactArtiste" . $Artiste->id . " value='$Artiste->contact'/>";
                        echo "<button onclick=sauvegarderModificationArtiste(" . $Artiste->id . ")>soumit</button>";

                        echo "</div>";
                    }
                }else{
                    echo "<p>Il faut se connecter pour gérer les artistes</p>";
                }

                ?>
   

</body>
</html>