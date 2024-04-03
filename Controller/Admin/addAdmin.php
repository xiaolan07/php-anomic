<?php

require_once '../../utils/common.php';

    $db = initDatabase();
    if($_POST['username']!=null&&$_POST['mdp']!=null){
       /*$sql = "INSERT INTO Admin (username,mdp) "
            ."VALUES ('".$_POST['username']."', '". $_POST['mdp'] . "')";
       $query=$db->query($sql);
*/
       $username = $_POST['username'];
       $mdp = $_POST['mdp'];
       $sth = $db->prepare("INSERT INTO Admin(username,mdp)
                    VALUES(:username,:mdp)");

       $sth->bindValue(':username', $username, PDO::PARAM_STR);
       $sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);
       $res = $sth->execute();

        if ($res) {
            // redirection (syntaxe incorrecte, il faut normalement une URL complète)

            //header("Location:../../gestion.php");
            echo "ressuir";
            exit();
        }else{
            echo "error d'ajouter une admin";
        }
    }

?>
