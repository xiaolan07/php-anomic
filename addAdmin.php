<?php

require("utils/config.php");
require_once ("Models/Admin.php");
require_once("DAO/DAOAdmin.class.php");



$a = new Admin("","cc","123");
$daoAdmin = new DAOAdmin($a);
echo $daoAdmin->add();


?>