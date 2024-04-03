
  function chkinput(form){

    if(form.username.value==""){
	  alert("Veuillez entrer le nom!");
	  form.nc.select();
	  return(false);
	}
   if(form.mdp.value==""){
	  alert("Le mot de passe est vide!!");
	  form.pwd.select();
	  return(false);
	}
   return(true);
  }
