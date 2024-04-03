<?php
    require_once '../Models/Admin.php';

	/*class controllerAdmin{
        function allAdmins(){
            $admins=Admin::allAdmins();
            require_once("View/Admin/adminList.php");
        }
        function delete(){
            if(isset($_GET["id"]))
                $id=$_GET["id"];
                $admin=Admin::delete($id);
                require_once("View/Admin/delAdmin.php");
        }
        function add(){

            if(isset($_POST["username"]) ) {
                $username = $_POST["username"];
                $mdp = $_POST["mdp"];                
                $admin = Admin::add($username,$mdp);

                require_once("View/Admin/addAdmin.php");
            }
        }


    }*/

