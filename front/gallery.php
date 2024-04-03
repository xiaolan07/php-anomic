<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ANOMIC ELEMENTS</title>

    <link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />

    <link href="../css/svwp_style.css" rel="stylesheet" type="text/css" />
    <script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <script src="../js/jquery.slideViewerPro.1.0.js" type="text/javascript"></script>

    <!-- Optional plugins  -->
    <script src="../js/jquery.timers.js" type="text/javascript"></script>
    <style>

        #content{
            margin-left:25%;
    </style>
</head>
<body>

<div id="templatemo_top_wrapper">
    <div id="templatemo_top">
        <ul id="social_box">
            <li><a href="https://www.facebook.com/anomicelements/?ref=page_internal"><img src="../images/facebook.png" alt="facebook" /></a></li>
            <li><a href="https://www.facebook.com/anomicelements/?ref=page_internal"><img src="../images/twitter.png" alt="twitter" /></a></li>
            <a href="../user_login.php" class="button" >Admin</a>
            <?php
            if (!empty($_SESSION['admin'])){
                echo "<a href='user_logout.php' class='button' >déconnecter</a>";
            }

            ?>

        </ul>

    </div>
</div>

<div id="templatemo_header_wrapper">
    <div id="templatemo_header">

        <div id="site_title">
            <h1><a href="index.html"><img src="../images/logo.jpg" alt="logo" width="180" height="60" /><span>ANOMIC ELEMENTS</span></a></h1>
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
            <li><a href="gallery.php">gallery</a></li>
            <li><a href="https://www.facebook.com/anomicelements/?ref=page_internal">Contact</a></li>
        </ul>
    </div> <!-- end of templatemo_menu -->
</div>


</body>
</html>

