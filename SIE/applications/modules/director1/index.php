<?php
switch($_GET['mm']){
	default:include("applications/modules/director1/marketing/marketing.php");break;
	case 'purchasing':include("applications/modules/director1/purchasing/purchasing.php");break;
	case 'operations':include("applications/modules/director1/operations/operations.php");break;
	case 'finance':include("applications/modules/director1/finance/finance.php");break;
}
?>