<?php
require_once '../../utils/common.php';
require_once '../../Models/Admin.php';
require_once '../../DAO/DAOAdmin.class.php';

session_start();
noMagicQuotes();

/*if (!empty($_SESSION['admin'])&&!empty($_POST['username']) && !empty($_POST['mdp'])) {
    $controller=new controllerAdmin();
    $controller->add($_POST['username'], $_POST['mdp']);
}*/

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
    <script>
        function chkinput(form){
            if(form.username.value==""){
                alert("Veuillez entrer le nom!");
                return(false);
            }
            if(form.mdp.value==""){
                alert("Le mot de passe est vide!!");
                return(false);
            }
            return(true);
        }
    </script>

</head>
<body>

<h1>Gestion des admins</h1>


<?php
if (!empty($_SESSION['admin'])) {
    echo("<button type='button' onclick=\"location.href='adminList.php'\">Tous les Admins</button>");

} ?>

<button type="button" onclick="afficheAddAdminForm()">ajouter une Admin</button>

<div id="addAdminForm" style="display:none">
    <form action="../../Controller/Admin/addAdmin.php" onsubmit="return chkinput(this)" method="POST">

            username : <input name="username" type="text" value="" /> <br />
            mot de passe : <input name="mdp" type="text" value="" /> <br />
            <button type="submit" name="ok" value="1">Créer un Admin</button>

    </form>
</div>
