<?php
include("applications/config/common.php");
$tbl_name="user"; // Table name

$username=$_POST['username'];
$password=$_POST['password'];

$query_login=$query("select * from $tbl_name where username='$username' and password='$password'");
$cek=$rows($query_login);
if($cek > 0){
	session_start();
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	
	echo"<meta http-equiv='refresh' content='0;index.php'>";
}
else{
	echo mysql_error();
}


?>