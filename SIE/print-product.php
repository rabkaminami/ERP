<?php
include("applications/config/common.php");
$date=date("m/d/Y")." ".date("h:i:s");
$query_sub=$query("select * from tbl_sp_header where id='$_GET[id]'");
$row_sub=$fetch($query_sub);
$date1=explode(' ',$row_sub['created_date']);
$created=$date1[0];
$updated=$date2[0];
?>
<html>
<head>
	<title>Print - Product Submission</title>
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
			border-collapse: collapse;
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
			<center><h2>Product Submission</h2></center>
			<table width="100%">
			<tr>
				<td width="35%" colspan="2">
					<table>
					<tr>
						<td>Code </td><td>: #<?=sprintf('%03d',$row_sub['id'])?></td>
					</tr>
					<tr>
						<td>Title </td><td>: <?=$row_sub['title']?></td>
					</tr>
					<tr>
						<td>Created Date </td><td>: <?=$created?></td>
					</tr>
					</table>
					 
				</td>
			</tr>
			<tr>
				<td width="30%" valign="top"><img src="upload/<?=$row_sub['image']?>" class="img"></td>
				<td width="70%" valign="top" style="padding-left:10px;">
					
						<table width="100%" class="tbl" cellpadding="0" cellspacing="0" class="tbl">
						<thead>
						<tr>
							<th>NO</th>
							<th width="200">ITEM</th>
							<th width="100"><center>QTY</center></th>
							<th width="90"><center>UNIT</center></th>
							<th>DESCRIPTION</th>
						</tr>
						</thead>
						<tbody>
						<?php
							$no=0;
							$query_pr=$query("select * from tbl_sp_item where sp_header='$_GET[id]' order by id ASC");
							while($row_pr=$fetch($query_pr)){
							$query_material=$query("select * from tbl_material where id='$row_pr[item]'");
							$row_material=$fetch($query_material);
							$no++;
							?>
								<tr>
									<td><?=$no?></td>
									<td><?=$row_material['name']?></td>
									<td><?php if(empty($row_pr['qty'])){}else{?><?=$row_pr['qty']?><?}?></td>
									<td><?=$row_pr['unit']?></td>
									<td><?=$row_pr['description']?></td>
								</tr>
							<?
							}
						?>
						</tbody>
						</table>
					
					
				</td>
			</tr>
			</table>
			
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
						<td height="100"><?php if($row_sub['approve1']==1){?><img src="<?=$template?>/dist/img/ttd1.png"><?}?></td>
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
						<td height="100"><?php if($row_sub['approve2']==1){?><img src="<?=$template?>/dist/img/ttd2.png"><?}?></td>
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
						<td height="100"><?php if($row_sub['approve3']==1){?><img src="<?=$template?>/dist/img/ttd3.png"><?}?></td>
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