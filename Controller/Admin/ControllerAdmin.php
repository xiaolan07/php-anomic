<?php
    //require_once 'DAO/DAOAdmin.class.php';

	class ControllerAdmin{
        function allAdmins(){
            //$admins=DAOAdmin::allAdmins();
            //require_once("View/Admin/adminList.php");
        }
        function delete(){
            if(isset($_GET["id"])){

                $id=$_GET["id"];
                //$admin=Admin::delete($id);
                //require_once("View/Admin/delAdmin.php");
            }

        }
        function add($username, $mdp) {
            //$admin=Admin::add($username,$mdp);
            //require_once("View/Admin/addAdmin.php");
        }

    }

?>