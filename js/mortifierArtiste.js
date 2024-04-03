function supprimerArtiste(id){
    var req = null;
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        try {
            req = new ActiveXObject("Msxml2.XML-HTTP");
        } catch (e)
        {
            try {
                req = new ActiveXObject("Microsoft.XML-HTTP");
            } catch (e) {}
        }
    }
    req.onreadystatechange = function() {
        if(req.readyState == 4) {
            if(req.status == 200) {
                document.getElementById('lareponse').innerHTML="réssuir de supprimer";
                document.getElementById("modeAffichageArtiste"+id).remove();
            } else {
                document.getElementById('lareponse').value="Error: returned status code " + req.status + " " + req.statusText;
            }
        }
    };
    req.open("DELETE", "../../Controller/Artiste/delArtiste.php?idArtiste="+id, true);
    req.send(null);
}

function mortifierArtiste(id){
    document.getElementById("modeModificationArtiste" + id).style.display = "block";
    document.getElementById("modeAffichageArtiste" + id).style.display = "none";
}



function sauvegarderModificationArtiste(id){


    var req = null;
    if (window.XMLHttpRequest) {
        req = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) {
        try {
            req = new ActiveXObject("Msxml2.XML-HTTP");
        } catch (e)
        {
            try {
                req = new ActiveXObject("Microsoft.XML-HTTP");
            } catch (e) {}
        }
    }

   var obj= {
        id:id,
        nom:document.getElementById("nomArtiste" + id).value,
        type_artiste: document.getElementById("typeArtiste" + id).value,
        intro:document.getElementById("introArtiste" + id).value,
        contact:document.getElementById("contactArtiste" + id).value
    };

    req.open("POST", "../../Controller/Artiste/updateArtiste.php", true);
    req.send(JSON.stringify(obj));
    req.onreadystatechange = function() {
        console.log(req.responseText);
        if (req.readyState == 4) {
            if (req.status == 200) {

                document.getElementById("modeModificationArtiste" + id).style.display = "none";
                document.getElementById("modeAffichageArtiste" + id).style.display = "block";
                // Mis à jour les infos de l'artiste modifié sur IHM
                document.getElementById("affichageNomArtiste" + id).innerHTML = obj['nom'];
                document.getElementById("affichageTypeArtiste" + id).innerHTML = obj['type_artiste'];
                document.getElementById("affichageIntroArtiste" + id).innerHTML = obj['intro'];
                document.getElementById("affichageContactArtiste" + id).innerHTML = obj['contact'];
            } else {
                if(req.status == 401) {
                    alert("Sans habilitation pour modifier");
                } else {
                    alert("Erreur technique");
                }
            }
        }
    }
}