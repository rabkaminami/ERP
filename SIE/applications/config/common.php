<?php
ini_set("display_errors", 0);
$server=mysql_connect("localhost","root","") or die ("Server Not Found");
$db=mysql_select_db("sie") or die("Database Not Found");

$date=date("Y-m-d");
$datetime=date("Y-m-d H:i:s");
$query="mysql_query";
$fetch="mysql_fetch_array";
$rows="mysql_num_rows";
$template="template/wob";
$template="assets/TemplateTatuis";
$host="http://localhost:81";
$date=date("Y-m-d");
$dt=date("Y-m-d h:i:s");
include("title.php");


?>