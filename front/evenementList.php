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

<div id="evenement" class="container" style="margin-left: 30%">
    <h2>List des évenements</h2>
    <?php


        $db = initDatabase();
        $Evenements = $db->query("SELECT * FROM evenement")->fetchAll(PDO::FETCH_OBJ);
        foreach ($Evenements as $Evenement) {
            echo "<div style='margin-bottom: 30px'>";
            echo "<div id=modeAffichageEvent". $Evenement->id .">";
            echo "<a href=detailEvenement.php?id=". $Evenement->id ."><img  width='400px' class='itemEventment' src='../uploads/" . $Evenement->posteur . "'/></a>";
            echo "<br/>";
            echo "<span class='itemEventment'>Titre: <span id=affichageTitreEvent". $Evenement->id . ">". $Evenement->titre . "</span>";
            echo "<br/>";
            //echo "<span class='itemEventment'>De <span id=affichageDateDebutEvent". $Evenement->id . ">". $Evenement->dateDebutEvenement . "</span>";
            //echo "<span class='itemEventment'> à <span id=affichageDateFinEvent". $Evenement->id . ">". $Evenement->dateFinEvenement . "</span>";


            echo "<span class='itemEventment'> ville:<span id=affichageVilleEvent". $Evenement->id . ">". $Evenement->ville . "</span>";
            //echo "<br/>";
            //echo "<span class='itemEventment'>contenu: <span id=affichageContenuEvent". $Evenement->id . ">". $Evenement->contenu . "</span>";
           // echo "<br/>";
            //echo "<span class='itemEventment'>contact:<span id=affichageContactEvent". $Evenement->id . ">". $Evenement->contact . "</span>";
            echo "<br/>";
            echo "<a href=detailEvenement.php?id=". $Evenement->id .">voir detail>></a>";
            echo "<br/>";


            echo "</div>";



    }
    ?>

</div>
</div>
<div id="templatemo_copyright_wrapper">
    <div id="templatemo_copyright">

        Copyright © 2048 <a href="#">Anomic Elements</a> -
        Template from <a href="https://www.facebook.com/anomicelements/photos/?ref=page_internal" target="_parent"></a>

    </div>
</div>
</body>
</html>