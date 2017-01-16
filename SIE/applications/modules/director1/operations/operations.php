<?php
if($_GET['s']=='operations'){
	switch($_GET['l']){
		default:include("applications/modules/director1/operations/production_planning.php");break;
		case 'product':include("applications/modules/director1/operations/product.php");break;
	}
}
?>