<?php
if($_GET['s']=='submissions'){
	switch($_GET['l']){
		default:include("applications/modules/director/marketing/product.php");break;
		case 'catalog':include("applications/modules/director/marketing/catalog.php");break;
		case 'promomaterials':include("applications/modules/director/marketing/promomaterials.php");break;
	}
}
if($_GET['s']=='ads'){
	switch($_GET['l']){
		default:include("applications/modules/director/marketing/ads.php");break;
	}
}
?>