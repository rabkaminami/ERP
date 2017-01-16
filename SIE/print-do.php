<?php
include("applications/config/common.php");
$date=date("m/d/Y")." ".date("h:i:s");
$query_po_header=$query("select * from tbl_po_header where id='$_GET[id]'");
$row_po_header=$fetch($query_po_header);
$query_cek=$query("select * from tbl_po_header order by id DESC limit 1");
$row_cek=$fetch($query_cek);
$query_spp=$query("select * from tbl_supplier where id='$row_po_header[supplier]'");
$row_spp=$fetch($query_spp);
$sl=str_replace("/","",$row_po_header['due_date']);
$barcode=$sl."".sprintf('%03d',$row_po_header['id']);

$query_item=$query("select sum(status) as total_status from tbl_po_item where po_header='$row_po_header[id]'");
$query_item2=$query("select * from tbl_po_item where po_header='$row_po_header[id]'");
$query_item3=$query("select * from tbl_po_item where po_header='$row_po_header[id]' and status='1'");
$jml=$rows($query_item2);
$jml2=$rows($query_item3);
$row_item=$fetch($query_item);
//approve status
if($jml2 > 0){
	if($row_item['total_status']==$jml){
		$ttd3="<img src='$template/dist/img/ttd3.png'>";
	}
	else{
		$ttd3="";
	}
		
}
else{
	$ttd3="";
}
?>
<html>
<head>
	<title>Print - Delivery Order</title>
	<style type="text/css">
		body{font-size:12px;font-family:arial;}
		.page{width:700px;border:1px solid #333;}
		.header{height:120px;border-bottom:1px solid #333;}
		.logo{padding-left:10px;padding-top:10px;float:left;}
		table{font-size:12px;}
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
			border-collapse:collapse;
		}
		.tbl th{ border:1px solid #333;padding:6px;}
		.tbl td{ border:1px solid #333;padding:6px;}
		@font-face {
			font-family: 'wasp 39 m';
			src: url('Code39.ttf');
		}
		 .barcode { font-family: "wasp 39 m", verdana, calibri; font-size: 41px; }
		 .unbarcode{letter-spacing:21px;}
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
			<center><h1>DELIVERY ORDER</h1></center>
			<table width="100%">
			<tr>
				<td width="50%">
					<table>
					<tr>
						<td>Code </td><td>: #<?=sprintf('%03d',$row_po_header['id'])?></td>
					</tr>
					<tr>
						<td>Title </td><td>: <?=$row_po_header['title']?></td>
					</tr>
					<tr>
						<td>Supplier </td><td>: <?=$row_spp['name']?></td>
					</tr>
					<tr>
						<td>PIC </td><td>: <?=$row_spp['pic']?></td>
					</tr>
					<tr>
						<td>Phone </td><td>: <?=$row_spp['telp']?></td>
					</tr>
					<tr>
						<td>Date </td><td>: <?=$row_po_header['due_date']?></td>
					</tr>
					</table>
					 
				</td>
				<td width="50%">
					<div class="barcode">*<?=$barcode?>*</div>
					<br><div class="unbarcode"><?=$barcode?></div>
				</td>
			</tr>
			</table>
			<br>
			<table width="100%" class="tbl" cellpadding="0" cellspacing="0">
			<thead>
			<tr>
				<th>NO</th>
				<th width="200">ITEM</th>
				<th width="200">PRICE</th>
				<th width="100"><center>QTY</center></th>
				<th width="90"><center>UNIT</center></th>
				<th>DESCRIPTION</th>
				<th width="200">TOTAL</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$no=0;
				$query_po=$query("select * from tbl_po_item where po_header='$_GET[id]' order by id ASC");
				while($row_po=$fetch($query_po)){
				$query_material=$query("select * from tbl_material where id='$row_po[item]'");
				$row_material=$fetch($query_material);
				$query_spp=$query("select * from tbl_supplier where id='$row_po[supplier]'");
				$row_spp=$fetch($query_spp);
				$no++;
				?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row_material['name']?></td>
						<td><?php if(empty($row_po['price'])){}else{?>Rp. <?=number_format($row_po['price'],0,'','.')?><?}?></td>
						<td><center><?php if(empty($row_po['qty'])){}else{?><?=number_format($row_po['qty'],0,'','.')?><?}?></center></td>
						<td><center><?=$row_po['unit']?></center></td>
						<td><?=$row_po['description']?></td>
						<td><?php if(empty($row_po['total'])){}else{?>Rp. <?=number_format($row_po['total'],0,'','.')?><?}?></td>
					</tr>
				<?
				}
			?>
			<?php
			$query_total=$query("select SUM(total) as total_price from tbl_po_item where po_header='$_GET[id]'");
			$row_total=$fetch($query_total);
			?>
			<tr>
				<td colspan="6" align="right"><b>TOTAL</b></td>
				<td><b>Rp. <?=number_format($row_total['total_price'],0,'','.')?></b></td>
			</tr>
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
						<td align="center">Purchasing Dept,</td>
					</tr>
					<tr>
						<td height="100"><?php if($row_po_header['approve1']==1){?><img src="<?=$template?>/dist/img/ttd1.png"><?}?></td>
					</tr>
					<tr>
						<td align="center">(Supriatno)</td>
					</tr>
					</table>
				</td>
				<td valign="top" width="33%" align="center" style="border-right:1px solid #333;">
					<table>
					<tr>
						<td align="center">Warehouse Dept,</td>
					</tr>
					<tr>
						<td height="100"><?php if($row_po_header['approve2']==1){?><img src="<?=$template?>/dist/img/ttd2.png"><?}?></td>
					</tr>
					<tr>
						<td align="center">(Mirna Mariam)</td>
					</tr>
					</table>
				</td>
				<td valign="top" width="33%" align="center">
					<table>
					<tr>
						<td align="center">Supplier,</td>
					</tr>
					<tr>
						<td height="100"><?=$ttd3?></td>
					</tr>
					<tr>
						<td align="center">(<?=$row_spp['pic']?>)</td>
					</tr>
					</table>
				</td>
			</tr>
			</table>
		</div>
	</div>
</body>
</html>