<?php
require_once("Admin/ControllerAdmin.php");
$method = "";
if(isset($_GET["method"]))
	$method = $_GET["method"];
/*
 * RESTful service
 * mapping de l'URL
*/
switch($method){
	case "adminList":
		$controllerAdmin = new ControllerAdmin();
        $controllerAdmin->allAdmins();
		break;

    case "addAdmin":
        $controllerAdmin = new ControllerAdmin();
        $controllerAdmin->add($_POST["username"], $_POST["$mdp"]);
        break;
		
	case "single": /* 带参数的例子 */
		$siteRestHandler = new SiteRestHandler();
		$siteRestHandler->getSite($_GET["id"]);
		break;
	case "" :
		//404 - not found;
		break;
}
?>