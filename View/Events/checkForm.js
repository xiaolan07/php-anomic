function chkinput(form){
    if(form.titre.value==""){
        alert("Veuillez entrer le titre!");
        return(false);
    }

    return(true);
}