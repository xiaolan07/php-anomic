
<?php
require_once '../../utils/common.php';
require_once '../../Models/Admin.php';
require_once '../../DAO/DAOAdmin.class.php';

session_start();
noMagicQuotes();
//echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"../../css/gestion/listAdmin.css\" />";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel=\"stylesheet\" type=\"text/css\" href=\"../../css/gestion/listAdmin.css\" />
    <script src="../../js/gestion.js"></script>
    <script>
        function supprimerAdmin(id){
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
                        document.getElementById("admin"+id).remove();
                    } else {
                        document.getElementById('lareponse').value="Error: returned status code " + req.status + " " + req.statusText;
                    }
                }
            };
            req.open("GET", "../../Controller/Admin/delAdmin.php?idAdmin="+id, true);
            req.send(null);
        }</script>

</head>
<body>

<h1>List des admins</h1>
<div id="lareponse"></div>
<div id="admins" class="container">

            <ul>
                <?php
                if (!empty($_SESSION['admin'])) {
                    //$controller=new controllerAdmin();
                    //$controller->allAdmins();
                    $db = initDatabase();
                    $admins = $db->query("SELECT * FROM Admin")->fetchAll(PDO::FETCH_OBJ);

                    foreach ($admins as $admin) {
                        echo '<li style="list-style: none" id=admin'. $admin->id .'>'
                            . $admin->username . '<span style="margin-left: 50px;"></span>' .
                            '<INPUT type="BUTTON" value="Supprimer" onclick="supprimerAdmin(this.id)" id='. $admin->id .' />' .
                            '</li>';

                    }

                }else{
                    echo "<p>Il faut se connecter pour consulter des admins</p>";
                }

                ?>
            </ul>


</div>

</body>
</html>