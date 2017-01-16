<?php
if($_GET['s']=='purchasing'){
	switch($_GET['l']){
		default:include("applications/modules/manager_opr/purchasing/request.php");break;
		case 'po':include("applications/modules/manager_opr/purchasing/po.php");break;
	}
}
?>