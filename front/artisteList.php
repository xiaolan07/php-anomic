<?php
require_once '../utils/common.php';


session_start();
noMagicQuotes();

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

<div id="lareponse"></div>
<div id="artistes" class="container" style="margin-left: 30%">
    <h2>List des artistes</h2>
                <?php
                    $db = initDatabase();
                    $Artistes = $db->query("SELECT * FROM Artiste")->fetchAll(PDO::FETCH_OBJ);
                    foreach ($Artistes as $Artiste) {
                        echo "<div id=modeAffichageArtiste". $Artiste->id .">";
                        echo "<a href=detailArtiste.php?id=". $Artiste->id ."><img width='100px' class='itemArtiste' src='../uploads/" . $Artiste->profile_artiste . "'/></a>";
                        echo "<br/>";
                        echo "<span class='itemArtiste'>nom:<span id=affichageNomArtiste". $Artiste->id . ">". $Artiste->nom . "</span></span>";
                        echo "<br/>";
                        echo "<span class='itemArtiste'>type:<span id=affichageTypeArtiste". $Artiste->id . ">". $Artiste->type_artiste . "</span></span>";
                        echo "<br/>";
                       // echo "<span class='itemArtiste'>intro:<span id=affichageIntroArtiste". $Artiste->id . ">". $Artiste->intro . "</span></span>";
                        //echo "<br/>";
                        //echo "<span class='itemArtiste'>tel:<span id=affichageContactArtiste". $Artiste->id . ">". $Artiste->contact . "</span></span>";
                        $url = $Artiste->contact;
                        echo "<a href='$url'><img src='../images/facebook.png' /></a>";
                        echo "<a href=detailArtiste.php?id=". $Artiste->id .">voir detail>></a>";
                        echo "</div>";
                    }


                ?>
    <div id="templatemo_copyright_wrapper">
        <div id="templatemo_copyright">

            Copyright © 2048 <a href="#">Anomic Elements</a> -
            Template from <a href="https://www.facebook.com/anomicelements/photos/?ref=page_internal" target="_parent"></a>

        </div>
    </div>

</body>
</html>