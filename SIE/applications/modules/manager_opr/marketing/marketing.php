<?php
if($_GET['s']=='submissions'){
	switch($_GET['l']){
		default:include("applications/modules/manager_opr/marketing/product.php");break;
		case 'catalog':include("applications/modules/manager_opr/marketing/catalog.php");break;
		case 'promomaterials':include("applications/modules/manager_opr/marketing/promomaterials.php");break;
	}
}
if($_GET['s']=='ads'){
	switch($_GET['l']){
		default:include("applications/modules/manager_opr/marketing/ads.php");break;
	}
}
?>