<?php
if($_GET['s']=='operations'){
	switch($_GET['l']){
		default:include("applications/modules/operations/production_planning.php");break;
		case 'product':include("applications/modules/operations/product.php");break;
		case 'production_item':include("applications/modules/operations/production_planning_item.php");break;
	}
}
if($_GET['s']=='process'){
	switch($_GET['l']){
		case 'cuting':include("applications/modules/operations/cuting.php");break;
		case 'sewing':include("applications/modules/operations/sewing.php");break;
		case 'finishing':include("applications/modules/operations/finishing.php");break;
	}
}
?>