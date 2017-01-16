<?php
if($_GET['s']=='purchasing'){
	switch($_GET['l']){
		default:include("applications/modules/director1/purchasing/request.php");break;
		case 'po':include("applications/modules/director1/purchasing/po.php");break;
	}
}
?>