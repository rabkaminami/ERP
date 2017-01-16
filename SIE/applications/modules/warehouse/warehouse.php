<?php
if($_GET['s']=='do'){
	switch($_GET['l']){
		case 'do':include("applications/modules/warehouse/do.php");break;
			
	}
}
if($_GET['s']=='rmw'){
	switch($_GET['l']){
		case 'rm':include("applications/modules/warehouse/materials.php");break;
		case 'cuting':include("applications/modules/warehouse/cuting.php");break;
		case 'sewing':include("applications/modules/warehouse/sewing.php");break;
	}
}
if($_GET['s']=='fgw'){
	switch($_GET['l']){
		case 'finishing':include("applications/modules/warehouse/finishing.php");break;
		case 'product':include("applications/modules/warehouse/product.php");break;
	}
}
if($_GET['s']=='dm'){
	switch($_GET['l']){
		case 'req':include("applications/modules/warehouse/req.php");break;
		case 'confirm':include("applications/modules/warehouse/confirm.php");break;	
	}
}
?>