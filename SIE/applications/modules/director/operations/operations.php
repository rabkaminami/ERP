<?php
if($_GET['s']=='operations'){
	switch($_GET['l']){
		default:include("applications/modules/director/operations/production_planning.php");break;
		case 'product':include("applications/modules/director/operations/product.php");break;
	}
}
?>