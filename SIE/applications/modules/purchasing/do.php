<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Purchasing Department
  </h1>
  <ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li><a href="#">Purchasing Department</a></li>
	<li class="active"><?php if(empty($_GET['p']) || $_GET['p']=='add'){?>Add<?}else{?>List<?}?></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
		  <!-- general form elements -->
		  <div class="box box-primary">
			<div class="box-header with-border">
				
				<h3 class="box-title">
					Delivery Order
					
				</h3>
			  
			  <div class="pull-right">
				<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=list&open=<?=$_GET['open']?>">DATA LIST</a>
			  </div>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<?php
			switch($_GET['p']){
				case 'add':?>
					<?php
					$date=date("m/d/Y")." ".date("h:i:s");
					$query_po_header=$query("select * from tbl_po_header where id='$_GET[id]'");
					$row_po_header=$fetch($query_po_header);
					$query_cek=$query("select * from tbl_po_header order by id DESC limit 1");
					$row_cek=$fetch($query_cek);
					if(empty($_GET['id'])){
						if(empty($row_cek['id'])){$id=1;}
						else{
							$id=$row_cek['id']+1;
						}
					}else{
						$id=$_GET['id'];
					}
					?>
					<form action="" method="post" enctype="multipart/form-data">
					  <div class="box-body">
					  <div class="col-md-4" style="padding-left:0px;">
						<div class="form-group">
							<label for="exampleInputEmail1">Title</label>
								<input disabled type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" name="title" value="<?=$row_po_header['title']?>">
						</div>
					  </div>
					  
					  <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Supplier</label>
							<select disabled name="supplier" class="form-control">
							<option value="0">None</value>
							<?php
							$query_spp=$query("select * from tbl_supplier order by name");
							while($row_spp=$fetch($query_spp)){
							?>
								<option value="<?=$row_spp['id']?>" <?php if($row_po_header['supplier']==$row_spp['id']){?>selected<?}?>><?=$row_spp['name']?></option>
							<?
							}
							?>
							</select>
						</div>
					  </div>
					   <div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Date</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input disabled type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" name="date" value="<?=$row_po_header['due_date']?>" data-mask>
							</div>
							
						</div>
					  </div>
											
						 <div class="form-group">
							<table width="100%" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th width="40">NO</th>
								<th width="250">ITEM</th>
								<th width="200">PRICE</th>
								<th width="100"><center>QTY</center></th>
								<th width="200">TOTAL</th>
								<th width="100"><center>UNIT</center></th>
								<th width="300">DESCRIPTION</th>
								<th width="100"><center>STATUS</center></th>
							</tr>
							</thead>
							<tbody>
							<?php
							for($i=1;$i<=15;$i++){
							?>
							<?php
							$b=$i-1;
							$po_header=$id;
							$item="material$i";
							$qty="qty$i";
							$unit="unit$i";
							$description="description$i";
							$item_material=$_POST[$item];
							$qty_material=$_POST[$qty];
							$unit_material=$_POST[$unit];
							$description_material=$_POST[$description];
							
							$query_po=$query("select * from tbl_po_item where po_header='$_GET[id]' order by id ASC limit $b,1");
							$row_po=$fetch($query_po);
							$query_material=$query("select * from tbl_material where id='$row_po[item]'");
							$row_material=$fetch($query_material);
							
							//label status
							if($row_po['status']==0){
									$status="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=$_GET[edit]&action=delivery&open=$_GET[open]&id=$_GET[id]&item=$row_po[id]'><small class='label pull-right bg-red'>ON PROCESS</small></a>";
							}else{$status="<small class='label pull-right bg-green'>DELIVERIED</small>";}
							//end
							
							//updte status
							if($_GET['action']=='delivery'){
								$update=$query("update tbl_po_item SET status='1' where id='$_GET[item]'");
								if($update){
									$newstock=$row_material['stock']+$row_po['qty'];
									$update2=$query("update tbl_material SET stock='$newstock' where id='$row_po[item]'");
									if($update){
										echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=$_GET[edit]&open=$_GET[open]&id=$_GET[id]'>";
									}
								}
							}
							if($_GET['action']=='undelivery'){
								$update=$query("update tbl_po_item SET status='0' where id='$_GET[item]'");
								if($update){
									echo"<meta http-equiv='refresh' content='0;?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=add&edit=$_GET[edit]&open=$_GET[open]&id=$_GET[id]'>";
								}
							}
							//end
							?>
								<?php
								if(empty($row_po['item'])){}else{?>
									<tr>
										<td><?=$i?></td>
										<td><input type="hidden" name="exist<?=$i?>" value="<?=$row_po['id']?>">
										
										<?php
										$query_material=$query("select * from tbl_material where id='$row_po[item]'");
										while($row_material=$fetch($query_material)){
										?>
											<?=$row_material['name']?>
										<?
										}
										?>
										
										</td>
										<td><?php if(empty($row_po['price'])){}else{?>Rp. <?=number_format($row_po['price'],0,'','.')?>,-<?}?></td>
										<td ><center><?php if(empty($row_po['qty'])){}else{?><?=$row_po['qty']?><?}?></center></td>
										<td><?php if(empty($row_po['total'])){}else{?>Rp. <?=number_format($row_po['total'],0,'','.')?>,-<?}?></td>
										<td><center><?=$row_po['unit']?></center></td>
										<td><?=$row_po['description']?></td>
										<td><?php if(empty($row_po['item'])){}else{?><?=$status?><?}?></td>
									</tr>
								<?}?>
							<?}?>
							</tbody>
							</table>
						</div>
						
						
					  </div>
					 
					  
					  <!-- /.box-body -->

					  
					</form>
				<?break;
				default:?>
					<script type="text/javascript">
						<!--
						function confirmation(noid) {
							var answer = confirm("Are You sure want to delete ?")
							if (answer){
								//alert("Bye bye!")
								window.location = "?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=<?=$_GET['p']?>&open=<?=$_GET['open']?>&action=delete&id=" + noid;
										
							}
									
						}
						//-->
						</script>
					<?php
					if($_GET['action']=='unpublished'){
							$update=$query("update tbl_po_header SET published='0' where id='$_GET[id]'");
						}
						if($_GET['action']=='published'){
							$update=$query("update tbl_po_header SET published='1' where id='$_GET[id]'");
						}
					if($_GET['action']=='delete'){
						$delete=$query("delete from tbl_po_header where id='$_GET[id]'");
						if($delete){
							$del=$query("delete from tbl_po_item where po_header='$_GET[id]'");
						}
						else{echo mysql_error();}
					}
					?>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
							<tr>
							  <th>No</th>
							  <th>Code</th>
							  <th>Title</th>
							  <th>Item</th>
							  <th>Delivery</th>
							  <th>Status</th>
							  <th>Action</th>
							</tr>
							</thead>
							<tbody>
							<?php
							$nourut=0;
							$query_po=$query("select * from tbl_po_header where approve1='1' and approve2='1' and approve3='1' order by id DESC");
							while($row_po=$fetch($query_po)){
							$query_spp=$query("select * from tbl_supplier where id='$row_po[supplier]'");
							$row_spp=$fetch($query_spp);
							$query_item=$query("select * from tbl_po_item where po_header='$row_po[id]' and item!=0");
							$jml_item=$rows($query_item);
							$item=number_format($jml_item);
							$approve=$row_po['approve1']+$row_po['approve2']+$row_po['approve3'];
							$nourut++;
							//published
							if($row_po['published']==0){
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=published&id=$row_po[id]'><img src='$template/dist/img/silang.png'></a>";
							}
							else{
								$published="<a href='?m=$_GET[m]&s=$_GET[s]&l=$_GET[l]&p=$_GET[p]&open=$_GET[open]&action=unpublished&id=$row_po[id]'><img src='$template/dist/img/ceklist.png'></a>";
							}
							//end published
							//approve
							if(empty($row_po['approve1'])){
								$approve1="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve1="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_po['approve2'])){
								$approve2="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve2="<img src='$template/dist/img/ceklist.png'>";
							}
							if(empty($row_po['approve3'])){
								$approve3="<img src='$template/dist/img/silang.png'>";	
							}
							else{
								$approve3="<img src='$template/dist/img/ceklist.png'>";
							}
							//end approve
							$query_item=$query("select sum(status) as total_status from tbl_po_item where po_header='$row_po[id]'");
							$query_item2=$query("select * from tbl_po_item where po_header='$row_po[id]'");
							$query_item3=$query("select * from tbl_po_item where po_header='$row_po[id]' and status='1'");
							$jml=$rows($query_item2);
							$jml2=$rows($query_item3);
							$row_item=$fetch($query_item);
							//approve status
							if($jml2 > 0){
								if($row_item['total_status']==$jml){
									$status="<small class='label center bg-green'>DELIVERIED</small>";
								}
								else{
									$status="<small class='label pull-center bg-red'>ON PROCESS</small>";
								}
									
							}
							else{
								$status="<small class='label pull-center bg-red'>ON PROCESS</small>";
							}
							//Correction
							if(!empty($row_po['correction_by'])){
									$correction="<small class='label pull-right bg-red'>correction</small>";
							}else{$correction="";}
							//end correction
								?>
									<tr id="tr_table">
										<td width="30"><?=$nourut?></td>
										<td align="left"><a href="print-do.php?id=<?=$row_po['id']?>" target="_blank">#<?=sprintf('%03d',$row_po['id'])?></a>
										<?=$correction?>
										</td>
										<td align="left"><?=$row_po['title']?></td>
										<td align="center"><?=$item?></td>
										<td align="center"><?=$row_po['due_date']?></td>
										<td align="center"><?=$status?></td>
										<td>
											<a href="?m=<?=$_GET['m']?>&s=<?=$_GET['s']?>&l=<?=$_GET['l']?>&p=add&edit=1&open=<?=$_GET['open']?>&id=<?=$row_po['id']?>"><img src="<?=$template?>/dist/img/edit.png"></a>
											<a href="#" onClick='confirmation(<?=$row_po['id']?>)'><img src="<?=$template?>/dist/img/delete.png"></a>
										</td>
									</tr>
								<?
							}?>
						  </table>
						</div>
				<?break;
			}
			?>
			
		  </div>
		  <!-- /.box -->
		</div>
	</div>
</section>