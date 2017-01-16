<?php
if($_GET['s']=='operations'){
	switch($_GET['l']){
		default:include("applications/modules/manager_opr/operations/production_planning.php");break;
		case 'product':include("applications/modules/manager_opr/operations/product.php");break;
	}
}
?>