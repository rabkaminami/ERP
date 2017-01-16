<?php
if($_GET['s']=='summary'){
	switch($_GET['l']){
		case 'summary':include("applications/modules/finance/summary.php");break;
			
	}
}
if($_GET['s']=='rpm'){
	switch($_GET['l']){
		case 'rpm':include("applications/modules/finance/rpm.php");break;
	}
}
if($_GET['s']=='account'){
	switch($_GET['l']){
		case 'account':include("applications/modules/finance/account.php");break;
	}
}
if($_GET['s']=='saldo'){
	switch($_GET['l']){
		case 'saldo':include("applications/modules/finance/saldo.php");break;
	}
}
if($_GET['s']=='po'){
	switch($_GET['l']){
		case 'po':include("applications/modules/finance/po.php");break;
	}
}
?>