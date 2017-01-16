<!-- ==============================================
//  Created by PHP Dev Zone           			 ||
//	http://php-dev-zone.com                      ||
//  Contact for any Web Development Stuff        ||
//  Email: ketan32.patel@gmail.com     			 ||
//=============================================-->

<?php 

include("applications/config/common.php");
$mt="material$_GET[i]";
$sp="supplier$_GET[i]";
$supplierId=intval($_GET[$sp]);
$materialId=intval($_GET[$mt]);
$query="SELECT * FROM tbl_price_list WHERE material='$materialId' AND supplier='$supplierId'";
$result=mysql_query($query);

?>
<?php $row=mysql_fetch_array($result)?>
<input type="text" name="price<?=$_GET['i']?>"  id="price<?=$_GET['i']?>" value="<?php echo $row['price']?>" class="form-control" onfocus="startCalculate<?=$i?>();" onblur="stopCalc<?=$i?>();">

