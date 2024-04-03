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


</head>
<body>

<div id="addAdminForm">
    <form action="../../Controller/Admin/addAdmin.php" onsubmit="return chkinput(this)" method="POST">

        username : <input name="username" type="text" value="" /> <br /><br />
        mot de passe : <input name="mdp" type="text" value="" /> <br /> <br />
        <button type="submit" name="ok" value="1">Créer un Admin</button>
        <br /> <br />
    </form>

</div>
</body>
</html>

