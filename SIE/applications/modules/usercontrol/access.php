
<?php
//1.IT Support
//2.Marketing
//3.Purchasing
//4.Operations
//5.Warehousing
//6.Finance Department
//7.Accounting
//9. Board of Directors
//------------User-----
//2. Direktur Utama
//4. Direktur Operational

$access1=$S_iddepartment==1;
$access2=$S_iddepartment==1 || $S_iddepartment==2;
$access3=$S_iddepartment==1 || $S_iddepartment==3 ;
$access4=$S_iddepartment==1 || $S_level ==1 || $S_level ==2 || $S_iddepartment==4;
$access5=$S_iddepartment==1 || $S_level ==1 || $S_level ==2 || $S_iddepartment==5 ;
$access6=$S_iddepartment==1 || $S_level ==1 || $S_level ==2 || $S_iddepartment==6;
$access7=$S_iddepartment==1;
$access8=$S_iddepartment==1;
$access9=$S_iddepartment==1;
$access10=$S_iddepartment==1;
$access11=$S_iddepartment==1;
$access12=$S_iddepartment==9 && $S_userid==4;//director2
$access13=$S_iddepartment==9 && $S_userid==2;//director1
$access14=$S_iddepartment==10 && $S_userid==12;//manager_opr
$access15=$S_iddepartment==6 && $S_userid==13;//manager_finance
?>
