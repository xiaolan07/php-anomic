function chkinput(form){
    if(form.nom.value==""){
        alert("Veuillez entrer le nom!");
        return(false);
    }
    if(form.type_artiste.selectedIndex == 0){
        alert("Le type est vide!!");
        return(false);
    }
    return(true);
}
