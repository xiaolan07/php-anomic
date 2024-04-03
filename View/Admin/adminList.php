<?php
require_once '../../utils/common.php';
require_once '../../Models/Admin.php';
require_once '../../DAO/DAOAdmin.class.php';

session_start();
noMagicQuotes();

/*
if (!empty($_SESSION['admin'])) {
    echo "<p>Bonjour, " . $_SESSION['admin']->username . ".</p>";
}*/
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

<h1>List des admins</h1>
<div id="lareponse"></div>
<div id="admins" class="container">
    <div class="row">
        <div class="col">
            <ul>
                <?php
                    if (!empty($_SESSION['admin'])) {
                        //$controller=new controllerAdmin();
                        //$controller->allAdmins();
                    $db = initDatabase();
                    $admins = $db->query("SELECT * FROM Admin")->fetchAll(PDO::FETCH_OBJ);

                    foreach ($admins as $admin) {
                        echo '<li id=admin'. $admin->id .'>'
                            . $admin->username .
                            '<INPUT type="BUTTON" value="Supprimer"  onclick="supprimerAdmin(this.id)" id='. $admin->id .' />' .
                            '</li>';

                    }

                    }else{
                        echo "<p>Il faut se connecter pour consulter des admins</p>";
                    }

                ?>
            </ul>


        </div>
    </div>
</div>
<script>

</script>
</body>
</html>