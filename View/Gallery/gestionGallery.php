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
    <script src="../../js/gestion.js"></script>
    <script src="checkForm.js"></script>
    <script>
        function addInput(){
            var input1 = document.createElement('input');
            input1.setAttribute('type', 'text');
            input1.setAttribute('name', 'lien_oeuvre[]');
            input1.setAttribute('class', 'oeuvre');

            var btn1 = document.getElementById("lien");
            btn1.insertBefore(input1,null);
        }
    </script>
</head>
<body>

<h1>Gestion des artistes</h1>
<?php
if (!empty($_SESSION['admin'])) {
    echo("<button type='button' onclick=\"location.href='photoList.php'\">Tous les photos</button>");

} ?>
<form action="" method="POST">
    <button type="button" onclick="afficheAddArtisteForm()">ajouter une photo</button>
</form>
<div id="addArtisteForm" style="display:none">
    <form action="../../Controller/Gallery/addPhoto.php" method="POST" onsubmit="return chkinput(this)" enctype ="multipart/form-data">
        <fieldset>
            <div class="content-img">
                <div class="file">
                    <i class="ico-plus"></i>télécharger la photo, support la format : jpg/png
                    <input type="file" name="photo" accept="image/*" id="upload" >
                </div>
            </div>

            <div id="lien"></div>
            <br />

            <button type="submit" name="ok" value="1">Ajouter une photo</button>
        </fieldset>
    </form>
</div>