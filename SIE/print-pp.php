<?php
include("applications/config/common.php");
$date=date("m/d/Y")." ".date("h:i:s");
$query_pp=$query("select * from tbl_production_planning where id='$_GET[id]'");
$row_pp=$fetch($query_pp);
$query_cek=$query("select * from tbl_production_planning order by id DESC limit 1");
$row_cek=$fetch($query_cek);

$td=explode(" ",$row_pp['created_date']);
$ex=$td[0];
$sl=str_replace("/","",$ex);
$barcode=$sl."".sprintf('%03d',$row_pp['id']);
?>
<html>
<head>
	<title>Print - Production Planning</title>
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
			<center><h1>PRODUCTION PLANNING</h1></center>
			<table width="100%">
			<tr>
				<td width="50%">
					<table>
					<tr>
						<td>Code </td><td>: #<?=sprintf('%03d',$row_pp['id'])?></td>
					</tr>
					<tr>
						<td>Title </td><td>: <?=$row_pp['title']?></td>
					</tr>
					<tr>
						<td>Production Target  </td><td>: <?=$row_pp['target']?> pcs</td>
					</tr>
					<tr>
						<td>Production Date </td><td>: <?=$row_pp['start_date']?> - <?=$row_pp['end_date']?> </td>
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
				<th width="200">PRODUCTS</th>
				<th width="200"><center>DATE</center></th>
				<th width="200">DESCRIPTION</th>
				<th width="100">QTY</th>
				<th width="100">UNIT</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$no=0;
				$ppi=$query("select * from tbl_production_item where production_planning='$_GET[id]' order by id ASC");
				while($row_ppi=$fetch($ppi)){
				$query_pr=$query("select * from tbl_product_header where id='$row_ppi[product]'");
				$row_pr=$fetch($query_pr);
				$no++;
				?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row_pr['name']?></td>
						<td><center><?=$row_ppi['start_date']?> - <?=$row_ppi['end_date']?></center></td>
						<td><?=$row_ppi['correction']?></td>
						<td><?=number_format($row_ppi['qty'],0,"",".")?></td>
						<td align="center">pcs</td>
					</tr>
				<?
				}
			?>
			<?php
			$query_total=$query("select SUM(qty) as total from tbl_production_item where production_planning='$_GET[id]'");
			$row_total=$fetch($query_total);
			?>
			<tr style="font-weight:bold;">
				<td colspan="4" align="right">Total</td>
				<td ><?=number_format($row_total['total'],0,"",".")?></td>
				<td align="center">pcs</td>
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
						<td>Operations Manager,</td>
					</tr>
					<tr>
						<td height="100"><?php if($row_pp['approve1']==1){?><img src="<?=$template?>/dist/img/ttd1.png"><?}?></td>
					</tr>
					<tr>
						<td align="center">(Andi Warsito)</td>
					</tr>
					</table>
				</td>
				<td valign="top" width="33%" align="center" style="border-right:1px solid #333;">
					<table>
					<tr>
						<td>Operations Director,</td>
					</tr>
					<tr>
						<td height="100"><?php if($row_pp['approve2']==1){?><img src="<?=$template?>/dist/img/ttd2.png"><?}?></td>
					</tr>
					<tr>
						<td align="center">(Mirna Mariam)</td>
					</tr>
					</table>
				</td>
				<td valign="top" width="33%" align="center">
					<table>
					<tr>
						<td align="center">Managing Director,</td>
					</tr>
					<tr>
						<td height="100"><?php if($row_pp['approve3']==1){?><img src="<?=$template?>/dist/img/ttd3.png"><?}?></td>
					</tr>
					<tr>
						<td align="center">(Jimmy Jonhson)</td>
					</tr>
					</table>
				</td>
			</tr>
			</table>
		</div>
	</div>
</body>
</html>