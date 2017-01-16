<?php
include("applications/config/common.php");
include("applications/controllers/function.php");

session_start();
if(empty($_SESSION['username'])){
	echo"<meta http-equiv='refresh' content='0;login.php'>";
}
else{

	$query_aktif=$query("select * from user where username='$_SESSION[username]'");
	$row_aktif=$fetch($query_aktif);
	$query_dept=$query("select * from tbl_department where id='$row_aktif[department]'");
	$row_dept=$fetch($query_dept);
	$S_name=$row_aktif['name'];
	$S_email=$row_aktif['email'];
	$S_phone=$row_aktif['phone'];
	$S_userid=$row_aktif['id'];
	$S_avatar=$row_aktif['image'];
	$S_username=$row_aktif['username'];
	$S_passid=$row_aktif['password'];
	$S_level=$row_aktif['level'];
	$S_department=$row_dept['nama_department'];
	$S_iddepartment=$row_dept['id'];
	
	//Leveling User
	if($row_aktif['level']==1){$S_level="Adminsitrator";}
	if($row_aktif['level']==2){$S_level="Operator";}
	if($row_aktif['level']==3){$S_level="User";}
	if($row_aktif['level']==4){$S_level="Guest";}
	//end
	
	include("assets/TemplateTatuis/index.php");
}
?>