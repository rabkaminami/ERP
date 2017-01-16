<?php
if($_GET['s']=='purchasing'){
	switch($_GET['l']){
		default:include("applications/modules/director/purchasing/request.php");break;
		case 'po':include("applications/modules/director/purchasing/po.php");break;
	}
}
?>