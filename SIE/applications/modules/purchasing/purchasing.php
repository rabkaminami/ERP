<?php
if($_GET['s']=='purchasing'){
	switch($_GET['l']){
		default:include("applications/modules/purchasing/request.php");break;
		case 'materials':include("applications/modules/purchasing/materials.php");break;
		case 'suppliers':include("applications/modules/purchasing/suppliers.php");break;
		case 'request':include("applications/modules/purchasing/request.php");break;
		case 'po':include("applications/modules/purchasing/po.php");break;
		case 'product':include("applications/modules/purchasing/product.php");break;
		case 'do':include("applications/modules/purchasing/do.php");break;
		case 'pricelist':include("applications/modules/purchasing/pricelist.php");break;
	}
}
?>