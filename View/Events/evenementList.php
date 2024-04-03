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

        .itemEventment {
            margin-right: 20px;
        }
    </style>
    <script src="mortifierEvent.js"></script>
    <script>
        function chkinput(form){
            if(form.titre.value==""){
                alert("Veuillez entrer le titre!");
                return(false);
            }

            return(true);
        }
    </script>

</head>
<body>

<h1>List des évenements</h1>
<div id="lareponse"></div>
<div id="evenement" class="container">
    <?php

    if (!empty($_SESSION['admin'])) {
        $db = initDatabase();
        $Evenements = $db->query("SELECT * FROM evenement")->fetchAll(PDO::FETCH_OBJ);
        foreach ($Evenements as $Evenement) {
            echo "<div style='margin-bottom: 30px'>";
            echo "<div id=modeAffichageEvent". $Evenement->id .">";
            echo "<img  width='200px' class='itemEventment' src='../../uploads/" . $Evenement->posteur . "'/>";
            echo "<br/>";
            echo "<span class='itemEventment'>Titre: <span id=affichageTitreEvent". $Evenement->id . ">". $Evenement->titre . "</span>";
            echo "<br/>";
            echo "<span class='itemEventment'>De <span id=affichageDateDebutEvent". $Evenement->id . ">". $Evenement->dateDebutEvenement . "</span>";
            echo "<span class='itemEventment'> à <span id=affichageDateFinEvent". $Evenement->id . ">". $Evenement->dateFinEvenement . "</span>";
            echo "<br/>";

            echo "<span class='itemEventment'> ville:<span id=affichageVilleEvent". $Evenement->id . ">". $Evenement->ville . "</span>";
            echo "<br/>";
            echo "<span class='itemEventment'>contenu: <span id=affichageContenuEvent". $Evenement->id . ">". $Evenement->contenu . "</span>";
            echo "<br/>";
            echo "<span class='itemEventment'>contact:<span id=affichageContactEvent". $Evenement->id . ">". $Evenement->contact . "</span>";
            echo "<br/>";

            echo "<button style='font-size:20px;' onclick=mortifierEvenement(". $Evenement->id .")>" . "&#9998;" . "</a>" . "</button>";
            echo "<button style='font-size:20px;' onclick=supprimerEvenement(". $Evenement->id .")>" . "&#10007;" . "</a>" . "</button>";


            echo "</div>";

            echo "<div id=modeModificationEvent". $Evenement->id ." style='display: none'>";
            echo "<img  width='200px' class='itemEventment' src='../../uploads/" . $Evenement->posteur . "'/>";
            echo "<br/>";
            echo "Titre: <input id=titreEvenement". $Evenement->id . " value='$Evenement->titre' />";
            echo "<br/>";
            echo "Date Debut: <input id=dateDebutEvenement". $Evenement->id . " type=date value='$Evenement->dateDebutEvenement' />";
            echo "<br/>";
            echo "Date Fin: <input id=dateFinEvenement". $Evenement->id . " type=date value='$Evenement->dateFinEvenement' />";
            echo "<br/>";
            //echo "<input id=posteur". $Evenement->id . " value='$Evenement->posteur' />";
            echo "Ville: <input id=ville". $Evenement->id . " value='$Evenement->ville' />";
            echo "<br/>";
            //echo "Contenu: <input id=contenu". $Evenement->id . " value='$Evenement->contenu' />";
            echo "<textarea rows=20 cols=30 id=contenu". $Evenement->id . ">'$Evenement->contenu'</textarea> ";
            echo "<br/>";
            echo "Contact: <input id=contactEvenement". $Evenement->id . " value='$Evenement->contact'/>";
            echo "<button onclick=sauvegarderModificationEvenement(". $Evenement->id .")>soumit</button>";
            echo "</div>";
            echo "</div>";

        }
    }else{
        echo "<p>Il faut se connecter pour gérer des événements</p>";
    }
    ?>


</body>
</html>