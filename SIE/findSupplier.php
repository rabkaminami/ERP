<!-- ==============================================
//  Created by PHP Dev Zone           			 ||
//	http://php-dev-zone.com                      ||
//  Contact for any Web Development Stuff        ||
//  Email: ketan32.patel@gmail.com     			 ||
//=============================================-->


<?php 
include("applications/config/common.php");
?>

<?
$con="material$_GET[i]";
$material=intval($_GET[$con]);
$query="SELECT * FROM tbl_price_list WHERE material='$material'";
$result=mysql_query($query);
?>

<select name="supplier<?=$_GET['i']?>" onchange="getPrice<?=$_GET['i']?>(<?php echo $material?>,this.value)" class="form-control select2">
<option></option>
<?php while ($row=mysql_fetch_array($result)) { ?>
<?php
$query_spp=mysql_query("select * from tbl_supplier where id='$row[supplier]'");
$row_spp=mysql_fetch_array($query_spp);
?>
<option value=<?php echo $row_spp['id']?>><?php echo $row_spp['name']?></option>
<?}?>
</select>
