<?php
if($_GET['s']=='submissions'){
	switch($_GET['l']){
		default:include("applications/modules/marketing/product.php");break;
		case 'catalog':include("applications/modules/marketing/catalog.php");break;
		case 'promomaterials':include("applications/modules/marketing/promomaterials.php");break;
	}
}
if($_GET['s']=='ads'){
	switch($_GET['l']){
		default:include("applications/modules/marketing/ads.php");break;
	}
}
if($_GET['s']=='mkplan'){
	switch($_GET['l']){
		default:include("applications/modules/marketing/mkplan.php");break;
	}
}
?>