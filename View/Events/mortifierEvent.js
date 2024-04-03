function afficheAddEvenementForm(){
    document.getElementById("addEvenementForm").style.display = "block";
}

function mortifierEvenement(id){
    document.getElementById("modeModificationEvent" + id).style.display = "block";
    document.getElementById("modeAffichageEvent" + id).style.display = "none";
}

function supprimerEvenement(id){
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
                document.getElementById("modeAffichageEvent"+id).remove();
            } else {
                document.getElementById('lareponse').value="Error: returned status code " + req.status + " " + req.statusText;
            }
        }
    };
    req.open("DELETE", "../../Controller/Evenement/delEvenement.php?idEvenement="+id, true);
    req.send(null);
}
function sauvegarderModificationEvenement(id){

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
        titre:document.getElementById("titreEvenement" + id).value,
        dateDebutEvenement: document.getElementById("dateDebutEvenement" + id).value,
        dateFinEvenement:document.getElementById("dateFinEvenement" + id).value,
        ville:document.getElementById("ville" + id).value,
        contenu:document.getElementById("contenu" + id).value,
        contact:document.getElementById("contactEvenement" + id).value
    };

    req.open("POST", "../../Controller/Evenement/updateEvenement.php", true);
    req.send(JSON.stringify(obj));
    req.onreadystatechange = function() {
        console.log(req.responseText);
        if (req.readyState == 4) {
            if (req.status == 200) {
                document.getElementById("modeModificationEvent" + id).style.display = "none";
                document.getElementById("modeAffichageEvent" + id).style.display = "block";
                // Mis à jour les infos de l'artiste modifié sur IHM
                document.getElementById("affichageTitreEvent" + id).innerHTML = obj['titre'];
                document.getElementById("affichageDateDebutEvent" + id).innerHTML = obj['dateDebutEvenement'];
                document.getElementById("affichageDateFinEvent" + id).innerHTML = obj['dateFinEvenement'];

                document.getElementById("affichageVilleEvent" + id).innerHTML = obj['ville'];
                document.getElementById("affichageContenuEvent" + id).innerHTML = obj['contenu'];
                document.getElementById("affichageContactEvent" + id).innerHTML = obj['contact'];
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