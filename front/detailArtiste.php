
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">


        .itemArtiste {
            margin-right: 20px;
            margin-top: 8px;
        }

        .detailArtiste {
            margin-left:30%;
            margin-top:30px;
            font-size:24px;
            font-weight:bold;
            font-color:#f27444;
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

$idArtiste = $_GET["id"];
//echo $idArtiste;
$sql1 = "select * from artiste where id=".$idArtiste;
$sql2 = "select * from artiste_oeuvre where artiste_id=".$idArtiste;
$Artistes = $db->query($sql1)->fetchAll(PDO::FETCH_OBJ);
$oeuvres = $db->query($sql2)->fetchAll(PDO::FETCH_OBJ);
$Artiste = $Artistes[0];



    echo "<div class='detailArtiste' id=modeAffichageArtiste". $Artiste->id .">";
    echo "<a href=detailArtiste.php?id=". $Artiste->id ."><img width='200px' class='itemArtiste' src='../uploads/" . $Artiste->profile_artiste . "'/></a>";
    echo "<br/>";
    echo "<div class='itemArtiste'>nom:<span id=affichageNomArtiste". $Artiste->id . ">". $Artiste->nom . "</span></div>";
    echo "<br/>";
    echo "<div class='itemArtiste'>type:<span id=affichageTypeArtiste". $Artiste->id . ">". $Artiste->type_artiste . "</span></div>";
    echo "<br/>";
    echo "<div class='itemArtiste'>intro:<span id=affichageIntroArtiste". $Artiste->id . ">". $Artiste->intro . "</span></div>";
    echo "<br/>";
    //echo "<span class='itemArtiste'>tel:<span id=affichageContactArtiste". $Artiste->id . ">". $Artiste->contact . "</span></span>";

    $url0 = $Artiste->contact;
    echo "<a href='$url0'><img src='../images/facebook.png' /></a>";

    echo "<h3>list des oeuvres</h3>";
    foreach ($oeuvres as $oeuvre){
        echo "<div class='detailOeuvre'>";
        $url = $oeuvre->lien_oeuvre;
        echo  "<a href='$url'><img width='80px' style='margin-top: 10px' src='../images/appareil.jpg' />voir des oeuvres</a>";

        echo "</div>";
    }


?>
