<?php
require_once '../../utils/common.php';

session_start();
noMagicQuotes();

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

<div id="addArtisteForm">
    <form action="../../Controller/Artiste/addArtiste.php" method="POST" onsubmit="return chkinput(this)" enctype ="multipart/form-data">
        <fieldset>
            nom : <input name="nom" type="text" value="" />* <br />
            type de l'artiste :
            <select name="type_artiste">
                <option>Sélectionner un type</option>
                <option value="Designer">Designer</option>
                <option value="Photographiste">Photographiste</option>
                <option value="Musicien">Musicien</option>
            </select>*
            <br />
            <div class="content-img">
                <div class="file">
                    <i class="ico-plus"></i>télécharger le profile, support la format : jpg/png
                    <input type="file" name="profile_artiste" accept="image/*" id="upload" >
                </div>
            </div>
            <textarea rows="20" cols="30" name="intro">veuillez taper la présentation</textarea> <br />
            contact : <input name="contact" type="tel" value="" /> <br />
            oeuvre (plusieurs possible) : <input type="button" onclick="addInput();" value="ajouter" />
            <div id="lien"></div>
            <br />

            <button type="submit" name="ok" value="1">Créer une Artiste</button>
        </fieldset>
    </form>
</div>