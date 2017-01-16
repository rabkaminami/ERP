<?php
include("applications/config/common.php");
$date=date("m/d/Y")." ".date("h:i:s");
$query_raw=$query("select * from tbl_raw_process where id='$_GET[id]'");
$row_raw=$fetch($query_raw);
$query_pp=$query("select * from tbl_production_planning where id='$row_raw[production_planning]'");
$row_pp=$fetch($query_pp);
$query_spp=$query("select * from tbl_supplier where id='$row_po_header[supplier]'");
$row_spp=$fetch($query_spp);
?>
<html>
<head>
	<title>Print - Request Order</title>
	<style type="text/css">
		body{font-size:12px;font-family:arial;}
		.page{width:700px;border:1px solid #333;}
		.header{height:120px;border-bottom:1px solid #333;}
		.logo{padding-left:10px;padding-top:10px;float:left;}
		.textheader{
			float:right;
			text-align:right;
			width:400px;
			padding:10px;
		}
		.main{height:auto;padding:10px;}
		.main .img{width:100%;border:1px solid #333;}
		.footer{border-top:1px solid #333;padding:0px;}
		.tbl{
			border:1px solid #333;
		}
		.tbl th{ border:1px solid #333;padding:6px;}
		.tbl td{ border:1px solid #333;padding:6px;}
	</style>
</head>
<body>
	<div class="page">
		<div class="header">
			<div class="logo">
				<img src="<?=$template?>/dist/img/logo.png">
			</div>
			<div class="textheader">
				<p>Head Office :
				Jl. Cemped No. 1 Bantarjati Bogor<br>
				West Java - Indonesia 16153<br>
				Phone : +62 251 835 66 77<br>
				Fax	: +62 251 831 29 64<br>
				Website : www.tatuis.com
				</p>
			</div>
		</div>
		<div class="main">
			<center><h1>FINISHING PRODUCT</h1></center>
			<table width="100%">
			<tr>
				<td width="50%">
					<table>
					<tr>
						<td>Code </td><td>: #<?=sprintf('%03d',$row_raw['id'])?></td>
					</tr>
					<tr>
						<td>Title </td><td>: <?=$row_pp['title']?></td>
					</tr>
					<tr>
						<td>Warehouse </td><td>: <?=$row_raw['warehouse']?></td>
					</tr>
					<tr>
						<td>Receive Date </td><td>: <?=$row_raw['updated_date']?></td>
					</tr>
					
					</table>
					 
				</td>
				<td width="50%"></td>
			</tr>
			</table>
			<br>
			<table width="100%" class="tbl" cellpadding="0" cellspacing="0">
			<thead>
			<tr>
				<th>NO</th>
				<th width="200">ITEM</th>
				<th width="200"><center>RETURE</center></th>
				<th width="200">QTY</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$no=0;
				$query_rp=$query("select * from tbl_raw_process where id='$_GET[id]'");
				while($row_rp=$fetch($query_rp)){
				$query_product=$query("select * from tbl_product_header where id='$row_rp[id_product]'");
				$row_product=$fetch($query_product);
				$query_spp=$query("select * from tbl_supplier where id='$row_po[supplier]'");
				$row_spp=$fetch($query_spp);
				$no++;
				?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row_product['name']?></td>
						<td><center><?=$row_raw['reture']?> Pcs</center></td>
						<td><center><?php if(empty($row_raw['qty'])){}else{?><?=number_format($row_raw['qty'],0,'','.')?><?}?> Pcs</center></td>
					</tr>
				<?
				}
			?>
			<?php
			$query_total=$query("select SUM(price) as total from tbl_po_item where po_header='$_GET[id]'");
			$row_total=$fetch($query_total);
			?>
			
			</tbody>
			</table>
			<br><br><br><br>
		</div>
		<div class="footer">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td valign="top" width="33%" align="center" style="border-right:1px solid #333;">
					<table>
					<tr>
						<td>Operations Department,</td>
					</tr>
					<tr>
						<td height="100"><?php if($row_raw['published']==1){?><img src="<?=$template?>/dist/img/ttd1.png"><?}?></td>
					</tr>
					<tr>
						<td align="center">(Sujana)</td>
					</tr>
					</table>
				</td>
				<td valign="top" width="33%" align="center" style="border-right:1px solid #333;">
					<table>
					<tr>
						<td>Warehouse Department,</td>
					</tr>
					<tr>
						<td height="100"><?php if($row_raw['status']==1){?><img src="<?=$template?>/dist/img/ttd2.png"><?}?></td>
					</tr>
					<tr>
						<td align="center">(Mirna Mariam)</td>
					</tr>
					</table>
				</td>
			</tr>
			</table>
		</div>
	</div>
</body>
</html>