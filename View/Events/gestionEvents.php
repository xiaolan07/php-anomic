<?php
if (!empty($_SESSION['admin'])) {
    echo "<p>Bonjour, " . $_SESSION['admin']->username . ".</p>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="../../js/gestion.js"></script>


</head>
<body>
<h1>Gestion des événements</h1>
<form action="" method="POST">
    <button type="button" onclick="afficheAddEvent()">ajouter une Evénement</button>
</form>
<div id="addEventForm" style="display:none">
    <form action="" method="POST" >
        <fieldset>
            titre : <input name="titre" type="text" value="" /> <br />
            dateDebut : <input name="dateDebut" type="date" value="" /> <br />
            dateFin : <input name="dateFin" type="date" value="" /> <br />
            ville : <input name="ville" type="text" value="" /> <br />
            contact : <input name="contact" type="text" value="" /> <br />
            <div class="content-img">
                <ul class="content-img-list">
                    <!-- <li class="content-img-list-item"><img src="https://www.baidu.com/img/bd_logo1.png" alt=""><a class="delete-btn"><i class="ico-delete"></i></a></li> -->
                </ul>
                <div class="file">
                    <i class="ico-plus"></i>télécharger le posteur, support la format : jpg/png<input type="file" name="file" accept="image/*" id="upload" >
                </div>
            </div>
            <textarea rows="30" cols="120">veuillez taper les contenu</textarea> <br />

            <button type="submit" name="ok" value="1">Créer une Evénement</button>
        </fieldset>
    </form>
</div>
