<?php
switch($_GET['mm']){
	default:include("applications/modules/director/marketing/marketing.php");break;
	case 'purchasing':include("applications/modules/director/purchasing/purchasing.php");break;
	case 'operations':include("applications/modules/director/operations/operations.php");break;
	case 'finance':include("applications/modules/director/finance/finance.php");break;
}
?>