<?php
switch($_GET['mm']){
	default:include("applications/modules/manager_opr/purchasing/purchasing.php");break;
	case 'operations':include("applications/modules/manager_opr/operations/operations.php");break;
	case 'marketing':include("applications/modules/manager_opr/marketing/marketing.php");break;
}
?>