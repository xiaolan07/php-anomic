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
    <script src="mortifierEvent.js"></script>
    <script src="checkForm.js"></script>


</head>
<body>
<h1>Gestion des événements</h1>
<?php
if (!empty($_SESSION['admin'])) {
    echo("<button type='button' onclick=\"location.href='evenementList.php'\">Tous les Evenements</button>");

} ?>
<form action="" method="POST">
    <button type="button" onclick="afficheAddEvenementForm()">ajouter une Evenement</button>
</form>
<div id="addEvenementForm" style="display:none">
    <form action="../../Controller/Evenement/addEvenement.php" onsubmit="return chkinput(this)" method="POST" enctype ="multipart/form-data">
        <fieldset>
            titre : <input name="titre" type="text" value="" />* <br />
            dateDebutEvenement : <input name="dateDebutEvenement" type="date" value="" /> <br />
            dateFinEvenement : <input name="dateFinEvenement" type="date" value="" /> <br />
            ville : <input name="ville" type="text" value="" /> <br />
            <textarea rows="20" cols="30" name="contenu">veuillez taper des contenu</textarea> <br />
            <div class="content-img">
                <div class="file">
                    <i class="ico-plus"></i>télécharger le posteur, support la format : jpg/png
                    <input type="file" name="posteur" accept="image/*" id="upload" >
                </div>
            </div>
            contact : <input name="contact" type="tel" value="" /> <br />
            <button type="submit" name="ok" value="1">Créer une Evenement</button>
        </fieldset>
    </form>
</div>