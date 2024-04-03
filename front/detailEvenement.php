
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">

        .itemEventment {
            margin-right: 20px;
            margin-top: 10px;
        }

        .detailEvenement {
            padding: 10px;
            width: 800px;
            margin-left:20%;
            margin-top:30px;
            font-size:20px;
            font-weight:bold;
            font-color:#f27444;
            border: 2px solid #9a6bd7;

        }
        .iconAppareil{
            width: 100px;
        }


    </style>


</head>
<body>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ANOMIC ELEMENTS</title>

    <link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="templatemo_top_wrapper">
    <div id="templatemo_top">
        <ul id="social_box">
            <li><a href="#"><img src="../images/facebook.png" alt="facebook" /></a></li>
            <li><a href="#"><img src="../images/twitter.png" alt="twitter" /></a></li>
            <a href="../user_login.php" class="button" >Admin</a>
        </ul>

    </div>
</div>

<div id="templatemo_header_wrapper">
    <div id="templatemo_header">

        <div id="site_title">
            <h1><a href="../index.html"><img src="../images/logo.jpg" alt="logo" width="180" height="60" /><span>ANOMIC ELEMENTS</span></a></h1>
        </div> <!-- end of site_title -->

    </div>
</div> <!-- end of templatemo_header -->

<div id="templatemo_menu_wrapper">
    <div id="templatemo_menu">
        <ul>
            <?php
            $accueil = "http://localhost/proFinal/";
            echo "<li><a href='$accueil'>accueil</a></li>";
            ?>
            <li><a href="evenementList.php">Evénement</a></li>
            <li><a href="artisteList.php">Artistes</a></li>
            <li><a href="gallery.html">Photograph</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </div> <!-- end of templatemo_menu -->
</div>


<?php
require_once '../utils/common.php';
require_once '../Models/Artiste.php';
$db = initDatabase();

$idEvenement = $_GET["id"];
//echo $idArtiste;
$sql = "select * from evenement where id=".$idEvenement;
$Evenements = $db->query($sql)->fetchAll(PDO::FETCH_OBJ);
$Evenement = $Evenements[0];

echo "<div class='detailEvenement' id=modeAffichageEvent". $Evenement->id .">";
echo "<img width='500px' id='detailPosteur' class='itemEventment' src='../uploads/" . $Evenement->posteur . "'/>";
echo "<br/>";
echo "<a href='#'><span class='itemEventment'>Titre: <span id=affichageTitreEvent". $Evenement->id . ">". $Evenement->titre . "</span></a>";

echo "<span class='itemEventment'> Ville:<span id=affichageVilleEvent". $Evenement->id . ">". $Evenement->ville . "</span>";
echo "<br/>";
echo "<span class='itemEventment'>De <span id=affichageDateDebutEvent". $Evenement->id . ">". $Evenement->dateDebutEvenement . "</span>";
echo "<span class='itemEventment'> à <span id=affichageDateFinEvent". $Evenement->id . ">". $Evenement->dateFinEvenement . "</span>";


echo "<br/>";
echo "<span class='itemEventment'>contenu: <span id=affichageContenuEvent". $Evenement->id . ">". $Evenement->contenu . "</span>";
echo "<br/>";
$url = $Evenement->contact;
echo "<a href='$url'><img src='../images/facebook.png' />contact</a>";
//echo "<span class='itemEventment'>contact:<span id=affichageContactEvent". $Evenement->id . ">". $Evenement->contact . "</span>";
echo "<br/>";
?>
